@extends('layouts.master')

@section('content')
    <main class="w-screen bg-[#2A3342]">
        <x-menu section-name="Pizza" :pizzas="$pizzas"></x-menu>
    </main>
@endsection
