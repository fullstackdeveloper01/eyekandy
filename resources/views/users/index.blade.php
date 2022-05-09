@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Users List') }}</h3>
                            </div>
                            {{--
                            <div class="col-4 text-right">
                                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                            </div>
                            --}}
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
                        <table class="table align-items-center table-flush shyamtrusttable" id="shyamtrusttable">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('created Date') }}</th> 
                                    <th scope="col">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    @if($user->id > 1)
                                        <tr>
                                            <td><a class="btn badge badge-success badge-pill" href="javascript:void(0){{--route('users.show', $user)--}}">#EK{{ $user->id }}</a></td>
                                            <td>{{ $user->name }}</td>
                                            <td>
                                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                            </td>
                                            <td>
                                                @if($user->active==1)
                                                {{'Active'}}
                                                @else
                                                {{'Inactive'}}
                                                @endif
                                            </td>
                                            <td>{{date('Y-m-d',strtotime($user->created_at))}}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm" href="{{ route('user.show', $user) }}">{{ __('View Details') }}</a>
                                                @if($user->active==1)
                                                <a href="{{route('user.inactive',[$user->id,0])}}" class="btn btn-danger btn-sm">Inactive</a>
                                                @else
                                                <a href="{{route('user.active',[$user->id,1])}}" class="btn btn-success btn-sm">Active</a>
                                                @endif
                                                
                                                
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection