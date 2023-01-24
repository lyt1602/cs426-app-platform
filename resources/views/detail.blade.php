@extends('layouts.detail')
@section('content')

    <div class="bg-[#2A3342] text-gray-200 w-full">
        <ul class="mx-8 lg:mx-24 my-4 text-gray-200 flex space-x-4 text-[24px]">
            <li class="hover:underline">
                <a href="/">Home</a>
            </li>
            <li>
                >
            </li>
            <li class="hover:underline">
                {{ $pizza['title'] }}
            </li>
        </ul>


        <form class="mx-8 lg:mx-20 my-12 grid grid-cols-1 lg:grid-cols-3" method="post" name="order"
            action="{{ route('cart.add') }}" enctype="multipart/form-data">
            @csrf
            <section class="col-span-1 w-full lg:w-5/6">
                <div class="w-full h-max">
                    <div class="text-[28px] leading-9 font-normal">
                        <h1 class="text-4xl mb-4 font-bold">{{ $pizza['title'] }}</h1>
                    </div>
                    <div class="sm:flex sm:justify-center">
                    <img class="w-full sm:w-2/3 lg:w-full rounded"
                        src="{{ $pizza['url'] ?? asset('images') . '/meal-placeholder.jpg' }}"
                        alt="{{ $pizza['title'] ?? 'pizza' }}" id="currentImage" />
                    </div>
                    <div>
                        <h2 class="text-2xl my-6 font-bold">
                            <input type="hidden" name="pizza_price" id="pizza_price" value="" />
                            <output name="total">Your order total is: $0 </output>
                        </h2>
                        <input type="hidden" name="pizza_id" value="{{ $pizza['id'] }}"
                            data-price="{{ $pizza['price'] }}">
                        <div class="flex justify-center sm:justify-end">
                            <input type="submit"
                                class="text-2xl w-max bg-[#F77F00] hover:bg-[#e07400] text-white font-black px-8 rounded-lg text-md py-3"
                                value="Add to Cart" />
                        </div>
                    </div>
            </section>
            <section class="lg:col-span-2 lg:w-full text-sm font-medium">
                <h2 class="mt-4 lg:my-0 text-2xl mb-6 font-bold">Quantity: <span class="text-red-500">*
                        required</span>
                </h2>
                <input type="number" id="quantity" name="quantity" min="1" max="15"
                    class="text-black w-full lg:w-1/3 rounded" value="1" required>
                <h2 class="text-2xl my-6 font-bold">Sizes <span class="text-red-500">* required</span>
                </h2>
                <section class="flex w-full justify-center">
                    <div class="grid w-full grid-cols-3 rounded-xl bg-gray-200 p-2">
                        @foreach ($sizes as $size)
                            <div>
                                <img src="{{ asset('images') }}/meal-placeholder.jpg" alt="{{ $size['name'] }}"
                                    class="w-max mx-auto" />
                                @if ($size->name == 'S')
                                    <input type="radio" name="pizza_size" id="{{ $size['id'] }}"
                                        value="{{ $size['id'] }}" data-price="{{ $size['price'] }}" class="peer hidden"
                                        checked required />
                                @else
                                    <input type="radio" name="pizza_size" id="{{ $size['id'] }}"
                                        value="{{ $size['id'] }}" data-price="{{ $size['price'] }}"
                                        class="peer hidden" />
                                @endif
                                <label for="{{ $size['id'] }}"
                                    class="block cursor-pointer select-none rounded-b-xl p-2 text-center text-black peer-checked:bg-[#F77F00] peer-checked:font-bold peer-checked:text-white">{{ $size['name'] }}</label>
                            </div>
                        @endforeach
                    </div>
                </section>
                @if (count($toppings) > 0)
                    <h2 class="text-2xl my-6 font-bold">Toppings</h2>
                    <section class="flex w-full justify-center">
                        <div class="flex flex-col w-full rounded-xl bg-gray-200 p-2">
                            @foreach ($toppings as $topping)
                                <x-topping-item :topping="$topping" />
                            @endforeach
                        </div>

                    </section>
                @endif
            </section>

        </form>
    </div>
@endsection
