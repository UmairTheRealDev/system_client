@extends('layouts.admin.main')

@section('title', 'Surveys')

@section('content')
    <main class="content" style="width: 100vw">
        <div class="">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Surveys</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.survey.create') }}" class="btn btn-outline-primary">Add Survey</a>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body"> --}}
                            @include('partials.alerts')
                            @if (count($surveys) > 0)
                                <table class="table table-bordered m-0">
                                    <thead>
                                        <tr>
                                            <th>Sr. No</th>
                                            <th>Customer</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Sell Through</th>
                                            <th>Sell Out</th>
                                            <th>Stock</th>
                                            <th>signboard</th>
                                            <th>showcase</th>
                                            <th>ldu_table</th>
                                            <th>cabinet</th>
                                            <th>ldu_qty</th>
                                            <th>foc_soh</th>
                                            <th>date_till</th>
                                            <th>date_from</th>
                                            <th>Feedback</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surveys as $survey)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $survey->customer->store_name }}</td>
                                                <td>{{ $survey->brand->name }}</td>
                                                <td>{{ $survey->device_model->name }}</td>
                                                <td>{{ $survey->sell_through }}</td>
                                                <td>{{ $survey->sell_out }}</td>
                                                <td>{{ $survey->signboard }}</td>
                                                <td>{{ $survey->showcase }}</td>
                                                <td>{{ $survey->promoter }}</td>
                                                <td>{{ $survey->cabinet }}</td>
                                                <td>{{ $survey->promotion_stand }}</td>
                                                <td>{{ $survey->ldu_qty }}</td>
                                                <td>{{ $survey->foc_soh }}</td>
                                                <td>{{ $survey->date_from }}</td>
                                                <td>{{ $survey->date_till }}</td>
                                               
                                                <td>{{ $survey->feedback }}</td>
                                                <td>
                                                    <a href="{{ route('admin.survey.edit', $survey) }}"
                                                        class="btn btn-primary">
                                                        <i class="align-middle" data-feather="edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.survey.destroy', $survey) }}"
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
                        {{-- </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </main>
@endsection
