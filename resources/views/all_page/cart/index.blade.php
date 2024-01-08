@extends('all_page.app.app')
@include('all_page.app.navbar')

<div class="container">
    <div id="cart">
        <form action="{{ route('oder.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-hover align-middle mt-2 mb-0">
                <div>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th style="text-align: center">Sub TOTAL</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="border-bottom: 6px solid rgb(73, 73, 73);">
                        @php $total = 0 @endphp
                        @if (session('cart'))
                            @foreach (session('cart') as $id => $product)
                                @php $total += $product['price'] * $product['quantity'] @endphp
                                <tr data-id="{{ $id }}">

                                    <td data-th="Product">
                                        <div class="row">
                                            <div class="col-sm-9">
                                                <h4 class="nomargin">{{ $product['model'] }}</h4>
                                                <input type="hidden" name="model" id="model"
                                                    value="{{ $product['model'] }}">
                                            </div>
                                        </div>
                                    </td>
                                    <td data-th="Price">${{ $product['price'] }}</td>
                                    <td data-th="Quantity">
                                        <input type="number" name="quantity" id="quantity"
                                            value="{{ $product['quantity'] }}" class="form-control quantity cart_update"
                                            min="1" />
                                    </td>
                                    <td data-th="Subtotal" class="text-center">
                                        ${{ $product['price'] * $product['quantity'] }}
                                        <input type="hidden" name="total" id="total"
                                            value="{{ $product['price'] * $product['quantity'] }}">
                                    </td>
                                    <td class="actions" data-th="">
                                        <button class="btn btn-sm cart_remove"><i class="fa-solid fa-trash"
                                                style="color: #f33968;"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>

                </div>

                <tr>
                    <td colspan="5" class="text-right">
                        <h3><strong>Total ${{ $total }}</strong></h3>
                    </td>
                </tr>
            </table>
            <div class="w-100 vh-85">
                <div class="d-flex h-100 align-items-center">
                    <div class="col-xl-8 col-lg-10 col-md-10 col-sm-10 mx-auto">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-sm-12 col-xs-12">
                                <div class="position-relative">
                                    <div class="cardStyle">
                                        <div class="text-end"><strong>DB BANK</strong></div>
                                        <div class="mt-3 d-flex align-items-center justify-content-between">
                                            <!-- <div><img src="/static_files/images/logos/chip.png" alt="Chip" height="32"></div>
                                          <div><img style="transform:rotate(90deg)" src="/static_files/svgs/wifi.svg" alt="Chip" height="24"></div> -->
                                        </div>
                                        <div class="fs-4 mt-2 cardFont text-shadow-white" id="visualNumber">
                                            1234
                                            5678 1234
                                            5678
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col"></div>
                                            <div class="col text-shadow-white"><span id="visualMonth">12</span>/<span
                                                    id="visualYear">24</span></div>
                                        </div>
                                        <div class="text-info text-shadow-black"><strong id="visualName">
                                                PIKAPU
                                            </strong>
                                        </div>
                                    </div>
                                    <div class="cardStyle cardBack pt-3">
                                        <div class="mt-4 p-4 bg-black"></div>
                                        <div class="mb-3 bg-white">
                                            <div class="d-flex justify-content-between">
                                                <div class="p-3 bg-white"></div>
                                                <div class="p-3 bg-light"><em id="visualCVV">123</em>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 ">
                                <div class="px-4 py-5 bg-white customRounded shadow">
                                    <h4>Payment Details</h4>
                                    <form action="">
                                        <input type="hidden" class="form-control" id="user_order" name="user_order"
                                            value="{{ Auth::user()->id }}">

                                        <input class="form-control" type="text" id="phone" name="phone"
                                            placeholder="Phone" value="{{ old('phone') }}">
                                        <!-- Other input fields ... -->
                                        @error('phone')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input class="form-control" type="text" id="address" name="address"
                                            placeholder="Address" value="{{ old('address') }}">
                                        @error('address')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input class="form-control" type="text" id="cardname" name="cardname"
                                            placeholder="Card Name" value="{{ old('cardname') }}">
                                        @error('cardname')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <input class="form-control" type="text" id="cardnumber" name="cardnumber"
                                            placeholder="Card Number" value="{{ old('cardnumber') }}">
                                        @error('cardnumber')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                        <div class="mt-3 d-flex">
                                            <button class="btn btn-primary w-75 me-2">PAY </button>
                                            <a href="" class="btn btn-outline-primary w-25 ms-2 ">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".cart_remove").click(function(e) {
            e.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to remove?")) {
                $.ajax({
                    url: '{{ route('remove_from_cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("data-id")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
@endsection
