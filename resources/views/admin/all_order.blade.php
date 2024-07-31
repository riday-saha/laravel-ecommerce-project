<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
    <style>
        table{ 
            border: 2px solid #ff7c7c;
            margin-top: 20px;
            /* padding: 100px; */
        }
        th{
            padding: 15px;
            background: black;
            color: white;
            font-size: 15px;
            border: 2px solid #ff7c7c;
            text-align: center;
        }
        td{
            padding: 15px;
            background: black;
            color: white;
            font-size: 15px;
            border: 2px solid #ff7c7c;
            text-align: center;
        }
        .pagination{
            display: flex;
            justify-content: center;
            margin-top: 10px;
            margin-bottom: 50px;
        }
    </style>
  </head>
  <body>
    <header class="header">   
      @include('admin.header')
    </header>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">

        <div class="container-fluid">
        <h2 class="" style="text-align: center; padding-top: 25px; color:white">All Orders</h2>
        </div>

        <div>
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product Title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Change Status</th>
                    <th>Print</th>
                </tr>
                @foreach ($views_order as $views_orders )
               <tr>
                <td>{{$views_orders->rec_name}}</td>
                <td>{{$views_orders->rec_address}}</td>
                <td>{{$views_orders->rec_phone}}</td>
                <td>{{$views_orders->product->pro_title}}</td>
                <td>{{$views_orders->product->pro_price}}</td>
                <td>
                    <img src="{{ asset('products/' . $views_orders->product->pro_image) }}" style="height: 150px; width:200px;" alt="">
                </td>
                <td>
                    @if ($views_orders->status == 'In Progress')
                        <p style="color:rgb(255, 33 ,33);">{{$views_orders->status}}</p>
                    @elseif ($views_orders->status == 'Delivered')
                    <p style="color:rgb(21, 255, 0);">{{$views_orders->status}}</p> 
                    @elseif ($views_orders->status == 'On The Way')
                    <p style="color:yellow;">{{$views_orders->status}}</p>  
                    @endif
                <td>
                    <a href="{{route('admin.delivered',$views_orders->id)}}" class="btn btn-success m-3">Delivered</a>
                    <a href="{{route('admin.onway',$views_orders->id)}}" class="btn btn-warning">On The Way</a>
                </td>
                <td><a href="{{route('print.pdf',$views_orders->id)}}" class="btn btn-secondary">PDF</a></td>
               </tr>
               @endforeach
            </table>

            <div class="pagination">{{$views_order->links()}}</div>
            
        </div>
        
        
        
        
        
        
        
        @include('admin.footer')
  </body>
</html>