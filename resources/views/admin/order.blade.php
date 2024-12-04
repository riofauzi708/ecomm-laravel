<!DOCTYPE html>
<html lang="en">

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
            color: #bcbcbc;
            font-size: 15px;
            border: 2px solid #22252a;
        }

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

        .badge::before {
            content: '•';
            margin-right: 8px;
            font-size: 18px;
        }

        .status-in-progress,
        .btn-in-progress {
            background-color: #808080;
            border: 2px solid #6f6f6f;
        }

        .status-on_the_way,
        .btn-on-the-way {
            background-color: #ff9800;
            border: 2px solid #fb8c00;
        }

        .status-delivered,
        .btn-delivered {
            background-color: #4caf50;
            border: 2px solid #388e3c;
        }

        /* Styling khusus tombol untuk konsistensi */
        .btn {
            color: white;
            font-weight: bold;
            text-transform: uppercase;
            width: 100%;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }

        .btn:hover {
            opacity: 0.9;
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
                        <thead>
                            <tr>
                                <th>Receiver Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $data)
                            <tr>
                                <td>{{ $data->receiver_name }}</td>
                                <td>{{ $data->receiver_phone }}</td>
                                <td>{{ $data->receiver_address }}</td>
                                <td>{{ $data->product->title }}</td>
                                <td>$ {{ number_format($data->product->price, 0, ',', '.') }}</td>
                                <td>
                                    <img src="{{ asset('products/'.$data->product->image) }}" width="100" height="70" alt="Product Image">
                                </td>
                                <td>
                                    <span class="badge status-{{ str_replace(' ', '_', strtolower($data->status)) }}">
                                        {{ $data->status }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-between">
                                        <a class="btn btn-on-the-way mr-1" href="{{ url('on_the_way', $data->id) }}">Deliver</a>
                                        <a class="btn btn-delivered mr-1" href="{{ url('delivered', $data->id) }}">Done</a>
                                        <a class="btn btn-in-progress" href="{{ url('in_progress', $data->id) }}">Cancel</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('admincss/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('admincss/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('admincss/vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('admincss/js/charts-home.js') }}"></script>
    <script src="{{ asset('admincss/js/front.js') }}"></script>
</body>

</html>