@extends('layouts.app', ['title' => __('Zone Management')])

@section('content')
    @include('zone.partials.header', ['title' => __('Edit Zone')])

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
                            <div class="pl-lg-4">
                                <form name="zone_form" id="zone_form" method="post" action="{{ route('zone.update', $zone) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                               


                                    <hr />
                                    <h6 class="heading-small text-muted mb-4">{{ __('Zone information') }}</h6>
                                    <div class="form-group{{ $errors->has('city_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="city_name">{{ __('City Name') }}</label>
                                        <select name="city_name" id="city_name" class="form-control form-control-alternative{{ $errors->has('city_name') ? ' is-invalid' : '' }}" required>
                                        @foreach($cities as $city)
                                        <option value="{{$city->id}}" @if($zone->city==$city->id) selected @endif>{{$city->city_name}}</option>
                                        @endforeach
                                        <!--                                         
                                        @if ($errors->has('city_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city_name') }}</strong>
                                            </span>
                                        @endif -->
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('zone_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="zone_name">{{ __('Zone Name') }}</label>
                                        <input type="text" name="zone_name" id="zone_name" class="form-control form-control-alternative{{ $errors->has('zone_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Zone Name') }}" value="{{ old('zone_name', $zone->zone_name) }}" required>
                                        <!-- @if ($errors->has('zone_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('zone_name') }}</strong>
                                            </span>
                                        @endif -->
                                    </div>
                                    @if(is_array($zone->zone_area))
                                        @foreach($zone->zone_area as $area)
                                            <div class="form-group{{ $errors->has('zone_area') ? ' has-danger' : '' }}" id="zone_append">
                                                <label class="form-control-label" for="zone_area">{{ __('Zone Area') }}</label>
                                                <input type="text" name="zone_area[]"  class="zonearea form-control form-control-alternative{{ $errors->has('zone_area') ? ' is-invalid' : '' }}" placeholder="{{ __('Zone Area') }}" value="{{ old('zone_area', $area) }}" required>
                                                <!-- @if ($errors->has('zone_area'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('zone_area') }}</strong>
                                                    </span>
                                                @endif -->
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="form-group{{ $errors->has('zone_area') ? ' has-danger' : '' }}" id="zone_append">
                                            <label class="form-control-label" for="zone_area">{{ __('Zone Area') }}</label>
                                            <input type="text" name="zone_area[]"  class="zonearea form-control form-control-alternative{{ $errors->has('zone_area') ? ' is-invalid' : '' }}" placeholder="{{ __('Zone Area') }}" value="{{ old('zone_area', $zone->zone_area) }}" required>
                                            <!-- @if ($errors->has('zone_area'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('zone_area') }}</strong>
                                                </span>
                                            @endif -->
                                        </div>
                                    @endif
                                    <div id="add_area"></div>
                                    <span id="add_more"><i class="fa fa-plus" aria-hidden="true"></i>
                                    </span>
                                    <div class="text-center">
                                        <button id="zone_save" type="button" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                    </div>
                                </form>
                            </div>
                            <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
