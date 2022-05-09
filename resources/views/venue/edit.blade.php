@extends('layouts.app', ['title' => __('Venue Management')])

@section('content')
    @include('venue.partials.header', ['title' => __('Edit Venue')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Venue Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('venue.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('venue.update', $venue) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('City information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="type">{{ __('Venue Type') }}</label>
                                        <input type="text" name="type" id="type" class="form-control form-control-alternative{{ $errors->has('type') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Party Type') }}" value="{{$venue->type}}" required>
                                        @if ($errors->has('type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('type') }}</strong>
                                            </span>
                                        @endif
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
