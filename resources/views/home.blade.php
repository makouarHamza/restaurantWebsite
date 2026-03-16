@extends('main')
@section('menu_items')
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
                        <a href="#" class="btn btn-outline-light btn-sm">View Details</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection