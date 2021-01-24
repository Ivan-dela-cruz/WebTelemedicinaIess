<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRolePost;
use App\Http\Requests\UpdateRolePut;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $roles = ModelsRole::with('permissions')->get();  //lista los roles y permisos
        $role = ModelsRole::findById(1);
        $permissions =  $role->permissions;
        //return $roles;

        return view('admin.roles.index',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout
        ], compact('roles', 'permissions', 'role'));
    }

    public function getRoles()
    {
        $roles = ModelsRole::with('permissions')->get();  //lista los roles y permisos
        $role = ModelsRole::findById(1);
        $permissions =  $role->permissions;
        return view('admin.roles.listRoles', compact('roles', 'permissions', 'role'))->render();

    }

    public function getPermissions($id)
    {
        $role = ModelsRole::findById($id);
        $permissions =  $role->permissions;

        return view('admin.roles.table',compact('permissions'))->render();
    }

    public function getApiRoles(){
        $roles = ModelsRole::where('status','activo')->get();
        return response()->json([
            'roles'=>$roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $permissions = Permission::all();
        //return $list_permisos;
        return view('admin.roles.create',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
        ], compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePost $request)
    {
        $validated = $request->validated();
        $role = new ModelsRole();
        $role->name = $request->name;
        $role->status = $request->status;
        $role->guard_name = 'web';
        if ($request->permmission == 'asignar') {
            $role->permmission = $request->permmission;
            $role->save();
            // sincronizar permisos
            $role->permissions()->sync($request->get('permissions'));
            return redirect()->route('get-roles');
        } else {
            if ($request->permmission == 'especial') {
                $role->permmission = $request->permmission;
                $role->save();
                // sincronizar permisos
                $role->givePermissionTo(Permission::all());
                return redirect()->route('get-roles');
            } else {
                $role->permmission = $request->permmission;
                $role->save();
                return redirect()->route('get-roles');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $role = ModelsRole::findById($id);
        $permissions = Permission::all();
        return view('admin.roles.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
        ], compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolePut $request, $id)
    {
        $validated = $request->validated();

        $role = ModelsRole::findById($id);
        $role->name = $request->name;
        $role->status = $request->status;
        $role->guard_name = 'web';
        if ($request->permmission == 'asignar') {
            $role->permmission = $request->permmission;
            $role->save();
            // revocamos todos los permisos otorgados
            $role->revokePermissionTo(Permission::all());
            // sincronizar los nuevos permisos
            $role->permissions()->sync($request->get('permissions'));
            return redirect()->route('get-roles');
        } else {
            if ($request->permmission == 'especial') {
                $role->permmission = $request->permmission;
                $role->save();
                // revocamos todos los permisos otorgados
                $role->revokePermissionTo(Permission::all());
                // sincronizar permisos
                $role->givePermissionTo(Permission::all());
                return redirect()->route('get-roles');
            } else {
                $role->permmission = $request->permmission;
                $role->save();
                 // revocamos todos los permisos otorgados
                 $role->revokePermissionTo(Permission::all());
                return redirect()->route('get-roles');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
    public function deleteRole($id)
    {
        $role = ModelsRole::findById($id);
        $role->revokePermissionTo(Permission::all());
        $role->delete();
        return redirect()->route('get-roles');
    }
    public function deactivateRole(Request $request)
    {
        $role = ModelsRole::findById($request->id);

        if ($role->status == 'activo') {
            $role->status = 'inactivo';
        } else {
            $role->status = 'activo';
        }
        $role->save();
        return response()->json($role,200);
    }
}
