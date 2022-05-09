@extends('layouts.app', ['title' => __('Package Management')])



@section('content')

    @include('package.partials.header', ['title' => __('Add Package')])



    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 order-xl-1">

                <div class="card bg-secondary shadow">

                    <div class="card-header bg-white border-0">

                        <div class="row align-items-center">

                            <div class="col-8">

                                <!--<h3 class="mb-0">{{ __('Package Management') }}</h3>-->

                            </div>

                            <div class="col-4 text-right">

                                <a href="{{ route('package.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>

                            </div>

                        </div>

                    </div>

                    <div class="card-body">

                        <!--<h6 class="heading-small text-muted mb-4">{{ __('Package information') }}</h6>-->

                        <div class="pl-lg-4">

                            <form method="post" action="{{ route('package.store') }}" autocomplete="off">

                                @csrf

                                </div>

                                <div class="pl-lg-4">

                                    <div class="row">

                                        <div class=" col-md-6 form-group{{ $errors->has('[package_title') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="package_title">{{ __('Title') }}</label>

                                            <input type="text" name="package_title" id="package_title" class="form-control form-control-alternative{{ $errors->has('package_title') ? ' is-invalid' : '' }}" placeholder="{{ __('Package Title') }}" value="" required>

                                            @if ($errors->has('package_title'))

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $errors->first('package_title') }}</strong>

                                                </span>

                                            @endif

                                        </div>



                                        <div class=" col-md-6 form-group{{ $errors->has('[package_entertainer') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="package_entertainer">{{ __('Entertainer') }}</label>

                                            <input type="text" name="package_entertainer" id="package_entertainer" class="form-control number form-control-alternative{{ $errors->has('package_entertainer') ? ' is-invalid' : '' }}" placeholder="{{ __('Entertainer') }}" value="" required>

                                            @if ($errors->has('package_entertainer'))

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $errors->first('package_entertainer') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                    

                                        <div class="col-md-6 form-group{{ $errors->has('[package_price') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="package_price">{{ __('Price') }}</label>

                                            <input type="text" name="package_price" id="package_price" class="form-control number form-control-alternative{{ $errors->has('package_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Package Price') }}" value="" required>

                                            @if ($errors->has('package_price'))

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $errors->first('package_price') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="col-md-6 form-group{{ $errors->has('[extra_hour_price') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="extra_hour_price">{{ __('Extra Hour Price') }}</label>

                                            <input type="text" name="extra_hour_price" id="extra_hour_price" class="form-control number form-control-alternative{{ $errors->has('extra_hour_price') ? ' is-invalid' : '' }}" placeholder="{{ __('Hour Price') }}" value="" required>

                                            @if ($errors->has('extra_hour_price'))

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $errors->first('extra_hour_price') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="col-md-6 form-group{{ $errors->has('[package_hours') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="package_hours">{{ __('Hours') }}</label>

                                            <input type="text" name="package_hours" id="package_hours" class="form-control number form-control-alternative{{ $errors->has('package_hours') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Hours') }}" value="" required>

                                            @if ($errors->has('package_hours'))

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $errors->first('package_hours') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                        <div class="col-md-6 form-group{{ $errors->has('[package_color') ? ' has-danger' : '' }}">

                                            <label class="form-control-label" for="package_color">{{ __('Color') }}</label>

                                            <input type="color" name="package_color" id="package_color" class="form-control form-control-alternative{{ $errors->has('package_color') ? ' is-invalid' : '' }}" value="" required>

                                            @if ($errors->has('package_color'))

                                                <span class="invalid-feedback" role="alert">

                                                    <strong>{{ $errors->first('package_color') }}</strong>

                                                </span>

                                            @endif

                                        </div>

                                    </div>    

                                    <div class="form-group{{ $errors->has('[package_description') ? ' has-danger' : '' }}">

                                        <label class="form-control-label" for="package_description">{{ __('Description') }}</label>

                                        <textarea name="package_description" id="package_description" class="form-control form-control-alternative{{ $errors->has('package_description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description') }}" required></textarea>

                                        @if ($errors->has('package_description'))

                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $errors->first('package_description') }}</strong>

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

        <script type="text/javascript">

            $('.number').keyup(function(e) {

                console.log(this.value.length)

                if(this.value.length > 2) { return false; }

                

                if(this.value == 0){

                    this.value =this.value.replace(/[^1-9\.]/g,'');

                }else if(this.value < 0){

                    this.value =this.value.replace(/[^0-9\.]/g,'');

                }else{

                    this.value =this.value.replace(/[^0-9\.]/g,'');

                }                

            });

            $("#package_hours").change(function () {
                var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
                if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                    alert("Only formats are allowed : "+fileExtension.join(', '));
                }
            });

        </script>

        @include('layouts.footers.auth')

    </div>

@endsection

