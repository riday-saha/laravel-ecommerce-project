<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
    <style>
       .pro_from{
        width: 600px;
        margin: auto;
        color: #ff7c7c;
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
        <h2 class="" style="text-align: center; padding: 20px; color:white">Add Product</h2>
        
        <div>
            <form method="POST" action="{{route('store.product')}}" class="pro_from" enctype="multipart/form-data">  
                @csrf
              <div class="form-group">
                <label for="title">Product Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="image">Product Image</label>
                <input type="file" class="" accept="image/*" id="image" name="image" required>
              </div>
              <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control" id="category" name="category" required>
                @foreach ($category as $categories )
                     <option value="{{$categories->id}}">{{$categories->category_name}}</option>   
                @endforeach
                  
                  </select>
              </div>
              <div class="form-group">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
              </div>
              <div class="form-group">
                <label for="quantity">Product Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
              </div>
              <button type="submit" class="btn btn-success">Create Product</button>
            </form>
        </div>
    </div>

        
        
        
        
        
        
        
        
        @include('admin.footer')
  </body>
</html>