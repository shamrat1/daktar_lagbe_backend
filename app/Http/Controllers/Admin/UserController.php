<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index',compact('users'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'mobile' => 'required|regex:/^01[0-9]{9}$/',
            'password' => ['required','confirmed',Password::min(6)->mixedCase()->uncompromised()]
        ]);

        User::create([
            'name' => ucwords($request->name),
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success','User Added Successfully');
        return redirect()->back();
    }
    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'name' => 'required|string',
            'mobile' => 'required|regex:/^01[0-9]{9}$/',
            'password' => ['required','confirmed',Password::min(6)->mixedCase()->uncompromised()]
        ]);

        User::create([
            'name' => ucwords($request->name),
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
        ]);

        session()->flash('success','User Added Successfully');
        return redirect()->back();
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    public function delete($id)
    {
        User::findOrFail($id)->delete();
        session()->flash('success','User Deleteed.');
        return redirect()->route('admin.user.index');
    }
}
