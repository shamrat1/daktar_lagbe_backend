<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::with('permissions:id,name')->latest()->paginate(20);
        $permissions = Permission::get(['id','name']);
        return view('admin.roles.index',compact('roles','permissions'));
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|unique:roles,name,'.$request->id,
            'description' => 'nullable|string|max:191',
            'permissions.*' => 'required|numeric'
        ]);

        $role = Role::updateOrCreate([
            'id' => $request->id
        ],[
            'name' => str_replace(" ","_",strtolower($request->name)),
            'description' => $request->description,
        ]);

        $role->permissions()->sync($request->permissions);
        Cache::flush();
        return redirect()->back();
    }

    public function delete($id)
    {
        Role::findOrFail($id)->delete();
        Cache::flush();
        return redirect()->back();
    }
}
