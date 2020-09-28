<!DOCTYPE html>
<html>

<head>
    <title>::Admin Login::</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}" />
    <!-- Bootstrap -->
    <!-- global css -->
    <link href="{{asset('assets/css/app.css')}}" rel="stylesheet">
    <!-- end of global css -->
    <!--page level css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link href="{{asset('assets/css/login2.css')}}" rel="stylesheet">
    <!--end page level css-->
</head>

<body class="bg-slider">
<div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row " id="form-login">
        <div class="col-md-8  col-sm-8  col-10 mx-auto login-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="header">
                        <h2 class="text-center">
                            Login
                            <small> with</small>
                            <img src="{{asset('assets/img/pages/logo.png')}}" alt="logo">
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row row-bg-color">
                <div class="col-lg-8 col-12 core-login">
                    <form class="form-horizontal" action="{{URL::to('index')}}" id="authentication">
                        <!-- CSRF Token -->
                        <input type="hidden" name="_token" value="sSAo7cToGJCJ2IBFgOpYbLNnqV5n8O4DdNG5jdez"/>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="email">EMAIL</label>
                                    <div class="input-group">
                                        <input type="text" placeholder="Email Address" class="form-control"
                                               name="username" id="email" value=""/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group ">
                                    <label class="control-label" for="password">PASSWORD</label>
                                    <div class="input-group">
                                        <input type="password" placeholder="Password" class="form-control"
                                               name="password" id="password"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                                <input type="checkbox" name="remember" id="remember"> &nbsp;
                            <label for="remember"> Remember Me </label>
                            <a href="{{URL::to('forgot_password')}}" id="forgot" class="text-primary forgot1  pull-right"> Forgot Password? </a>
                        </div>
                        <div class="form-group ">
                            <button type="submit"  class="btn btn-primary login-btn">Login</button>
                            <br>
                            <hr>
                            <span> New to Core Plus?<a href="{{URL::to('register')}}"> Sign Up</a></span>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="social-buttons">
                        <p class="text-center">
                            <label>YOU CAN ALSO LOGIN WITH</label>
                        </p>
                        <a class="btn btn-block btn-social btn-google-plus text-white">
                            <i class="fa fa-google-plus"></i> Login with Google
                        </a>
                        <a class="btn btn-block btn-social btn-facebook  text-white">
                            <i class="fa fa-facebook"></i> Login with Facebook
                        </a>
                        <a class="btn btn-block btn-social btn-twitter text-white">
                            <i class="fa fa-twitter"></i> Login with Twitter
                        </a>
                        <a class="btn btn-block btn-social btn-linkedin text-white">
                            <i class="fa fa-linkedin"></i> Login with LinkedIn
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/js/backstretch.js')}}"></script>
<!-- end of global js -->
<!-- page level js -->
<script type="text/javascript" src="{{asset('assets/vendors/iCheck/js/icheck.js')}}"></script>
<script src="{{asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('assets/js/custom_js/login.js')}}"></script>
<!-- end of page level js -->
</body>

</html>
