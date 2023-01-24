@extends('layouts.master')

@section('content')
    <main class="w-screen bg-[#2A3342] px-24 flex justify-center">
        <section>
            <h1 style="font-size: 3rem;" class="font-black text-white my-12">Sorry! We are still working on it!</h1>
            <img src="{{ asset('images') }}/wip.png" alt="Work In Progress" class="w-2/3 mx-auto">
            <a href="{{ url()->previous() }}" style="margin-top: 4rem; margin-bottom: 4rem"
                class="mx-auto w-max flex justify-center text-2xl bg-[#F77F00] hover:bg-[#e07400] text-white font-black px-8 rounded-lg text-md py-3">Go
                Back</a>
        </section>
    </main>
@endsection
