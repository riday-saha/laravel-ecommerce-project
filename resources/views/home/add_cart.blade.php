
<!DOCTYPE html>
<html>

@include('home.homecss')

<style>
    .container{
        display: flex;
    }
    h3{
        text-align: center;
        padding: 20px 0px;
    }
    .one{
        display: flex;
        float: left;
        display: inline;
    }
    table{

        /* justify-content: center;
        margin: auto;   */
        
        /* border: 2px solid #ff7c7c; */
        margin-bottom: 10px;
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
    /* .pagination{
        display: flex;
        justify-content: center;
        margin-top: 10px;
        margin-bottom: 100px;
    } */

    .delivary_from{
        display: inline;
        margin-left: 20px;
    }

    .two{
        background: whitesmoke;
        padding: 30px;
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
        <h3 style="text-align: center">My Cart</h3>
        <table>
            <tr>
                <th>Product Title</th>    
                <th>Price</th>
                <th>Image</th>
                <th>Remove</th>
            </tr>

            @php
                $total_value = 0;
            @endphp

            @foreach ($show_cart_item as $show_cart_items )
            <tr>   
                <td>{{$show_cart_items->product->pro_title}}</td>
                <td>{{$show_cart_items->product->pro_price}}</td>
                <td><img src="{{ asset('products/' . $show_cart_items->product->pro_image) }}" style="height: 150px; width:200px;" alt=""></td>
                <td><a href="{{route('remove.cart',$show_cart_items->id)}}" class="btn btn-danger">Remove</a></td>
            </tr>
            @php
                $total_value = $total_value + $show_cart_items->product->pro_price;
            @endphp
            @endforeach
        </table>
        
            <h5 style="border: 2px solid #87CEEB; background:whitesmoke; text-align:center">Total Price: {{$total_value}} </h5>          
    </div>

    <div class=" container delivary_from">
        <h3 style="text-align: center">Delivary Address</h3>
        <form action="{{route('form.cart')}}" method="POST" class="two">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{Auth::user()->name}}">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address}}">
            </div>
            <div class="form-group">
                <label for="phone">phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone}}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
        </form>

    </div>
    
  </div>













@include('home.footer')

</body>

</html>
