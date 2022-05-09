@extends('layouts.app', ['title' => __('Darshan Management')])

@section('content')
    
    @include('darshan.partials.header', ['title' => isset($darshan) && empty($darshan)?__('Add Darshan'):__('Edit Darshan')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Darshan Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('darshan.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Darshan information') }}</h6>
                        <div class="pl-lg-4">
                            @if(isset($darshan)&& !empty($darshan))
                            <form method="post" action="{{ url('darshan/update',$darshan->id) }}" autocomplete="off" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="{{$darshan->id}}">
                            @else
                            <form method="post" action="{{ route('darshan.store') }}" autocomplete="off" enctype="multipart/form-data">
                            @endif
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Title</label>
                                            <input type="text" name="title" required="" value="{{isset($darshan) && !empty($darshan)?$darshan->title:''}}" class="form-control" placeholder="Enter Title">
                                            @if ($errors->has('title'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-6">
                                            <div class="typephoto">                                                
                                                <label>Photo</label>
                                                <input type="file" id="image" name="image" class="form-control">
                                            </div>
                                            @if(isset($darshan) && !empty($darshan))
                                                <img src="{{url($darshan->image)}}" width="50"height="50" onerror="this.onerror=null;this.style.display='none';">
                                            @endif
                                        </div>
                                        <div class="form-group col-12">
                                            <div class="typephoto">                                                
                                                <label>Url</label>
                                                <input type="url" id="url" name="url" value="{{isset($darshan) && !empty($darshan)?$darshan->url:''}}" class="form-control" placeholder="Enter Youtube Url">
                                            </div>
                                        </div>
                                        <div class="form-group col-12">
                                            <div class="typephoto">                                                
                                                <label>Desscription</label>
                                                <textarea class="form-control" name="description" placeholder="Enter Description">{{isset($darshan->description) && !empty($darshan->description)?$darshan->description:''}}</textarea>
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
    <script type="text/javascript">
        // function setImageType(type)
        // {
        //     if(type == 'Photo')
        //     {
        //         $('.typephoto').css('display','block');
        //         $('.typeurl').css('display','none');
        //         $('#photo_video').attr('required');
        //         $('#photo_video_url').removeAttr('required');
        //     }
        //     else
        //     {
        //         $('.typephoto').css('display','none');
        //         $('.typeurl').css('display','block');
        //         $('#photo_video_url').attr('required');
        //         $('#photo_video').removeAttr('required');
        //     }
        // }
    </script>
@endsection
