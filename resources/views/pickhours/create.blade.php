@extends('layouts.app', ['title' => __('PickHours Management')])

@section('content')
    @include('pickhours.partials.header', ['title' => __('Add Pickhours')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Pickhours Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('pickhours.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Pickhours information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('pickhours.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('package_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="package_name">{{ __('Package Name') }}</label>
                                        <select name="package_name" id="package_name" class="form-control form-control-alternative{{ $errors->has('package_name') ? ' is-invalid' : '' }}" required>
                                        @foreach($packages as $package)
                                        <option value="{{$package->id}}">{{$package->package_name}}</option>
                                        @endforeach
                                        
                                        @if ($errors->has('package_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('package_name') }}</strong>
                                            </span>
                                        @endif
                                        </select>
                                    </div>
                                    <div id="delivery_package">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="title">{{ __('Pickhours Title') }}</label>
                                        </div>
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input type="radio" name="title" id="title" value="peak hours" checked class="{{ $errors->has('title') ? ' is-invalid' : '' }}" >
                                            <label class="form-control-label" for="title">{{ __('Peak Hours') }}</label>
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <input type="radio" name="title" id="title1" value="normal hours" class="{{ $errors->has('title') ? ' is-invalid' : '' }}" >
                                            <label class="form-control-label" for="title">{{ __('Normal Hours') }}</label>
                                            
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('from_time') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="from_time">{{ __('From time') }}</label>
                                            <input type="email" name="from_time" id="from_time" class="flatpickr form-control form-control-alternative{{ $errors->has('from_time') ? ' is-invalid' : '' }}" placeholder="{{ __('From time') }}" value="" required>
                                            @if ($errors->has('from_time'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('from_time') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    
                                        <div class="form-group{{ $errors->has('to_time') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="to_time">{{ __('To time') }}</label>
                                            <input type="email" name="to_time" id="to_time" class="flatpickr form-control form-control-alternative{{ $errors->has('to_time') ? ' is-invalid' : '' }}" placeholder="{{ __('To time') }}" value="" required>
                                            @if ($errors->has('to_time'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('to_time') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div id="fix_package" style="display:none">
                                        <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="title">{{ __('Including Peak Hours') }}</label>
                                            <!-- <input type="hidden" name="title" id="title" value="fix hours" class="{{ $errors->has('title') ? ' is-invalid' : '' }}" required> -->
                                            <input type="checkbox" name="including_peak_hours" id="including_peak_hours"  class="{{ $errors->has('including_peak_hours') ? ' is-invalid' : '' }}"> 

                                        </div>
                                    </div>
                                    <div id="peak_hours" style="display:none">
                                        <div class="form-group{{ $errors->has('peak_hours') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="title">{{ __('Peak Hours') }}</label>
                                            <select name="peak_hour" id="peak_hour" class="form-control form-control-alternative{{ $errors->has('package_name') ? ' is-invalid' : '' }}">
                                                <option value=''>Select</option>
                                                @foreach($peakhours as $peakh)
                                                <option value="{{$peakh->from_time}} - {{$peakh->to_time}}">{{$peakh->from_time}} - {{$peakh->to_time}}</option>
                                                @endforeach
                                                
                                                @if ($errors->has('peak_hour'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('peak_hour') }}</strong>
                                                    </span>
                                                @endif
                                            </select>
                                        </div>
                                        

                                    </div>
                                    <div id="totalhours" class="form-group{{ $errors->has('minimum_compulsary_time') ? ' has-danger' : '' }}" style="display:none;">
                                        <label class="form-control-label" for="minimum_compulsary_time">{{ __('Minimum Compulsary Time') }}</label>
                                        <input type="text" name="minimum_compulsary_time" id="minimum_compulsary_time" class="form-control form-control-alternative{{ $errors->has('minimum_compulsary_time') ? ' is-invalid' : '' }}" placeholder="{{ __('Minimum Compulsary Ttime') }}" value="">
                                        @if ($errors->has('minimum_compulsary_time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('minimum_compulsary_time') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('delivery_price') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="delivery_price">{{ __('Delivery/Fix Price') }}</label>
                                        <input type="text" name="delivery_price" id="delivery_price" class="form-control form-control-alternative{{ $errors->has('delivery_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Delivery/Fix Price') }}" value="" required>
                                        @if ($errors->has('delivery_price'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('delivery_price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@endsection

