@extends('layouts.app', ['title' => __('Shift Management')])

@section('content')
    @include('shift.partials.header', ['title' => __('Edit Shift')])

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
                                
                                <form method="post" action="{{ route('shift.update', $shift) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                <!--<div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>-->

                                 

                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('Shift information') }}</h6>
                                <div class="pl-lg-4">


                                <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Shift Title') }}</label>
                                    <input type="text" name="title" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Shift title') }}" value="{{ old('title', $shift->title) }}">
                                </div>


                                <div class="form-group{{ $errors->has('from_time') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('From time') }}</label>
                                    <input type="text" name="from_time" id="input-name" class=" flatpickr form-control form-control-alternative" placeholder="{{ __('From time') }}" value="{{ old('from_time', $shift->from_time) }}">
                                </div>

                                <div class="form-group{{ $errors->has('to_time') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('To time') }}</label>
                                    <input type="text" name="to_time" id="input-name" class="flatpickr form-control form-control-alternative" placeholder="{{ __('To time') }}" value="{{ old('to_time', $shift->to_time) }}">
                                </div>



                                <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Shift Description') }}</label>
                                    <input type="text" name="description" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Shift Description') }}" value="{{ old('description', $shift->description) }}">
                                </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                    </div>
                                
                            </div>
    
                        </from>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
