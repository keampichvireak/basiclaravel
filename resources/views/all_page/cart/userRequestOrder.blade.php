@extends('all_page.app.app')
@include('all_page.app.navbar')

<div class="container">
    <div id="cart">
        <form action="{{ route('oder.store') }}" id="formcart" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="table table-hover align-middle mt-2 mb-0">
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
                                {{-- IDproduct --}}
                                <input type="hidden" name="prodct_ID" id="prodct_ID" value="{{ $id }}">
                                {{-- //////////////////////////////////////////////////////////////// --}}
                                <td data-th="Product">
                                    <div class="row">
                                        <div class="col-sm-9">
                                            <h4 class="nomargin">{{ $product['model'] }}</h4>
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
                                    <button class="btn btn-sm cart_remove"><i class="fa-solid fa-check"></i></button>
                                    {{-- <a href="{{route('home')}}" class="btn btn-sm cart_remove"><i class="fa-solid fa-trash"
                                            style="color: #f33968;"></i></a> --}}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="5" class="text-right">
                            <h3><strong>Total ${{ $total }}</strong></h3>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        $(".cart_update").change(function(e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update-cart-order') }}',
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

            if (confirm("Comform")) {
                $.ajax({
                    url: '{{ route('remove-from-order') }}',
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
