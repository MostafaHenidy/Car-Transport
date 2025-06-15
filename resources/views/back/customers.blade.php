@extends('back.master')
@section('support-active', 'active')
@section('content')
    <div class="container pt-5 mt-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 bg-dark text-white min-vh-100">
                @include('back.partials.sidebar')
            </div>

            <div class="col-md-9">
                <h3 class="text-secondary">Customers :</h3>
                <div class="border border-secondary border-3 rounded-2">
                    <table class="table table-striped table-dark mb-0 ">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Customer Email</th>
                                <th scope="col">Ticket Condition</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td><span class="badge text-bg-secondary ms-5">Good</span></td>
                                    <td>
                                        <ul class="nav">
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
