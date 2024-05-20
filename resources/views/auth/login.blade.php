<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

    <title>School Management - SolCBE </title>

    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

    <!-- Style-->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>

<body class="hold-transition theme-primary dark-skin">

    <div class="container h-p100">
        <div class="row align-items-center justify-content-md-center h-p100">

            <div class="col-12">
                <div class="row justify-content-center no-gutters">
                    <div class="col-lg-4 col-md-5 col-12">
                        <div class="content-top-agile p-10">
                            <h2 class="text-white">SolCBE</h2>
                            <p class="text-white-50">School Management System</p>
                        </div>
                        <div class="p-30 rounded30 box-shadowed b-2 b-dashed">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-transparent text-white"><i class="ti-email"></i></span>
                                        </div>
                                        <input type="email" id="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Email" :value="old('email')" required autofocus>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text  bg-transparent text-white"><i class="ti-lock"></i></span>
                                        </div>
                                        <input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Enter Password" required autocomplete="current-password">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="checkbox text-white">
                                            <input name="remember" type="checkbox" id="basic_checkbox_1">
                                            <label for="basic_checkbox_1">Remember Me</label>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-6">
                                        <div class="fog-pwd text-right">
                                            <a href="{{ route('password.request') }}" class="text-white hover-info"><i class="ion ion-locked"></i> Forgot Password?</a><br>
                                        </div>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-info btn-rounded mt-10">Login</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                            </form>

                            <!-- <div class="text-center text-white">
                                <p class="mt-20">- Masuk menggunakan -</p>
                                <p class="gap-items-2 mb-20">
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-google-plus"></i></a>
                                    <a class="btn btn-social-icon btn-round btn-outline btn-white" href="#"><i class="fa fa-instagram"></i></a>
                                </p>
                            </div> -->

                            <div class="text-center">
                                <p class="mt-15 mb-0 text-white">Do not have an account? <a href="{{ route('register') }}" class="hover-info ml-5">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Vendor JS -->
    <script src="{{ asset('backend/js/vendors.min.js') }}"></script>
    <script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        var toastMixin = Swal.mixin({
            toast: true,
            icon: 'success',
            background: '#1A233B',
            title: '',
            animation: false,
            position: 'top-right',
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: false,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        switch (type) {
            case 'info':
                toastMixin.fire({
                    background: '#1A233B',
                    iconColor: '#7a15f7',
                    animation: true,
                    title: "{{ Session::get('message') }}",
                });
                break;
            case 'warning':
                toastMixin.fire({
                    background: '#1A233B',
                    iconColor: '#F18700',
                    animation: true,
                    title: "{{ Session::get('message') }}",
                });
                break;
            case 'success':
                toastMixin.fire({
                    background: '#1A233B',
                    iconColor: '#00BC8B',
                    animation: true,
                    title: "{{ Session::get('message') }}",
                });
                break;
            case 'error':
                toastMixin.fire({
                    background: '#1A233B',
                    icon: 'error',
                    iconColor: '#ef3737',
                    animation: true,
                    title: "{{ Session::get('message') }}",
                });
                break;
        }
        @endif
    </script>

</body>

</html>
