<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\HomeController;


use App\Models\User;

class LoginController extends Controller

{
    //

    public function index() {
        return view( 'auth.login' );
    }

    public function login_proses(Request $request) {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($data)){
            return redirect()->route('admin.index');
        } else{
            return redirect()->route('login')->with('failed','email dan password salah');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route( 'login' )->with('success',  'Anda Berhasil Keluar');
    }

    public function register(){
        return view('auth.register');
    }

    public function register_proses(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password'=> 'required|min:3'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
    
        User::create($data);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if(Auth::attempt($login)){
            return redirect()->route('admin.index');
        } else{
            return redirect()->route('login')->with('failed','email dan password salah');
        }
    }
}
