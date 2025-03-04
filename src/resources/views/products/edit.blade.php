@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit and View Product</h1>

        <div class="card mb-4">
            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ $product->price }} yen</p>
                <p class="card-text">{{ $product->description }}</p>
            </div>
        </div>

        <form action="{{ route('products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            @include('products._form')
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
