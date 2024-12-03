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

        /* Gaya umum untuk badge */
        .badge {
            display: inline-flex;
            align-items: center;
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            color: white;
            font-size: 14px;
            text-transform: capitalize;
        }

        /* Menambahkan titik di depan teks */
        .badge::before {
            content: '•';
            /* Menambahkan titik */
            margin-right: 8px;
            /* Memberi jarak antara titik dan teks */
            font-size: 18px;
            /* Ukuran titik */
        }

        /* Badge untuk status "In Progress" (warna abu-abu) */
        .status-in-progress {
            background-color: #808080;
            /* Abu-abu */
            border: 2px solid #6f6f6f;
            /* Abu-abu lebih gelap untuk border */
        }

        /* Badge untuk status "On Delivery" */
        .status-on-delivery {
            background-color: #ff9800;
            /* Oranye */
            border: 2px solid #fb8c00;
            /* Oranye lebih gelap untuk border */
        }

        /* Badge untuk status "Delivered" */
        .status-delivered {
            background-color: #4caf50;
            /* Hijau */
            border: 2px solid #388e3c;
            /* Hijau lebih gelap untuk border */
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">

                <h2>Order List</h2>

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>Receiver Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                        </tr>
                        @foreach($data as $data)
                        <tr>
                            <td>{{$data->receiver_name}}</td>
                            <td>{{$data->receiver_phone}}</td>
                            <td>{{$data->receiver_address}}</td>
                            <td>{{$data->product->title}}</td>
                            <td>$ {{ number_format($data->product->price, 0, ',', '.') }}</td>
                            <td>
                                <img src="{{ asset('products/'.$data->product->image) }}" width="100px" height="70px" alt="Product Image">
                            </td>
                            <td>
                                <span class="badge status-{{ str_replace(' ', '-', strtolower($data->status)) }}">
                                    {{$data->status}}
                                </span>
                            </td>

                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"></script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>

</html>