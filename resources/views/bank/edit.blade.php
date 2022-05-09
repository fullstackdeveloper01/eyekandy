@extends('layouts.app', ['title' => __('Bank Management')])

@section('content')
    @include('bank.partials.header', ['title' => __('Edit Bank')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Bank Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('bank.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                            <div class="pl-lg-4">
                                <form method="post" action="{{ route('bank.update', $bank) }}" autocomplete="off">
                                    @csrf
                                    @method('put')
                                <!--<div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>-->

                                <!-- </div> -->


                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('Bank information') }}</h6>
                                <div class="pl-lg-4">


                                    <div class="form-group{{ $errors->has('bank_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Bank Name') }}</label>
                                        <input type="text" name="bank_name" id="input-name" class="form-control form-control-alternative{{ $errors->has('bank_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Bank Name') }}" value="{{ old('bank_name', $bank->bank_name) }}" >
                                        @if ($errors->has('bank_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('bank_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('bank_status') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Bank Status') }}</label>
                                        <select name="bank_status" id="bank_status" class="form-control form-control-alternative{{ $errors->has('bank_status') ? ' is-invalid' : '' }}" required value="{{ old('bank_status', $bank->active) }}">
                                            <option value="1" @if($bank->active==1) selected @endif>Active</option>
                                            <option value="0" @if($bank->active==0) selected @endif>Inactive</option>
                                        </select>
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

        @include('layouts.footers.auth')
    </div>
@endsection
