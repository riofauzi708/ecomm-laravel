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
            <div class="heading_container heading_center mb-4">
                <h2>{{ $data->title }}</h2>
            </div>
            <div class="row align-items-center">
                <!-- Product Image -->
                <div class="col-md-5 mb-4">
                    <div class="img-box shadow rounded">
                        <img class="img-fluid rounded hover-zoom" src="/products/{{ $data->image }}" alt="Product Image">
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-7">
                    <div class="detail-box">
                        <!-- Description -->
                        <div class="mb-3">
                            <h6><strong>Description :</strong></h6>
                            <p>{{ $data->description }}</p>
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                            <h6><strong>Category :</strong></h6>
                            <span class="badge bg-info text-dark">{{ $data->category }}</span>
                        </div>

                        <!-- Stock -->
                        <div class="mb-3">
                            <h6><strong>Stock :</strong></h6>
                            <p>{{ $data->stock }}</p>
                        </div>

                        <!-- Price -->
                        <div class="mb-4">
                            <h6><strong>Price :</strong></h6>
                            <h4 class="text-danger"><strong>${{ $data->price }}</strong></h4>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end">
                            <a class="btn btn-danger btn-lg me-2" href="{{ url('add_to_cart/'.$data->id) }}">
                                <i class="fa fa-shopping-cart me-2" aria-hidden="true"></i>Add to Cart
                            </a>
                            <a class="btn btn-success btn-lg" href="#">
                                <i class="fa fa-shopping-bag me-2" aria-hidden="true"></i>Buy
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- info section -->
    @include("home.footer")
    <!-- end info section -->

</body>

<style>
    /* General Section Styling */
    .shop_section {
        background-color: #f9f9f9;
        padding: 50px 0;
    }

    /* Image Hover Effect */
    .img-box img {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        border-radius: 10px;
    }

    .img-box img:hover {
        transform: scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    /* Button Styling */
    .btn-lg {
        font-size: 1rem;
        padding: 12px 20px;
        border-radius: 5px;
        transition: all 0.3s ease-in-out;
    }

    .btn-lg:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    /* Badge Styling */
    .badge {
        font-size: 1rem;
        padding: 6px 12px;
        border-radius: 5px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .detail-box {
            text-align: center;
        }

        .btn-lg {
            width: 100%;
            margin-bottom: 10px;
        }
    }
</style>

</html>