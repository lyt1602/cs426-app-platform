@extends('layouts.cart')
@section('content')

    @php
        $total = 0;
        $amount = 0;
        $id = 0;
    @endphp
    <div class='w-full grid grid-cols-1 lg:grid-cols-4 bg-[#2A3342] text-white px-2 lg:px-24'>
        <section class='col-span-3 space-x-12'>
            <div class='w-ful p-5'>
                @if (count($cart) <= 0)
                    <h1 class='text-2xl font-bold'>Your Pupzeria Cart is empty.</h1>
                    <p>Order some delicious pizza <a href="/" class="text-[#F77F00] hover:text-[#e07400]">here</a></p>
                @else
                    <h1 class='text-4xl mb-4 font-bold border-b-[1px] border-gray-700'>Shopping Cart</h1>
                    @foreach ($cart as $pizza)
                        <x-cart-item :pizza="$pizza"/>
                        @php
                            $total += $pizza->price;
                            $amount++;
                            $id = $pizza->cart_id;
                        @endphp
                    @endforeach
                @endif
            </div>
        </section>
        <section>
            <form class='w-full bg-[#2A3342] h-full flex-col flex' action="/cart/update" method="POST">
                <div class="flex-grow p-5">
                    <h1 class='text-4xl mb-4 font-bold border-b-[1px] border-gray-700'>Checkout</h1>
                    @if ($amount > 5)
                        <p class="text-lg mb-1 text-white px-8 lg:px-0" name="total">Subtotal ({{ $amount }}
                            item{{ $amount > 1 ? 's' : '' }})</p>
                        <p class="text-lg mb-1 text-white" name="total">Your order total is: ${{ $total }}</p>
                    @endif
                </div>
                <div class="px-6 lg:px-0">
                    @csrf
                    @method('PATCH')
                    <input type="hidden" name="cart_id" value="{{ $id }}">
                    <p class="text-lg mb-1 text-white" name="total">Subtotal ({{ $amount }}
                        item{{ $amount > 1 ? 's' : '' }})</p>
                    <p class="text-lg mb-1 text-white" name="total">Your order total is: ${{ $total }}</p>
                    <div class="flex justify-end my-4">

                        <input type="submit" value="Checkout"
                            class="text-lg lg:text-2xl my-2 w-max lg:w-2/3 bg-[#F77F00] hover:bg-[#e07400] text-white font-bold px-2 lg:px-8 rounded-lg text-md py-3 cursor-pointer" />
                    </div>
                </div>
            </form>
        </section>
    </div>

@endsection
