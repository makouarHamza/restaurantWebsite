@extends('main')
@section('menu_items')
    @if (session('cart_message'))
        <div style="background-color: lightgreen; color: black">
            {{-- <i class="bi bi-check-circle-fill me-2"></i> --}} {{ session('cart_message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        @foreach ($foods as $food)
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
                                    <input type="number" class="form-control" id="quantity" name="quantity" value="1"
                                        min="1" style="background-color: rgba(255, 255, 255, 0.1); color: white;">
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
    
    @endforeach
@endsection
