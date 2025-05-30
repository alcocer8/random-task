<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => "email|required",
            "password" => "required"
        ]);

        // Realizando autenticacion
        if (Auth::attempt($request->only(["email", "password"]))) {
            // Generamos una nueva sesion   
            $request->session()->regenerate();

            // Redireccionamos
            return redirect()->intended('dashboard');
        }

        return back()->with('message', "Revisa tus credenciales");
    }
}
