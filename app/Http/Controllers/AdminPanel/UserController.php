<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=User::all();
        $data_roles=Role::all();
        return view("admin.user.index",[
            'data' => $data,
            'data_roles' => $data_roles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function destroy_role(string $uid,$rid)
    {
        $user=User::find($uid);
        $user->roles()->detach($rid);#Many to Many relation delete related data
        return back();
    }

    public function add_role(Request $request,string $id){
        $data=new RoleUser();
        $data->user_id = $id;
        $data->role_id = $request->role_id;
        $data->save();
        return back();
    }
}
