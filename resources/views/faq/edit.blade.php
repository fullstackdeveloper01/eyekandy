@extends('layouts.app', ['title' => __('FAQ Management')])

@section('content')
    @include('faq.partials.header', ['title' => __('Edit FAQ')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('FAQ Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('faq.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('faq.update', $faq) }}" autocomplete="off">
                                @csrf
                                @method('put')
                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('City information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('question') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="question">{{ __('Question') }}</label>
                                        <input type="text" name="question" id="question" class="form-control form-control-alternative{{ $errors->has('question') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Question') }}" value="{{$faq->question}}" required>
                                        @if ($errors->has('question'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('question') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('answer') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="answer">{{ __('Answer') }}</label>
                                        <textarea name="answer" id="answer" class="form-control form-control-alternative{{ $errors->has('answer') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Answer') }}" required>{{$faq->answer}}</textarea>
                                        @if ($errors->has('answer'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('answer') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-sm mt-4">{{ __('Update') }}</button>
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
