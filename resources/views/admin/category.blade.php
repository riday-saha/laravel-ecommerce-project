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
        <h2 class="" style="text-align: center; padding: 20px; color:white">Category</h2>
        </div>

        <div class="">
            <form action="{{route('add.category')}}" method="POST">
                @csrf
                <input type="text" name="category" value="{{old('category')}}"  placeholder="Category Name" style="width: 350px" >
                <input type="submit" value="Add" class="btn btn-success" style="margin-left: 10px;">
                
            </form>
            @if ($errors->has('category'))
                <span class="text-danger" style="display: flex; justify-content: center;">{{ $errors->first('category') }}</span>
            @endif
        </div>
        <div>
            <table>
                <tr>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach ($view_category as $view_categories )
                <tr>
                    <td>{{$view_categories->category_name}}</td>
                    <td><a href="{{route('edit.category',$view_categories->id)}}" class="btn btn-warning">Edit</a></td>
                    <td><a href="{{route('delete.category',$view_categories->id)}}" class="btn btn-danger">Delete</a></td>
                </tr>
                @endforeach
            </table>
            <div class="pagination">{{$view_category->links()}}</div>
        </div>
        
        
        
        
        
        
        
        @include('admin.footer')
  </body>
</html>