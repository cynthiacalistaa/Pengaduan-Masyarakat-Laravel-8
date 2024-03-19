<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $admin = $request->only('email', 'password');
        $admin['role'] = 'admin';

        $user = $request->only('email', 'password');
        $user['role'] = 'user';

        if(Auth::attempt($admin)){
            return redirect()->route('dashboard');
        } 
        elseif(Auth::attempt($user)){
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['error'=> 'login gagal!']);
    }

    public function logout(Request $request)
    {
        // $this->guard()->logout();
    
        // $request->session()->invalidate();
        auth::logout();
        return redirect()->route ('login');
    }
    
    public function register()
    {
        return view('Auth.register');
    }

    public function registerLogic(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:250|string|unique:users',
            'email' => 'required|email:dns|max:150|unique:users',
            'password' => 'required|min:6|max:250'
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect(route('login'))->with('success', 'Registration successfull!! Please login');
        // dd("Berhasil !!");
    }
    
    public function default()
    {
        return redirect(route('login'));
    }
}
