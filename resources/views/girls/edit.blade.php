@extends('layouts.app', ['title' => __('Girls Management')])

@section('content')
    @include('girls.partials.header', ['title' => __('Edit Girls')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Girls Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('girls.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('girls.update', $girl) }}" autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <hr />
                                <h6 class="heading-small text-muted mb-4">{{ __('City information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                    <div class="col-md-6 form-group{{ $errors->has('full_name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="full_name">{{ __('Full Name') }}</label>
                                            <input type="text" name="full_name" value="{{$girl->full_name}}" id="full_name" class="form-control form-control-alternative{{ $errors->has('full_name') ? ' is-invalid' : '' }}" placeholder="{{ __('Enter Full Name') }}" value="" required>
                                            @if ($errors->has('full_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('full_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-6 form-group{{ $errors->has('image') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="image">{{ __('Image') }}</label>
                                            <input type="file" name="image[]" multiple id="image" class="form-control form-control-alternative{{ $errors->has('image') ? ' is-invalid' : '' }}" >
                                            @if ($errors->has('image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                            @endif
                                            @if ($errors->has('old_image'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ 'Not Updated With Empty Image' }}</strong>
                                                </span>
                                            @endif
                                            @php
                                                $images = explode(',',$girl->image);
                                            @endphp
                                            @foreach($images as $image)
                                            <div class="img-wrapper" style="position: relative;width: 130px;height: 130px;padding: 14px;border: 1px solid #eee;background-color: #fff;
                                            ">
                                                <img src="{{url('uploads/girls').'/'.$image}}" onerror="this.onerror=null;this.style.display='none';"style="width: 100%;height: 100%;">
                                                <i class="fa fa-times removeImg"  style="position: absolute;right: 0px;top: 0px;cursor: pointer;"></i>
                                                <input type="hidden" name="old_image[]" value="{{$image}}">
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="col-md-4 form-group{{ $errors->has('country_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="country_id">{{ __('Country Name') }}</label>
                                            <select name="country_id" id="country_id" class="form-control form-control-alternative{{ $errors->has('country_id') ? ' is-invalid' : '' }}"  required>
                                                <option value="">Select Country</option>
                                            </select>
                                            @if ($errors->has('country_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('country_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group{{ $errors->has('state_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="state_id">{{ __('State Name') }}</label>
                                            <select name="state_id" id="state_id" class="form-control form-control-alternative{{ $errors->has('state_id') ? ' is-invalid' : '' }}"  required>
                                                <option value="">Select State</option>
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('state_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4 form-group{{ $errors->has('city_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="city_id">{{ __('City Name') }}</label>
                                            <select name="city_id" id="city_id" class="form-control form-control-alternative{{ $errors->has('city_id') ? ' is-invalid' : '' }}"  required>
                                                <option value="">Select State</option>
                                            </select>
                                            @if ($errors->has('city_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('city_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <label class="form-control-label" for="city_id">{{ __('Available On') }}</label><br>
                                            <label class="checkbox-inline mr-4">
                                                <input type="checkbox" name="mon" value="1" {{($girl->mon ==1)?'checked':''}}> Monday
                                            </label>
                                            <label class="checkbox-inline mr-4">
                                                <input type="checkbox" name="tue" value="1" {{($girl->tue ==1)?'checked':''}}> Tuesday
                                            </label>
                                            <label class="checkbox-inline mr-4">
                                                <input type="checkbox" name="wed" value="1" {{($girl->wed ==1)?'checked':''}}> Wednesday
                                            </label>
                                            <label class="checkbox-inline mr-4">
                                                <input type="checkbox" name="thu" value="1" {{($girl->thu ==1)?'checked':''}}> thursday
                                            </label>
                                            <label class="checkbox-inline mr-4">
                                                <input type="checkbox" name="fri" value="1" {{($girl->fri ==1)?'checked':''}}> Friday
                                            </label>
                                            <label class="checkbox-inline mr-4">
                                                <input type="checkbox" name="sat" value="1" {{($girl->sat ==1)?'checked':''}}> Saturday
                                            </label>
                                            <label class="checkbox-inline">
                                                <input type="checkbox" name="sun" value="1" {{($girl->sun ==1)?'checked':''}}> Sunday
                                            </label>
                                        </div>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                var country='<?=$girl->country_id?>';
                var state='<?=$girl->state_id?>';
                var city='<?=$girl->city_id?>';

                $.ajax({
                    url: '/getCountry',
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.data!=""){
                            
                            var html ='<option value="">Select Country</option>';
                            $.each(response.data,function(key,value){
                                if (country == value.id) {
                                    html+='<option value="'+value.id+'" selected >'+value.country_name+'</option>'         
                                }else{
                                    html+='<option value="'+value.id+'" >'+value.country_name+'</option>'
                                }
                            })
                            $('#country_id').html(html);
                        }else{
                            $('#country_id').html('<option value="">No Country Found</option>');
                        }
                    }
                });
                // // this is for state
                $.ajax({
                    url: '/getState/'+country,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.data!=""){
                            var html ='<option value="">Select state</option>';
                            $.each(response.data,function(key,value){
                                if (state == value.id) {
                                    html+='<option value="'+value.id+'" selected>'+value.state_name+'</option>'
                                }else{
                                    html+='<option value="'+value.id+'">'+value.state_name+'</option>'
                                }
                            })
                            $('#state_id').html(html);
                        }else{
                            $('#state_id').html('<option value="">No State Found</option>');
                        }
                    }
                });  
                // // this is for city
                $.ajax({
                    url: '/getCity/'+state,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.data!=""){
                            var html ='<option value="">Select City</option>';
                            $.each(response.data,function(key,value){
                                if (city == value.id) {
                                    html+='<option value="'+value.id+'" selected>'+value.city_name+'</option>'
                                }else{
                                    html+='<option value="'+value.id+'">'+value.city_name+'</option>'
                                }
                            })
                            $('#city_id').html(html);
                        }else{
                            $('#city_id').html('<option value="">No City Found</option>');
                        }
                    }
                });          
            })
            $(document).on('change','#country_id',function(){
                let id = $(this).val();
                $.ajax({
                    url: '/getState/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.data!=""){
                            var html ='<option value="">Select state</option>';
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
            $(document).on('change','#state_id',function(){
                let id = $(this).val();
                $.ajax({
                    url: '/getCity/'+id,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.data!=""){
                            var html ='<option value="">Select City</option>';
                            $.each(response.data,function(key,value){
                                html+='<option value="'+value.id+'">'+value.city_name+'</option>'
                            })
                            $('#city_id').html(html);
                        }else{
                            $('#city_id').html('<option value="">No City Found</option>');
                        }
                    }
                }); 
            })
            $(document).on('click','.removeImg',function(){
                $(this).closest('.img-wrapper').remove();
            })
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection
