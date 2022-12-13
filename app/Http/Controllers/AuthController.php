<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm(Request $req)
    {
        return view('admin.pages.auth.login');
    }
    
    public function login(Request $req)
    {
        if(!auth()->attempt( ["email" => $req->email, "password" => $req->password, "status" => User::STATUS_ACTIVE] )){
            return redirect()->back()->with('message', 'Data email atau password salah. <br> Silakan cek input kembali atau hubungi Superadmin');
        }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function changePassword()
    {
        return view('admin.pages.auth.change_password');
    }

    public function submitChangePassword(Request $request)
    {
        $request->validate([
            'current_password'      => ['required', new MatchOldPassword],
            'new_password'          => ['required'],
            'new_confirm_password'  => ['same:new_password'],
        ]);

        try {
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            auth()->logout();
            return redirect()->route('login')->with('success', 'Silahkan masukkan password terbaru!');
        } catch(\Exception $e) {
            logger()->error("error update password: ".$e->getMessage());
            return redirect()->back()->with('error_msg', 'Gagal mengubah password!');
        }
    }
}
