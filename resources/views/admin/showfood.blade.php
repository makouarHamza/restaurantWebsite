@extends('admin.maindesgin')

@section('show_food')
    <table style="border-collapse: collapse; width: 100%; font-family: Arial, sans-serif; margin: 10px 0;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Name</th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Description </th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Image</th>
                <th style="border: 1px solid #ddd; padding: 12px 8px; text-align: left;">Food Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($foods as $food)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $food->food_name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $food->food_details }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px; text-align: center;"><img style="width: 200px"  src="{{ 'food_img/'.$food->food_image }}" alt="{{ $food->food_name }}"></td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $food->food_price }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
