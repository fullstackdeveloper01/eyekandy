@extends('layouts.app', ['title' => __('Advertisement Management')])

@section('content')
    @include('advertisement.partials.header', ['title' => __('Add Advertisement')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Advertisement Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('advertisement.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Advertisement information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('advertisement.store') }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                        <div class="form-group">
                                            <label>Thumbnail</label>
                                            <input type="file" id="thumbnail" name="thumbnail" class="form-control" required>
                                        </div>
                                    <div class="row">
                                        <div class="col-6">   
                                            <div class="form-group{{ $errors->has('title') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="title">{{ __('Title') }}</label>
                                                <input type="text" name="title" id="title" class="form-control form-control-alternative{{ $errors->has('title') ? ' is-invalid' : '' }}" placeholder="{{ __('Title') }}" value="" required>
                                                @if ($errors->has('title'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">   
                                            <div class="form-group{{ $errors->has('link') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="link">{{ __('Link') }}</label>
                                                <input type="text" name="link" id="link" class="form-control form-control-alternative{{ $errors->has('link') ? ' is-invalid' : '' }}" placeholder="{{ __('Link') }}" value="">
                                                @if ($errors->has('link'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('link') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
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
