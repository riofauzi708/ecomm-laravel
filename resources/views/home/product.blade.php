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

<style>
  /* General Styling */
  .shop_section {
    background-color: #f9f9f9;
  }

  .box {
    transition: all 0.3s ease-in-out;
  }

  .box:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
  }

  /* Image Hover Zoom Effect */
  .img-box img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
  }

  .img-box img:hover {
    transform: scale(1.1);
  }

  /* Product Title */
  .product-title {
    font-size: 1rem;
    font-weight: bold;
  }

  /* Button Styling */
  .btn-md {
    font-size: 0.9rem;
    padding: 8px 16px;
    border-radius: 5px;
    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
  }

  .btn-md:hover {
    transform: scale(1.05);
  }

  /* Responsive Adjustments */
  @media (max-width: 768px) {
    .box {
      padding: 10px;
    }

    .btn-md {
      width: 100%;
      margin-bottom: 10px;
    }
  }
</style>