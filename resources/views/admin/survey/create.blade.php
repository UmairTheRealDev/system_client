@extends('layouts.admin.main')

@section('title', 'Add Survey')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Add Survey</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.surveys') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.survey.create') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="day" class="form-label">Day</label>
                                        <select name="day" id="day"
                                            class="form-select @error('day') is-invalid @enderror">
                                            <option value="" selected>Select a day!</option>
                                            @foreach ($days as $day)
                                                @if (old('day') == $day)
                                                    <option value="{{ $day }}" selected>{{ $day }}
                                                    </option>
                                                @else
                                                    <option value="{{ $day }}">{{ $day }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('day')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="customer" class="form-label">Customer</label>
                                        <select name="customer" id="customer"
                                            class="form-select @error('customer') is-invalid @enderror">
                                            @if (old('customer') || old('day'))
                                                <option value="" selected>Select a customer!</option>
                                                @foreach ($customers as $customer)
                                                    @if ($customer->day == old('day'))
                                                        @if ($customer->id == old('customer'))
                                                            <option value="{{ $customer->id }}" selected>
                                                                {{ $customer->owner_name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $customer->id }}">{{ $customer->store_name }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="" selected>Select a day first!</option>
                                            @endif
                                        </select>
                                        @error('customer')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="brand" class="form-label">Brand</label>
                                        <select class="form-select @error('brand') is-invalid @enderror" name="brand"
                                            id="brand">
                                            <option value="" selected>Select brand</option>

                                            @foreach ($brands as $brand)
                                                @if (old('brand') == $brand->id)
                                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('brand')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="model" class="form-label">Model</label>
                                        <select name="model" id="model"
                                            class="form-select @error('model') is-invalid @enderror">
                                            @if (old('model') || old('brand'))
                                                <option value="" selected>Select a model!</option>
                                                @foreach ($models as $model)
                                                    @if ($model->brand_id == old('brand'))
                                                        @if ($model->id == old('model'))
                                                            <option value="{{ $model->id }}" selected>
                                                                {{ $model->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $model->id }}">
                                                                {{ $model->name }}
                                                            </option>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <option value="" selected>Select a brand first!</option>
                                            @endif
                                        </select>
                                        @error('model')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- new addition --}}


                                


                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="signboard" class="form-label">Sign Board</label>
                                        <input type="text"
                                            class="form-control @error('signboard') is-invalid @enderror"
                                            name="signboard" id="signboard" placeholder="Enter the sell through!"
                                            value="{{ old('signboard') }}">
                                        @error('signboard')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="showcase" class="form-label">Showcase</label>
                                        <input type="text"
                                        class="form-control @error('showcase') is-invalid @enderror"
                                        name="showcase" id="showcase" placeholder="Enter the sell through!"
                                        value="{{ old('showcase') }}">
                                        @error('showcase')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-3 mb-3">
                                        <label for="ldu_table" class="form-label">LDU Table</label>
                                        <input type="text"
                                            class="form-control @error('ldu_table') is-invalid @enderror"
                                            name="ldu_table" id="ldu_table" placeholder="Enter the LDU Table!"
                                            value="{{ old('ldu_table') }}">
                                        @error('ldu_table')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="ldu_qty" class="form-label">LDU Quantity</label>
                                        <input type="number"
                                            class="form-control @error('ldu_qty') is-invalid @enderror"
                                            name="ldu_qty" id="ldu_qty" placeholder="Enter the LDU Qty!"
                                            value="{{ old('ldu_qty') }}">
                                        @error('ldu_qty')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                

                                <div class="row">
                                    <div class="col-md-3 mb-3">
                                        <label for="promoter" class="form-label">Promoter</label>
                                        <input type="text"
                                            class="form-control @error('promoter') is-invalid @enderror"
                                            name="promoter" id="promoter" placeholder="Enter the Promoter!"
                                            value="{{ old('promoter') }}">
                                        @error('promoter')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="cabinet" class="form-label">Cabinet</label>
                                        <input type="text" class="form-control @error('cabinet') is-invalid @enderror"
                                            name="cabinet" id="cabinet" placeholder="Enter the sell out!"
                                            value="{{ old('cabinet') }}">
                                        @error('cabinet')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="promotion_stand" class="form-label">Promotion Stand</label>
                                        <input type="text"
                                            class="form-control @error('promotion_stand') is-invalid @enderror"
                                            name="promotion_stand" id="promotion_stand" placeholder="Enter the sell through!"
                                            value="{{ old('promotion_stand') }}">
                                        @error('promotion_stand')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="foc_soh" class="form-label">FOC SOH</label>
                                        <input type="number" class="form-control @error('foc_soh') is-invalid @enderror"
                                            name="foc_soh" id="foc_soh" placeholder="Enter the sell out!"
                                            value="{{ old('foc_soh') }}">
                                        @error('foc_soh')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>


                                    <div class="row">
                                    <div class="col-md-6 mb-3 ">
                                        <label for="date_from" class="form-label">Date From</label>
                                        <input type="date" name="date_from" id="date_from">
                                        @error('date_from')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                    <div class="col-md-6 mb-3 mx-auto">
                                        <label for="date_till" class="form-label">Date Till</label>
                                        <input type="date" name="date_till" id="date_till">
                                        @error('date_till')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                    </div>
                                </div>
                                






                                {{--end new addition --}}

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="sell_through" class="form-label">Sell Through</label>
                                        <input type="number"
                                            class="form-control @error('sell_through') is-invalid @enderror"
                                            name="sell_through" id="sell_through" placeholder="Enter the sell through!"
                                            value="{{ old('sell_through') }}">
                                        @error('sell_through')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="sell_out" class="form-label">Sell Out</label>
                                        <input type="number" class="form-control @error('sell_out') is-invalid @enderror"
                                            name="sell_out" id="sell_out" placeholder="Enter the sell out!"
                                            value="{{ old('sell_out') }}">
                                        @error('sell_out')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="stock_on_hand" class="form-label">Stock On Hand</label>
                                        <input type="number"
                                            class="form-control @error('stock_on_hand') is-invalid @enderror"
                                            name="stock_on_hand" id="stock_on_hand" placeholder="Enter the stock on hand!"
                                            value="{{ old('stock_on_hand') }}">
                                        @error('stock_on_hand')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="feedback" class="form-label">Feedback</label>
                                    <textarea name="feedback" id="feedback" rows="3" class="form-control @error('feedback') is-invalid @enderror"
                                        placeholder="Enter the feedback!">{{ old('feedback') }}</textarea>
                                    @error('feedback')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <input type="submit" class="btn btn-primary" value="Add">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection

@section('script')
    <script>
        const dayElement = document.querySelector("#day");
        const customerElement = document.querySelector("#customer");

        dayElement.addEventListener("change", function() {
            const dayValue = dayElement.value;

            if (dayValue != "") {
                const token = document.querySelector("input[name='_token']").value;

                const data = {
                    day: dayValue,
                    _token: token,
                };

                fetch("{{ route('admin.day.customers') }}", {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        customerElement.innerHTML = result;
                    })
            }
        });

        const brandElement = document.querySelector("#brand");
        const modelElement = document.querySelector("#model");

        brandElement.addEventListener("change", function() {
            const brandValue = brandElement.value;

            if (brandValue != "") {
                const token = document.querySelector("input[name='_token']").value;

                const data = {
                    brand: brandValue,
                    _token: token,
                };

                fetch("{{ route('admin.brand.models') }}", {
                        method: "POST",
                        body: JSON.stringify(data),
                        headers: {
                            'Content-Type': 'application/json'
                        }
                    })
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(result) {
                        modelElement.innerHTML = result;
                    })
            }
        });
    </script>
@endsection
