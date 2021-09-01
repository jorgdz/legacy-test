<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Profile;
use App\Cache\UserCache;
use App\Models\UserProfile;
use App\Traits\RestResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Cache\UserProfileCache;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\StoreUserRequest;
use App\Exceptions\Custom\ConflictException;
use App\Exceptions\Custom\NotFoundException;
use App\Http\Requests\StoreUserProfileRequest;
use App\Exceptions\Custom\UnprocessableException;
use App\Http\Requests\StoreRoleUserProfileRequest;
use App\Http\Controllers\Api\Contracts\IUserController;
use App\Models\Role as ModelsRole;
use Spatie\Permission\Exceptions\RoleDoesNotExist;

class UserController extends Controller implements IUserController
{
    use RestResponse;

    /**
     * repoUser
     *
     * @var mixed
     */
    private $repoUser,$repoUserProfile;

    /**
     * __construct
     *
     * @return void
     */
    public function __construct (UserCache $repoUser,UserProfileCache $repoUserProfile) {
        $this->repoUser = $repoUser;
        $this->repoUserProfile = $repoUserProfile;
    }

    /**
     * index
     *
     * List all users
     * @return void
     */
    public function index (Request $request) {
        $users = $this->repoUser->all($request);
        return $this->success($users);
    }

    /**
     * show
     *
     * User by :id
     * @param  mixed $user
     * @return void
     */
    public function show (User $user) {
        return $this->success($user, Response::HTTP_FOUND);
    }

    /**
     * store
     *
     * Add new user
     * @param  mixed $request
     * @return void
     */
    public function store (StoreUserRequest $request) {
        $user = new User($request->all());
        $user = $this->repoUser->save($user);
        //$user->syncRoles($request->roles);
        return $this->success($user, Response::HTTP_CREATED);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update (Request $request, User $user) {

    }

    /**
     * showProfiles
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function showProfiles ( Request $request,$user_id ) {
        return $this->success($this->repoUser->showProfiles($user_id));
    }

    /**
     * showProfilesById
     *
     * @param  mixed $user
     * @param  mixed $profile
     * @return void
     */
    public function showProfilesById (Request $request,$user_id, $profile_id) {
        return $this->success($this->repoUser->showProfilesById($user_id,$profile_id));
    }

    /**
     * saveProfiles
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function saveProfiles ( StoreUserProfileRequest $request, User $user) {
        $userProfileRequest = array_merge(['user_id' => "".$user['id']],$request->all());
        $matchThese = [['user_id','=',$userProfileRequest['user_id']],['profile_id','=',$userProfileRequest['profile_id']]];
        $userProfilePreview = UserProfile::where($matchThese)->get();
        if ($userProfilePreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(UserProfile::class)]));
            
        $userProfile = new UserProfile($userProfileRequest);
        $userProfile = $this->repoUserProfile->save($userProfile);
        return $this->success($userProfile);
    }

    /**
     * updateProfileById
     *
     * @param  mixed $request
     * @param  mixed $user
     * @param  mixed $profile
     * @return void
     */
    public function updateProfileById ( StoreUserProfileRequest $request, User $user, Profile $profile) {
        $matchTheseNew = [['user_id','=',$user['id']],['profile_id','=',$profile['id']]];
        $userProfile = UserProfile::where($matchTheseNew)->first();
        if ($userProfile == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(UserProfile::class)]));

        $userProfileRequest = array_merge(['user_id' => "".$user['id']],$request->all());
        $matchThese = [['user_id','=',$userProfileRequest['user_id']],['profile_id','=',$userProfileRequest['profile_id']]];
        $userProfilePreview = UserProfile::where($matchThese)->get();
        if ($userProfilePreview->isNotEmpty())
            throw new ConflictException(__('messages.exist-instance', ['model' => class_basename(UserProfile::class)]));
        
        $userProfile->fill(array_merge(['user_id' => "".$user['id']],$request->all()));

        if ($userProfile->isClean())
            throw new UnprocessableException(__('messages.nochange'));

        $userProfile = $this->repoUserProfile->save($userProfile);
        return $this->success($userProfile);
    }

    /**
     * destroyProfilesById
     *
     * @param  mixed $user
     * @param  mixed $profile
     * @return void
     */
    public function destroyProfilesById ( Request $request,User $user, Profile $profile) {
        $matchThese = [['user_id','=',$user['id']],['profile_id','=',$profile['id']]];
        $userProfile = UserProfile::where($matchThese)->first();
        $userProfile=$this->repoUserProfile->destroy($userProfile);
        return $this->success($userProfile);
    }

    /**
     * destroyProfiles
     *
     * @param  mixed $user
     * @return void
     */
    public function destroyProfiles ( Request $request,User $user) {
        $userProfiles = UserProfile::where('user_id',$user['id'])->get();
        // iterate through the Collection
        foreach ($userProfiles as $userProfile) {
            $userProfile = $this->repoUserProfile->destroy($userProfile);
        }
        return $this->success($userProfiles);
    }

    /**
     * index
     *
     * List all roles by userProfile
     * @return void
     */
    public function showRolesbyUser (Request $request,$user_id) {
        return $this->success($this->repoUserProfile->showRolesbyUser($user_id));
    }
    
    /**
     * index
     *
     * List all roles by userProfile
     * @return void
     */
    public function showRolesbyUserProfile (Request $request, $user_id, $profile_id) {
        return $this->success($this->repoUserProfile->showRolesbyUserProfile($user_id,$profile_id));
    }

    /**
     * index
     *
     * List all roles by userProfile
     * @return void
     */
    public function saveRolesbyUserProfile (StoreRoleUserProfileRequest $request, $user_id, $profile_id) {
        
        $matchTheseNew = [['user_id','=',$user_id],['profile_id','=',$profile_id]];
        $userProfile = UserProfile::where($matchTheseNew)->first();
        if ($userProfile == null) 
            throw new NotFoundException(__('messages.no-exist-instance', ['model' => class_basename(UserProfile::class)]));
        
        $array_roles = $request['roles'];
        return $this->success($this->repoUser->saveRolesbyUserProfile($array_roles,$userProfile));
    }
}
