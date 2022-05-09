@extends('layouts.app', ['title' => __('Status Management')])

@section('content')
    @include('status.partials.header', ['title' => __('Status')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Status Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('status.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Status information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('status.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('status_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="status_name">{{ __('Status Name') }}</label>
                                        <input type="text" name="status_name" id="status_name" class="form-control form-control-alternative{{ $errors->has('status_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Status Name') }}" value="" required>
                                        @if ($errors->has('status_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('status_alias') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="status_alias">{{ __('Status Alias') }}</label>
                                        <input type="text" name="status_alias" id="status_alias" class="form-control form-control-alternative{{ $errors->has('status_alias') ? ' is-invalid' : '' }}" placeholder="{{ __('Status Alias') }}" value="" required>
                                        @if ($errors->has('status_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('status_alias') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
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
