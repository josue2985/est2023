<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(){
        $data = request()->validate([
            'email'=>'required|email|string',
            'password'=>'required|string'
        ],[
            'email.required'=>'El correo es obligatorio',
            'password.required'=>'La contraseña es obligatoria'
        ]);

        $user = User::where('email', request()->email)->first();
        if($user != NULL){
            if($user->password == md5(request()->password)){
                Auth::attempt(['email' => request()->email, 'password' => request()->password]);
                $user->update(['password' => Hash::make(request()->password)]);
                request()->session()->regenerate();
                return Redirect('/dashboard');
            }

            if(Auth::attempt(['email' => request()->email, 'password' => request()->password])){
                request()->session()->regenerate();
                return Redirect('dashboard');
            }else{
                return Redirect('/iniciarSesion')->with([
                    'errorC'=>'La contraseña es incorrecta',
                    'cE'=>request()->email
                ]);
            }
        }
        return Redirect('/iniciarSesion')->with([
            'error'=>'El correo electrónico es incorrecto',
            'cE'=>request()->email
        ]);
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return Redirect('iniciarSesion');
    }
}
