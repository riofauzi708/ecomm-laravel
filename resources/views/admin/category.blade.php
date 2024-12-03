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

        <h2>Category</h2>

        <div class="div_deg">

          <form action="{{url('add_category')}}" method="post" onsubmit="return validateForm(event)">

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
              <th>
                Delete
              </th>
              <th>
                Edit
              </th>
            </tr>

            @foreach($data as $data)
            <tr>
              <td>
                {{$data->category_name}}
              </td>

              <td>
                <a class="btn btn-success" href="{{url('edit_category', $data->id )}}">Edit</a>
              </td>

              <td>
                <a class="btn btn-danger" data-category="{{$data->category_name}}" onclick="confirmation(event)" href="{{url('delete_category', $data->id )}}">Delete</a>
              </td>
            </tr>

            @endforeach

          </table>
        </div>

      </div>
    </div>
  </div>
  <!-- JavaScript files-->

  <script>
    function validateForm(event) {

      var category = document.getElementsByName('category')[0].value;
      if (category == '') {
        swal("Oops!", "Please Enter Category Name", "error");
        return false;
      }

      swal("Nice!", "Your Category has been added", "success");
      return true;

    }
  </script>

  <script type="text/javascript">
    function confirmation(ev) {
      ev.preventDefault();
      var urlToRedirect = ev.currentTarget.getAttribute('href');
      var category_name = ev.currentTarget.getAttribute('data-category');

      swal({
          title: "Are you sure you want to delete " + category_name + "?",
          text: "Once deleted, It will be gone forever!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })

        .then((willDelete) => {
          if (willDelete) {
            swal("Your " + category_name + " category has been deleted!", {
                icon: "success",
              })
              .then(() => {
                window.location.href = urlToRedirect;
              })
          } else {
            swal("Hoof! Your " + category_name + " category is safe!", {
              icon: "info",
            });
          }
        })
    }
  </script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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