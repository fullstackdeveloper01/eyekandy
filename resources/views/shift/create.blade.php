@extends('layouts.app', ['title' => __('Shift Management')])

@section('content')
    @include('shift.partials.header', ['title' => __('Add Shift')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Shift Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('shift.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Shift information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('shift.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="title">{{ __('Shift Title') }}</label>
                                        <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Shift Title') }}" value="" required>
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
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="description">{{ __('Shift Description') }}</label>
                                        <input type="text" name="description" id="description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Shift Description') }}" value="" required>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
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

