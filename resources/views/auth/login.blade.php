<!DOCTYPE html>
<html lang="en" class="loading">
<!-- BEGIN : Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
        content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Login Page</title>
    <link rel="apple-touch-icon" sizes="60x60" href="app-assets/img/ico/apple-icon-60.png">
    <link rel="apple-touch-icon" sizes="76x76" href="app-assets/img/ico/apple-icon-76.png">
    <link rel="apple-touch-icon" sizes="120x120" href="app-assets/img/ico/apple-icon-120.png">
    <link rel="apple-touch-icon" sizes="152x152" href="app-assets/img/ico/apple-icon-152.png">
    <link rel="shortcut icon" type="image/x-icon" href="app-assets/img/ico/favicon.ico">
    <link rel="shortcut icon" type="image/png" href="app-assets/img/ico/favicon-32.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link
        href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/simple-line-icons/style.css">
    <link rel="stylesheet" type="text/css" href="app-assets/fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/prism.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/app.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <!-- END Page Level CSS-->
</head>
<!-- END : Head-->

<!-- BEGIN : Body-->

<body data-col="1-column" class=" 1-column  blank-page">

    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
        <div class="main-panel">
            <!-- BEGIN : Main Content-->
            <div class="main-content">
                <div class="content-wrapper">
                    <!--Login Page Starts-->
                    <section id="login">
                        <div class="container-fluid">
                            <div class="row full-height-vh m-0">
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="card-body login-img">
                                                <div class="row m-0">
                                                    <div
                                                        class="col-lg-6 d-lg-block d-none py-2 text-center align-middle">
                                                        <img src="app-assets/img/gallery/login.png" alt=""
                                                            class="img-fluid mt-5" width="400" height="230">
                                                    </div>

                                                    <div class="col-lg-6 col-md-12 bg-white px-4 pt-3">
                                                        <h4 class="mb-2 card-title">Masuk</h4>
                                                        <p class="card-text mb-3">
                                                            Selamat Datang Silahkan Masuk
                                                        </p>
                                                        <x-jet-authentication-card>
                                                            <x-slot name="logo">
                                                            </x-slot>
                                                            
                                                            <form method="POST" action="{{ route('login') }}">
                                                                @csrf
                                                                <x-jet-input id="email" class="form-control mb-3"
                                                                    placeholder="Email" type="email" name="email"
                                                                    :value="old('email')" required autofocus />
                                                                    <p class="text-danger">{{ $errors->first('email')}}</p>
                                                                <x-jet-input id="password" class="form-control mb-1"
                                                                    placeholder="Password" type="password"
                                                                    name="password" required
                                                                    autocomplete="current-password" />
                                                                    <p class="text-danger">{{ $errors->first('password')}}</p>
                                                                    <a href="{{ route('forgot.password.get') }}">Lupa Kata Sandi?</a>
                                                                <div class="fg-actions d-flex justify-content-between">
                                                                    <div class="login-btn mt-4">
                                                                        <button class="btn btn-outline-primary">
                                                                            <a class="text-decoration-none"
                                                                                href="{{ route('register.index') }}">
                                                                                {{ __('Belum Punya Akun') }}
                                                                            </a>
                                                                        </button>
                                                                    </div>
                                                                    <div class="flex items-center justify-start mt-4">

                                                                        <!-- <div class="login-btn">
                                                                            <x-jet-button class="btn btn-primary">
                                                                                {{ __('Masuk') }}
                                                                            </x-jet-button>
                                                                        </div> -->
                                                                        <div class="form-group">
                                                                        <button class="btn btn-primary">Masuk</button>
                                                                    </div>
                                                            </form>
                                                    
                                                        </x-jet-authentication-card>
                                                    </div>

                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                </section>
                <!--Login Page Ends-->

            </div>
        </div>
        <!-- END : End Main Content-->
    </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="app-assets/vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="app-assets/vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="app-assets/js/app-sidebar.js" type="text/javascript"></script>
    <script src="app-assets/js/notification-sidebar.js" type="text/javascript"></script>
    <script src="app-assets/js/customizer.js" type="text/javascript"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->

</body>
<!-- END : Body-->

</html>
