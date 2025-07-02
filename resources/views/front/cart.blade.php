@extends('front.master')
@section('content')

    <div class="bg-black py-5 my-5">
        <div class="container">
            <div class="trip-cards-scroll justify-content-center">
                @foreach ($cart->trips as $trip)
                    <div class="trip-card p-4 d-flex flex-column">
                        <h3 class="text-center fs-3">
                            {{ $trip->price() }}
                            <small class="fs-6 fw-light d-block mt-1">/person</small>
                        </h3>

                        <p class="text-secondary text-center trimmed-text">{{ $trip->name }}</p>

                        <ul class="fs-6 text-secondary mb-4">
                            <li class="d-flex"><strong>Pickup:</strong> <span
                                    class="trimmed-text ms-2">{{ $trip->pickup }}</span></li>
                            <li><strong>Route:</strong> {{ $trip->routes }}</li>
                            <li><strong>Transport:</strong> {{ $trip->transport }}
                            </li>
                            <li><strong>Sites:</strong> {{ $trip->sites }} </li>
                            {{-- <span class="trimmed-text"></span> --}}
                        </ul>

                        <!-- Push button to the bottom -->
                        <div class="mt-auto text-center">
                            @if ($cart && $cart->trips->contains($trip))
                                <a href="{{ route('front.cart.removeFromCart', $trip) }}"
                                    class="btn btn-outline-danger w-100">
                                    <i class="bi bi-cart-x-fill me-2"></i>Remove
                                </a>
                            @else
                                <a href="{{ route('front.cart.addToCart', $trip) }}" class="btn btn-outline-light w-100">
                                    <i class="bi bi-cart3 me-2"></i>Add to Cart
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="me-5">
            @if ($cart && count($cart->trips) > 0)
                <div class="float-end">
                    @if ($cart && count($cart->trips) > 0)
                        <div class="d-flex justify-content-between align-items-center flex-wrap">
                            <p class="fs-3 fw-bold mb-0 me-3">Total: ({{ $cart->total() }})</p>
                            <a href="{{ route('front.checkout.checkoutLineItems') }}"
                                class="btn btn-outline-light mt-2 mt-md-0">
                                Checkout <i class="bi bi-arrow-right-short"></i>
                            </a>
                        </div>
                    @endif
                </div>
            @else
                <div class="alert alert-secondary text-center fw-medium mt-2"><i class="bi bi-cart me-2 "></i>Your cart is
                    empty
                </div>
            @endif
        </div>
    </div>





@endsection
