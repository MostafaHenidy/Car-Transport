@extends('front.master')
@section('content')
    @if (role('web', 'user'))
        <div class="container px-vw-5 py-vh-5 ">
            @if ($cart && count($cart->trips) > 0)
                <div class="row d-flex align-items-center justify-content-center">
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
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
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
                <div class="row d-flex justify-content-center py-5 mt-5">
                    <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                        style="min-height: 200px;">
                        <strong class="fs-5 text-light">Your cart is currently empty. Start exploring and add trips to your
                            cart!</strong>
                    </div>
                </div>
            @endif
        </div>
    @else
        <div class="row d-flex justify-content-center py-5 mt-5">
            <div class="trip-card p-5 d-flex justify-content-center align-items-center text-center"
                style="min-height: 200px;">
                <strong class="fs-5 text-light">you have not the right privileges to see this page contents</strong>
            </div>
        </div>
    @endif


@endsection
