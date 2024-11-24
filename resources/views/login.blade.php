<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Halaman Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['{{ asset('assets/css/fonts.min.css') }}']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/atlantis.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body class="login">
    @include('sweetalert::alert')
    <div class="wrapper wrapper-login">
        <div class="container container-login animated fadeIn">
            <h3 class="text-center">Selamat Datang</h3>
            <form action="/loginverif" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="login-form">
                    <div class="form-group form-floating-label">
                        <input id="username" name="nik" value="{{ old('nik') }}" type="number"
                            class="form-control input-border-bottom" required>
                        <label for="username" class="placeholder">NIK</label>
                    </div>
                    <div class="form-group form-floating-label">
                        <input id="password" name="password" type="password" class="form-control input-border-bottom"
                            required>
                        <label for="password" class="placeholder">Password | default:oneject</label>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    <div class="form-action mb-3">
                        <button class="btn btn-primary btn-rounded btn-login">Login</button>
                    </div>
            </form>
            <div class="login-account">
                <span class="msg">Powered By NetsinCode</span>
            </div>
        </div>
    </div>
    </div>
    <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/atlantis.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        Toastify({
            text: "", // Empty text field, we will use `element`
            element: document.createElement("div"), // Create a new div element
            duration: 4000,
            close: true,
            gravity: "top", // `top` or `bottom`
            position: "right", // `left`, `center`, or `right`
            stopOnFocus: true, // Prevents dismissing of toast on hover
            style: {
                background: "##2596be", // Soft pink gradient
                color: "#fff", // White text
                borderRadius: "8px",
                padding: "10px 20px",
                fontFamily: "'Roboto', sans-serif",
                boxShadow: "0 4px 10px rgba(0, 0, 0, 0.2)",
                textAlign: "left"
            },
            onClick: function() {
                console.log("Toast clicked!");
            } // Callback after click
        }).showToast();

        // Add the HTML content to the element
        document.querySelector('.toastify').innerHTML = `
    <strong>Demo Akun:</strong><br>
    <strong>==========</strong><br>
    <strong>Admin</strong><br>
    NIK: <strong>11223344</strong><br>
    Password: <strong>oneject</strong><br>
    <strong>==========</strong><br>
    <strong>User</strong><br>
    ID Card: <strong>123456</strong><br>
    Password: <strong>oneject</strong><br>
    <strong>==========</strong><br>
    <strong>Github: <a style="color: #fff;" href="https://github.com/wahyuadin/one-ject">Oneject</a></strong><br>
    `;
    </script>
</body>

</html>
