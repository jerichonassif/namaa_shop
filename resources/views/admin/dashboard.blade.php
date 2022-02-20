{{--@dd($data)--}}
@extends('admin.layout.app')
@section('title', 'dashboard')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

            <div class="row">
                <div class="col-xl-6 col-xxl-12 d-flex">
                    <div class="w-100">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">products</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">{{ $data['productsCount'] }}</h1>
                                        <div class="mb-0">
													<span class="text-danger"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Visitors</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="users"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">14.212</h1>
                                        <div class="mb-0">
													<span class="text-success"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Earnings</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">$21.300</h1>
                                        <div class="mb-0">
													<span class="text-success"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col mt-0">
                                                <h5 class="card-title">Orders</h5>
                                            </div>

                                            <div class="col-auto">
                                                <div class="stat text-primary">
                                                    <i class="align-middle" data-feather="shopping-cart"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <h1 class="mt-1 mb-3">64</h1>
                                        <div class="mb-0">
													<span class="text-danger"> <i
                                                            class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
                                            <span class="text-muted">Since last week</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">


                <div class="col-12 col-lg-8 col-xxl-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Latest Projects</h5>
                            @if(session()->has('delete'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <div>
                                        <strong>{!! session()->get('delete') !!}</strong>
                                    </div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-8 col-xxl-4 d-flex">
                                <a class="btn btn-success btn-lg mx-2" href="{{ route('admin.product.create') }}">Add New Product</a>
                            </div>
                        </div>


                        <table class="table table-hover my-0">
                            <thead>
                            <tr>
                                <th>product title</th>
                                <th class="d-none d-xl-table-cell">Date Created</th>
                                <th class="d-none d-xl-table-cell">Date updated</th>
                                <th>product image</th>
                                <th>product stock</th>
                                <th class="d-none d-md-table-cell">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['products'] as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td class="d-none d-xl-table-cell">{{ $product->created_at }}</td>
                                <td class="d-none d-xl-table-cell">{{ $product->updated_at }}</td>
                                <td><img class="badge bg-success">{{ $product->image }}</td>
                                <td><span class="badge bg-primary">{{ $product->Stock }}</span></td>
                                <td class="d-none d-md-table-cell">
                                    <a class="btn btn-primary" href="{{ route('admin.product.edit',$product->id ) }}">edit</a>

                                    <form class="d-inline" action="{{ route('admin.product.delete', $product->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-danger"  href="{{ route('admin.product.delete', $product->id) }}"
                                           onclick="event.preventDefault();
                                        this.closest('form').submit();">delete</a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>

                        </table>
                        <div class="m-2">

                            {!! $data['products']->links() !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>


@endsection
