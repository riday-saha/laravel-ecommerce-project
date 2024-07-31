<header class="header_section">
    <nav class="navbar navbar-expand-lg custom_nav-container ">
      <a class="navbar-brand" href="index.html">
        <span>
          Giftos
        </span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class=""></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav  ">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="shop.html">
              Shop
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="why.html">
              Why Us
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="testimonial.html">
              Testimonial
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact Us</a>
          </li>
        </ul>
        <div class="user_option">

          @if (Route::has('login'))
          @auth

          
          @if (Auth::user()->user_type === 'admin')
          <a href="{{route('admin.dashboard')}}">Admin</a>
          @endif

          <a href="{{route('order')}}">
            Orders
          </a>

          <a href="{{route('add.cart')}}">
            <i class="fa fa-shopping-bag" aria-hidden="true"> [ {{$add_cart_count}} ]</i>
          </a>

          <form method="POST" action="{{ route('logout') }}" >
            @csrf
            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                <button class="btn btn-primary" style="color:rgb(0, 0, 0) ;background:#0aa3ff; text:bold;">{{ __('Log Out') }}</button>
            </x-dropdown-link>
        </form>
          @else  
          <a href="{{route('login')}}">
            <i class="fa fa-user" aria-hidden="true"></i>
            <span>
              Login
            </span>
          </a>

          <a
              href="{{ route('register') }}"
              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
          >
          <i class="fa fa-vcard" aria-hidden="true"></i>
              Register
          </a>
          @endauth
          @endif
          <form class="form-inline ">
            <button class="btn nav_search-btn" type="submit">
              <i class="fa fa-search" aria-hidden="true"></i>
            </button>
          </form>
        </div>
      </div>
    </nav>
  </header>