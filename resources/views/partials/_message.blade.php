@if(session()->has('message'))
<div x-data="{show: true}" x-init="setTimeout(() => show = false, 2000)" x-show="show"
    class="fixed top-2 rounded-md left-1/2 transform -translate-x-1/2 text-white font-semibold px-5 py-3 max-w-max
    {{ session('status') === 'Success' ? 'bg-green-500' : 'bg-red-500'}}">
    <p>
        {{ session('status') }}: {{session('message')}}
    </p>
</div>
@endif
