@extends('admin.maindesgin')

@section('addfood')
    <!-- Form Header -->
    <div class="bg-blue-600 px-6 py-4" style="text-align: center; margin-left:250px">
        <h2 class="text-xl font-semibold text-white">Add New Food Items</h2>
    </div>

    <!-- Form Content -->
    <div class="p-4">
        @if (session('success'))
            <div  class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.postaddfood') }}" method="POST" enctype="multipart/form-data"
            style="display: flex; flex-direction: column; margin-left: 600px; gap: 10px; height: 100vh; width: 400px;">
            @csrf
            <input type="text" name="food_name" placeholder="Food Title" required
                style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">

            <textarea name="food_details" placeholder="Description" required
                style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; min-height: 200px;"></textarea>

            <input type="number" name="food_price" placeholder="Price" min="0" step="1" required
                style="padding: 8px; border: 1px solid #ccc; border-radius: 4px;">

            <div style="margin-bottom: 5px;">
                <input type="file" name="food_image" accept="image/*" required
                    style="padding: 8px; border: 1px solid #ccc; border-radius: 4px; width: 100%;">
                <p style="font-size: 12px; color: #666; margin-top: 5px; margin-bottom: 0;">PNG, JPG or GIF (Max 10MB)</p>
            </div>

            <button type="submit"
                style="padding: 8px 16px; background: #4CAF50; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px;">
                Add Food
            </button>
        </form>
    </div>
@endsection
