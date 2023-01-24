<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        try {
            $user = User::create([
                'name' => trim($request->name),
                'email' => strtolower($request->email),
                'password' => bcrypt($request->password)
            ]);
            auth()->login($user);
            session()->flash('status', 'Success');
            session()->flash('message', 'your account is created and login');
            return redirect()->route('home');
        } catch (Exception $error) {
            session()->flash('status', 'Error');
            session()->flash('message', 'your registration is getting problem');
            return redirect()->back();
        }
    }
}
