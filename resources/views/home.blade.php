@extends('main')
@section('menu_items')
    @if (session('cart_message'))
        <div style="background-color: lightgreen; color: black">
            {{-- <i class="bi bi-check-circle-fill me-2"></i> --}} {{ session('cart_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @forelse ($foods as $food)
            <div class="col-md-4 mb-4">

                <div class="card bg-transparent border h-100 shadow-sm">
                    <div style="height: 250px; overflow: hidden;">
                        <img src="{{ asset('food_img/' . $food->food_image) }}" alt="Image of {{ $food->food_name }}"
                            class="card-img-top img-fluid" style="object-fit: cover; width: 100%; height: 100%;">
                    </div>

                    <div class="card-body d-flex flex-column text-center">
                        <div class="mb-3">
                            <span class="badge rounded-pill bg-primary fs-5 p-2">
                                {{ $food->food_price }} DH
                            </span>
                        </div>

                        <h4 class="card-title text-capitalize fw-bold">{{ $food->food_name }}</h4>

                        <p class="card-text text-white opacity-75 mt-2">
                            {{ Str::limit($food->food_details, 100) }}
                        </p>

                        <div class="mt-auto pt-3">
                            <form action="{{ route('addtocart') }}" method="post">
                                @csrf
                                <input type="hidden" name="food_id" value="{{ $food->id }}">
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="1" min="1"
                                        style="background-color: rgba(255, 255, 255, 0.1); color: white;">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    <i class="fas fa-shopping-cart"></i>
                                    Add to Cart
                                </button>
                            </form>
                            {{-- <a href="#" class="btn btn-outline-light btn-sm">View Details</a> --}}
                        </div>
                    </div>
                </div>
            </div>
        @empty
            {{-- This displays if the $foods collection is empty --}}
            <div class="col-12 my-5">
                <div class="text-center p-5 border rounded bg-light shadow-sm">
                    <div class="mb-3">
                        <i class="fas fa-utensils fa-3x text-muted"></i>
                    </div>
                    <h3 class="text-secondary">No food options available</h3>
                    <p class="text-muted">We couldn't find any dishes right now. Please check back later!</p>
                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Refresh Menu</a>
                </div>
            </div>
        @endforelse
@endsection

    @section('gallery')
        <div id="gallary" class="text-center bg-dark text-light has-height-md middle-items wow fadeIn">
            <h2 class="section-title">OUR Gallary</h2>
        </div>
        <div class="gallary row">
            @forelse($foods as $item) {{-- Assuming your variable is $galleryItems --}}
                <div class="col-sm-6 col-lg-3 gallary-item wow fadeIn">
                    <img src="{{ asset('food_img/' . $item->food_image) }}" alt="Gallery Image" class="gallary-img w-100 h-100">
                    <div class="gallary-overlay">
                        <div class="gallary-info">
                            <h5 class="text-white text-capitalize mb-0">{{ $item->food_name }}</h5>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 wow fadeIn">
                    <div class="text-center p-5 my-3 rounded"
                        style="border: 2px dashed rgba(255,255,255,0.2); background: rgba(255,255,255,0.05);">
                        <div class="mb-3">
                            <i class="ti-image" style="font-size: 3rem; color: rgba(255,255,255,0.3);"></i>
                        </div>
                        <h5 class="text-white">Our Gallery is Growing</h5>
                        <p class="text-muted">New photos of our delicious dishes are coming soon!</p>
                    </div>
                </div>
            @endforelse
    @endsection