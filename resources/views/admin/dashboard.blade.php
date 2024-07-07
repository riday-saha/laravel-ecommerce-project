<!DOCTYPE html>
<html>
  <head> 
    @include('admin.admincss')
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
        <div class="">
          <div class="container-fluid">
            <h2 class="" style="text-align: center; padding: 20px; color:white">Dashboard</h2>
          </div>
        </div>
        @include('admin.content')
        
        
        
        
        @include('admin.footer')
  </body>
</html>