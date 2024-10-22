<!DOCTYPE html>
<html>

<head>

    @include('admin.css')

    <style>
        input[type='text'] {
            width: 400px;
            height: 48px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            margin: 10px;
        }

        .table_deg {
            text-align: center;
            margin: 0 auto;
            border: 1px solid black;
            margin-bottom: 20px;
        }

        th {
            padding: 20px;
            border: 1px solid black;
            font-size: 18px;
            font-weight: bold;
            color: white;
            background-color: #22252a;
        }

        td {
            padding: 10px;
            color: #BCBCBC;
            font-size: 15px;
            border: 2px solid #22252a;
        }
    </style>

</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')

    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcrumb-list">
                            <h1>View Product</h1>
                        </div>
                    </div>
                </div>

                <form class="d-flex" action="{{url('search_product')}}" method="get">
                    @csrf
                    <input style="margin-left: 10px; margin-right: 10px" type="search" name="search" placeholder="Search Product" class="form-control">

                    <input type="submit" value="Search" class="btn btn-primary">
                </form>

                <div class="div_deg">

                    <table class="table_deg">

                        <tr>
                            <th>
                                Product
                            </th>

                            <th>
                                Description
                            </th>

                            <th>
                                Price
                            </th>

                            <th>
                                Stock
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Image
                            </th>
                            <th>
                                Edit
                            </th>
                            <th>
                                Delete
                            </th>
                        </tr>

                        @foreach($data as $products)
                        <tr>
                            <td>
                                {{$products->title}}
                            </td>
                            <td>
                                {!!Str::limit($products->description, 100)!!}
                            </td>
                            <td>
                                {{$products->price}}
                            </td>
                            <td>
                                {{$products->stock}}
                            </td>
                            <td>
                                {{$products->category}}
                            </td>
                            <td>
                                <img height="70" width="100" src="/products/{{$products->image}}">
                            </td>
                            <td>
                                <a class="btn btn-success" href="{{url('edit_product', $products->id)}}">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-danger" product-name="{{$products->title}}" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>

                <div class="div_deg">
                    {{$data->onEachSide(1)->links()}}
                </div>

            </div>
        </div>
    </div>
    <!-- JavaScript files-->

    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            var product_name = ev.currentTarget.getAttribute('product-name');

            swal({
                    title: "Are you sure you want to delete " + product_name + "?",
                    text: "Once deleted, It will be gone forever!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })

                .then((willDelete) => {
                    if (willDelete) {
                        swal("Your " + product_name + " category has been deleted!", {
                                icon: "success",
                            })
                            .then(() => {
                                window.location.href = urlToRedirect;
                            })
                    } else {
                        swal("Hoof! Your " + product_name + " Product is safe!", {
                            icon: "info",
                        });
                    }
                })
        }
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>

</html>