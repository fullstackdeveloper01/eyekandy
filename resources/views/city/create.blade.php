@extends('layouts.app', ['title' => __('City Management')])

@section('content')
    @include('city.partials.header', ['title' => __('Add City')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <!--<h3 class="mb-0">{{ __('City Management') }}</h3>-->
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('city.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--<h6 class="heading-small text-muted mb-4">{{ __('City information') }}</h6>-->
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('city.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('state_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="state_id">{{ __('State Name') }}</label>
                                        <select name="state_id" id="state_id" class="form-control form-control-alternative{{ $errors->has('state_id') ? ' is-invalid' : '' }}"  required>
                                            <option>Select State</option>
                                        </select>
                                        @if ($errors->has('state_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('state_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('city_name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="city_name">{{ __('City Name') }}</label>
                                        <input type="text" name="city_name" id="city_name" class="form-control form-control-alternative{{ $errors->has('city_name') ? ' is-invalid' : '' }}" placeholder="{{ __('City Name') }}" value="" required>
                                        @if ($errors->has('city_name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('city_name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                  
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success btn-sm mt-4">{{ __('Save') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $.ajax({
                    url: '/getState',
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.data!=""){
                            var html ='';
                            $.each(response.data,function(key,value){
                                html+='<option value="'+value.id+'">'+value.state_name+'</option>'
                            })
                            $('#state_id').html(html);
                        }else{
                            $('#state_id').html('<option value="">No State Found</option>');
                        }
                    }
                });
            })
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection
