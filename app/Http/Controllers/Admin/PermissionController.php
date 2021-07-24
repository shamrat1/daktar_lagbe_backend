<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::latest()->paginate(20);
        return view('admin.permissions.index',compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required','string','unique:permissions,name,'.$request->id],
            'description' => ['nullable','string']
        ]);

        Permission::updateOrCreate([
            'id' => $request->id,
        ],[
            'name' => str_replace(' ','_',strtolower($request->name)),
            'description' => $request->description,
        ]);
        
        $status = 'Added';
        if($request->has('id')){
            $status = 'Updated';
        }
        session()->flash('success',"Permission $status Successfully.");
        return redirect()->back();
    }
}
