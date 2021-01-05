<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('role-view')){
            abort(403, 'Não Autorizado');
        }

        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('role-create')){
            abort(403, 'Não Autorizado');
        }

        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('role-create')){
            abort(403, 'Não Autorizado');
        }

        if($request['name'] && $request->name != "Admin"){
            Role::create($request->all());

            return redirect()->route('roles.index');
        }

        return redirect()->back();
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
    public function edit($id)
    {
        if (Gate::denies('role-edit')){
            abort(403, 'Não Autorizado');
        }

        if(Role::find($id)->name == "Admin"){
            return redirect()->route('roles.index');
        }

        $role = Role::find($id);

        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('role-edit')){
            abort(403, 'Não Autorizado');
        }

        if(Role::find($id)->name == "Admin"){
            return redirect()->route('roles.index');
        }

        if ($request['name'] && $request['name'] != "Admin") {
            Role::find($id)->update($request->all());
        }

        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('role-delete')){
            abort(403, 'Não Autorizado');
        }

        if (Role::find($id)->name == "Admin") {
            return redirect()->route('roles.index');
        }

        Role::find($id)->delete();

        return redirect()->route('roles.index');
    }

    public function permission($id)
    {
        if (Gate::denies('role-edit')){
            abort(403, 'Não Autorizado');
        }

        $role = Role::find($id);
        $permissions = Permission::all();

        return view('roles.permission', compact('role', 'permissions'));
    }

    public function permissionStore(Request $request, $id)
    {
        if (Gate::denies('role-edit')){
            abort(403, 'Não Autorizado');
        }

        $role = Role::find($id);
        $data = $request->all();
        $permission = Permission::find($data['permission_id']);
        $role->addPermissionOnRole($permission);

        return redirect()->back();
    }

    public function permissionDestroy($id, $permission_id)
    {
        if (Gate::denies('role-edit')){
            abort(403, 'Não Autorizado');
        }

        $role = Role::find($id);
        $permission = Permission::find($permission_id);
        $role->removePermissionOnRole($permission);

        return redirect()->back();
    }
}
