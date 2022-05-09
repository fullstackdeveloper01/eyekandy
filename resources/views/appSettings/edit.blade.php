@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __(''),
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <!--<div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    <img src="{{ asset('argon') }}/img/theme/team-4-800x800.jpg" class="rounded-circle">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-info mr-4">{{ __('Connect') }}</a>
                            <a href="#" class="btn btn-sm btn-default float-right">{{ __('Message') }}</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">{{ __('Friends') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">{{ __('Photos') }}</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">{{ __('Comments') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <h3>
                                {{ auth()->user()->name }}<span class="font-weight-light">, 27</span>
                            </h3>
                            <div class="h5 font-weight-300">
                                <i class="ni location_pin mr-2"></i>{{ __('Bucharest, Romania') }}
                            </div>
                            <div class="h5 mt-4">
                                <i class="ni business_briefcase-24 mr-2"></i>{{ __('Solution Manager - Creative Tim Officer') }}
                            </div>
                            <div>
                                <i class="ni education_hat mr-2"></i>{{ __('University of Computer Science') }}
                            </div>
                            <hr class="my-4" />
                            <p>{{ __('Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music.') }}</p>
                            <a href="#">{{ __('Show more') }}</a>
                        </div>
                    </div>
                </div>
            </div>-->
            <!--<div class="col-xl-8 order-xl-1">-->
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('App Settings') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <!--<h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>-->

                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="pl-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('App Name') }}</label>
                                    <input type="text" name="appname" class="form-control form-control-alternative" placeholder="{{ __('App Name') }}" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('App Version') }}</label>
                                    <input type="text" name="appversion" class="form-control form-control-alternative" placeholder="{{ __('App Version') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Admin Version') }}</label>
                                    <input type="text" name="adminversion" class="form-control form-control-alternative" placeholder="{{ __('Admin version') }}" required>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('App Icon') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="filename" class="form-control form-control-alternative" placeholder="{{ __('No file selected') }}">
                                        <span class="input-group-btn">
                                            <div class="btn btn-default  custom-file-uploader">
                                                <input type="file" onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                                Browse
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">{{ __('Splash Screen') }}</label>
                                    <div class="input-group">
                                        <input type="text" name="filename" class="form-control form-control-alternative" placeholder="{{ __('No file selected') }}">
                                        <span class="input-group-btn">
                                            <div class="btn btn-default  custom-file-uploader">
                                                <input type="file" onchange="this.form.filename.value = this.files.length ? this.files[0].name : ''" />
                                                Browse
                                            </div>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-phone">{{ __('Main Color') }}</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control form-control-alternative" placeholder="{{ __('Main Color') }}" required>
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

        @include('layouts.footers.auth')
    </div>
@endsection
