@extends('layouts.app', ['title' => __('Zone Management')])

@section('content')
    @include('zone.partials.header', ['title' => __('Add Zone')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Zone Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('zone.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __(' information') }}</h6>
                        <div class="pl-lg-4">
                            <form name="zone_form" id="zone_form" method="post" action="{{ route('zone.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <!-- <div class="pl-lg-4"> -->
                                    <div class="form-group{{ $errors->has('city_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="city_name">{{ __('City Name') }}</label>
                                        <select name="city_name" id="city_name" class="form-control form-control-alternative{{ $errors->has('city_name') ? ' is-invalid' : '' }}" required>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->city_name}}</option>
                                        @endforeach
                                        
                                        @if ($errors->has('city_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city_name') }}</strong>
                                            </span>
                                        @endif
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('zone_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="zone_name">{{ __('Zone Name') }}</label>
                                        <input type="text" name="zone_name" id="zone_name" class="form-control form-control-alternative{{ $errors->has('zone_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Zone Name') }}" value="" required>
                                        @if ($errors->has('zone_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('zone_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('zone_area') ? ' has-danger' : '' }}" id="zone_append">
                                        <label class="form-control-label" for="zone_area">{{ __('Zone Area') }}</label>
                                        <input type="text" name="zone_area" id="zone_area" class="zonearea form-control form-control-alternative{{ $errors->has('zone_area') ? ' is-invalid' : '' }}" placeholder="{{ __('Zone Area') }}" value="" required>
                                        @if ($errors->has('zone_area'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('zone_area') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div id="add_area"></div>
                                    <span id="add_more"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                    <div class="text-center">
                                        <button id="zone_save" type="button" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                <!-- </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection 