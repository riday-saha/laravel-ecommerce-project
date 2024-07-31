
<!DOCTYPE html>
<html>

@include('home.homecss')

<style>

    h3{
        text-align: center;
        padding: 20px 0px;
    }

    table{

        justify-content: center;
        margin: auto;   
        
         border: 2px solid #ff7c7c;
        margin-bottom: 30px;
    }
    th{
        padding: 20px;
        background: black;
        color: white;
        font-size: 20px;
        border: 2px solid #87CEEB;
        text-align: center;
    }
    td{
        padding: 20px;
        background: whitesmoke;
        color: rgb(0, 0, 0);
        font-size: 20px;
        border: 2px solid #87CEEB;
        text-align: center;
    }
    .pagination{
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 40px;
    }
</style>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
  </div>
  <div class="container">
    {{-- <div><h3>My Cart</h3></div> --}}
    <div class="one">
        <h3 style="text-align: center">All Orders</h3>
        <table>
            <tr>
                <th>Product Title</th>    
                <th>Price</th>
                <th>Image</th>
                <th>Delivary Status</th>
            </tr>
           


            @foreach ($all_order as $all_orders)
               <tr>   
                <td>{{$all_orders->product->pro_title}}</td>
                <td>{{$all_orders->product->pro_price}}</td>
                <td><img src="{{ asset('products/' . $all_orders->product->pro_image) }}" style="height: 150px; width:200px;" alt=""></td>
                <td>

                    @if ($all_orders->status == 'In Progress')
                        <p style="color:rgb(255, 33 ,33);">{{$all_orders->status}}</p>
                    @elseif ($all_orders->status == 'Delivered')
                    <p style="color:rgb(0, 175, 255);">{{$all_orders->status}}</p> 
                    @elseif ($all_orders->status == 'On The Way')
                    <p style="color:black;">{{$all_orders->status}}</p>  
                    @endif
                </td>
            </tr> 
            @endforeach   
        </table>
        <div class="pagination">{{$all_order->links()}}</div>
        
        
    </div>

    
    
  </div>













@include('home.footer')

</body>

</html>
