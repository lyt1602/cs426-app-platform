<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auth.index');
    }

    /**
     * Authenticate user input with email
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticateEmail(Request $request)
    {
        // validate the email input
        $request->validate([
            'email' => 'required|email',
        ]);
        // find if the user is in the database or not
        if (!is_null(User::where('email', $request->email)->first())) {
            return redirect('/login')->with('email', $request->email);
        } else {
            // error alert message
            session()->flash('status', 'Error');
            session()->flash('message', 'invalid credentials');
            // redirect back to login with email
            return redirect()->back();
        }
    }

    /**
     * Authenticate user input with password
     *
     * @param  \App\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticatePassword(Request $request)
    {
        // need to use try catch
        // if not it will redirect back to the login with email
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:6'
            ]);
        } catch (Exception $error) {
            // error alert message
            session()->flash('status', 'Error');
            session()->flash('message', 'invalid credentials');
            // redirect back to login with email
            return redirect()->back();
        }
        // attempt to login into your account with email and password
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember_me)) {
            // regenerate your csrf token
            $request->session()->regenerate();
            // success alert message
            session()->flash('status', 'Success');
            session()->flash('message', 'login successfully');
            // redirect back to '/'
            return redirect()->route('home');
        } else {
            // error alert message
            session()->flash('status', 'Error');
            session()->flash('message', 'invalid credentials');
            // redirect back to login with email
            return redirect()->back();
        }
    }

    /**
     * Logout of the existing account
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        session()->flash('status', 'Success');
        session()->flash('message', 'you have successfully logout');

        return redirect('/');
    }
}
