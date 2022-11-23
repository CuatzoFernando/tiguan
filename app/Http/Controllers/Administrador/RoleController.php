<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        return view('Administrador.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

      return view('Administrador.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, ['name' => 'required|unique:roles', 'label' => 'required|unique:roles']);

      $role = Role::create($request->all());
      $role->permissions()->detach();

      if ($request->has('permissions')) {
          foreach ($request->permissions as $permission_name) {
              $permission = Permission::whereName($permission_name)->first();
              $role->givePermissionTo($permission);
          }
      }

        return redirect('roles');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $role = Role::findOrFail($id);
      $permissions = Permission::select('id', 'name', 'label')->get()->pluck('label', 'name');

      return view('Administrador.roles.edit', compact('role', 'permissions'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      /*
      $this->validate($request, ['name' => 'required']);

      $role = Role::findOrFail($request->role_id);
      $role->update($request->all());
      $role->permissions()->detach();

      if ($request->has('permissions')) {
          foreach ($request->permissions as $permission_name) {
              $permission = Permission::whereName($permission_name)->first();
              $role->givePermissionTo($permission);
          }
      }*/

      $role = Role::findOrFail($request->role_id);

      $role->name = $request->name;
      $role->label = $request->label;

      $role->update();

      $role->permissions()->detach();

      if ($request->has('permissions')) {
          foreach ($request->permissions as $permission_name) {
              $permission = Permission::whereName($permission_name)->first();
              $role->givePermissionTo($permission);
          }
      }
      return redirect('roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();

        return redirect('roles');
    }
}
