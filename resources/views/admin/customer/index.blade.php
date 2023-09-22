@extends('layouts.admin.main')

@section('title', 'Customers')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Customers</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.customer.create') }}" class="btn btn-outline-primary">Add Customer</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($customers) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Region</th>
                                            <th>City</th>                                        
                                            <th>Cluster</th>                                          
                                            <th>Channel</th>
                                            <th>Store Name</th>
                                            <th>Store Code</th>                                         
                                            <th> Program</th>
                                            <th>Day</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $customer->region }}</td>
                                                <td>{{ $customer->city }}</td>
                                                <td>{{ $customer->cluster }}</td>
                                                <td>{{ $customer->channel }}</td>
                                                <td>{{ $customer->store_name }}</td>
                                                <td>{{ $customer->store_code}}</td>
                                                <td>{{ $customer->program }}</td>
                                               
                                                <td>{{ $customer->day }}</td>
                                                <td>
                                                    <a href="{{ route('admin.customer.edit', $customer) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.customer.destroy', $customer) }}"
                                                        class="btn btn-danger">
                                                        <i class="align-middle" data-feather="trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="alert alert-info m-0">No record found!</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
