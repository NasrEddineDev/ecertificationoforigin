<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('verified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $roles = Role::all();
            return view('roles.index', compact('roles'));
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try {
            return view('roles.create');
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $role = new Role([
                'name' => $request->name,
            ]);

            $role->save();

            return redirect()->route('roles.index')->with('success', 'Role created successfully.');
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        try {
            $role = Role::find($id);
            $permissions_groups = Permission::all()->groupBy('group');
            $permissions_ids = $role->permissions->pluck('id');
            return view('roles.edit', compact('role', 'permissions_groups', 'permissions_ids'));
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $role = Role::find($id);
            $role->name = $request->name;
            $role->permissions()->detach();
            $permissions_ids = (array)json_decode($request->permissions_ids);
            $role->givePermissionsToByIds($permissions_ids);
            $role->update();

            return response()->json([
                'message' => 'Role updated successfully name=' . $request->name
            ], 200);
        } catch (Throwable $e) {
            report($e);

            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $role = Role::find($id);
            if ($role) {
                $role->delete();
                return response()->json([
                    'message' => 'Role deleted successfully'
                ], 200);
            }
            return response()->json([
                'message' => 'Role not found'
            ], 200);
        } catch (Throwable $e) {
            report($e);
            return false;
        }
    }
}
