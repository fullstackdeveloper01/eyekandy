@extends('layouts.app', ['title' => __('City')])

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
                                <h3 class="mb-0">{{ __('Status') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('status.create') }}" class="btn btn-sm btn-primary">{{ __('Add Status') }}</a>
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
                                    <th scope="col">{{ __('Status Name') }}</th>
                                    <th scope="col">{{ __('Status Alias') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($status as $value)
                                    <tr>
                                        <td><a href="{{ route('status.edit', $value) }}">{{ $value->name }}</a></td>
                                         
                                        <td>{{ $value->alias }}</td>
                                        <td class="text-right">
                                            <!-- <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> -->

                                                        <form action="{{ route('status.destroy', $value) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('status.edit', $value) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this status?") }}') ? this.parentElement.submit() : ''">
                                                                {{ __('Delete') }}
                                                            </button>
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
                        @if(count($status))
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $status->appends(Request::all())->links() }}
                        </nav>
                        @else
                            <h4>{{ __('You don`t have any status') }} ...</h4>
                        @endif
                    </div>
                    <!-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $status->links() }}
                        </nav>
                    </div> -->
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
