@extends('all_page.app.app')
@include('all_page.app.navbar')

<div class="container mb-3 mt-3">
    {{-- loding page --}}
    <div id="preloader">
        <div class="loader"></div>
    </div>
    @include('all_page.cart.edit-order-model')
    <h4 class="fa-solid">Payment & Shipping</h4>
    @include('all_page.message.message')
    <div class="card mt-3" style="background: rgb(245, 243, 243)">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mt-2 mb-0" id="tablepayment">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Model</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>User_Name</th>
                            <th>Time</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product_order as $item)
                            <tr>
                                <th>{{ $item->id }}</th>
                                <td>{{ $item->model }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>$ {{ $item->total }}</td>
                                <td>{{ $item->phone }}</td>
                                <td>{{ $item->address }}</td>
                                <td>{{ $item->getUser->name }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>
                                    @if ($item->status == 1)
                                        <div class="text-primary">Waiting</div>
                                    @else
                                        <div class="text-danger">SentOut</div>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-editorder" data-bs-toggle="modal"
                                        data-bs-target="#editorder" value="{{ $item->id }}"><i
                                            class="fa-solid fa-truck-moving" style="color: #4b8109;"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            //Edit Status Order
            $(document).on("click", ".btn-editorder", function(e) {
                e.preventDefault();
                var orderid = $(this).val();
                $('#editorderid').val(orderid);

                $.ajax({
                    type: "get",
                    url: "/admin/editsubject/" + orderid,
                    success: function(res) {
                        if (res.status == 200) {
                            if (res.data.sub_status == 1) {
                                $('#edit_sub_status').val(res.data.sub_status).prop('checked',
                                    true);
                            }
                        }
                    }
                });
            });

            // //Update Status Order
            $(document).on("click", ".btn-updatesubject", function(e) {
                e.preventDefault();

                var updatesubjectid = $('#editorderid').val();
                var updatestatus = $('#edit_sub_status').is(':checked');

                var data = {
                    'sub_status': updatestatus == true ? '1' : '0',
                }
                $.ajax({
                    type: "put",
                    url: "/admin/updatesubject/" + updatesubjectid,
                    data: data,
                    dataType: "json",
                    success: function(res) {
                        if (res.status == 200) {
                            $("#editorder").modal("hide");
                            window.location.reload();
                        }
                    }
                });
            });
        });
    </script>
@endsection
