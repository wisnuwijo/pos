<!DOCTYPE html>
<html>

<head>
    <title>Lockscreen</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.ico')}}"/>
    <!-- Bootstrap -->


    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/app.css')}}"/>

    <!-- styles -->
    <!--page level css -->
    <link href="{{asset('assets/css/lockscreen2.css')}}" rel="stylesheet">
    <!--end page level css-->
</head>

<body class="background-img">
<div class="preloader">
    <div class="loader_img"><img src="{{asset('assets/img/loader.gif')}}" alt="loading..." height="64" width="64"></div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4 col-sm-6  col-10 mx-auto">
            <div class="lockscreen-container">
                <div id="output"></div>
                <div class="user-name">
                    <h4 class="text-center">Nataliapery</h4>
                    <small>ADMIN</small>
                </div>
                <div class="avatar"></div>
                <div class="form-box">
                    <form action="#" method="post">
                        <div class="form">
                            <h4>
                                <small class="locked">Enter the Password to Unlock</small>
                                <small class="unlocked hidden">Unlocked</small>
                            </h4>
                            <input type="password" name="user" class="form-control" placeholder="Password">
                            <button class="btn btn-info login text-white text" id="index" type="submit">GO</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->

<script src="{{asset('assets/js/app.js')}}" type="text/javascript"></script>

<!-- end of global js -->
<!-- page css -->
<script src="{{asset('assets/js/lockscreen2.js')}}"></script>
<!-- end of page css -->
</body>

</html>