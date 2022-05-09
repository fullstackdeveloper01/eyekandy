@extends('layouts.app', ['title' => __('Package Management')])

@section('content')
    @include('package.partials.header', ['title' => __('Edit Package')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Package Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('package.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <form method="post" action="{{ route('package.update', $package) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                <!--<div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>-->

                                </div>


                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('Package information') }}</h6>
                                <div class="pl-lg-4">


                                    <div class="form-group{{ $errors->has('package_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Package Name') }}</label>
                                        <input type="text" name="package_name" id="input-name" class="form-control form-control-alternative" placeholder="{{ __('Package Name') }}" value="{{ old('package_name', $package->package_name) }}" >
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
