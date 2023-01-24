{{-- show the login page --}}
@extends('layouts.login')
@section('content')
    <section class='w-full px-5 py-4 bg-[#2A3342]'>
        <a href="/">
            <img src="{{ asset('/images/logo-short.png') }}" alt="logo" class='w-26 mx-auto mb-5 h-24'>
        </a>
        <form class='mx-auto flex w-full sm:w-1/2 lg:w-1/3 flex-col gap-4 rounded border-[1px] border-gray-700 py-6 px-5 text-gray-200'
            action='/register' method="POST">
            @csrf
            <h1 class='text-3xl font-bold'>Create account</h1>
            <div>
                <label for="name" class='text-xs font-bold'>Your name</label>
                <input type="text" name="name" id="name"
                    class='h-8 w-full rounded border border-gray-500 py-1 px-2 text-gray-900 placeholder-gray-500 transition-colors placeholder:appearance-none focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm'
                    placeholder="First and last name" value="{{ old('name') }}">
                @error('name')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="email" class='text-xs font-bold'>Mobile number or email</label>
                <input type="email" name="email" id="email"
                    class='h-8 w-full rounded border border-gray-500 py-1 px-2 text-gray-900 placeholder-gray-500 transition-colors placeholder:appearance-none focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm'
                    placeholder="name@mail.com" value="{{ old('email') }}">
                @error('email')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password" class='text-xs font-bold'>Password</label>
                <input type="password" name="password" id="passwsord"
                    class='h-8 w-full rounded border border-gray-500 py-1 px-2 text-gray-900 placeholder-gray-500 transition-colors placeholder:appearance-none focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm'
                    placeholder="At least 6 characters">
                <p class='mt-1 flex items-center text-xs'>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" width="44" height="44"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#F77F00" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="12" r="9" />
                        <line x1="12" y1="8" x2="12.01" y2="8" />
                        <polyline points="11 12 12 12 12 16 13 16" />
                    </svg>
                    Passwords must be at least 6 characters.
                </p>
                @error('password')
                    <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label for="password_confirmation" class='text-xs font-bold'>Re-enter password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class='h-8 w-full rounded border border-gray-500 py-1 px-2 text-gray-900 placeholder-gray-500 transition-colors placeholder:appearance-none focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm'>
            </div>
            <button type="submit" class='w-full p-2 rounded bg-[#F77F00]  hover:bg-[#e07400]'>Continue</button>

            <div>
                <span class="text-xs">Already have an account?</span>
                <a href="/login" class='text-[#F77F00] text-xs'>Sign in</a>
            </div>
        </form>
    </section>
@endsection
