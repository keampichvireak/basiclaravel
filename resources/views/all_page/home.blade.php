@extends('all_page.app.app')
@include('all_page.app.navbar')
@yield('content')

<body>
    {{-- loding page --}}

    @include('all_page.message.message')
    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-3">
            <div class="text-center text-white">
                <h1 class="display-4 fw-bolder">
                    <font face="Comic Sans MS" color="#FFF">Elevate Your Shopping Experience with Distinctive Elegance.
                </h1>
                <p class="lead fw-normal text-white-50 mb-0"
                    style="font-family: 'Courier New', Courier, monospace; color: #ff5733; font-size: 20px;">
                    "Unveil a Symphony of Sophistication as You Explore
                    Exquisite Retail."
                </p>
            </div>
        </div>
    </header>
    <!-- Section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-2 ">
            <h2><a class="nav-link" style="color:black"href="#"><i class="fa-solid">LAPTOP & ACCESSORY</i></a></h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center mt-2">

                @foreach ($products as $product)
                    {{-- <div class="col mb-5">
                        <div class="card h-100" style="background: rgb(246, 244, 244);padding: 10px;">
                            <!-- Product image-->
                            <img src="{{ Storage::url($product->image) }}" alt="">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder">Model: {{ $product->model }}</h5>
                                    <h3>{{ $product->price }}$</h3>
                                    <p>Brand: {{ $product->brand }}</p>
                                    <p>CPU: {{ $product->processor }}</p>
                                    <p>RAM: {{ $product->ram }}</p>
                                    <p>Storage: {{ $product->storange_capcity }}</p>
                                    <p>Dosplay: {{ $product->display_size }}</p>
                                    <p>GrapicCard: {{ $product->graphic_card }}</p>
                                    <p>Color: {{ $product->color }}</p>
                                    <p>Warranty: {{ $product->warranty_period }}</p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('add.to.cart', $product->id) }}">Add To
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-4 col-md-6 mb-5">
                        <div class="card h-100"
                            style="background: rgb(246, 244, 244); padding: 10px; border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
                            <!-- Product image-->
                            <img src="{{ Storage::url($product->image) }}" alt=""
                                style="border-top-left-radius: 10px; border-top-right-radius: 10px; max-height: 200px; object-fit: cover;">
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <h5 class="fw-bolder mb-3">Model: {{ $product->model }}</h5>
                                    <h3 class="mb-3">{{ $product->price }}$</h3>
                                    <!-- Other product details here -->
                                    <p class="mb-2">Brand: {{ $product->brand }}</p>
                                    <p class="mb-2">CPU: {{ $product->processor }}</p>
                                    <p class="mb-2">RAM: {{ $product->ram }}</p>
                                    <p class="mb-2">Storage: {{ $product->storage_capacity }}</p>
                                    <p class="mb-2">Display: {{ $product->display_size }}</p>
                                    <p class="mb-2">Graphic Card: {{ $product->graphic_card }}</p>
                                    <p class="mb-2">Color: {{ $product->color }}</p>
                                    <p class="mb-2">Warranty: {{ $product->warranty_period }}</p>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                        href="{{ route('add.to.cart', $product->id) }}">Add To
                                        Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <h2><a class="nav-link" style="color:black" href="#"><i class="fa-solid">Coming soon</i></a></h2>
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
        </div>
        @extends('all_page.app.footer')
    </section>

</body>
