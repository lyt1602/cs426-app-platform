{{-- show the login page --}}
@extends('layouts.login')
@section('content')

    <section class='w-full px-5 py-4 bg-[#2A3342]'>
        <a href="/">
            <img src="{{ asset('/images/logo-short.png') }}" alt="logo" class='w-26 mx-auto mb-5 h-24'>
        </a>
        @unless(session('email'))
            <form class='mx-auto flex w-full sm:w-1/2 lg:w-1/3 flex-col gap-4 rounded border-[1px] border-gray-700 py-6 px-5 text-gray-200'
                action='/loginEmail' method="POST">
                @csrf
                <h1 class='text-3xl'>Log In</h1>
                <div>
                    <label for="email" class='text-xs font-bold'>Email or mobile phone number</label>
                    <input type="email" name="email" id="email"
                        class='w-full rounded h-8 py-1 px-2 placeholder:appearance-none border border-gray-500 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm transition-colors'
                        value="{{ old('email') }}">
                    @error('email')
                        <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class='w-full p-2 rounded bg-[#F77F00]  hover:bg-[#e07400]'>Continue</button>

                <div>
                    <a href="#" class='text-xs text-[#F77F00]'>Forgot your password?</a>
                </div>
            </form>
        @else
            <form class='mx-auto flex w-full sm:w-1/2 lg:w-1/3 flex-col gap-4 rounded border-[1px] border-gray-700 py-6 px-5 text-gray-200'
                action='/loginPassword' method="POST">
                @csrf
                <h1 class='text-3xl'>Login In</h1>
                <p class='text-sm'>{{ session('email') }}
                    <a href="/login" class='text-[#F77F00]'>Change</a>
                </p>
                <div>
                    <input type="hidden" name="email" value="{{ session('email') }}">
                    <div class='flex justify-between mb-1'>
                        <label for="password" class='text-xs font-bold'>Password</label>
                        <a href="/login" class='text-xs text-[#F77F00]'>Forgot your password?</a>
                    </div>
                    <input type="password" name="password" id="password"
                        class='w-full rounded h-8 py-1 px-2 placeholder:appearance-none border border-gray-500 text-gray-900 placeholder-gray-500 focus:z-10 focus:border-primary focus:outline-none focus:ring-primary sm:text-sm transition-colors'>
                    @error('password')
                        <p class='text-red-500 text-xs mt-1'>{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class='w-full p-2 rounded bg-[#F77F00]  hover:bg-[#e07400]'>Continue</button>

                <div>
                    <input id="remember_me" name="remember_me" type="checkbox"
                        class="h-4 w-4 rounded border-gray-300 text-link focus:ring-link">
                    <label for="remember_me" class='text-xs'>Keep me signed in.</label>
                </div>
            </form>
        @endunless

        @include('partials._newToPupzeria')
    </section>
@endsection
