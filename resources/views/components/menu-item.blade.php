<div class="w-full lg:w-[20rem] h-max bg-slate-800 p-4 rounded">
    <img :alt="{{ $menuName ?? 'Name Unavailable' }}" src="{{ $menuImg }}" class="rounded w-full lg:max-w-md lg:max-h-md bg-cover" />
    <div class="py-2"></div>
    <a href="/detail/{{ $id }}" class="text-2xl font-black text-gray-300 hover:text-white">
        <p class="h-12 truncate">{{ $menuName }}</p>
    </a>
</div>
