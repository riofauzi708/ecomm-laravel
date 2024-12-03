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

                <h2>Add Product</h2>

                <div class="div_deg">
                    <form action="{{url('upload_product')}}" method="POST" enctype="multipart/form-data" onsubmit="return validateForm(event)">

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
                            <select name="category">
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

    <!-- SweetAlert CDN -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- JavaScript files-->
    <script>
        function validateForm(event) {

            var title = document.getElementsByName('title')[0].value;
            var description = document.getElementsByName('description')[0].value;
            var price = document.getElementsByName('price')[0].value;
            var stock = document.getElementsByName('stock')[0].value;
            var category = document.getElementsByName('category')[0].value;
            var image = document.getElementsByName('image')[0].value;

            if (title === '') {
                swal("Oops!", "Please Enter Product Title", "error");
                return false;
            }
            if (description === '') {
                swal("Oops!", "Please Enter Product Description", "error");
                return false;
            }
            if (price === '') {
                swal("Oops!", "Please Enter Product Price", "error");
                return false;
            }
            if (stock === '') {
                swal("Oops!", "Please Enter Product Stock", "error");
                return false;
            }
            if (category === '') {
                swal("Oops!", "Please Enter Product Category", "error");
                return false;
            }
            if (image === '') {
                swal("Oops!", "Please Enter Product Image", "error");
                return false;
            }

            swal("Nice!", "Your Product has been added", "success");
            return true;
        }
    </script>


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