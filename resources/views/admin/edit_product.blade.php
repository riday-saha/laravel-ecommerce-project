<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
    <style>
       .pro_from{
        width: 600px;
        margin: auto;
        color: #ff7c7c;
        padding: 30px 0px;
       } 
       .pro_from label{
        color: #ff7c7c;
        font-size: 20px;
       }
       .form-control{
        border:2px solid #ff7c7c;
        color: #ff7c7c;
       }
       .form-group{
        margin-bottom: 20px;
       }
       #category{
        background-color: #22252A;
        color:#ff7c7c;

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
        <h2 class="" style="text-align: center; padding: 20px; color:white">Edit Product</h2>
        
        <div>
            <form method="POST" action="{{route('update.product',$edit_product->id)}}" class="pro_from" enctype="multipart/form-data" accept-charset="UTF-8">  
                @csrf
              <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" class="form-control" id="title" value="{{$edit_product->pro_title}}" name="title" >
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="10">{{$edit_product->pro_description}}</textarea>
              </div>
              <div class="form-group">
                <label for="image">Current Image</label>
                <img src="{{asset('products/' .$edit_product->pro_image)}}" alt="" style="height: 150px; width:200px;">
              </div>
              <div class="form-group">
                <label for="image">Update Image</label>
                <input type="file" class="" accept="image/*" id="image" name="image" >
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" >
                @foreach ($category as $categories )
                <option value="{{ $categories->id }}" {{ $categories->id == $edit_product->category_id ? 'selected' : '' }}>{{ $categories->category_name }}</option>  
                @endforeach
                  
                  </select>
              </div>
              <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" value="{{$edit_product->pro_price}}" name="price" >
              </div>
              <div class="form-group">
                <label for="quantity">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" value="{{$edit_product->pro_quantity}}" name="quantity" >
              </div>
              <button type="submit" class="btn btn-success">Update Product</button>
            </form>
        </div>
    </div>

        
        
        
        
        
        
        
        
        @include('admin.footer')
  </body>
</html>
