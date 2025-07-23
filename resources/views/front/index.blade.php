@extends('front.master')
@section('content')
    <main>
        {{-- Our Mission Section --}}
        <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
            <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                <div class="row d-flex align-items-center justify-content-center py-vh-5">
                    <div class="col-12 col-xl-10">
                        <span class="h5 text-secondary fw-lighter">{{ __('keywords.Our Mission') }}</span>
                        <h5 class="display-huge mt-3 mb-3 lh-1">
                            {{ __('keywords.Our mission is to provide safe, reliable, and comfortable transportation solutions') }}
                        </h5>
                    </div>
                </div>
            </div>

        </div>
        {{-- Cars Images Section --}}
        <div class="w-100 position-relative bg-black text-white bg-cover d-flex align-items-center">
            <div class="container-fluid px-vw-5">
                <div class="position-absolute w-100 h-50 bg-dark bottom-0 start-0"></div>
                <div class="row d-flex align-items-center position-relative justify-content-center px-0 g-5">
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('assets-front') }}/img/v-class.png" width="1116" height="1578"
                            alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('assets-front') }}/img/e-class.png" width="1116" height="1578"
                            alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                            data-aos-duration="2000">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('assets-front') }}/img/s-class.png" width="1116" height="1578"
                            alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                            data-aos-duration="3000">
                    </div>
                </div>
            </div>
        </div>
        {{-- Our Strategy Section --}}
        <div class="bg-dark" id="whatWeDo">
            <div class="container px-vw-5 py-vh-5">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-7 text-lg-end" data-aos="fade-right" >
                        <span class="h5 text-secondary fw-lighter">{{ __('keywords.What we do') }}</span>
                        <h2 class="display-4">
                            {{ __('keywords.Car Transport is a professional service that provides private cars with experienced drivers to transport individuals safely and comfortably from their pickup location to their destination. Whether it’s for business, personal travel, or special occasions, we ensure a smooth and reliable journey every time.') }}
                        </h2>
                    </div>
                    <div class="col-12 col-lg-5" data-aos="fade-left">
                        <h3 class="pt-5">{{ __('keywords.Our Strategy') }}</h3>
                        <p class="text-secondary">
                            <b>{{ __('keywords.Customer First Approach:') }}</b>
                            {{ __('keywords.We prioritize customer satisfaction by offering safe, comfortable, and punctual rides tailored to individual needs.') }}
                            <br>
                            <b>{{ __('keywords.Professional Drivers:') }}</b>
                            {{ __('keywords.Our team of licensed, trained drivers ensures a high standard of professionalism, safety, and friendliness on every trip.') }}
                            <br>
                            <b>{{ __('keywords.Fleet Quality and Maintenance:') }}</b>
                            {{ __('keywords.We maintain a modern, clean, and fully insured fleet of vehicles to ensure comfort and reliability.') }}
                            <br>
                            <b>{{ __('keywords.Efficiency and Punctuality:') }}</b>
                            {{ __('keywords.We focus on timely pickups and drop-offs, making sure our customers reach their destinations without stress.') }}
                            <br>
                            <b>{{ __('keywords.Technology Driven:') }}</b>
                            {{ __('keywords.We use modern booking and tracking technologies to make reservations easy and journeys transparent.') }}
                            <br>
                            <b>{{ __('keywords.Flexible Services:') }}</b>
                            {{ __('keywords.Whether it\'s airport transfers, business meetings, daily commuting, or special events — we adapt our services to fit your needs.') }}
                            <br>
                            <b>{{ __('keywords.Continuous Improvement:') }}</b>
                            {{ __('keywords.We listen to customer feedback and continuously improve our services to meet and exceed expectations.') }}
                            <br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Trips Section --}}
        <div class="bg-black py-5 my-5" id="pricing">
            <div class="container">
                <h2 class="text-center text-white mb-5">What we charge</h2>

                <div class="trip-cards-scroll">
                    @foreach ($trips as $trip)
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
                                    <a href="{{ route('front.cart.addToCart', $trip) }}"
                                        class="btn btn-outline-light w-100">
                                        <i class="bi bi-cart3 me-2"></i>Add to Cart
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- Review Form Section --}}
        @if (Auth::user())
            <div class="container-fluid px-vw-5 position-relative" data-aos="fade" id="reviews">
                <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>

                <div class="position-relative py-vh-5 bg-cover bg-center rounded-5"
                    style="background-image: url({{ asset('assets-front') }}/img/webp/abstract12.webp)">
                    <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 col-xl-6">
                                <div class="rounded-5 bg-dark p-5 shadow" data-aos="zoom-in-up">
                                    <h2 class="text-white text-center mb-4">Leave a Review</h2>

                                    <form action="{{ route('front.review.storeReview') }}" method="POST"
                                        class="text-white">
                                        @csrf
                                        <input type="hidden" class="form-control bg-black text-white border-secondary"
                                            id="email" name="email" value="{{ Auth::user()->email }}" required>

                                        <!-- Star Rating -->
                                        <div class="mb-4 text-center">
                                            <div class="rating" id="starRating">
                                                <input type="hidden" id="ratingValue" name="rating" value="0">
                                                @for ($i = 5; $i >= 1; $i--)
                                                    <i class="bi bi-star star-icon fs-2"
                                                        data-value="{{ $i }}"></i>
                                                @endfor
                                            </div>
                                            <div id="ratingText" class="small text-light mt-2">Select rating</div>
                                        </div>

                                        <div class="mb-3">
                                            <label for="review" class="form-label">Your Review</label>
                                            <textarea class="form-control bg-black text-white border-secondary" id="review" name="review" rows="4"
                                                required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-outline-light w-100">Submit Review</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @else
            <div class="container-fluid px-vw-5 position-relative" data-aos="fade">
                <div class="position-absolute w-100 h-50 bg-black top-0 start-0"></div>

                <div class="position-relative py-vh-5 bg-cover bg-center rounded-5"
                    style="background-image: url({{ asset('assets-front') }}/img/webp/abstract12.webp)">
                    <div class="container bg-black px-vw-5 py-vh-3 rounded-5 shadow">

                        <div class="row justify-content-center">
                            <div class="col-12 col-lg-8 col-xl-6">
                                <div class="rounded-5 bg-dark p-5 shadow" data-aos="zoom-in-up">
                                    <div class="row">
                                        <h2 class="text-white text-center mb-4">Sign in to leave a Review</h2>
                                    </div>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('login') }}" class="btn btn-light me-3">Login</a>
                                        <a href="{{ route('register') }}" class="btn btn-light ms-3">Register</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endif


        {{-- Reviews Section --}}
        <div class="bg-dark py-vh-5">
            <div class="container px-vw-5">
                <div class="row d-flex gx-5 align-items-center">
                    <div class="col-12 col-lg-6">
                        @foreach ($reviews as $review)
                            <div class="rounded-5 bg-black p-5 shadow mb-3" data-aos="zoom-in-right">
                                @for ($i = 0; $i < $review->rating; $i++)
                                    <i class="bi bi-star-fill"></i>
                                @endfor
                                <p class="text-secondary lead">"{{ $review->review }}"</p>
                                <div
                                    class="d-flex justify-content-start align-items-center border-top border-secondary pt-3">
                                    @php
                                        $user = App\Models\User::where('email', $review->email)->first();
                                        $avatar = optional($user)->avatar;
                                    @endphp
                                    @if ($avatar)
                                        @if (Str::startsWith($avatar, ['http://', 'https://']))
                                            <img src="{{ $avatar }}" width="96" height="96"
                                                class="rounded-circle me-3" alt="Reviewer avatar" data-aos="fade"
                                                loading="lazy">
                                        @else
                                            <img src="{{ asset('storage/' . $avatar) }}" width="96" height="96"
                                                class="rounded-circle me-3" alt="Reviewer avatar" data-aos="fade"
                                                loading="lazy">
                                        @endif
                                    @elseif ($user)
                                        {{-- Laravolt fallback if user exists but no avatar --}}
                                        <img src="{{ Avatar::create($user->name)->toBase64() }}" width="96"
                                            height="96" class="rounded-circle me-3" alt="Reviewer avatar"
                                            data-aos="fade" loading="lazy">
                                    @else
                                        {{-- Guest reviewer fallback --}}
                                        @if ($user && $user->deleted_at === null)
                                            <img src="{{ Avatar::create($user->name)->toBase64() }}" width="96"
                                                height="96" class="rounded-circle me-3" alt="Guest avatar"
                                                data-aos="fade" loading="lazy">
                                        @else
                                            <img src="{{ Avatar::create('Deleted user')->toBase64() }}" width="96"
                                                height="96" class="rounded-circle me-3" alt="Guest avatar"
                                                data-aos="fade" loading="lazy">
                                        @endif
                                    @endif
                                    @if ($user && $user->deleted_at === null)
                                        <div>
                                            <span class="h6 fw-5">{{ $user->name }}</span><br>
                                        </div>
                                    @else
                                        <span class="text-secondary">Deleted user</span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="p-5 pt-0" data-aos="fade">
                            <span class="h5 text-secondary fw-lighter">What others have to say</span>
                            <h2 class="display-4">See what our customers say about their experience with
                                <strong>Capodanno</strong>.
                            </h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection
