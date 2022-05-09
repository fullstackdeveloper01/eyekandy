@extends('layouts.app', ['title' => __('Advertisement')])

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
                                <h3 class="mb-0">{{ __('Advertisement') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('advertisement.create') }}" class="btn btn-sm btn-primary">{{ __('Add Advertisement') }}</a>
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
                                    <th scope="col">{{ __('Title') }}</th>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advertisements as $advertisement)
                                    <tr>
                                        <td><a href="{{ route('advertisement.edit', $advertisement) }}">{{ $advertisement->title }}</a></td>
                                        <td><a href="{{ url("$advertisement->thumbnail") }}" target="_blank"><img width="50px" alt="{{ $advertisement->thumbnail }}" height="50px" src="{{ url("$advertisement->thumbnail") }}"></a>
                                        </td>
                                        @if($advertisement->status==1)
                                        <td>Active</td>
                                        @else
                                        <td>Inactive</td>
                                        @endif
                                        <td class="text-right">
                                            <form action="{{ route('advertisement.destroy', $advertisement) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                @if($advertisement->created_by=='admin')
                                                <a class="dropdown-item" href="{{ route('advertisement.edit', $advertisement) }}">{{ __('Edit') }}</a>
                                                @endif
                                                @if($advertisement->status==1)
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to deactivate this advertisement?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Deactivate') }}
                                                </button>
                                                @else
                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to activate this advertisement?") }}') ? this.parentElement.submit() : ''">
                                                    {{ __('Activate') }}
                                                </button>
                                                @endif
                                            </form>
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
