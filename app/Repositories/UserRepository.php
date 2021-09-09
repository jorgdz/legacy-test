<?php

namespace App\Repositories;

use App\Exceptions\Custom\ConflictException;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\Base\BaseRepository;
use App\Exceptions\Custom\NotFoundException;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserRepository extends BaseRepository
{
    protected $relations = ['status', 'person'];
    protected $fields = ['us_username', 'email'];

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (User $user) {
        parent::__construct($user);
    }

    /**
     * save
     *
     * @return void
     */
    public function save (Model $user) {
        $user->password = Hash::make($user->password);
        $user->save();
        return $user;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showProfiles ($user_id) {
        $response = $this->model->with(['userProfiles' => function($query) {
            $query->with('profile');
        }])->find($user_id);
        if($response == null)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));
        if($response->userProfiles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Profile::class)]));
        return $response->userProfiles;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showProfilesById ( $user_id , $profile_id ) {
        $response = $this->model->with(['userProfiles' => function($query) use($profile_id) {
            $query->with('profile')->where('profile_id',$profile_id);
        }])->find($user_id);
        if($response == null)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));
        if($response->userProfiles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Profile::class)]));
        return $response->userProfiles[0];
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showRolesbyUser ($user_id) {
        $query = $this->model->with(['userProfiles' => function($query) {
            $query->with('roles.permissions');
        }])->find($user_id);

        if ($query == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));

        if ($query->userProfiles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(UserProfile::class)]));
        
        if ($query->userProfiles[0]->roles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Role::class)]));

        $query->userProfiles[0]->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        $query->userProfiles[0]->roles[0]->permissions->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        //unset($array2['pivot']['created_at']);
        return $query->userProfiles;
    }

    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showRolesbyUserProfile ($user_id, $profile_id) {
        $query = $this->model->with(['userProfiles' => function($query) use ($profile_id) {
            $query->with('roles.permissions')->where('profile_id',$profile_id);
        }])->find($user_id);

        if ($query == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));
        
        if ($query->userProfiles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(UserProfile::class)]));
        
        if ($query->userProfiles[0]->roles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Role::class)]));

        $query->userProfiles[0]->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        $query->userProfiles[0]->roles[0]->permissions->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        return $query->userProfiles[0];
    }

    /**
     * saveRole
     *
     * @return void
     */
    public function saveRolesbyUserProfile ($array_roles,$userProfile) {
        $userProfile->syncRoles($array_roles);
        if($userProfile->roles->count()==0)
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(Role::class)]));
        $userProfile->with('roles.permissions')->get();
        //$userProfile->roles->makeHidden(['guard_name','created_at','updated_at','deleted_at','pivot']);
        return $userProfile;
    }


    /**
     * find information by conditionals
     *
     * @return void
     *
     */
    public function showNotColaborador (Request $request) {
        $response =  collect($this->model::with('collaborators')->get())
            ->whereNull('collaborators')->values()->all();

        return $response;
    }

    /**
     * changePasswordUser
     *
     * @param  mixed $request
     * @return void
     */
    public function changePasswordUserRepository($user) {
        $id_user = $user->id;

        //Si el id de usuario es 0
        if($id_user==0)
            throw new ConflictException(__('error-parameter-id-required'));
        
       
        $user = User::where('id', $id_user)->count();

        //Si el usuario no existe en BD
        if($user==0 || $user=='')
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(User::class)]));
        
        //generar nueva password
        $passwordNew = $this->generatePasswordAlert(10);
        $passwordNewHash = Hash::make($passwordNew);

        //si falla la compracion de la nueva clave y la encriptacion
        if (!Hash::check($passwordNew, $passwordNewHash)) 
            throw new ConflictException(__('messages.error-comparing-password'));

        //guardar la nueva password generada
        User::where("id", $id_user)->update(["password" => $passwordNewHash]);

        //Retornar el usuario con la nueva password
        $user = User::where("id", $id_user)->first();
        $user['new_password'] = $passwordNew;
        return $user;
    }
    
    /**
     * generatePasswordAlert
     *
     * @param  mixed $length //longitud de la cadena aleatoria
     * @return $passwordNew 
     */
    public function generatePasswordAlert($length){
        
        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890');//!$%^&!$%^&');
        $passwordNew = substr($random, 0, 10);
        
        return $passwordNew;
    }
}
