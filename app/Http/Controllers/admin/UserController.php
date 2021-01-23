<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserPost;
use App\Http\Requests\UpdateUserPut;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use function Sodium\add;
use File;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $users = User::orderBy('name','ASC')->paginate(8);
        $mensaje = "Hola ";
        return view('admin.users.index',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'users' => $users
        ], compact('users', 'mensaje'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        //consultas los roles para pasar la formulario
        ///DEBE PASARSE EN CLAVE VALOR EJEMPLO : {'K':'V'}
        $roles = Role::where('status','activo')->pluck('name','id');

        $activeMenu = $this->activeMenu($layout, $pageName);
        return view('admin.users.create',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            ///ENVIAS EL ROL AL FORMULARO 
            'roles'=>$roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    ///CAMPOS EN LA BASE DE DATOS
    //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status

    /*
     * Metodo para la creacion de un nuevo usuario recibe como parametro
     * un los datos correspondientes al formulario, y estos son evavualos por el
     * metodo de validacion StoreUserPost este archivo contiene las validaciones
     * de los campos que llegan atraves del formulario, pasado la evaluacion se inicia
     * una transaccion con la base de datos si no existe nigun error en los datos se
     * ejecuta un commit a la base de datos, caso contrario se realiza un rollback de los
     * cambios dentro de la trasaccion abierta. Retorna con un estado 422 para errores
     * y 200.
     */
    public function store(StoreUserPost $request)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $user = new  User;
            $user->ci = $request->ci;
            $user->type_document = $request->type_document;
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->email = $request->email;
            //$user->status = $request->status;
            $user->status = $status;
            $user->password = $this->generatePassword($request->ci);
            $user->url_image = $this->loadFile($request, 'url_image', 'users', 'users');
           
            $user->save();
            //ASINAMOS EL ROL ESCOJIDO EN EL FORMULARIO
            $role = Role::findById($request->rol);
            $user->assignRole($role->name);
            DB::commit();
            return redirect()->route('get-users');
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'erros' => $e
            ], 422);
        }


        // return redirect()->route('get-users');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $roles = Role::all();
        $roles_user = $user->getRoleNames();
        return response()->json([
            'rol' => $roles_user,
            'user' => $user,
            'lista_roles' => $roles

        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $roles = Role::where('status','activo')->pluck('name','id');
        $users = User::find($id);
       
        return view('admin.users.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'roles'=>$roles,
            'users'=>$users
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPut $request, $id)
    {

        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $user = User::find($id);
            $user->ci = $request->ci;
            $user->type_document = $request->type_document;
            $user->name = $request->name;
            $user->last_name = $request->last_name;

            $user->address = $request->address;

            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->status = $status;
            if ($request->file('url_image')) {
                $user->url_image = $this->loadFile($request, 'url_image', 'users', 'users');
            }
           
            $user->save();
            ///REVOCAMOS TODOS LOS PERMISOS PARA DESPUES ASIGNARLE EL NUEVO PERMISO SELECCIONADO
            $roles_name = $user->getRoleNames();
            $user->removeRole($roles_name[0]);
            //ASINAMOS EL ROL ESCOJIDO EN EL FORMULARIO
            $role = Role::findById($request->rol);
            $user->assignRole($role);
            DB::commit();
            return redirect()->route('get-users');

        } catch (Exception $e) {

            DB::rollback();
            return response()->json([
                'erros' => $e
            ], 422);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        ///REVOCAMOS TODOS LOS PERMISOS PARA DESPUES ASIGNARLE EL NUEVO PERMISO SELECCIONADO
        $roles_name = $user->getRoleNames();
        $user->removeRole($roles_name[0]);
        $user->delete();
    }

    public function generatePassword($password)
    {
        $user_password = Hash::make($password);
        return $user_password;
    }


    public function UploadImage(Request $request)
    {
        $url_file = "img/users/";

        if ($request->url_image && $request->url_image != '#') {
            $image = $request->get('url_image');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('url_image'))->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
    }

    public function filterUser(Request $request)
    {
        $text_search = $request->text_search;
        $parameter_search = $request->parameter_search;
        if ($text_search == '' || $text_search == null) {
            $users = User::with('roles')->paginate(10);
            return response()->json([
                'users' => $users,
            ], 200);
        } else {
            $users = User::with('roles')
                ->where($parameter_search, 'like', '%' . $text_search . '%')
                ->paginate(3);
            return response()->json([
                'users' => $users,
            ], 200);
        }
    }

    public function userListAPI(Request $request)
    {

        $text_search = $request->text_search;
        $roles = Role::all();
        if ($text_search == '' || $text_search == null) {
            $users = User::with('roles')->paginate(10);
            return response()->json([
                'users' => $users,
                'roles' => $roles
            ], 200);
        } else {
            $users = User::where(function ($query) use ($text_search) {
                $query = $query->orWhere('name', 'like', '%' . $text_search . '%');
                $query = $query->orWhere('last_name', 'like', '%' . $text_search . '%');
                $query = $query->orWhere('ci', 'like', '%' . $text_search . '%');
                $query = $query->orWhere('email', 'like', '%' . $text_search . '%');
            })->with('roles')->paginate(10);

            return response()->json([
                'users' => $users,
                'roles' => $roles
            ], 200);
        }
    }
/*
 * Metodo para cambiar el estado de un usuario, el tipo
 * de dato del atributo status es enum y solo acepta dos
 * datos ['activo','inactivo'], este metodo recibe como
 * parametro del id del usuario, luego se realiza la busqueda del usuario
 * y se evaluda el estado actual del usuario y cambiar por el uevo estado,
 * finalmente se guarda los cambio. Retorna con un estado 422 para errores
     * y 200 para satisfactorio.
 */
    public function changeStatus($id)
    {
        $user = User::find($id);
        if ($user->status == 'activo') {
            $user->status = 'inactivo';
        } else {
            $user->status = 'activo';
        }
        $user->save();
        return response()->json($user, 200);
    }
}
