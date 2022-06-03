<?php

namespace App\Http\Controllers;

use App\Enums\UserLevel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function registerApi(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users|alpha_dash',
            'email' => 'required|email',
            'password' => 'required|min:6|string',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('New User')->plainTextToken;
        
        return response([
            'message' => 'Registered Succesfully',
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function logInApi(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'device_name' => 'required',
        ]);
     
        $user = User::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            $response = ['message' => 'Bad credentials.',];
            return response($response, 401);
        }
        
        $token = $user->createToken($request->device_name)->plainTextToken;
        $data = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($data, 200);
    }

    public function logOutApi(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response(
            ['message' => 'Logged Out.'], 
            200
        );
    }

    public function getProfile(Request $request)
    {
        return response()->json($request->user(), 200);
    }

    public function index()
    {
        return view('login', [
            'title' => 'Login',
        ]);
    }

    public function registerIndex()
    {
        return view('register', [
            'title' => 'Register',
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if ($request->user()->level == UserLevel::User){
                return redirect()->route('user.dashboard');
            }

            return redirect()->route('dashboard');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'username' => 'required|unique:users',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $data = [
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'level' => UserLevel::User,
            'password' => Hash::make($request->password),
        ];

        if (User::create($data)) {
            return redirect()->route('login');
        } else {
            return back()->withErrors([
                'msg' => 'Gagal Register'
            ])->withInput($request->except(['password', 'password_confirmation']));
        }
    }
}
