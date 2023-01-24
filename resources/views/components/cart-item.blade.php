<div class="h-52 w-full flex items-center p-3 justify-between border-b-[1px] border-gray-700">
    <div class='flex h-full items-center'>
        {{-- <input type="checkbox" class='h-4 w-4 rounded border-gray-300 text-[#F77F00] focus:ring-[#a35808]'
            value="{{ $pizza->id }}" data-price="{{ $pizza->price }}"> --}}
        <img src="{{ $pizza->url ?? asset('images') . '/meal-placeholder.jpg' }}" alt="book-title"
            class='h-full lg:px-5'>
        <div class="mx-4 lg:mx-0 self-start flex flex-col justify-between h-full">
            <span>
                <p class="lg:text-2xl font-bold">{{ $pizza->pizza_name }}</p>
                <p class="text-lg font-base">
                    @if ($pizza->pizza_size)
                        Size: {{ $pizza->pizza_size }}
                    @endif
                </p>
                <p class="text-lg font-base">
                    @if ($pizza->pizza_topping)
                        Topping: {{ $pizza->pizza_topping }}
                    @endif
                </p>
            </span>
            <div class="flex-row sm:flex items-center">
                <label for="quantity" class="mr-0 sm:mr-2 text-sm">Qty: {{ $pizza->quanlity }}</label>
                <hr class="rotate-90 w-8 hidden sm:block" />
                @if (!$pizza->date)
                    <form action="/cart/delete" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="pizzaId" value="{{ $pizza->pizza_id }}">
                        <input type="hidden" name="cartId" value="{{ $pizza->cart_id }}">
                        <button type="submit" class="hover:underline text-sm text-[#F77F00]">Delete</button>
                    </form>
                @else
                    <div class="flex-grow">
                        {{ $pizza->date }}
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="self-start">
        <p class="text-lg font-bold">${{ $pizza->price }}</p>
    </div>
</div>
