<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign up </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="{{ url('image/png') }}" href="{{ url('assets/images/icon/favicon.ico') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/slicknav.min.css') }}">

    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />

    <link rel="stylesheet" href="{{ url('assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">

    <script src="{{ url('assets/js/vendor/modernizr-2.8.3.min.js') }}"></script>
    <meta name="robots" content="noindex, nofollow">
    <script nonce="5ee99be9-761a-4fe3-a561-18bbfc27f25f">
        (function(w, d) {
            ! function(dg, dh, di, dj) {
                dg[di] = dg[di] || {};
                dg[di].executed = [];
                dg.zaraz = {
                    deferred: [],
                    listeners: []
                };
                dg.zaraz.q = [];
                dg.zaraz._f = function(dk) {
                    return async function() {
                        var dl = Array.prototype.slice.call(arguments);
                        dg.zaraz.q.push({
                            m: dk,
                            a: dl
                        })
                    }
                };
                for (const dm of ["track", "set", "debug"]) dg.zaraz[dm] = dg.zaraz._f(dm);
                dg.zaraz.init = () => {
                    var dn = dh.getElementsByTagName(dj)[0],
                        dp = dh.createElement(dj),
                        dq = dh.getElementsByTagName("title")[0];
                    dq && (dg[di].t = dh.getElementsByTagName("title")[0].text);
                    dg[di].x = Math.random();
                    dg[di].w = dg.screen.width;
                    dg[di].h = dg.screen.height;
                    dg[di].j = dg.innerHeight;
                    dg[di].e = dg.innerWidth;
                    dg[di].l = dg.location.href;
                    dg[di].r = dh.referrer;
                    dg[di].k = dg.screen.colorDepth;
                    dg[di].n = dh.characterSet;
                    dg[di].o = (new Date).getTimezoneOffset();
                    if (dg.dataLayer)
                        for (const du of Object.entries(Object.entries(dataLayer).reduce(((dv, dw) => ({
                                ...dv[1],
                                ...dw[1]
                            })), {}))) zaraz.set(du[0], du[1], {
                            scope: "page"
                        });
                    dg[di].q = [];
                    for (; dg.zaraz.q.length;) {
                        const dx = dg.zaraz.q.shift();
                        dg[di].q.push(dx)
                    }
                    dp.defer = !0;
                    for (const dy of [localStorage, sessionStorage]) Object.keys(dy || {}).filter((dA => dA
                        .startsWith("_zaraz_"))).forEach((dz => {
                        try {
                            dg[di]["z_" + dz.slice(7)] = JSON.parse(dy.getItem(dz))
                        } catch {
                            dg[di]["z_" + dz.slice(7)] = dy.getItem(dz)
                        }
                    }));
                    dp.referrerPolicy = "origin";
                    dp.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(dg[di])));
                    dn.parentNode.insertBefore(dp, dn)
                };
                ["complete", "interactive"].includes(dh.readyState) ? zaraz.init() : dg.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, "zarazData", "script");
        })(window, document);
    </script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->




    <div class="login-area login-s2">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route('register_submit') }}" method="POST">
                    @csrf
                    <div class="login-form-head">
                        <h4>Sign up</h4>
                        {{-- <p>Hello there, Sign up and Join with Us</p> --}}
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputName1">Full Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}">
                            <i class="ti-user"></i>
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}">
                            <i class="ti-email"></i>
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password">
                            <i class="ti-lock"></i>
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Confirm Password</label>
                            <input type="password" id="retype_password" name="retype_password">
                            <i class="ti-lock"></i>
                            @error('retype_password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1"></label>
                            <input type="date" id="dob" name="dob" value="{{ old('dob') }}">
                            <i class="ti-lock"></i>
                            @error('dob')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword2">Address</label>
                            <input type="text" id="address" name="address" value="{{ old('address') }}">
                            <i class="ti-lock"></i>
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit">Sign up <i class="ti-arrow-right"></i></button>
                            {{-- <div class="login-other row mt-4">
                                <div class="col-6">
                                    <a class="fb-login" href="#">Sign up with <i class="fa fa-facebook"></i></a>
                                </div>
                                <div class="col-6">
                                    <a class="google-login" href="#">Sign up with <i class="fa fa-google"></i></a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="form-footer text-center mt-5">
                            <p class="text-muted">Don't have an account? <a href="{{ route('login') }}">Sign in</a></p>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="{{ url('assets/js/vendor/jquery-2.2.4.min.js') }}"></script>

    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ url('assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ url('assets/js/jquery.slicknav.min.js') }}"></script>

    <script src="{{ url('assets/js/plugins.js') }}"></script>
    <script src="{{ url('assets/js/scripts.js') }}"></script>

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317"
        integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA=="
        data-cf-beacon='{"rayId":"83440d369b9a3bd7","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}'
        crossorigin="anonymous"></script>
</body>

</html>
