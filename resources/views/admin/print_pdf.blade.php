<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table{
            border: 2px solid black;
            margin-bottom: 20px;
        }
        th{
            border: 2px solid black;
            padding: 20px 0px;
            text-align: center;
        }
        td{
            border: 2px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center">Gift Shop </h2>
    <h3>Customer's Details</h3>
    <table>
        <tr>
            <th>Receiver Name</th>
            <th>Receiver Adderss</th>
            <th>Receiver Phone</th>
        </tr>
        <tr>
            <td>{{$print_pdf->rec_name}}</td>
            <td>{{$print_pdf->rec_address}}</td>
            <td>{{$print_pdf->rec_phone}}</td>
        </tr>
    </table>
    <h3>Product Details</h3>
    <table>
        <tr>
            <th>Product Title</th>
            <th>Product Description</th>
            <th>Product Price</th>
            {{-- <th>Product Image</th> --}}
            <th>Delivery Status</th>
        </tr>
        <tr>
            <td>{{$print_pdf->product->pro_title}}</td>
            <td>{{$print_pdf->product->pro_description}}</td>
            <td>{{$print_pdf->product->pro_price}}</td>
            {{-- <td>
                <img src="{{ asset('products/' . $print_pdf->product->pro_image) }}" style="height: 150px; width:200px;" alt="">
            </td> --}}
            <td>{{$print_pdf->status}}</td>
        </tr>
    </table>
    
    <h3>Date and Time {{ Carbon\Carbon::now('Asia/Dhaka')->format('Y-m-d H:i:s') }}</h3>
</body>
</html>
