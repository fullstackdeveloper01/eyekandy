@extends('layouts.app', ['title' => __('Drivers')])

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
                                <h3 class="mb-0">{{ __('Drivers') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('drivers.create') }}" class="btn btn-sm btn-primary">{{ __('Add driver') }}</a>
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
                                    <th scope="col">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Driver Name') }}</th>
                                    <th scope="col">{{ __('Contact No.') }}</th>
                                    <th scope="col">{{ __('Availability') }}</th>
                                    <th scope="col">{{ __('City') }}</th>
                                    <th scope="col">{{ __('Registered By') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                <tr>
                                    <td>
                                        <a class="btn badge badge-success badge-pill" href="{{ route('drivers.show', $driver) }}">#DRI{{ $driver->id }}</a>            
                                    </td>  
                                    <td scope="row" style="white-space: normal;">
                                        <div class="media align-items-center">
                                            <a class="avatar-custom mr-3">
                                                <img class="rounded" alt="..." src="{{ asset($driver->profile_photo) }}">
                                            </a>
                                            <div class="media-body">
                                                <span class="mb-0 text-sm">
                                                    <a href="{{ route('drivers.show', $driver) }}">{{ $driver->full_name }}</a>
                                                </span><br>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="row" style="white-space: normal;">
                                        <span class="mb-0 text-sm">{{ $driver->phone }}</span>
                                    </td>  
                                    <td scope="row" style="white-space: normal;">
                                        @if($driver->status==1)
                                            <div class="blob green"></div>
                                        @else
                                            <div class="blob red"></div>
                                        @endif
                                    </td> 
                                    <td scope="row" style="white-space: normal;">
                                        <span class="mb-0 text-sm">{{ $driver->city_name }}</span>
                                    </td> 
                                    <td scope="row" style="white-space: normal;">
                                        <span class="mb-0 text-sm">{{ $driver->type }}</span><br>
                                    </td>       
                                </tr>
                                {{--
                                <tr>
                                    <td>
                                        <a class="btn badge badge-success badge-pill" href="{{ route('drivers.show', $driver) }}">#DRI025</a>            
                                    </td>  
                                    <td scope="row" style="white-space: normal;">
                                        <div class="media align-items-center">
                                            <a class="avatar-custom mr-3">
                                                <img class="rounded" alt="..." src="https://cdn.storehippo.com/s/60ace0af1e17443a4303bab6/614b2cf198b42b2eed3b0ec3/logo.jpg">
                                            </a>
                                            <div class="media-body">
                                                <span class="mb-0 text-sm">Chandresh Jain</span><br>
                                            </div>
                                        </div>
                                    </td>
                                    <td scope="row" style="white-space: normal;">
                                        <span class="mb-0 text-sm">9009789123</span><br>
                                    </td>  
                                    <td scope="row" style="white-space: normal;">
                                        <div class="blob red"></div>
                                    </td> 
                                    <td scope="row" style="white-space: normal;">
                                        <span class="mb-0 text-sm">Indore</span><br>
                                    </td> 
                                    <td scope="row" style="white-space: normal;">
                                        <span class="mb-0 text-sm">Admin</span><br>
                                    </td>       
                                </tr>
                                --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!--<div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Full Name') }}</th>
                                    <!- <th scope="col">{{ __('Email') }}</th> ->
                                    <th scope="col">{{ __('Mobile') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('ON/OFF') }}</th>
                                    <th scope="col">{{ __('City') }}</th>
                                    <th scope="col">{{ __('Zone Area') }}</th>
                                    <th scope="col">{{ __('Shift') }}</th>
                                    <th scope="col">{{ __('Vehicle Type') }}</th>
                                    <th scope="col">{{ __('PAN Number') }}</th>
                                    <th scope="col">{{ __('Aadhar Number') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($drivers as $driver)
                                    <tr>
                                        <td><a href="{{ route('drivers.show', $driver) }}">{{ $driver->full_name }}</a></td>
                                        <!- <td>
                                            <a href="mailto:{{ $driver->email }}">{{ $driver->email }}</a>
                                        </td> ->
                                        <td>{{ $driver->phone }}</td>
                                        @if($driver->status==1)
                                        <td>Active</td>
                                        @else
                                        <td>Inactive</td>
                                        @endif

                                        @if($driver->active==1)
                                        <td>On</td>
                                        @else
                                        <td>Off</td>
                                        @endif
                                        
                                        <td>{{ $driver->city_name }}</td>
                                        <td>{{ $driver->zone_area }}</td>
                                        <td>{{ $driver->title }}</td>
                                        <td>{{ $driver->vehicle_type }}</td>
                                        <td>{{ $driver->pancard_number }}</td>
                                        <td>{{ $driver->aadhar_card_no }}</td>

                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                        <form action="{{ route('drivers.destroy', $driver) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('drivers.edit', $driver) }}">{{ __('Edit') }}</a>
                                                            <a class="dropdown-item" href="{{ route('drivers.show', $driver) }}">{{ __('View') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to deactivate this user?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Deactivate') }}
                                                            </button>
                                                        </form>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>-->
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $drivers->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
