<?php

namespace App\Repositories;

use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\NotFoundException;
use App\Models\Profile;
use App\Models\User;
use App\Repositories\Base\BaseRepository;
use App\Traits\TranslateException;
use Illuminate\Support\Facades\Hash;

class ProfileRepository extends BaseRepository
{
    
    use TranslateException;

    /**
     * relations
     *
     * @var array
     */
    protected $relations = ['status', 'userProfiles'];

    /**
     * parents
     *
     * @var array
     */
    protected $parents = ['status'];

    /**
     * fields
     *
     * @var array
     */
    protected $fields = ['pro_name', 'pro_description'];

    /**
     * selfFieldsAndParents
     *
     * @var array
     */
    protected $selfFieldsAndParents = ['pro_name', 'st_name'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (Profile $profile) {
        parent::__construct($profile);
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showUsers (Profile $profile) {

        return $profile->with(['userProfiles', 'userProfiles.user'])->findOrFail($profile->id);

    }


    
    /**
     * changePasswordUser
     *
     * @param  mixed $request
     * @return void
     */
    public function changePasswordUserLoggedRepository($request)
    {

        $id_user = request()->user()->id;

        $user = User::where('id', $id_user)->count();

        //Si el usuario no existe en BD
        if ($user == 0 || $user == '')
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => $this->translateNameModel(class_basename(User::class))]));


        //generar nueva password
        $passwordNew = $request->password;
        $passwordNewHash = Hash::make($passwordNew);

        //si falla la compracion de la nueva clave y la encriptacion
        if (!Hash::check($passwordNew, $passwordNewHash))
            throw new ConflictException(__('messages.error-comparing-password'));


        //guardar la nueva password generada
        User::where("id", $id_user)->update(["password" => $passwordNewHash]);



        //Retornar el usuario con la nueva password
        $user = User::where("id", $id_user)->first();
        //  $user['new_password'] = $passwordNew;
        return $user;

       
    }
}
