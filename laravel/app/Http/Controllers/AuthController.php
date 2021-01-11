<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Redirect;
use Illuminate\Http\Request;
use App\User;
use DB;

class AuthController extends Controller
{
    public function login(){
        return view('index');
    }
    public function postlogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($request->only('email','password'))){
            $akun = DB::table('users')->where('email',$request->email)->first();
            if($akun->role == 'Admin'){
                Auth::guard('Admin')->LoginUsingId($akun->id);
                return redirect('/admin')->with('sukses-login','Anda berhasil login di halaman admin');
            }
            else if($akun->role == 'Guru'){
                Auth::guard('Guru')->LoginUsingId($akun->id);
                return redirect('/guru');
            }
            else if($akun->role == 'Siswa'){
                Auth::guard('Siswa')->LoginUsingId($akun->id);
                return redirect('/siswa');
            }
        }
        return redirect('/sign-in')->with('error','Username atau password tidak ditemukan');
    }
    public function logout(){
        if(Auth::guard('Admin')->check()){
            Auth::guard('Admin')->logout();
        }
        else if(Auth::guard('Guru')->check()){
            Auth::guard('Guru')->logout();
        }
        else if(Auth::guard('Siswa')->check()){
            Auth::guard('Siswa')->logout();
        }
        return redirect('/sign-in');
    }
}
