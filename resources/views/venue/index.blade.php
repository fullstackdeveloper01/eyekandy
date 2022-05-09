@extends('layouts.app', ['title' => __('Venue')])

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
                                <h3 class="mb-0">{{ __('Venue List') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('venue.create') }}" class="btn btn-sm btn-primary">{{ __('Add Venue') }}</a>
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
                                    <th scope="col">{{ __("Venue") }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Created Date') }}</th>
                                    <th scope="col" class="">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($venue as $key=> $venues)
                                    <tr>
                                    <td>{{$key+1}}</td>
                                        <td>{{$venues->type}}</td>
                                        @if($venues->active==1)
                                        <td>Active</td>
                                        @else
                                        <td>Inactive</td>
                                        @endif
                                        <td>{{ $venues->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right d-flex align-items-center">
                                            <!-- <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> -->
                                                <a class="btn btn-warning btn-sm" href="{{ route('venue.edit', $venues) }}">{{ __('Edit') }}</a>
                                                        <form action="{{ route('venue.destroy', $venues) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            
                                                            @if($venues->active==1)
                                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirm('{{ __("Are you sure you want to deactivate this city?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Inactivate') }}
                                                            </button>
                                                            @else
                                                            <button type="button" class="btn btn-success btn-sm" onclick="confirm('{{ __("Are you sure you want to activate this city?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Activate') }}
                                                            </button>
                                                            @endif
                                                        </form>

                                                <!-- </div>
                                            </div> -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $venue->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
