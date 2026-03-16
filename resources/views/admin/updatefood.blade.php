@extends('admin.maindesgin')
<base href="/public">
@section('update_food')
    <!-- Form Header -->
    <div class="bg-blue-600 px-6 py-4" style="text-align: center; margin-left:250px">
        <h2 class="text-xl font-semibold text-white">Update Food Item</h2>
    </div>

    <!-- Form Content -->
    <div class="p-4">
        @if (session('update'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('update') }}
            </div>
        @endif

        <form action="{{ route('admin.postupdatefood',$food->id) }}" method="POST" enctype="multipart/form-data"
            style="display: flex; flex-direction: column; margin-left: 600px; gap: 10px; height: 100vh; width: 400px;">
            @csrf
            <input type="text" name="food_name" value="{{ $food->food_name }}"
                style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">

            <textarea name="food_details" style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; min-height: 200px;">{{ $food->food_details }}</textarea>

            <input type="number" name="food_price" value="{{ $food->food_price }}" min="0" step="1"
                style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">

            <div style="margin-bottom: 5px;">
                <div>
                    <h3 style=" color: #666; margin-top: 5px; margin-bottom: 0;">Old Image</h3>
                    <img style="width: 100px" src="{{ 'food_img/' . $food->food_image }}" alt="">
                </div>
                <label style="font-size: 12px; color: #666; margin-top: 5px; margin-bottom: 0;" for="updateimage">update
                    image for here!</label>
                <input type="file" name="food_image" accept="image/*"
                    style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                <p style="font-size: 12px; color: #666; margin-top: 5px; margin-bottom: 0;">PNG, JPG or GIF (Max 10MB)</p>
            </div>

            <button type="submit"
                style="padding: 8px 16px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px;">
                Update  Food
            </button>
        </form>
    </div>
@endsection
