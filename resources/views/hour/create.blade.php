@extends('layouts.app', ['title' => __('Hours Management')])

@section('content')
    @include('hour.partials.header', ['title' => __('Add Hours')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <!--<h3 class="mb-0">{{ __('Hours Management') }}</h3>-->
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('hour.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--<h6 class="heading-small text-muted mb-4">{{ __('Hours information') }}</h6>-->
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('hour.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('time') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="time">{{ __('Time') }}</label>
                                        <input type="time" name="time" id="time" class="form-control form-control-alternative{{ $errors->has('time') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Time') }}" required>
                                        @if ($errors->has('time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('time') }}</strong>
                                            </span>
                                        @endif
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
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
