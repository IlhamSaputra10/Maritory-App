<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;


class LoginController extends Controller
{
    public function index(){
        return view('login', [
            'title' => 'Login',
        ]);        
    }

    // Login
    public function authenticate(Request $request){
        $loginWith = filter_var($request->hpEmail, FILTER_VALIDATE_EMAIL) ? 'email' : 'noHP';

        $validated = $request->validate([
            'hpEmail' => 'required|' . ($loginWith == 'email' ? 'email:dns' : 'numeric'),
            'kataSandi' => 'required',
        ],
        [
            'required' => 'Kolom tidak boleh kosong!',
            'hpEmail.email' => 'Kolom ini harus berisi Email yang valid atau Nomor HP',
            'hpEmail.numeric' => 'Kolom ini harus berisi Email yang valid atau Nomor HP',
        ]);

        $credentials = [
            ($loginWith == 'email' ? 'email' : 'noHP') => $validated['hpEmail'],
            'password' => $validated['kataSandi'],
        ];

        $remember = $request->remember;

        if(Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login failed!');

    }

    // Logout
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // Google Login
    public function redirectToGoogle() 
    {
        return Socialite::driver('google')->redirect();
    }

    // Google Callback
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $this->_registerOrLoginUser($user);
        return redirect()->intended('/');
    }

    // Facebook Login
    public function redirectToFacebook() 
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Facebook Callback
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $this->_registerOrLoginUser($user);
        return redirect()->intended('/');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if(!$user) {
            $user = new User();
            $user->nama = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->avatar = $data->avatar;
            $user->save();
        }

        Auth::login($user);

    }
}
