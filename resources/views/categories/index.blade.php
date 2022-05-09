@extends('layouts.app', ['title' => __('Categories')])

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
                                <h3 class="mb-0">{{ __('Categories') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">{{ __('Add category') }}</a>
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
                                    <th scope="col">{{ __('Name') }}</th>
                                    <th scope="col">{{ __('Icon') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $key => $categories)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $categories->name }}</td>
                                        <td>
                                            <img width="50px" height="50px" src="{{ asset("uploads/category/{$categories->cat_icon}") }}">
                                        </td>
                                        <td class="text-right">
                                            <a class="dropdown-item" href="{{ route('categories.edit', $categories) }}">{{ __('Edit') }}</a>
                                            <form action="{{ route('categories.destroy', $categories) }}" method="post">
                                                @csrf
                                                @method('delete')

                                                <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this category?") }}') ? this.parentElement.submit() : ''">
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
                        @if(count($category))
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $category->appends(Request::all())->links() }}
                            </nav>
                        @else
                            <h4>{{ __('You don`t have any category') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
