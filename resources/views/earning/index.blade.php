@extends('layouts.app', ['title' => __('Earning')])

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
                                <h3 class="mb-0">{{ __('Earning') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('earning.create') }}" class="btn btn-sm btn-primary">{{ __('Add Earning') }}</a>
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
                                    <th scope="col">{{ __('Earning Title') }}</th>
                                    <th scope="col">{{ __('Kilometre') }}</th>
                                    <th scope="col">{{ __('Start Time') }}</th>
                                    <th scope="col">{{ __('End Time') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($earnings as $earning)
                                    <tr>
                                        <td><a href="{{ route('earning.edit', $earning) }}">{{ $earning->title }}</a></td>
                                        <td>{{ $earning->distance_km }}</td>
                                        <td>{{ $earning->from_hours }}</td>
                                        <td>{{ $earning->to_hours }}</td>
                                        <td>{{ $earning->price }}</td>
                                        <td class="text-right">
                                            <form action="{{ route('earning.destroy', $earning) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="dropdown-item" href="{{ route('earning.edit', $earning) }}">{{ __('Edit') }}</a>
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this earning?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Deactivate') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $earnings->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
