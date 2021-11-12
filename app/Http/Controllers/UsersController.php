<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\models\Users;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        try{

            $request->validate([
                'login' => ['required','email'],
                'password' => ['required','string']
            ],[
                'email.required'  => 'O Email é obrigatorio',
                'password.required'  => 'A senha é obrigatoria'
            ]);

            $user = Users::query()->where('email', $request->login)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    "email" => __("auth.failed")
                ]);
            }
            Auth::login($user);

            return response()->view('pages.dashboard');

        }catch (ValidationException $exception){
            return redirect()->back()->with('danger','Email ou senha inválidos');
        }
    }
}
