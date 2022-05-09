@extends('layouts.app', ['title' => __('Vehicle')])

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
                                <h3 class="mb-0">{{ __('Vehicle') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('vehicle.create') }}" class="btn btn-sm btn-primary">{{ __('Add Vehicle') }}</a>
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
                                    <th scope="col">{{ __('Vehicle') }}</th>
                                 
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($vehicles as $vehicle)
                                    <tr>
                                        <td><a href="{{ route('vehicle.edit', $vehicle) }}">{{ $vehicle->name }}</a></td>
                                       
                                        @if($vehicle->active==1)
                                        <td>Active</td>
                                        @else
                                        <td>Inactive</td>
                                        @endif
                                        <td class="text-right">
                                            <!-- <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> -->

                                                        <form action="{{ route('vehicle.destroy', $vehicle) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('vehicle.edit', $vehicle) }}">{{ __('Edit') }}</a>
                                                          
                                                            @if($vehicle->active==1)
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to deactivate this vehicle?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Deactivate') }}
                                                            </button>
                                                            @else
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to activate this vehicle?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Activate') }}
                                                            </button>
                                                            @endif
                                                        </form>
<!-- 
                                                </div>
                                            </div> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $vehicles->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
