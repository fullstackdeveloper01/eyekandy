@extends('layouts.app', ['title' => __('Requested Advertisement')])

@section('content')
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    </div>
@php
//echo "<pre>";print_r($advertisements->toarray());die;
@endphp
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Requested Advertisement') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <!-- <a href="{{--route('advertisement.create')--}}" class="btn btn-sm btn-primary">{{ __('Add Advertisement') }}</a> -->
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
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Email') }}</th>
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Start Date') }}</th>
                                    <th scope="col">{{ __('End Date') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisements as $key => $advertisement)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$advertisement->name}}</td>
                                        <td>{{$advertisement->email}}</td>
                                        <td>{{ $advertisement->title }}</td>
                                        <td><a href="{{ asset("{$advertisement->thumbnail}") }}" target="_blank" >
                                            <img width="50px" alt="{{ $advertisement->thumbnail }}" height="50px" src="{{ asset("{$advertisement->thumbnail}") }}"></a>
                                        </td>
                                        <td>{{ date('d-m-Y',($advertisement->start_date)) }}</td>
                                        <td>{{ date('d-m-Y',($advertisement->end_date)) }}</td>
                                        @if($advertisement->approve==1)
                                        <td>Approve</td>
                                        @else
                                        <td>Pending</td>
                                        @endif
                                        <td class="text-right">
                                            @if($advertisement->approve==0)
                                            <a href="{{route('advertisement.approve_request',[$advertisement->id])}}" onclick="return confirm('Are you sure you want to approve this advertisement')">Approve</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        @if(count($advertisements))
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $advertisements->appends(Request::all())->links() }}
                            </nav>
                        @else
                            <h4>{{ __('You don`t have any advertisement') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
