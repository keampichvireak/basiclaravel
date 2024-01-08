@extends('all_page.app.app')
@include('all_page.app.navbar')
@yield('content')


<body>
    <section style="padding-left: 100px; padding-right:100px">
        {{-- loding page --}}

        @include('all_page.message.message')
        <h2><a class="nav-link" href=""><i class="fa-solid">Coming soon</i></a></h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-2">
            @foreach ($accessorys as $accessory)
                <div class="col mb-5">
                    <div class="card h-100"
                        style="background: rgb(246, 244, 244); padding: 10px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
                        <!-- Product image-->
                        <img src="{{ Storage::url($accessory->image) }}" alt="">
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="fw-bolder">Model: {{ $accessory->model }}</h5>
                                <h3>{{ $accessory->price }}$</h3>
                                <p>Category: {{ $accessory->category }}</p>
                                <p>Brand: {{ $accessory->brand }}</p>
                                <p>Color: {{ $accessory->color }}</p>
                            </div>
                        </div>
                        <!-- Product actions-->
                        {{-- <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="{{ route('add.to.cart', $accessory->id) }}">Add To
                                    Cart</a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            @endforeach

        </div>
        @extends('all_page.app.footer')
    </section>
</body>
