@extends('layouts.app')
@section('app')
    <div class="flex flex-col h-screen">
        <div class="flex-grow flex">
            @yield('content')
        </div>
        @include('partials._copyright')
        @include('partials._message')
    </div>
@endsection
