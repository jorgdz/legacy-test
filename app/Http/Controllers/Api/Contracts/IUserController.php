<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\StoreRoleUserProfileRequest;

interface IUserController
{
    /**
     * @OA\Get(
     *   path="/api/users",
     *   tags={"Usuarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los usuarios",
     *   description="Muestra todos los usuarios paginados en formato JSON",
     *   operationId="getAllUsers",
     *   @OA\Parameter(
     *     name="page",
     *     description="Numero de la paginación",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="size",
     *     description="Numero de elementos por pagina",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="integer",
     *       example="10"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="sort",
     *     description="Ordenar por columna",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="id"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="type_sort",
     *     description="Sentido del Orden",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *       example="desc"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index (Request $request);

    /**
     * @OA\Get(
     *   path="/api/users/{user}",
     *   tags={"Usuarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un usuario",
     *   description="Muestra información específica de un usuario.",
     *   operationId="getUser",
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function show (User $user);

    /**
     * store
     *
     * Create a new user
     * @param  mixed $request
     * @return void
     */
    public function store (StoreUserRequest $request);

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $user
     * @return void
     */
    public function update (Request $request, User $user);

    /**
     * @OA\Get(
     *   path="/api/users/{user}/profiles",
     *   tags={"Perfiles de usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener perfiles",
     *   description="Muestra los perfiles por usuario.",
     *   operationId="getProfilebyUser",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function showProfiles (Request $request, $user);

    /**
     * @OA\Get(
     *   path="/api/users/{user}/profiles/{profile}",
     *   tags={"Perfiles de usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener perfil",
     *   description="Muestra un perfil por usuario.",
     *   operationId="getProfilebyUserProfile",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function showProfilesById (Request $request, $user, $profile);

    /**
     * @OA\Post(
     *   path="/api/users/{user}/profiles",
     *   tags={"Perfiles de usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Guardar perfil",
     *   description="Asociar perfil a un usuario por su identificador.",
     *   operationId="addUserProfiles",
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="profile_id",
     *           description="Identificación del perfil",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Identificación del estado actual",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function saveProfiles(StoreUserProfileRequest $request, User $user);

    /**
     * @OA\Put(
     *   path="/api/users/{user}/profiles/{profile}",
     *   tags={"Perfiles de usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar la información de un perfil de usuario",
     *   description="Actulizar la información de un perfil de usuario específico por Id de usuario y perfil",
     *   operationId="editUserProfile",
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="profile_id",
     *           description="id del Perfil",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="id del Estado",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function updateProfileById(StoreUserProfileRequest $request, User $user, Profile $profile);

    /**
     * @OA\Delete(
     *   path="/api/users/{user}/profiles/{profile}",
     *   tags={"Perfiles de usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Elimina un perfil de usuario",
     *   description="Eliminado lógico de un perfil de usuario específico por Id de usuario y perfil.",
     *   operationId="removeUserProfile",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function destroyProfilesById(Request $request,User $user, Profile $profile);

    /**
     * @OA\Delete(
     *   path="/api/users/{user}/profiles",
     *   tags={"Perfiles de usuario"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Elimina perfiles de usuario",
     *   description="Eliminado lógico de perfiles de usuario específico por Id de usuario.",
     *   operationId="removeUserProfile",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="3"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function destroyProfiles(Request $request,User $user);

    /**
     * @OA\Get(
     *   path="/api/users/{user}/roles",
     *   tags={"Roles por UserProfile"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener roles por usuario",
     *   description="Muestra los roles por usuario en todos sus perfiles.",
     *   operationId="getRolesbyUser",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function showRolesbyUser (Request $request, $user);

    /**
     * @OA\Get(
     *   path="/api/users/{user}/profiles/{profile}/roles",
     *   tags={"Roles por UserProfile"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener roles por usuario y perfil",
     *   description="Muestra los roles por usuario dado en un perfil especifico.",
     *   operationId="getRolesbyUserProfile",
     *   @OA\Parameter(
     *     name="user_profile_id",
     *     description="Id del perfil de usuario",
     *     in="query",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=404, description="No encontrado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function showRolesbyUserProfile ( Request $request, $user, $profile);

    /**
     * @OA\Post(
     *   path="/api/users/{user}/profiles/{profile}/roles",
     *   tags={"Roles por UserProfile"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Guardar rol por UserProfile",
     *   description="Asociar un rol a un UserProfile.",
     *   operationId="addRoleByUserProfiles",
     *   @OA\Parameter(
     *     name="user",
     *     description="Id del usuario",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\Parameter(
     *     name="profile",
     *     description="Id del perfil",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="5"
     *     ),
     *   ),
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="user_profile_id",
     *           description="Id del perfil de usuario",
     *           type="integer",
     *         ),
     *         @OA\Property(
     *           property="roles",
     *           description="Identificación de los roles",
     *           type="array",
     *           @OA\Items(
     *             type="integer",
     *             example="1"
     *           ),
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function saveRolesbyUserProfile(StoreRoleUserProfileRequest $request, User $user,Profile $profile);
}
