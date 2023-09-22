@extends('layouts.admin.main')

@section('title', 'Edit Customer')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Customer</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.customers') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')

                            <form action="{{ route('admin.customer.edit', $customer) }}" method="POST">
                                @csrf

                                
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" class="form-control @error('region') is-invalid @enderror"
                                            name="region" id="region" placeholder="Enter the region!"
                                            value="{{ old('region') ?? $customer->region }}">
                                        @error('region')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" id="city" placeholder="Enter the city!"
                                            value="{{ old('city') ?? $customer->city }}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cluster" class="form-label">Cluster</label>
                                        <input type="text" class="form-control @error('cluster') is-invalid @enderror"
                                            name="cluster" id="cluster" placeholder="Enter the Cluster!"
                                            value="{{ old('cluster') ?? $customer->cluster }}">
                                        @error('cluster')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="program" class="form-label">Channel</label>
                                        <select name="channel" id="channel" class="form-select @error('channel') is-invalid @enderror">
                                            @foreach ($channels as $channel)
                                            @if (old('channel') == $channel)
                                                <option value="{{ $channel ?? $customer->$channel   }}" selected>{{ $customer->channel }}</option>
                                            @else
                                                <option value="{{ $channel }}">{{ $channel}}</option>
                                            @endif
                                        @endforeach
{{--                                        
                                           
                                                    
                                              
                                        </select>
                                        @error('channel') <!-- Correct the field name to 'channel' here -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="store_name" class="form-label">Store Name</label>
                                        <input type="text" class="form-control @error('store_name') is-invalid @enderror"
                                            name="store_name" id="store_name" placeholder="Enter the store name!"
                                            value="{{ old('store_name') ?? $customer->store_name }}">
                                        @error('store_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="store_code" class="form-label">Store code</label>
                                        <input type="text" class="form-control @error('store_code') is-invalid @enderror"
                                            name="store_code" id="store_code" placeholder="Enter the Store code!"
                                            value="{{ old('store_code') ?? $customer->store_code }}">
                                        @error('store_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>





                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="program" class="form-label">Program</label>
                                        <select name="program" id="program" class="form-select @error('program') is-invalid @enderror">
                                           
                                            @foreach ($program as $prog)
                                                @if (old('program') == $prog)
                                                    <option value="{{ $prog ?? $customer->program   }}" selected>{{ $customer->program }}</option>
                                                @else
                                                    <option value="{{ $prog }}">{{ $prog }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('program') <!-- Correct the field name to 'program' here -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


{{-- 
                                    <div class="col-md-4">
                                        <label for="user" class="form-label">Sales Executive</label>
                                        <select class="form-select @error('user') is-invalid @enderror" name="user"
                                            id="user">
                                            <option value="" selected>Select Sales Executive</option>

                                            @foreach ($users as $user)
                                                @if (old('user') == $user->id)
                                                    <option value="{{ $user->id }}" selected>{{ $user->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('user')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="col-md-4 mb-3">
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

                                </div>

                              





{{-- 
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="store_name" class="form-label">Store Name</label>
                                            <input type="text"
                                                class="form-control @error('store_name') is-invalid @enderror"
                                                name="store_name" id="store_name" placeholder="Enter the store name!"
                                                value="{{ old('store_name') ?? $customer->store_name }}">
                                            @error('store_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="owner_name" class="form-label">Owner Name</label>
                                            <input type="text"
                                                class="form-control @error('owner_name') is-invalid @enderror"
                                                name="owner_name" id="owner_name" placeholder="Enter the owner name!"
                                                value="{{ old('owner_name') ?? $customer->owner_name }}">
                                            @error('owner_name')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text"
                                                class="form-control @error('location') is-invalid @enderror" name="location"
                                                id="location" placeholder="Enter the location!"
                                                value="{{ old('location') ?? $customer->location }}">
                                            @error('location')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="province" class="form-label">Province</label>
                                            <input type="text"
                                                class="form-control @error('province') is-invalid @enderror" name="province"
                                                id="province" placeholder="Enter the province!"
                                                value="{{ old('province') ?? $customer->province }}">
                                            @error('province')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="region" class="form-label">Region</label>
                                            <input type="text" class="form-control @error('region') is-invalid @enderror"
                                                name="region" id="region" placeholder="Enter the region!"
                                                value="{{ old('region') ?? $customer->region }}">
                                            @error('region')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="city" class="form-label">City</label>
                                            <input type="text" class="form-control @error('city') is-invalid @enderror"
                                                name="city" id="city" placeholder="Enter the city!"
                                                value="{{ old('city') ?? $customer->city }}">
                                            @error('city')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="area" class="form-label">Area</label>
                                            <input type="text" class="form-control @error('area') is-invalid @enderror"
                                                name="area" id="area" placeholder="Enter the area!"
                                                value="{{ old('area') ?? $customer->area }}">
                                            @error('area')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="contact_no" class="form-label">Contact Number</label>
                                            <input type="text"
                                                class="form-control @error('contact_no') is-invalid @enderror"
                                                name="contact_no" id="contact_no" placeholder="Enter the contact no!"
                                                value="{{ old('contact_no') ?? $customer->contact_no }}">
                                            @error('contact_no')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="day" class="form-label">Day</label>
                                            <select name="day" id="day"
                                                class="form-select @error('day') is-invalid @enderror">
                                                <option value="" selected>Select a day!</option>
                                                @if (old('day'))
                                                    @foreach ($days as $day)
                                                        @if (old('day') == $day)
                                                            <option value="{{ $day }}" selected>
                                                                {{ $day }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $day }}">{{ $day }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @else
                                                    @foreach ($days as $day)
                                                        @if ($customer->day == $day)
                                                            <option value="{{ $day }}" selected>
                                                                {{ $day }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $day }}">{{ $day }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </select>
                                            @error('day')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}

                                <div>
                                    <input type="submit" class="btn btn-primary" value="Update">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
