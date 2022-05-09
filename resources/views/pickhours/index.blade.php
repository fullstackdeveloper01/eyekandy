@extends('layouts.app', ['title' => __('PickHours')])

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
                                <h3 class="mb-0">{{ __('PickHours') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('pickhours.create') }}" class="btn btn-sm btn-primary">{{ __('Add Pick Hours') }}</a>
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
                                    <th scope="col">{{ __('Package') }}</th>
                                    <th scope="col">{{ __('From time') }}</th>
                                    <th scope="col">{{ __('To time') }}</th>
                                    <th scope="col">{{ __('Delivery Price') }}</th>
                                    <th scope="col">{{ __('Minimum Compulsary Time') }}</th>
                                    <th scope="col" class="text-right">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pickhours as $pickhour)
                                <?php //print_r($pickhour);die;?>
                                    <tr>
                                        <td><a href="{{route('pickhours.edit',$pickhour)}}">{{ $pickhour->title }}</a></td>
                                        <td>{{ $pickhour->package_name }}</td>
                                        <td>{{ $pickhour->from_time }}</td>
                                        <td>{{ $pickhour->to_time }}</td>
                                        @if($pickhour->package==1)
                                        <td>@money( $pickhour->delivery_price, env('CASHIER_CURRENCY','INR'),true)/ Per Km.</td>
                                        @else
                                            <td>@money( $pickhour->delivery_price, env('CASHIER_CURRENCY','INR'),true)</td>
                                        @endif
                                        <!-- <td>{{ $pickhour->created_at->format('d/m/Y H:i') }}</td> -->
                                        <td>{{$pickhour->minimum_compulsary_time}}</td>
                                        <td class="text-right">
                                            <!-- <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow"> -->

                                                        <form action="{{ route('pickhours.destroy', $pickhour) }}" method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <a class="dropdown-item" href="{{ route('pickhours.edit', $pickhour) }}">{{ __('Edit') }}</a>
                                                            <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this?") }}') ? this.parentElement.submit() : ''">
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
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $pickhours->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
