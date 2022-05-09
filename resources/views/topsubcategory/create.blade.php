@extends('layouts.app', ['name' => __('Top Sub Category Management')])

@section('content')
    @include('subCategories.partials.header', ['name' => __('Add Category')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Top Sub Category Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('topsubcategory.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h6 class="heading-small text-muted mb-4">{{ __('Top Sub Category information') }}</h6>
                        <div class="pl-lg-4">
                            <form method="post" action="{{ route('topsubcategory.store') }}" autocomplete="off">
                                @csrf
                                </div>
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('parent_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="parent_id">{{ __('Category Name') }}</label>
                                        <select name="parent_id" id="parent_id" class="form-control form-control-alternative{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" required>
                                            <option value=""> -- </option>
                                        @foreach($categoryList as $res)
                                            <option value="{{$res->id}}">{{$res->name}}</option>
                                        @endforeach
                                        
                                        @if ($errors->has('parent_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('parent_id') }}</strong>
                                            </span>
                                        @endif
                                        </select>
                                    </div>
                                    <div class="form-group{{ $errors->has('topsubcategoryid') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="topsubcategoryid">{{ __('Sub Category Name') }}</label>
                                        <select multiple name="topsubcategoryid[]" id="topsubcategoryid" class="form-control form-control-alternative{{ $errors->has('parent_id') ? ' is-invalid' : '' }}" required>
                                            <option value=""> -- </option>
                                        
                                        @if ($errors->has('topsubcategoryid'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('topsubcategoryid') }}</strong>
                                            </span>
                                        @endif
                                        </select>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>

@endsection

