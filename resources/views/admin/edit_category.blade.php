<!DOCTYPE html>
<html>

<head>

    @include('admin.css')

    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 48px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px;
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

                <h2>Edit Category</h2>

                <div class="div_deg">

                    <form action="{{url('update_category', $data->id)}}" method="post">

                        @csrf

                        <div>
                            <input type="text" name="category" value="{{$data->category_name}}">
                            <input class="btn btn-secondary" type="submit" value="Update Category">
                        </div>

                    </form>

                </div>
            </div>
        </div>
        <!-- JavaScript files-->
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