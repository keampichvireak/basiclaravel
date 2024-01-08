<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('cardstyle/cardstyle.css') }}">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <form action="{{ route('oder.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="w-100 vh-100 bg-light">
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
                                    <div class="fs-4 mt-2 cardFont text-shadow-white" id="visualNumber">1234 5678 1234
                                        5678
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col"></div>
                                        <div class="col text-shadow-white"><span id="visualMonth">12</span>/<span
                                                id="visualYear">24</span></div>
                                    </div>
                                    <div class="text-info text-shadow-black"><strong id="visualName">P John Doe</strong>
                                    </div>
                                </div>
                                <div class="cardStyle cardBack pt-3">
                                    <div class="mt-4 p-4 bg-black"></div>
                                    <div class="mb-3 bg-white">
                                        <div class="d-flex justify-content-between">
                                            <div class="p-3 bg-white"></div>
                                            <div class="p-3 bg-light"><em id="visualCVV">123</em></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
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
</body>
<script src="index.js"></script>
<script>
    window.addEventListener('load', toggleForm('credit'))

    function toggleForm(e) {
        document.getElementById('formType').innerHTML = e === 'credit' ? `<div class="form-floating mt-3">
        <input id="nameOnCard" type="text" class="form-control">
        <label for="nameOnCard">Name On Card</label>
      </div>
      <div class="form-floating mt-3">
        <input id="cardNumber" type="text" class="form-control">
        <label for="cardNumber">Card Number</label>
      </div>
      <div class="row g-3">
        <div class="col">
          <div class="form-floating mt-3">
            <input id="expiry_mm" type="text" class="form-control">
            <label for="expiry_mm">Expiry (mm)</label>
          </div>
        </div>
        <div class="col">
          <div class="form-floating mt-3">
            <input id="cvv" type="text" class="form-control">
            <label for="cvv">CVV</label>
          </div>
        </div>
      </div>` : `<div class="form-floating mt-3">
        <input id="accountHolder" type="text" class="form-control">
        <label for="accountHolder">Name of Account Holder</label>
      </div>
      <div class="form-floating mt-3">
        <input id="routing" type="text" class="form-control">
        <label for="routing">Routing Number</label>
      </div>
      <div class="form-floating mt-3">
        <select name="accountType" id="accountType" class="form-control">
          <option value="checking">Checking</option>
          <option value="savings">Savings</option>
        </select>
        <label for="accountType">Account Type</label>
      </div>`
    }
</script>
<script>
    function updateCard(t, id) {
        var elem = document.getElementById(id)
        var num = t.value
        if (id === 'visualNumber') {
            if (num.length > 16) return t.value = num.substr(0, 16)
            num = num.toString().match(/.{4}/g) ? num.toString().match(/.{4}/g).join(' ') : num;
        }
        elem.innerText = num
    }

    function protect(t, end) {
        var num = t.value
        t.value = num.substr(num.length - 4, num.length)
    }
</script>

</html>
