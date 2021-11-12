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
            ]);

            $user = Users::query()->where('email', $request->login)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw ValidationException::withMessages([
                    "email" => __("auth.failed")
                ]);
            }
            Auth::login($user);

            return response()->json(array("status"=>true));

        }catch (ValidationException $exception){
            return response()->json(array_merge([
                'status' => 'error',
                'message' => $exception->getMessage()
            ], ['errors'=>$exception->errors()]), $exception->status);
        }
    }
}
