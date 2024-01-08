<!doctype html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" type="x-icon" href="{{ asset('imagine/abc.svg') }}">
    <link rel="stylesheet" href="{{ asset('cssfile/style.css') }}">
    <link rel="stylesheet" href="{{ asset('cardstyle/cardstyle.css') }}">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}">
    <title>BYYEBOTIQUE</title>
    {{-- <title>BYTEBOUTIQUE</title> --}}
</head>

<body>

    <section class="ftco-section">
        <nav class="navbar navbar-expand-lg navbar-light ftco_navbar bg-light ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">ByteBoutique <span>Laptop Collection</span></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                    aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fa fa-bars"></span> Menu
                </button>
                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item "><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">Page</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="#">Page 1</a>
                                <a class="dropdown-item" href="#">Page 2</a>
                                <a class="dropdown-item" href="#">Page 3</a>
                                <a class="dropdown-item" href="#">Page 4</a>
                            </div>
                        </li> --}}
                        <li class="nav-item"><a href="{{ route('Product') }}" class="nav-link">PRODUCT</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('Accessory') }}" class="nav-link">Coming soon</a></li>
                        @if (Auth::user()->role == 1)
                            <li class="nav-item"><a class="nav-link" href="{{ route('product') }}"><i
                                        class="fa-solid fa-table-list"> Add Products</i></a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('accessory.index') }}"><i
                                        class="fa-solid fa-headset"> Add Comingsoon(Product)</i></a></li>
                        @endif
                    </ul>
                    <form class="d-flex">


                        @if (Auth::user()->role == 2)

                            <a href="{{ route('view-pay-order') }}" class="btn " style="margin-left: 10px"
                                class="text-danger"><i class="fa-brands fa-amazon-pay fa-beat fa-2xl"
                                    style="color: #42ae57;"></i></a>

                            <div class="dropdown">
                                <button type="button" class="btn btn-primary" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart <span
                                        class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                                </button>

                                <div class="dropdown-menu">
                                    <div class="card">
                                        <div class="card-body" style="width: 300px">
                                            <div class="row total-header-section">
                                                @php $total = 0 @endphp
                                                @foreach ((array) session('cart') as $id => $product)
                                                    @php $total += $product['price'] * $product['quantity'] @endphp
                                                @endforeach
                                                <div class="col-lg-12 col-sm-12 col-12 total-section text-right">
                                                    <h4>Total: <span class="text-danger">$ {{ $total }}</span>
                                                    </h4>
                                                    <div style="border-bottom: 6px solid rgb(73, 73, 73);="></div>

                                                </div>
                                            </div>
                                            @if (session('cart'))
                                                @foreach (session('cart') as $id => $product)
                                                    <div class="row cart-detail">

                                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
                                                            <p>Product Name {{ $product['model'] }}</p>
                                                            <span class="price text-dark">Price
                                                                ${{ $product['price'] }}</span>
                                                            <span class="count">
                                                                Quantity:{{ $product['quantity'] }}</span>
                                                            <div style="border-bottom: 6px solid rgb(73, 73, 73);=">
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="row mt-4">
                                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                                    <a href="{{ route('cart.index') }}"
                                                        class="btn btn-primary btn-block">View
                                                        all</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if (Auth::user()->role == 1)
                            <a href="{{ route('view-user-order') }}" class="btn btn-outline-primary"
                                style="margin-left: 10px" class="text-danger"><i class="fa-solid fa-truck-fast"
                                    style="color: #2f6546;">Shipping</i></a>
                            <a href="{{ route('userRequestOrder') }}" class="btn btn-outline-primary"
                                style="margin-left: 10px" class="text-danger"><i class="fa-solid fa-envelope"
                                    style="color: #4148a4;">
                                    {{ count((array) session('cart')) }}</i></a>
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary text-dark"
                                style="margin-left: 10px"><i class="fa-solid fa-right-from-bracket"
                                    style="color: #e42f1b;">Logout</i></a>
                        @elseif (Auth::user()->role == 2)
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary text-dark"
                                style="margin-left: 10px"><i class="fa-solid fa-right-from-bracket"
                                    style="color: #e42f1b;">Logout</i></a>
                        @endif

                    </form>
                </div>
            </div>
        </nav>
    </section>


</body>

</html>
