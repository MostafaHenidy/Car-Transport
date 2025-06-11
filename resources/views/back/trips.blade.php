@extends('front.master')
@section('trips-active', 'active')
@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-white min-vh-100">
                @include('back.partials.sidebar')
            </div>

            <div class="col-md-9">
                <h3 class="text-secondary">Trips :</h3>
                <div class="border border-secondary border-3 rounded-2">
                    <table class="table table-striped table-dark mb-0 ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Trip Name</th>
                                <th scope="col">Trip Route</th>
                                <th scope="col">Price</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trips as $trip)
                                <tr>
                                    <th scope="row">{{ $trip->id }}</th>
                                    <td>{{ $trip->slug }}</td>
                                    <td>{{ $trip->routes }}</td>
                                    <td>{{ Laravel\Cashier\Cashier::formatAmount($trip->price, env('CASHIER_CURRENCY', App::currentLocale())) }}
                                    </td>
                                    <td>
                                        <ul class="nav ">
                                            <li class="nav-link">
                                                <a href="/" class="badge rounded-pill text-bg-success"><i
                                                        class="bi bi-check-circle"></i></a>
                                            </li>
                                            <li class="nav-link">
                                                <a href="/" class="badge rounded-pill text-bg-danger"><i
                                                        class="bi bi-x-circle"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    @endsection
