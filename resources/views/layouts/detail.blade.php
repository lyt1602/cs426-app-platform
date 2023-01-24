@extends('layouts.app')
<div class="flex flex-col h-screen">
    @include('partials._nav')
    <div class="flex-grow flex">
        @include('partials._sidebar')
        @yield('content')
    </div>
    @include('partials._footer')
    @include('partials._message')
</div>

@section('script')
    <script>
        const myForm = document.forms['order'];

        myForm.reset();

        window.onload = () => {
            let base = document.querySelector('input[name="pizza_id"]').getAttribute('data-price')
            let quantity = document.querySelector('input[name="quantity"]').value
            let size = document.querySelector('input[name="pizza_size"]:checked').getAttribute('data-price')
            let total = base * size * quantity
            myForm.total.textContent = `Your order total is: $${total.toFixed(2)}`
            document.getElementById("pizza_price").value = total.toFixed(2);
        }
        
        myForm.oninput = _ => {
            let base = document.querySelector('input[name="pizza_id"]').getAttribute('data-price')
            let quantity = document.querySelector('input[name="quantity"]').value
            let size = document.querySelector('input[name="pizza_size"]:checked').getAttribute('data-price')

            let total = base * size
            // if (document.querySelectorAll('input[name="pizza_size"]:checked').length > 0) {
            //     let size = document.querySelector('input[name="pizza_size"]:checked').getAttribute('data-price')
            //     total *= size
            // }
            if (document.querySelectorAll('input[name="pizza_topping"]:checked').length > 0) {
                let topping = document.querySelector('input[name="pizza_topping"]:checked').getAttribute('data-price')
                total += parseInt(topping)
            }
            total *= quantity
            myForm.total.textContent = `Your order total is: $${total.toFixed(2)}`
            document.getElementById("pizza_price").value = total.toFixed(2);
        }

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
