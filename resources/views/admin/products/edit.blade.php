{{--@dd($data)--}}
@extends('admin.layout.app')
@section('title', 'create product')
@section('content')
    <main class="content">
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3"><strong>edit product name : {{ $data['product']->title }}</strong></h1>
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div>
                                    <strong>{!! session()->get('success') !!}</strong>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form action="{{ route('admin.product.update',$data['product']->id ) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="title">title</label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ $data['product']->title }}">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="description">description</label>
                                <textarea id="description" name="description" class="form-control" rows="10">{{ $data['product']->description }}</textarea>
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="Stock">Stock</label>
                                <input type="number" id="Stock" name="Stock" class="form-control" value="{{ $data['product']->Stock }}">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="image">image</label>
                                <input type="file" id="image" name="image" class="form-control" value="{{ $data['product']->image }}">
                            </div>
                            <div class="input-group mb-3">
                                <a class="btn btn-secondary btn-lg mx-2" href="{{ route('dashboard') }}">back</a>
                                <input type="submit" class="btn btn-primary btn-lg" value="edit product">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
