<?php

namespace App\Http\Controllers\Api\Contracts;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserChangePasswordLoggedFormRequest;

interface IProfileController
{
    /**
     * @OA\Get(
     *   path="/api/profiles",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Listar los perfiles",
     *   description="Muestra todos los perfiles paginados en formato JSON",
     *   operationId="getAllProfiles",
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
     *   @OA\Parameter(
     *     name="search",
     *     description="Filtrar registros",
     *     in="query",
     *     required=false,
     *     @OA\Schema(
     *       type="string",
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function index(Request $request);

    /**
     * @OA\Post(
     *   path="/api/profiles",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Crear perfil",
     *   description="Crear un nuevo perfil.",
     *   operationId="addProfile",
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
     *           property="pro_name",
     *           description="Nombre del perfil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="keyword",
     *           description="Palabra clave del perfil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pro_description",
     *           description="Descripción del perfil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del perfil",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pro_name"  : "required|string|unique:profiles,pro_name|max:255",
     *          "keyword"   : "required|string|unique:profiles,keyword",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function store (StoreProfileRequest $request);

    /**
     * @OA\Get(
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener un perfil",
     *   description="Muestra información específica de un perfil.",
     *   operationId="showProfile",
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
    public function show(Request $request,Profile $profile);

    /**
     * @OA\Put(
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Actualizar perfil",
     *   description="Actualizar un perfil.",
     *   operationId="updateProfile",
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
     *           property="pro_name",
     *           description="Nombre del perfil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="keyword",
     *           description="Palabra clave del perfil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="pro_description",
     *           description="Descripción del perfil",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="status_id",
     *           description="Estado del perfil",
     *           type="integer",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=201, description="Se ha creado correctamente"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *          "pro_name"  : "required|string|unique:tenant.profiles,pro_name,profile->id|max:255",
     *          "keyword"   : "required|string|unique:tenant.profiles,keyword, $profile->id",
     *          "status_id" : "required|integer|exists:status,id"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function update(UpdateProfileRequest $request, Profile $profile);

     /**
     * @OA\Delete(
     *   path="/api/profiles/{profile}",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Eliminar un perfil",
     *   description="Eliminar un perfil por Id",
     *   operationId="deleteProfile",
     *   @OA\Parameter(
     *     name="profile",
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
    public function destroy(Profile $profile);

    /**
     * @OA\Get(
     *   path="/api/profiles/{profile}/users",
     *   tags={"Usuarios"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Obtener usuarios",
     *   description="Muestra los usuarios que existen vinculados a un perfil.",
     *   operationId="getUsersbyProfile",
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
    public function showUsers ( Request $request,Profile $profile);

    /**
     * @OA\Put(
     *   path="/api/profile/change-password",
     *   tags={"Perfiles"},
     *   security={
     *      {"api_key_security": {}},
     *   },
     *   summary="Cambiar contraseña del usuario que se encuentra logeado",
     *   description="Cambiar contraseña del usuario logeado.",
     *   operationId="updatechangePasswordLogged",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="application/json",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="current_password",
     *           description="contraseña actual",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password",
     *           description="nueva contraseña",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="password_confirmation",
     *           description="confirmar nueva contraseña",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=400, description="No se cumple todos los requisitos",
     *   @OA\JsonContent(
     *      example={
     *            "current_password" : "required|validatePasswordCurrent",
     *            "password" : "required| min:6| max:8 |confirmed|La contraseña debe contener al menos 1 mayúscula, 1 minúscula, 1 numérico y 1 carácter especial: #?!@$%^&*-. (el signo punto tambien es un carácter especial)",
     *            "password_confirmation" : "required| min:6"
     *      },
     *   )),
     *   @OA\Response(response=401, description="No autenticado"),
     *   @OA\Response(response=403, description="No autorizado"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     *
     */
    public function changePasswordLogged(UserChangePasswordLoggedFormRequest $request);
}
