@extends('front.master')
@section('content')
    <main>
        <div class="w-100 overflow-hidden position-relative bg-black text-white" data-aos="fade">
            <div class="position-absolute w-100 h-100 bg-black opacity-75 top-0 start-0"></div>
            <div class="container py-vh-4 position-relative mt-5 px-vw-5 text-center">
                <div class="row d-flex align-items-center justify-content-center py-vh-5">
                    <div class="col-12 col-xl-10">
                        <span class="h5 text-secondary fw-lighter">Our Mission</span>
                        <h5 class="display-huge mt-3 mb-3 lh-1">Our mission is to provide safe, reliable, and comfortable
                            transportation solutions</h5>
                    </div>
                </div>
            </div>

        </div>

        <div class="w-100 position-relative bg-black text-white bg-cover d-flex align-items-center">
            <div class="container-fluid px-vw-5">
                <div class="position-absolute w-100 h-50 bg-dark bottom-0 start-0"></div>
                <div class="row d-flex align-items-center position-relative justify-content-center px-0 g-5">
                    <div class="col-12 col-lg-6">
                        <img src="{{ asset('assets-front') }}/img/webp/abstract18.webp" width="2280" height="1732"
                            alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('assets-front') }}/img/webp/abstract6.webp" width="1116" height="1578"
                            alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                            data-aos-duration="2000">
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <img src="{{ asset('assets-front') }}/img/webp/abstract9.webp" width="1116" height="848"
                            alt="abstract image" class="img-fluid position-relative rounded-5 shadow" data-aos="fade-up"
                            data-aos-duration="3000">
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark">
            <div class="container px-vw-5 py-vh-5">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-7 text-lg-end" data-aos="fade-right">
                        <span class="h5 text-secondary fw-lighter">What we do</span>
                        <h2 class="display-4">Car Transport is a professional service that provides private cars with
                            experienced drivers to transport individuals safely and comfortably from their pickup location
                            to their destination. Whether it’s for business, personal travel, or special occasions, we
                            ensure a smooth and reliable journey every time.</h2>
                    </div>
                    <div class="col-12 col-lg-5" data-aos="fade-left">
                        <h3 class="pt-5">Our Strategy</h3>
                        <p class="text-secondary">
                            <b>Customer First Approach:</b>
                            We prioritize customer satisfaction by offering safe, comfortable, and punctual rides tailored
                            to individual needs.
                            <br>
                            <b>Professional Drivers:</b>
                            Our team of licensed, trained drivers ensures a high standard of professionalism, safety, and
                            friendliness on every trip.
                            <br>
                            <b>Fleet Quality and Maintenance:</b>
                            We maintain a modern, clean, and fully insured fleet of vehicles to ensure comfort and
                            reliability.
                            <br>
                            <b>Efficiency and Punctuality:</b>
                            We focus on timely pickups and drop-offs, making sure our customers reach their destinations
                            without stress.
                            <br>
                            <b>Technology Driven:</b>
                            We use modern booking and tracking technologies to make reservations easy and journeys
                            transparent.
                            <br>
                            <b>Flexible Services:</b>
                            Whether it's airport transfers, business meetings, daily commuting, or special events — we adapt
                            our services to fit your needs.
                            <br>
                            <b>Continuous Improvement:</b>
                            We listen to customer feedback and continuously improve our services to meet and exceed
                            expectations..<br>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-black">
            <div class="container px-vw-5 py-vh-5">
                <div class="row d-flex align-items-center">
                    <div class="col-12 col-lg-5 text-center text-lg-end" data-aos="zoom-in-right">
                        <span class="h5 text-secondary fw-lighter">What we charge</span>
                        <h2 class="display-4">You get all our Services for very simple price</h2>
                    </div>
                    <div class="col-12 col-lg-7 bg-dark rounded-5 py-vh-3 text-center my-5" data-aos="zoom-in-up">
                        <h2 class="display-huge mb-5">
                            <span class="fs-4 me-2 fw-light">€</span><span class="border-bottom border-5">145</span><span
                                class="fs-6 fw-light">/day</span>
                        </h2>
                        <p class="lead text-secondary">Rent a comfortable and stylish sedan for a full day . Enjoy a smooth
                            and reliable ride with flexible pickup and drop-off options,
                            perfect for business meetings, city tours, or personal travel needs.</p>
                        <a href="#" class="btn btn-xl btn-light">Sign up
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

        </div>

        <div class="bg-dark py-vh-5">
            <div class="container px-vw-5">
                <div class="row d-flex gx-5 align-items-center">
                    <div class="col-12 col-lg-6">
                        <div class="rounded-5 bg-black p-5 shadow" data-aos="zoom-in-right">
                            <div class="fs-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>
                            </div>
                            <p class="text-secondary lead">"Lorem ipsum dolor sit amet, consectetur tempor incididunt
                                ut labore et dolore magna aliqua ullamco laboris nisi ut aliquip ex ea commodo
                                consequat."</p>
                            <div class="d-flex justify-content-start align-items-center border-top border-secondary pt-3">
                                <img src="{{ asset('assets-front') }}/img/webp/person14.webp" width="96"
                                    height="96" class="rounded-circle me-3" alt="a nice person" data-aos="fade"
                                    loading="lazy">
                                <div>
                                    <span class="h6 fw-5">Jane Doemunsky</span><br>
                                    <small class="text-secondary">COO, The Boo Corp.</small>
                                </div>
                            </div>
                        </div>
                        <div class="rounded-5 bg-black p-5 shadow mt-5" data-aos="zoom-in-right">
                            <div class="fs-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-half" viewBox="0 0 16 16">
                                    <path
                                        d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                                </svg>

                            </div>
                            <p class="text-secondary lead">"Lorem ipsum dolor sit amet, consectetur tempor incididunt
                                ut labore et dolore magna aliqua. Ut enim ad minim veniam. quis nostrud exercitation
                                ullamco laboris nisi ut aliquip ex ea commodo consequat."</p>
                            <div class="d-flex justify-content-start align-items-center border-top border-secondary pt-3">
                                <img src="{{ asset('assets-front') }}/img/webp/person13.webp" width="96"
                                    height="96" class="rounded-circle me-3" alt="a nice person" data-aos="fade"
                                    loading="lazy">
                                <div>
                                    <span class="h6 fw-5">Jane Doemunsky</span><br>
                                    <small class="text-secondary">COO, The Boo Corp.</small>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="p-5 pt-0" data-aos="fade">
                            <span class="h5 text-secondary fw-lighter">What others have to say</span>
                            <h2 class="display-4">See what our customers say about their experience with Car Transport.
                            </h2>
                        </div>
                        <div class="rounded-5 bg-black p-5 shadow mt-5 gradient" data-aos="zoom-in-left">
                            <div class="fs-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                                </svg>


                            </div>
                            <p class="lead">"Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat."</p>
                            <div class="d-flex justify-content-start align-items-center border-top pt-3">
                                <img src="{{ asset('assets-front') }}/img/webp/person16.webp" width="96"
                                    height="96" class="rounded-circle me-3" alt="a nice person" data-aos="fade"
                                    loading="lazy">
                                <div>
                                    <span class="h6 fw-5">Jane Doemunsky</span><br>
                                    <small>COO, The Boo Corp.</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection
