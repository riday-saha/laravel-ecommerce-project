<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
    <style>
        form{
            display: flex;
            justify-content: center;
            text-align: center;   
            
        }
        table{

            justify-content: center;
            margin: auto;  
            border: 2px solid #ff7c7c;
            margin-top: 50px;
            padding: 100px;
        }
        th{
            padding: 20px;
            background: black;
            color: white;
            font-size: 20px;
            border: 2px solid #ff7c7c;
        }
        td{
            padding: 20px;
            background: black;
            color: white;
            font-size: 20px;
            border: 2px solid #ff7c7c;
        }
        .pagination{
            display: flex;
            justify-content: center;
            margin-top: 10px;
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
        <h2 class="" style="text-align: center; padding-top: 25px; color:white">All Products</h2>
        </div>

        <div>
            <table>
                <tr>
                    <th>Product Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($view_product as $view_products )
                <tr>
                    <td>{{$view_products->pro_title}}</td>
                    <td>{{ Str::limit($view_products->pro_description, 80) }}</td>
                    <td>    
                        {{$view_products->category->category_name}}
                    </td>
                    <td>{{$view_products->pro_price}}</td>
                    <td>{{$view_products->pro_quantity}}</td>
                    <td><img src="{{ asset('products/' . $view_products->pro_image) }}" style="height: 150px; width:200px;" alt=""></td>
                    <td><a href="{{route('edit.product',$view_products->id)}}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{route('delete.product',$view_products->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </table>

            <div class="pagination">{{$view_product->links()}}</div>
            
        </div>
        
        
        
        
        
        
        
        @include('admin.footer')
  </body>
</html>