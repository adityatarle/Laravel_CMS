@extends('layouts.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-4">
            <div class="card text-light shadow-lg border-light">
                <!-- Card Header -->
                <div class="card-header bg-dark text-light text-center">
                    <h2 class="mb-0">{{ $product->name }}</h2>
                </div>

                <!-- Card Body -->
                <div class="card-body text-dark">
                    

                    @if($product->image)
                    <div class="mb-3">
                            <img src="{{ asset('products/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid" width="500px" height="500px">
                        </div>
                    @endif
                    <p class="card-text mb-3"><strong>Description:</strong> {{ $product->description }}</p>
                </div>

                <!-- Card Footer -->
                <div class="card-footer bg-dark text-light d-flex justify-content-between" style="padding:20px;">
                    @auth
                        <a href="{{ route('product.dashboard') }}" class="btn btn-primary">Back to Products</a>
                    @endauth
                    <a href="{{ url('/') }}" class="btn btn-secondary">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


