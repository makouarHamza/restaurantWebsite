@extends('main')
@section('menu_items')
    @foreach ($foods as $food)
        <div class="col-md-4">
            <div class="card bg-transparent border my-3 my-md-0">
                <img src="{{ asset('food_img/'. $food->food_image) }}" alt="{{ $food->food_name }}"
                    class="rounded-0 card-img-top mg-responsive">
                <div class="card-body">
                    <h1 class="text-center mb-4"><a href="#" class="badge badge-primary">{{ $food->food_price }} DH</a></h1>
                    <h4 class="pt20 pb20">{{ $food->food_name }}</h4>
                    <p class="text-white">{{ $food->food_details }} </p>
                </div>
            </div>
        </div>
    @endforeach

@endsection