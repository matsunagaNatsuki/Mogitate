@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">商品一覧</h1>
        <a href="{{ route('products.register') }}" class="btn btn-primary mb-3">商品を追加</a>
        <form action="{{ route('products.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="商品を検索" value="{{ request()->input('search') }}">
                <button type="submit" class="btn btn-outline-primary">検索</button>
            </div>
        </form>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <a href="{{ route('products.show', $product->id) }}" class="text-decoration-none text-dark">
                    <div class="card">
                        <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ $product->price }} yen</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->appends(request()->query())->links() }}
        </div>
    </div>
@endsection
