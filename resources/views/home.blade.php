@extends('home.layout')

@section('content')
<div class="container">


    <!-- Banner Slider -->
    <div id="bannerCarousel" class="carousel slide mb-4" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            @foreach($banners as $index => $banner)
            <li data-target="#bannerCarousel" data-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <div class="slide" style="background-image: url('{{ asset('images/' . $banner->image) }}'); background-size: cover; background-position: center;"></div>
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="display-4">{{ $banner->title }}</h5>
                    <p class="lead">{{ $banner->description }}</p>
                </div>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#bannerCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#bannerCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



    <!-- Hero Section -->
    <div class="hero-section text-center py-5 mb-4" style="background-color: #f8f9fa;">
        <h1 class="display-4 font-weight-bold">Welcome to Our Latest Posts</h1>
        <p class="lead mt-3">Explore our most recent updates, insights, and trends. Stay informed and inspired with our latest content.</p>
        <a href="#newsSection" class="btn btn-primary btn-lg mt-3">Explore Now</a>
    </div>



    <!-- News-Style Product Grid -->
    <div id="newsSection" class="row justify-content-center mt-4">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm hover-shadow">
                @if($product->image)
                <div class="card-img-top" style="background-image: url('{{ asset('products/' . $product->image) }}'); height: 200px; background-size: cover; background-position: center;"></div>
                @else
                <div class="card-img-top" style="background-image: url('https://picsum.photos/400/200?random={{ $loop->iteration }}'); height: 200px; background-size: cover; background-position: center;"></div>
                @endif
                <div class="card-body">
                    <h3 class="card-title font-weight-bold">{{ $product->heading }}</h3>
                    <p class="text-muted small">Posted on {{ $product->created_at->format('F j, Y') }}</p>
                    <p class="card-text">{{ Str::limit($product->description, 150, '...') }}</p>
                    <a href="product/{{ $product->id }}/show" class="btn btn-primary mt-2">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Contact Section -->
    <!-- Contact Section -->
    <div id="contactSection" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Contact Us</h2>
            <div class="row">
                <div class="col-md-6 mb-4">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
                <div class="col-md-6 mb-4">
                    <h4><i class="fas fa-map-marker-alt icon"></i>Our Address</h4>
                    <p>123 Main Street<br>City, Country, 12345</p>
                    <h4><i class="fas fa-phone icon"></i>Phone</h4>
                    <p>(+123) 456-7890</p>
                    <h4><i class="fas fa-envelope icon"></i>Email</h4>
                    <p>contact@website.com</p>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Add some custom CSS to enhance the appearance -->
<style>
    .hero-section {
        background: linear-gradient(to right, rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://picsum.photos/1200/600?random=4');
        background-size: cover;
        color: white;
    }

    .carousel-inner .carousel-item {
        height: 400px;
    }

    .card-img-top {
        border-radius: 0.5rem;
        overflow: hidden;
    }

    .hover-shadow:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        transition: box-shadow 0.3s ease;
    }
</style>
@endsection