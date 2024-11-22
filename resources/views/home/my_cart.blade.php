<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')

    <style>
        /* Tombol Hapus */
        .remove-btn {
            padding: 5px 10px;
            background-color: #ff4d4d;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .remove-btn:hover {
            background-color: #ff1a1a;
        }

        /* Wrapper untuk tabel */
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 40px;
        }

        /* Tabel produk */
        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            background-color: #f9f9f9;
            text-align: center;
        }

        th,
        td {
            padding: 15px;
            font-size: 18px;
            border-top: 1px solid #ddd;
        }

        .modal {
            z-index: 1050;
        }

        /* Media Queries untuk layar tablet */
        @media (max-width: 768px) {

            table,
            th,
            td {
                font-size: 14px;
            }

            table {
                width: 100%;
                max-width: 100%;
            }

            .div_deg h1 {
                font-size: 24px;
                text-align: center;
            }

            .remove-btn {
                padding: 5px;
                font-size: 12px;
            }

            th,
            td {
                padding: 10px;
            }
        }

        /* Media Queries untuk layar ponsel */
        @media (max-width: 480px) {
            .div_deg {
                flex-direction: column;
                margin: 10px;
            }

            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th,
            td {
                padding: 8px;
                font-size: 12px;
            }

            .remove-btn {
                font-size: 10px;
                padding: 4px 8px;
            }

            .modal-dialog {
                max-width: 90%;
                margin: auto;
            }

            /* Mengurangi padding di dalam modal */
            .modal-body {
                padding: 15px;
            }

            .modal-footer {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include("home.header")
    </div>

    <div class="container my-4">
        <!-- Section Cart -->
        <div class="row">
            <!-- Cart Items -->
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Your Cart</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $value = 0; ?>
                                @foreach($cart as $cartItem)
                                <tr>
                                    <td>{{ $cartItem->product->title }}</td>
                                    <td>${{ number_format($cartItem->product->price, 2) }}</td>
                                    <td>
                                        <img src="/products/{{ $cartItem->product->image }}" alt="Product Image" class="img-thumbnail" width="100px">
                                    </td>
                                    <td>
                                        <form action="{{ url('cart_remove', $cartItem->id) }}" method="POST" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmRemove(this)">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                                $price = floatval(str_replace('$', '', $cartItem->product->price));
                                $value += $price;
                                ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Order Form -->
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white">
                        <h4>Order Details</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('place_order') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="receiver_name">Receiver Name</label>
                                <input type="text" name="receiver_name" id="receiver_name" class="form-control" placeholder="Enter receiver name" value="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="receiver_phone">Receiver Phone</label>
                                <input type="text" name="receiver_phone" id="receiver_phone" class="form-control" placeholder="Enter receiver phone" value="{{ Auth::user()->phone }}" required>
                            </div>
                            <div class="form-group">
                                <label for="receiver_address">Receiver Address</label>
                                <textarea name="receiver_address" id="receiver_address" class="form-control" rows="3" placeholder="Enter receiver address" required>{{ Auth::user()->address }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Price Section -->
        <div class="row mt-4">
            <div class="col">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h3>Total Price: <span class="text-success">${{ number_format($value, 2) }}</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @include("home.footer")

    <!-- Modal Bootstrap untuk konfirmasi -->
    <div class="modal fade" id="confirmRemoveModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 10px; overflow: hidden; border: none;">
                <div class="modal-header" style="background-color: #ff4d4d; color: white;">
                    <h5 class="modal-title" id="modalLabel" style="font-weight: bold;">Confirm Removal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white; font-size: 1.5rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="font-size: 1.1rem; color: #333; text-align: center;">
                    <p>Remove this item from your cart?</p>
                    <div style="font-size: 0.9rem; color: #666; margin-top: 5px;">
                        This action cannot be undone.
                    </div>
                </div>
                <div class="modal-footer" style="justify-content: center; border-top: none;">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="padding: 10px 20px; border-radius: 5px;">
                        Cancel
                    </button>
                    <button type="button" class="btn btn-danger" id="confirmRemoveBtn" style="padding: 10px 20px; border-radius: 5px; background-color: #ff1a1a;">
                        Yes, Remove
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentForm;

        function confirmRemove(button) {
            currentForm = button.closest('form');
            $('#confirmRemoveModal').modal('show');
        }

        document.getElementById('confirmRemoveBtn').addEventListener('click', function() {
            if (currentForm) {
                currentForm.submit();
                $('#confirmRemoveModal').modal('hide');
            }
        });
    </script>


</body>

</html>