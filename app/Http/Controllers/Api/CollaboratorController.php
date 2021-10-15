<?php

namespace App\Http\Controllers\Api;

use App\Cache\CollaboratorCache;
use App\Cache\PersonCache;
use App\Cache\RelativeCache;
use App\Cache\UserCache;
use App\Cache\UserProfileCache;
use App\Models\Collaborator;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollaboratorRequest;
use App\Http\Controllers\Api\Contracts\ICollaboratorController;
use App\Models\Person;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateCollaboratorRequest;
use App\Models\Catalog;
use App\Models\CollaboratorCampus;
use App\Models\CollaboratorEducationLevel;
use App\Models\CustomTenant;
use App\Models\Profile;
use App\Models\Relative;
use App\Models\Role;
use App\Models\UserProfile;
use App\Services\MailService;
use App\Traits\SavePerson;
class CollaboratorController extends Controller implements ICollaboratorController
{
    use RestResponse, SavePerson;

    /**
     * studentCache
     *
     * @var mixed
     */
    private $collaboratorCache;
    private $personCache;
    private $userCache;
    private $userProfileCache;
    private $relativeCache;
    private $mailService;

    /**
     * __construct
     *
     * @param  mixed $collaboratorCache
     * @return void
     */
    public function __construct(CollaboratorCache $collaboratorCache,PersonCache $personCache,RelativeCache $relativeCache,UserCache $userCache, UserProfileCache $userProfileCache, MailService $mailService)
    {
        $this->collaboratorCache = $collaboratorCache;
        $this->personCache = $personCache;
        $this->relativeCache = $relativeCache;
        $this->userCache = $userCache;
        $this->userProfileCache = $userProfileCache;
        $this->mailService = $mailService;
    }

    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {
        return $this->success($this->collaboratorCache->all($request));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(StoreCollaboratorRequest $request)
    {
        $nacionality = Catalog::getKeyword($request['pers_nacionality_keyword'])->first();
        $statusMarital = Catalog::getKeyword($request['status_marital_keyword'])->first();
        $typeIdentification = Catalog::getKeyword($request['type_identification_keyword'])->first();
        $typeReligion = Catalog::getKeyword($request['type_religion_keyword'])->first();
        $livingPlace = Catalog::getKeyword($request['vivienda_keyword'])->first();
        $city = Catalog::getKeyword($request['city_keyword'])->first();
        $currentCity = Catalog::getKeyword($request['current_city_keyword'])->first();
        $sector = Catalog::getKeyword($request['sector_keyword'])->first();
        $ethnic = Catalog::getKeyword($request['ethnic_keyword'])->first();

        $person = $this->savePerson($request,
            $nacionality,
            $statusMarital,
            $typeIdentification,
            $typeReligion,
            $livingPlace,
            $city,
            $currentCity,
            $sector,
            $ethnic
        );
        $person->pers_is_provider = $request->get('coll_journey_description') == "TP" ? 1 : $request->get('pers_is_provider');
        $person = $this->personCache->save($person);
        //si tiene discapacidad
        if($request->get('pers_has_disability') == true)
            $person->disabilities()->sync($request->get('pers_disabilities'));

        //si esta casado
        if($statusMarital->cat_keyword=='casado') {
            $typeIdentificationRelative = Catalog::getKeyword($request['type_identification_keyword_relatives_person'])->first();
            $typeReligionRelative = Catalog::getKeyword($request['type_religion_relative_keyword'])->first();
            $ethnicRelative = Catalog::getKeyword($request['ethnic_relative_keyword'])->first();
            $typeKinship = Catalog::getKeyword($request['typeKinship_keyword'])->first();

            $personRelative = new Person($request->only('pers_gender_relative'));
            $personRelative->status_marital_id = $statusMarital->id;
            $personRelative->type_identification_id = $typeIdentificationRelative->id;
            $personRelative->vivienda_id = $livingPlace->id;
            $personRelative->city_id = $city->id;
            $personRelative->current_city_id = $currentCity->id;
            $personRelative->sector_id = $sector->id;
            $personRelative->type_religion_id = $typeReligionRelative->id;
            $personRelative->ethnic_id = $ethnicRelative->id;
            $personRelative->pers_identification = $request->get('pers_identification_relatives_person');
            $personRelative->pers_firstname = $request->get('pers_firstname_relatives_person');
            $personRelative->pers_secondname = $request->get('pers_secondname_relatives_person');
            $personRelative->pers_first_lastname = $request->get('pers_first_lastname_relatives_person');
            $personRelative->pers_second_lastname = $request->get('pers_second_lastname_relatives_person');
            $this->personCache->save($personRelative);

            $relative = new Relative();
            $relative->person_id_relative = $personRelative->id;
            $relative->person_id = $person->id;
            $relative->type_kinship_id = $typeKinship->id;
            $relative->rel_description = $request->get('pers_relatives_person_desc');
            $relative->status_id = $request->get('status_id');
            $this->relativeCache->save($relative);
        }

        //Usuario
        $user = new User($request->only(['email']));
        $user->us_username = $request->get('pers_identification');
        $password = Str::random(8);
        $user->password = Hash::make($password);
        $user->person_id = $person->id;
        $user->status_id = $request->get('status_id');
        $user = $this->userCache->save($user);

        if($request->get('coll_type') == "D"){
            $profile = Profile::whereIn('keyword', ['docente'])->first();
            $roles = Role::whereIn('keyword', ['docente'])->get()->pluck('id')->toArray();
            $activity = 'DOCENCIA';
        }else{
            $profile = Profile::whereIn('keyword', ['administrativo'])->first();
            $roles = Role::whereIn('keyword', ['administrador'])->get()->pluck('id')->toArray();
            $activity = 'ADMINISTRATIVO';
        }

        //user-profile
        $userProfile = new UserProfile(['user_id' => $user->id]);
        $userProfile->profile_id = $profile->id;
        $userProfile->status_id = $request->get('status_id');
        $userProfile->email = $user->email;
        $this->userProfileCache->save($userProfile);

        //Colaborador
        $collaborator = new Collaborator($request->all());
        $collaborator->user_id = $user->id;
        $collaborator->coll_activity = $activity;
        $collaborator->coll_dependency = $request->get('coll_journey_description') == "TC" ? 1 : $request->get('coll_dependency');
        $collaborator->coll_journey_hours = $request->get('coll_journey_description') == "TC" ? 40 : ($request->get('coll_journey_description') == "MT" ? 20 : $request->get('position_company_id'));

        if($collaborator->coll_journey_hours == 40 && $collaborator->coll_activity == 'DOCENCIA')
            $collaborator->coll_advice = 1;

        $collaborator->coll_advice = 0;
        $collaborator->education_level_principal_id = $request->education_level_principal_id;
        $collaborator->status_id = $request->get('status_id');
        $collaborator = $this->collaboratorCache->save($collaborator);
        $collaborator->update(['coll_contract_num' => strval($collaborator->id)]);

        //Ofertas y nivel de educacion
        foreach ($request->education_levels as  $value) {
            $collaboratorEducationLevels = new CollaboratorEducationLevel();
            $collaboratorEducationLevels->collaborator_id = $collaborator->id;
            $collaboratorEducationLevels->education_level_id = $value;
            $collaboratorEducationLevels->status_id = $request->get('status_id');
            $collaboratorEducationLevels->save();
        }

        //Campus
        foreach ($request->campus as  $value) {
            $collaboratorCampus = new CollaboratorCampus();
            $collaboratorCampus->collaborator_id = $collaborator->id;
            $collaboratorCampus->campus_id = $value;
            $collaboratorCampus->status_id = $request->get('status_id');
            $collaboratorCampus->save();
        }

        $userProfile->syncRoles($roles);

        $params = [
            "template"  => 23,
            "subject"   => "Registro de usuario",
            "view"      => "mails.register",
            "to" => array(
                ["name" => NULL, "email" => $request->get('email')]
            ),
            "params" => [
                "USERNAME" => $user->us_username,
                "PASSWORD" => $password,
                "LINK" => CustomTenant::current()->domain_client,
            ],
        ];

        $this->mailService->SendEmail($params);

        return $this->information(__('messages.success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,Collaborator $collaborator)
    {
        return $this->success($this->collaboratorCache->find($collaborator->id));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $collaborator
     * @return void
     */
    public function update(UpdateCollaboratorRequest $request, Collaborator $collaborator)
    {
        // if($collaborator->coll_type == "D"){
        //     $old_profile = Profile::whereIn('keyword', ['docente'])->first();
        // }else{
        //     $old_profile = Profile::whereIn('keyword', ['administrativo'])->first();
        // }

        // if($request->get('coll_type')=="D"){
        //     $profile = Profile::whereIn('keyword', ['docente'])->first();
        //     $roles = Role::whereIn('keyword', ['docente'])->first();
        //     $activity = 'DOCENCIA';
        // }else{
        //     $profile = Profile::whereIn('keyword', ['administrativo'])->first();
        //     $roles = Role::whereIn('keyword', ['administrador'])->first();
        //     $activity = 'ADMINISTRATIVO';
        // }

        $collaborator->fill($request->all());

        if ($collaborator->isClean())
            return $this->information(__('messages.nochange'));

        // $userProfile = $collaborator->user->userProfiles->where('profile_id', $old_profile->id)->first();

        // $userProfile->profile_id = $profile->id;

        // $userProfile->roles()->sync($roles->id);

        return $this->success($this->collaboratorCache->save($collaborator));
    }

    /**
     * changeStatus
     *
     * @param  mixed $request
     * @param  mixed $collaborator
     * @return void
     */
    public function changeStatus(Request $request, Collaborator $collaborator)
    {
        $collaborator->status_id == 1 ? $collaborator->status_id = 2 : $collaborator->status_id = 1;
        $collaborator->coll_disabled_reason = $request->coll_disabled_reason;

        return $this->success($this->collaboratorCache->save($collaborator));
    }

    /**
     * getCollaboratorsPerEducationLvl
     *
     * @param  mixed $educationlevel
     * @return void
     */
    public function getCollaboratorsPerEducationLvl ($educationlevel) {
        return $this->success($this->collaboratorCache->getCollaboratorsPerEducationLvl($educationlevel));
    }

    /**
     * destroy
     *
     * @param  mixed $collaborator
     * @return void
     */
    public function destroy(Collaborator $collaborator)
    {
        return $this->success($this->collaboratorCache->destroy($collaborator));
    }
}
