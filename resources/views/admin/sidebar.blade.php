<nav id="sidebar">
    <!-- Sidebar Header-->
    <div class="sidebar-header d-flex align-items-center">
      <div class="avatar"><img src="{{asset('adminsbackend/img/avatar-6.jpg')}}" alt="..." class="img-fluid rounded-circle"></div>
      <div class="title">
        <h1 class="h5">Mark Stephen</h1>
        <p>Web Designer</p>
      </div>
    </div>
    <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
    <ul class="list-unstyled">
            <li class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><a href="{{route('admin.dashboard')}}"> <i class="icon-home"></i>Home </a></li>
            <li class="{{ request()->routeIs('admin.category') ? 'active' : '' }}"><a href="{{route('admin.category')}}"> <i class="icon-grid"></i>Category </a></li>
            <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-windows"></i>Product </a>
              <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                <li class="{{ request()->routeIs('add.product') ? 'active' : '' }}"><a href="{{route('add.product')}}"><i class="icon-padnote"></i>Add Product</a></li>
                <li class="{{ request()->routeIs('all.product') ? 'active' : '' }}"><a href="{{route('all.product')}}"><i class="fa fa-briefcase"></i>View Product</a></li>
              </ul>
            </li>
            <li class="{{ request()->routeIs('all.order') ? 'active' : '' }}"><a href=" {{route('all.order')}} "><i class="fa fa-truck"></i>All Orders</a></li>
    </ul>
    
  </nav>