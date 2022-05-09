@extends('layouts.app', ['title' => __('Earning Management')])

@section('content')
    @include('earning.partials.header', ['title' => __('Add Earning')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Earning Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('earning.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Earning information') }}</h6>
                            <form method="post" action="{{ route('earning.store') }}" autocomplete="off">
                                @csrf
                                <div class="row">                                    
                                    <div class="pl-lg-4 col-xl-6">
                                        <div class="form-group{{ $errors->has('[title') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                            <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="" required>
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>                                
                                    <div class="pl-lg-4 col-xl-6">
                                        <div class="form-group{{ $errors->has('[distance_km') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="distance_km">{{ __('Distance (KM)') }}</label>
                                            <input type="text" name="distance_km" id="title" class="form-control form-control-alternative{{ $errors->has('distance_km') ? ' is-invalid' : '' }}" placeholder="{{ __('Distance KM') }}" value="" required>
                                            @if ($errors->has('distance_km'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('distance_km') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="pl-lg-4 col-xl-4">
                                        <div class="form-group{{ $errors->has('[from_hours') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="from_hours">{{ __('Start Time') }}</label>
                                            <input type="text" name="from_hours" id="from_hours" class="form-control form-control-alternative{{ $errors->has('from_hours') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Time') }}" value="" required>
                                            @if ($errors->has('from_hours'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('from_hours') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>                                
                                    <div class="pl-lg-4 col-xl-4">
                                        <div class="form-group{{ $errors->has('[to_hours') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="to_hours">{{ __('End Time)') }}</label>
                                            <input type="text" name="to_hours" id="title" class="form-control form-control-alternative{{ $errors->has('to_hours') ? ' is-invalid' : '' }}" placeholder="{{ __('End Time') }}" value="" required>
                                            @if ($errors->has('to_hours'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('to_hours') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>                              
                                    <div class="pl-lg-4 col-xl-4">
                                        <div class="form-group{{ $errors->has('[price') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="price">{{ __('Price)') }}</label>
                                            <input type="text" name="price" id="price" class="form-control form-control-alternative{{ $errors->has('price') ? ' is-invalid' : '' }}" placeholder="{{ __('Distance KM') }}" value="" required>
                                            @if ($errors->has('price'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('price') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="pl-lg-4 col-xl-6">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                        </div>
                                    </div>
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
