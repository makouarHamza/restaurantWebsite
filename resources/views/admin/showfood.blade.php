@extends('admin.maindesgin')

@section('show_food')
    <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; margin: 10px 0;">
        @if (session('danger'))
            <div style="background-color: red; color: white; text-align: center; " class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('danger') }}
            </div>
        @endif
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Name</th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Description </th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Image</th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Price</th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $food->food_name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $food->food_details }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><img style="width: 200px"
                            src="{{ 'food_img/' . $food->food_image }}" alt="{{ $food->food_name }}"></td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $food->food_price }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="#"
                            style="color: #2196F3; text-decoration: none; padding: 4px 8px; border-radius: 4px; background-color: #e7f3ff">Update</a>
                        <a href="{{ route('admin.deletefood', $food->id) }}" onclick="return confirm('Are you sure ?')"
                            style="color: #f44336; text-decoration: none; padding: 4px 8px; border-radius: 4px; background-color: #ffebee">Delete</a>
                    </td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
