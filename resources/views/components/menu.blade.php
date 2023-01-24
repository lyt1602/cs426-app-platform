<section class="w-screen mt-4 lg:mt-16 mb-8">
    <div class="mx-4 sm:mx-8 lg:mx-24">
        <h1 class="text-3xl lg:text-5xl font-normal leading-normal mt-0 mb-8 text-gray-200 border-b-[1px] border-b-gray-700">
            {!! $sectionName !!}</h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-3 xl:grid-cols-5 gap-4 overflow-x-hidden">
            @foreach ($pizzas as $pizza)
                <x-menu-item :id="$pizza['id']" :menu-name="$pizza['title']" :menu-img="$pizza['url']" :menu-price="$pizza['price']" />
            @endforeach
        </div>
    </div>
</section>
