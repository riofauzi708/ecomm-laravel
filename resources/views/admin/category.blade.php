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

    .table_deg {
      text-align: center;
      margin: 0 auto;
      border: 1px solid black;
      width: 55%;
      margin-bottom: 40px;
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

        <h1 style="color: white;">
          Add Category
        </h1>

        <div class="div_deg">

          <form action="{{url('add_category')}}" method="post">

            @csrf

            <div>
              <input type="text" name="category">
              <input class="btn btn-primary" type="submit" value="Add Category">
            </div>

          </form>

        </div>

        <div>

          <table class="table_deg">

            <tr>
              <th>
                Category Name
              </th>
            </tr>

            @foreach($data as $data)
            <tr>
              <td>
                {{$data->category_name}}
              </td>
            </tr>
            @endforeach

            <tr>
              <td>
                Sports
              </td>
            </tr>
          </table>
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