<div class="h-max w-full flex items-center p-3 justify-between text-black border-b-[1px] border-gray-700">
    <div class='flex h-full items-center'>
        <input type="radio" name="pizza_topping" class='h-4 w-4 border-gray-300 text-[#F77F00] focus:ring-[#a35808]'
            value="{{ $topping->id }}" data-price="{{ $topping->price }}">
        <img src="{{ $topping->urls ?? asset('images') . '/meal-placeholder.jpg' }}"
            alt="{{ $topping->name }}" class='w-24 px-5'>
        <div class="self-start flex flex-col justify-between h-full">
            <span class="text-lg">{{ $topping->name }}</span>
        </div>
    </div>
    <div class="self-start">
        <p class="text-lg font-bold">${{ number_format($topping->price, 2) }}</p>
    </div>
</div>
