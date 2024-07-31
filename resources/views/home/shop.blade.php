<section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Latest Products
        </h2>
      </div>
      
      <div class="row">
        @foreach ($show_product as $show_products)
        <div class="col-sm-6 col-md-4 col-lg-3">  
          <div class="box">
            
              <div class="img-box">
                <img src="{{ asset('products/' . $show_products->pro_image) }}" style="height: 150px; width:200px;" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$show_products->pro_title}}
                </h6>
                <h6>
                  Price
                  <span>
                    {{$show_products->pro_price}}
                  </span>
                </h6>
              </div>
              <div class="new">
                <span>
                  New
                </span>
              </div>
            
            <div>
              <a href="{{route('my.cart',$show_products->id)}}" class="btn btn-success">add to cart</a>
              <a href="{{route('product.details',$show_products->id)}}" class="btn btn-primary">Details</a>
            </div>
          </div>  
        </div>
        @endforeach
      </div>
      <div class="btn-box">
        <a href="">
          View All Products
        </a>
      </div>
    </div> 
  </section>