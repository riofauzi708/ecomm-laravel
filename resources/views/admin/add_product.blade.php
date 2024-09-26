<!DOCTYPE html>
<html>

<head>

    @include('admin.css')

    <style>
        input[type='text'] {
            width: 350px;
            height: 45px;
        }

        textarea {
            width: 350px;
            height: 120px;
            padding: 10px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px;
        }

        label {
            display: inline-block;
            width: 200px;
            color: white !important;
            font-size: 20px !important;
        }

        .input_deg {
            padding: 15px;
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

                <h1 style="color: white;">
                    Add Product
                </h1>

                <div class="div_deg">
                    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="input_deg">
                            <Label>Product Title</Label>
                            <input type="text" name="title">
                        </div>

                        <div class="input_deg">
                            <Label>Description</Label>
                            <textarea type="text" name="description">

                            </textarea>
                        </div>

                        <div class="input_deg">
                            <Label>Price</Label>
                            <input type="text" name="price">
                        </div>

                        <div class="input_deg">
                            <Label>Stock</Label>
                            <input type="number" name="stock">
                        </div>

                        <div class="input_deg">
                            <Label>Product Category</Label>
                            <select name="category" required>
                                <option value="">Select a Category</option>

                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input_deg">
                            <Label>Product Image</Label>
                            <input type="file" name="image">
                        </div>

                        <div class="input_deg">
                            <input class="btn btn-success" type="submit" value="Upload Product">
                        </div>

                    </form>
                </div>

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