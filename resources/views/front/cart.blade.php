@extends('front.master')
@section('content')
    <div class="container px-vw-5 py-vh-5 ">
        @if ($cart && count($cart->trips) > 0)
            <div class="row d-flex align-items-center justify-content-center">
                @foreach ($cart->trips as $trip)
                    <div class="col-sm-3 mb-4 mt-2">
                        <div class="bg-dark rounded-5 py-vh-3 text-center mx-2 d-flex flex-column h-100"
                            data-aos="zoom-in-up">
                            <h2 class="display-bolder fs-1 mb-5">
                                <span class="border-bottom border-5">{{ $trip->price() }}</span>
                                <span class="fs-6 fw-light">/person</span>
                            </h2>

                            <p class="lead text-secondary">{{ $trip->name }}</p>

                            <!-- Cart button at the bottom -->
                            <div class="mt-auto">
                                <a href="{{ route('front.cart.removeFromCart', $trip) }}" class="btn btn-outline-danger">
                                    <i class="bi bi-cart-x-fill"></i> Remove from cart
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="float-end">
                @if ($cart && count($cart->trips) > 0)
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <p class="fs-3 fw-bold mb-0 me-3">Total: ({{ $cart->total() }})</p>
                        <a href="{{ route('front.checkout.checkout') }}" class="btn btn-outline-light mt-2 mt-md-0">
                            Checkout <i class="bi bi-arrow-right-short"></i>
                        </a>
                    </div>
                @endif
            </div>
        @else
            <div class="alert alert-secondary text-center fw-medium mt-2"><i class="bi bi-cart me-2 "></i>Your cart is empty
            </div>
        @endif
    </div>

@endsection
