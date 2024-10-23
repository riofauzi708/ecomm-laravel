<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')

</head>

<body>
    <div class="hero_area">
        <!-- header section starts -->
        @include("home.header")
        <!-- end header section -->
    </div>

    <section class="shop_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>{{ $data->title }}</h2>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="img-box">
                        <img class="img-fluid" src="/products/{{ $data->image }}" alt="product image">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="detail-box">
                        <div>
                            <h6>Description :</h6>
                            <p>{{ $data->description }}</p>
                        </div>
                        <div>
                            <h6>Category :</h6>
                            <span>{{ $data->category }}</span>
                        </div>
                        <div>
                            <h6>Stock :</h6>
                            <p>{{ $data->stock }}</p>
                        </div>
                        <div>
                            <h6>Price :</h6>
                            <p>{{ $data->price }}</p>
                        </div>

                        <form>
                            @csrf
                            <div style="text-align: right;">
                                <a class="btn btn-danger btn-lg" href="{{url('add_to_cart/'.$data->id)}}"
                                    style="color: white;">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    Add to Cart</a>
                                <a class="btn btn-success btn-lg" href="#"
                                    style="color: white;">
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                    Buy</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- info section -->
    @include("home.footer")
    <!-- end info section -->

</body>

</html>