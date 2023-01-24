@extends('layouts.cart')
@section('content')

    <div class='w-full bg-[#2A3342] text-white px-2 lg:px-24'>
        <div class='w-ful p-5'>
            @if (count($order) <= 0)
                <h1 class='text-2xl font-bold'>Your Pupzeria Order History is empty.</h1>
                <p>Order some delicious pizza <a href="/" class="text-[#F77F00] hover:text-[#e07400]">here</a></p>
            @else
                <h1 class='text-4xl mb-4 font-bold border-b-[1px] border-gray-700'>Order</h1>
                @foreach ($order as $pizza)
                    <x-cart-item :pizza="$pizza" />
                @endforeach
            @endif
        </div>
    </div>

@endsection
