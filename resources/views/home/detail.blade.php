<!DOCTYPE html>
<html>

@include('home.homecss')

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    @include('home.slider')
  </div>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="box" style="padding: 50px 50px;">
            <div>
              <h2 style="text-align: center;">
                {{$details_product->pro_title}}
              </h2>
            </div>
            <div class="img-box" style="text-align: center;">
              <img src="{{ asset('products/' . $details_product->pro_image) }}" style="height: 150px; width: 200px;" alt="">
            </div>
            <div class="detail-box" style="margin-top: 20px;">
              <div class="row">
                <div class="col-md-12">
                  <h4>
                    Price: {{$details_product->pro_price}}
                  </h4>
                </div>
              </div>
            </div>
            <div style="margin-top: 20px;">
              <h6 style="text-align: justify;">
                {{$details_product->pro_description}}
              </h6>
            </div>
            <div style="margin-top: 20px;">
              <a href="{{route('my.cart',$details_product->id)}}" class="btn btn-success">Add to Cart</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end shop section -->

  @include('home.footer')

</body>

</html>
