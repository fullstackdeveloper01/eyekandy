@extends('layouts.app', ['title' => __('Status Management')])

@section('content')
    @include('status.partials.header', ['title' => __('Edit Status')])

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
                            <div class="pl-lg-4">
                                <form method="post" action="{{ route('status.update', $status) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                
                                    <hr />
                                    <h6 class="heading-small text-muted mb-4">{{ __('Status information') }}</h6>
                                    <div class="pl-lg-4">


                                        <div class="form-group{{ $errors->has('status_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Status Name') }}</label>
                                            <input type="text" name="status_name" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Status Name') }}" value="{{ old('status_name', $status->name) }}" >
                                        </div>

                                        <div class="form-group{{ $errors->has('status_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Status Alias') }}</label>
                                            <input type="text" name="status_alias" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Status Alias') }}" value="{{ old('status_alias', $status->alias) }}" >
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
