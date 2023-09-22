@extends('layouts.admin.main')

@section('title', 'Models')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Models</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.device_model.create') }}" class="btn btn-outline-primary">Add Model</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            @if (count($device_models) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($device_models as $device_model)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $device_model->name }}</td>
                                                <td>{{ $device_model->brand->name }}</td>
                                                <td>
                                                    <a href="{{ route('admin.device_model.edit', $device_model) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.device_model.destroy', $device_model) }}"
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
