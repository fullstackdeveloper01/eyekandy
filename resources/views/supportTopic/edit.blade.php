@extends('layouts.app', ['title' => __('Support Topic')])

@section('content')
    @include('supportTopic.partials.header', ['title' => __('Edit Topic')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Support Topic') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('support_topic.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">                                
                        <form method="post" action="{{ route('support_topic.update', $supportTopic) }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                            <hr />
                            <h6 class="heading-small text-muted mb-4">{{ __('Category information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('topic') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="topic">{{ __('Topic') }}</label>
                                    <input type="text" name="topic" id="topic" class="form-control form-control-alternative" placeholder="{{ __('Enter Topic') }}" value="{{$supportTopic->topic }}">
                                    @if ($errors->has('topic'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('topic') }}</strong>
                                        </span>
                                    @endif
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
