@extends('layouts.app')

@section('app')
    <div class="flex flex-col h-screen">
        @include('partials._nav')
        <div class="flex-grow flex">
            @include('partials._sidebar')
            @yield('content')
        </div>
        @include('partials._footer')
        @include('partials._message')
    </div>
@endsection

@section('script')
    <script>
        function sidebar() {
            const breakpoint = 0
            return {
                open: {
                    above: false,
                    below: true,
                },
                isAboveBreakpoint: window.innerWidth > breakpoint,

                handleResize() {
                    this.isAboveBreakpoint = window.innerWidth > breakpoint
                },

                isOpen() {
                    console.log(this.isAboveBreakpoint)
                    if (this.isAboveBreakpoint) {
                        return this.open.above
                    }
                    return this.open.below
                },
                handleOpen() {
                    if (this.isAboveBreakpoint) {
                        this.open.above = true
                    }
                    this.open.below = true
                },
                handleClose() {
                    if (this.isAboveBreakpoint) {
                        this.open.above = false
                    }
                    this.open.below = false
                },
                handleAway() {
                    if (!this.isAboveBreakpoint) {
                        this.open.below = false
                    }
                },
            }
        }
    </script>
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection
