@extends('layouts.app', ['title' => __('Vehicle Management')])

@section('content')
    @include('vehicle.partials.header', ['title' => __('Edit Vehicle')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Vehicle Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('vehicle.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('vehicle.update', $vehicle) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('Vehicle information') }}</h6>
                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Vehicle Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('vehicle Name') }}" value="{{ old('name', $vehicle->name) }}">
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('bank_status') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Vehicle Status') }}</label>
                                        <select name="bank_status" id="bank_status" class="form-control form-control-alternative{{ $errors->has('bank_status') ? ' is-invalid' : '' }}" required value="{{ old('bank_status', $vehicle->active) }}">
                                            <option value="1" @if($vehicle->active==1) selected @endif>Active</option>
                                            <option value="0" @if($vehicle->active==0) selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
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
