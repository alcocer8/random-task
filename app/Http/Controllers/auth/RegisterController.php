<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    //
    public function index()
    {

        return view("auth.register");
    }

    public function store(Request $request)
    {
        $request->validate([
            "email" => ['required', 'email', 'unique:users,email'],
            "name" => ["required"],
            "password" => ["required", "confirmed"]
        ]);

        // Creamos el usuario
        $user = new User($request->only(["email", "name", "password"]));
        
        // Lo almacenamos
        $user->save();

        // lo autenticamos
        Auth::login($user);

        // Lo redirigimos al dashboard
        return redirect()->route("login");
    }
}
