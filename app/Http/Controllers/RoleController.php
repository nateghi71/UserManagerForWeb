<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('admin.roles.index' , compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create' , compact('permissions'));//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'label' => 'string|required',
            'permissions'  => 'required',
            'permissions.*' => 'string|required',
        ]);

        $role = Role::create([
            'name' => $request->name,
            'label' => $request->label
        ]);

        foreach ($request->permissions as $permissionId)
        {
            $role->permissions()->attach($permissionId);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        return view('admin.roles.show' , compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit' , compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'string|required',
            'label' => 'string|required',
            'permissions'  => 'required',
            'permissions.*' => 'string|required',
        ]);

        $role->update([
            'name' => $request->name,
            'label' => $request->label
        ]);

        $role->permissions()->detach();
        foreach ($request->permissions as $permissionId)
        {
            $role->permissions()->attach($permissionId);
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->permissions()->detach();
        $role->delete();
        return redirect()->back();
    }
}
