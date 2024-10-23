<section class="shop_section layout_padding">
  <div class="container">
    <div class="heading_container heading_center">
      <h2>
        Latest Products
      </h2>
    </div>
    <div class="row">

      @foreach ($product as $products)

      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
          <a href="{{url('product_details/'.$products->id)}}">
            <div class="img-box">
              <img src="products/{{ $products->image }}" alt="">
            </div>
            <div class="detail-box">
              <h6>
                {{ $products->title }}
              </h6>
              <h6>
                Price
                <span>
                  {{ $products->price }}
                </span>
              </h6>
            </div>
          </a>

          <div style="text-align: right;">
            <a class="btn btn-danger btn-md" href="{{url('add_to_cart/'.$products->id)}}"
              style="color: white;">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>
              Add to Cart</a>
            <a class="btn btn-success btn-md" href="#"
              style="color: white;">
              <i class="fa fa-shopping-bag" aria-hidden="true"></i>
              Buy</a>
          </div>


        </div>
      </div>

      @endforeach

    </div>
  </div>


  <div class="btn-box">
    <a href="">
      View All Products
    </a>
  </div>

  </div>
</section>