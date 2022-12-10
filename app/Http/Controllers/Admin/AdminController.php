<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $data = User::where('role', User::ROLE_ADMIN)->paginate(10);
        
        return view('admin.pages.master.admin.index')->with('data', $data);
    }

    public function create()
    {
        return view('admin.pages.master.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name"          => "required|min:5",
            "email"         => "required|email",
            "password_text" => "required|min:5",
        ]);

        $request->merge([
            "password" => Hash::make($request->password_text),
            "role"     => User::ROLE_ADMIN,
        ]);

        User::create($request->except('_token', 'password_text'));
        
        return redirect()->route('admin.index');
    }

    public function edit(Request $request, $id)
    {
        $data = User::where('id', $id)->first();

        return view('admin.pages.master.admin.edit')->with('data', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "name"          => "required|min:5",
            "email"         => "required|email",
        ]);

       User::where('id', $id)->update($request->except('_token', '_method'));

        return redirect()->route('admin.index');
    }

    public function editPassword(Request $request, $id)
    {
        $data = User::where('id', $id)->firstOrFail();

        return view('admin.pages.master.admin.edit-password')->with('data', $data);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            "password"          => "required|min:5|confirmed",
        ]);

       User::where('id', $id)->update([
            "password" => Hash::make("password")
       ]);

        return redirect()->route('admin.index');
    }
}
