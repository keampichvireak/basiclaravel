@extends('all_page.app.app')
@include('all_page.app.navbar')

<div class="container mb-3 mt-3">
    {{-- loding page --}}
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <h4 class="fa-solid">Accessory List</h4>
    @include('all_page.message.message')
    <div class="card mt-3" style="background: rgb(245, 243, 243)">
        <div class="card-body">
            <a href="{{ route('accessory.create') }}" class="btn btn-primary" aria-controls="offcanvasRight">Add
                Product</a>
            <div class="table-responsive">
                <table class="table table-hover align-middle mt-2 mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accessorys as $accessory)
                            <tr>
                                <th>{{ $accessory->id }}</th>
                                <th>{{ $accessory->category }}</th>
                                <td>{{ $accessory->brand }}</td>
                                <td>{{ $accessory->model }}</td>
                                <td>{{ $accessory->color }}</td>
                                <td>
                                    <img src="{{ Storage::url($accessory->image) }}" alt="" width="100">
                                </td>
                                <td>{{ $accessory->price }}</td>
                                <td>{{ $accessory->quantity }}</td>
                                <td><a href="{{ route('accessory.edit', $accessory) }}" class="btn "><i
                                            class="fa-solid fa-pen-to-square" style="color: #40a7c9;"></i></a>

                                    <button type="button" class="btn btn_delete"
                                        data-url={{ route('accessory.destroy', $accessory) }}><i
                                            class="fa-solid fa-trash" style="color: #df4e4e;"></i></button>
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
                    text: "Do you really want to delete this accessoty?",
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
