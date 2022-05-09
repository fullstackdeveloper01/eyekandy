@extends('layouts.app', ['title' => __('Top Sub Categories')])

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
                                <h3 class="mb-0">{{ __('Top Sub Categories') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('topsubcategory.create') }}" class="btn btn-sm btn-primary">{{ __('Add top sub category') }}</a>
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
                                    <th scope="col">{{ __('Parent Category') }}</th>
                                    <th scope="col">{{ __('Icon') }}</th>
                                    
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($categories as $key=> $subCategories)
                                    <tr>
                                        <td><a href="{{ route('topsubcategory.edit', $subCategories) }}">{{ $key+1 }}</a></td>
                                        <td>{{ $subCategories->name }}</td>
                                        <td>
                                            <?php
                                                 $parentcategory = DB::table("categories")->select('name')->where('id', '=', $subCategories->parent_id)->first();
                                            ?>
                                            {{$parentcategory->name}}
                                        </td>
                                        <td>
                                            <img width="50px" height="50px" src="{{ asset("uploads/category/{$subCategories->cat_icon}") }}">
                                        </td>
                                        <td class="text-right">
                                            <form action="{{ route('subCategories.destroy', $subCategories) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <!-- <a class="dropdown-item" href="{{ route('topsubcategory.edit', $subCategories) }}">{{ __('Edit') }}</a> -->
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
                        @if(count($categories))
                            <nav class="d-flex justify-content-end" aria-label="...">
                                {{ $categories->appends(Request::all())->links() }}
                            </nav>
                        @else
                            <h4>{{ __('You don`t have any top sub category') }} ...</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
