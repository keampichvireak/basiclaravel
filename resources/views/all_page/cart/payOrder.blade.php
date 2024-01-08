@extends('all_page.app.app')
@include('all_page.app.navbar')

<div class="container mb-3 mt-3">
    {{-- loding page --}}
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <h4 class="fa-solid">Payment & Shipping</h4>
    @include('all_page.message.message')
    <div class="card mt-3" style="background: rgb(245, 243, 243)">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle mt-2 mb-0">
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
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
