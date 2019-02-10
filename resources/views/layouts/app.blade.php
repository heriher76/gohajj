<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>GoHajj</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{ url('assets/images/x-logo.ico') }}">

        <!--Google Font link-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


        <link rel="stylesheet" href="{{ url('assets/css/slick/slick.css') }}"> 
        <link rel="stylesheet" href="{{ url('assets/css/slick/slick-theme.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/animate.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/iconfont.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/bootsnav.css') }}">

        <!-- xsslider slider css -->


        <!--<link rel="stylesheet" href="assets/css/xsslider.css">-->




        <!--For Plugins external css-->
        <!--<link rel="stylesheet" href="assets/css/plugins.css" />-->

        <!--Theme custom css -->
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
        <!--<link rel="stylesheet" href="assets/css/colors/maron.css">-->

        <!--Theme Responsive css-->
        <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}" />

        <script src="{{ url('assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js') }}"></script>

        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
           integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
           crossorigin=""/>
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
           integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
           crossorigin=""></script>

        @yield('style')
    </head>

    <body data-spy="scroll" data-target=".navbar-collapse">


        <!-- Preloader -->
        <div id="loading">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                    <div class="object" id="object_four"></div>
                </div>
            </div>
        </div><!--End off Preloader -->


        <div class="culmn">
            <!--Home page style-->

            @yield('content')

            <footer id="kontak" class="footer bg-black p-top-40">
                <!--<div class="action-lage"></div>-->
                <div class="container">
                    <div class="row">
                        <div class="widget_area">
                            <div class="col-md-6">
                                <div class="widget_item widget_about">
                                    <img src="{{ url('assets/images/logo-makka-color.png') }}" style="width: 80%; height: auto;" alt="logo gohajj">
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-phone" style="font-size: 40px;"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Phone :</h6>
                                            <p>(0260) 411302 / 411955</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-envelope-o" style="font-size: 40px;"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Email Address :</h6>
                                            <p>kemenag-kab-subang@gmail.com</p>
                                        </div>
                                    </div>
                                    <div class="widget_ab_item m-top-30">
                                        <div class="item_icon"><i class="fa fa-instagram" style="font-size: 40px;"></i></div>
                                        <div class="widget_ab_item_text">
                                            <h6 class="text-white">Instagram :</h6>
                                            <p>@kemenag.kab-subang</p>
                                        </div>
                                    </div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->

                            <div class="col-md-6">
                                <div class="widget_item widget_newsletter sm-m-top-50">
                                    <h4 class="text-white"><center><b>TEMUKAN KAMI</b></center></h5>
                                    <div id="mapid" style="height: 300px;"></div>
                                </div><!-- End off widget item -->
                            </div><!-- End off col-md-3 -->
                        </div>
                    </div>
                </div>
                <div class="main_footer fix bg-mega text-center p-top-40 p-bottom-30 m-top-80">
                    <div class="col-md-12">
                        <p class="wow fadeInRight" data-wow-duration="1s">
                            <a href="#">Penyelenggaraan Haji - Kementrian Agama Kabupaten Subang Copyright &copy; 2019</a> 
                        </p>
                    </div>
                </div>
            </footer>

        </div>

        <!-- JS includes -->

        <script src="assets/js/vendor/jquery-1.11.2.min.js"></script>
        <script src="assets/js/vendor/bootstrap.min.js"></script>

        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.magnific-popup.js"></script>
        <script src="assets/js/jquery.easing.1.3.js"></script>
        <script src="assets/css/slick/slick.js"></script>
        <script src="assets/css/slick/slick.min.js"></script>
        <script src="assets/js/jquery.collapse.js"></script>
        <script src="assets/js/bootsnav.js"></script>



        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/main.js"></script>

        <script>
           // Creating map options
           var mapOptions = {
              center: [-6.5570211, 107.7622087],
              zoom: 15,
           }
           
           // Creating a map object
           var map = new L.map('mapid', mapOptions);
           
           // Creating a Layer object
           var layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
           
           // Adding layer to the map
           map.addLayer(layer);

           // Creating a Marker
           var markerOptions = {
              title: "Kementrian Agama Kabupaten Subang",
              clickable: true,
              draggable: false
           }

           var marker = new L.Marker([-6.5566136649762035 , 107.76180535554889], markerOptions);
           marker.addTo(map);
        </script>

        @yield('script')
    </body>
</html>
