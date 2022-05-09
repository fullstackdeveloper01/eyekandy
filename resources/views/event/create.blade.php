@extends('layouts.app', ['title' => __('Event Management')])

@section('content')
    @include('event.partials.header', ['title' => __('Add Event')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Event Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('event.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Event information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('event.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-6">   
                                            <div class="form-group{{ $errors->has('featured_image') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="featured_image">{{ __('Featured Image') }}</label>
                                                <input type="file" name="featured_image" id="featured_image" class="form-control form-control-alternative{{ $errors->has('featured_image') ? ' is-invalid' : '' }}" required="" >
                                                <label  class="form-control-label" >Note:-min-height:300,max-height:500</label>
                                                @if ($errors->has('featured_image'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('featured_image') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-6">   
                                            <div class="form-group{{ $errors->has('event_title') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="event_title">{{ __('Title') }}</label>
                                                <input type="text" name="event_title" id="event_title" class="form-control form-control-alternative{{ $errors->has('event_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" required="" >
                                                @if ($errors->has('event_title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('event_title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-12">   
                                            <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="description">{{ __('Description') }}</label>
                                                <textarea name="description" id="description" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" rows="5" required></textarea>
                                                @if ($errors->has('description'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
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
