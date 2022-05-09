@extends('layouts.app', ['title' => __('Girls')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Girls List') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('girls.create') }}" class="btn btn-sm btn-primary">{{ __('Add Girls') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('S.No') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Full Name') }}</th>
                                    <th scope="col">{{ __('Country') }}</th>
                                    <th scope="col">{{ __('State') }}</th>
                                    <th scope="col">{{ __('City') }}</th>
                                    <th scope="col">{{ __('Top Rated') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <th scope="col" class="">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($girls as $key=> $girl)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>
                                            @php
                                                $images = explode(',',$girl->image);
                                            @endphp
                                            <img src="{{url('uploads/girls').'/'.$images[0]}}"  onerror="this.onerror=null;this.style.display='none';" width="100" height="100">
                                        </td>
                                        <td>{{ $girl->full_name }}</td>
                                        <td>{{ App\Helpers\Helper::countryName($girl->country_id) }}</td>
                                        <td>{{ App\Helpers\Helper::stateName($girl->state_id) }}</td>
                                        <td>{{ App\Helpers\Helper::cityName($girl->city_id) }}</td>
                                        <td>
                                            @if($girl->rated==1)
                                            <a href="javascript:void(0)" class="btn btn-danger toggle btn-sm" data-id="{{$girl->id}}"data-data="0"><i class="fa fa-toggle-off" aria-hidden="true"></i></a>
                                            @else
                                            <a href="javascript:void(0)" class="btn btn-success toggle btn-sm" data-id="{{$girl->id}}"data-data="1"><i class="fa fa-toggle-on" aria-hidden="true"></i></a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($girl->active==1)
                                                Active
                                            @else
                                                Inactive
                                            @endif
                                        </td>
                                        
                                        <td>{{ $girl->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right v-align-text-bottom">
                                            <div class="d-flex align-items-center ">
                                                <a class="btn btn-info btn-sm" href="{{ route('girls.show', $girl) }}">{{ __('View') }}</a>        
                                                <a class="btn btn-warning btn-sm" href="{{ route('girls.edit', $girl) }}">{{ __('Edit') }}</a>        
                                                <form action="{{ route('girls.destroy', $girl) }}" method="post" class="mr-2">
                                                    @csrf
                                                    @method('delete')
                                                    @if($girl->active==1)
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to deactivate this FAQ?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Inactivate') }}
                                                    </button>
                                                    @else
                                                    <button type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to activate this FAQ?") }}') ? this.parentElement.submit() : ''">
                                                        {{ __('Activate') }}
                                                    </button>
                                                    @endif
                                                </form>
                                                <a class="btn btn-danger btn-sm" href="{{ route('girls.delete', $girl) }}">{{ __('Delete') }}</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $girls->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).on('click','.toggle',function(){
                var event = $(this);
                let id = $(this).attr('data-id');
                let data = $(this).attr('data-data');
                $.ajax({
                    url: 'toprated/'+id+'/'+data,
                    type: 'get',
                    dataType: 'json',
                    success: function(response){
                        if(response.status == true){
                            if (data == 1) {
                                event.attr('data-data','0');
                                event.addClass('btn-danger');
                                event.removeClass('btn-success');
                                event.children('i').addClass('fa-toggle-off')
                                event.children('i').removeClass('fa-toggle-on')
                            }else{
                                event.attr('data-data','1');
                                event.addClass('btn-success');
                                event.removeClass('btn-danger');
                                event.children('i').addClass('fa-toggle-on')
                                event.children('i').removeClass('fa-toggle-off')
                            }
                        }
                    }
                }); 
            })
            
        </script>
        @include('layouts.footers.auth')
    </div>
@endsection
