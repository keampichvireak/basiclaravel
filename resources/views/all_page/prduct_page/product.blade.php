@extends('all_page.app.app')
@include('all_page.app.navbar')

<div class="container mb-3 mt-3">
    {{-- loding page --}}
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <h4 class="fa-solid">Products List</h4>
    @include('all_page.message.message')
    <div class="card mt-3" style="background: rgb(245, 243, 243)">
        <div class="card-body">
            <a href="{{ route('product.create') }}" class="btn btn-primary" aria-controls="offcanvasRight">Add New
                Product</a>
            <div class="table-responsive">
                <table class="table table-hover align-middle mt-2 mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Processor</th>
                            <th>Ram</th>
                            <th>Storange_Capcity</th>
                            <th>Display_Size</th>
                            <th>Graphic_Card</th>
                            <th>Color</th>
                            <th>Warranty_Period</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th>{{ $product->id }}</th>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->model }}</td>
                                <td>{{ $product->processor }}</td>
                                <td>{{ $product->ram }}</td>
                                <td>{{ $product->storange_capcity }}</td>
                                <td>{{ $product->display_size }}</td>
                                <td>{{ $product->graphic_card }}</td>
                                <td>{{ $product->color }}</td>
                                <td>{{ $product->warranty_period }}</td>
                                <td>
                                    <img src="{{ Storage::url($product->image) }}" alt="" width="100">
                                </td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td><a href="{{ route('products.edit', $product) }}" class="btn "><i
                                            class="fa-solid fa-pen-to-square" style="color: #40a7c9;"></i></a>

                                    <button type="button" class="btn btn_delete"
                                        data-url={{ route('products.destroy', $product) }}><i class="fa-solid fa-trash"
                                            style="color: #df4e4e;"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('all_page.app.footer')

@section('js')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
            });

            $(document).on("click", ".btn_delete", function(e) {
                e.preventDefault();

                $this = $(this);

                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success",
                        cancelButton: "btn btn-danger"
                    },
                    buttonsStyling: false
                });
                swalWithBootstrapButtons.fire({
                    title: "Are you sure?",
                    text: "Do you really want to delete this project?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        $.post($this.data('url'), {
                            _method: 'DELETE',
                            //  _token: {{ csrf_token() }}
                        }, function(res) {
                            $this.closest('tr').fadeOut(500, function() {
                                $(this).remove();
                            });
                        })
                    }
                });
            });
        });
    </script>
@endsection
