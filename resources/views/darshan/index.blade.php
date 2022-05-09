@extends('layouts.app', ['title' => __('Darshan')])

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
                                <h3 class="mb-0">{{ __('Darshan') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('darshan.create') }}" class="btn btn-sm btn-primary">{{ __('Add Darshan') }}</a>
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
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Url') }}</th>
                                    <th scope="col">{{ __('Description') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($darshan as $key => $value)
                                    <tr>
                                        <td>{{ $key+1}}</td>
                                        <td>{{ $value->title}}</td>
                                        <td><img src="{{$value->image}}" width="50"height="50" onerror="this.onerror=null;this.style.display='none';"></td>
                                        <td>{{ $value->url }}</td>
                                        <td>{{ $value->description }}</td>
                                        <td class="text-right">
                                            <a href="{{url('darshan/edit').'/'.$value['id']}}" class="dropdown-item">Edit</a>
                                            <form action="{{ url('darshan/destroy',$value['id']) }}" method="post">
                                                @csrf
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        @if(count($darshan))
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $darshan->appends(Request::all())->links() }}
                            </nav>
                        @else
                            <h4>{{ __('You don`t have any gallery') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
