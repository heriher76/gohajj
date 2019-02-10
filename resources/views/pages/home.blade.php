@extends('layouts.app')

@section('content')

<nav class="navbar navbar-default bootsnav navbar-fixed">

    <div class="container"> 

        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ url('assets/images/logo-makka-color.png') }}" style="max-height: 50px; width: auto; margin-top: -10px;" class="logo" alt="">
                <!--<img src="assets/images/footer-logo.png" class="logo logo-scrolled" alt="">-->
            </a>

        </div>
        <!-- End Header Navigation -->

        <!-- navbar menu -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/') }}">HOME</a></li>                    
                <li><a href="#jamaah">JAMAAH</a></li>
                <li><a href="#pelayanan">PELAYANAN</a></li>
                <li><a href="#info">INFO</a></li>
                <li><a href="#kontak">KONTAK</a></li>
                @guest
                    <li style="background-color: #efdb3e;"><a href="{{ route('login') }}">LOGIN ADMIN</a></li>
                @else
                    <li class="dropdown">
                        <a href="{{ url('/admin') }}" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                            {{ Auth::user()->name }} 
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ url('/admin') }}">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div><!-- /.navbar-collapse -->
    </div> 

</nav>

<!--Home Sections-->

<section id="home" class="home bg-black fix">
    <div class="overlay"></div>
    
        <div class="row">
            <div class="main_home text-center">
                <div class="col-md-12">
                    <div class="hello_slid">
                        <div class="slid_item">
                            <img src="{{ url('assets/images/hajj-slide01.jpg') }}" style="height: 700px; width: 100%;" alt="">
                        </div><!-- End off slid item -->
                        <div class="slid_item">
                            <img src="{{ url('assets/images/hajj-slide02.jpg') }}" style="height: 700px; width: 100%;" alt="">
                        </div><!-- End off slid item -->
                        <div class="slid_item">
                            <img src="{{ url('assets/images/hajj-slide03.jpg') }}" style="height: 700px; width: 100%;" alt="">
                        </div><!-- End off slid item -->
                    </div>
                </div>

            </div>


        </div><!--End off row-->
    
</section> <!--End off Home Sections-->



<!--Featured Section-->
<section id="jamaah" class="features" style="background-color: #307a30;">
    <div class="container">
        <div class="row">
            <div class="main_features fix roomy-70">
                <div class="col-md-9">
                    <div class="features_item sm-m-top-30">
                        <div class="f_item_text">
                            <p style="font-size: 34px; line-height: 40px; color: white;"><b>LIHAT DATA JAMAAH HAJI KABUPATEN SUBANG</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="features_item sm-m-top-30">
                        <div class="f_item_text">
                            <a href="{{ url('lihat-jamaah') }}" class="btn btn-warning" style="background-color: #efdb3e; color: white;">Lihat Data Jamaah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End off row -->
    </div><!-- End off container -->
</section><!-- End off Featured Section-->


<!--Business Section-->
<section id="pelayanan" class="business bg-grey">
    <div class="row">
        <div class="main_business">
            <div class="col-md-12">
                <img src="{{ url('assets/images/Layanan Luar Negeri.jpg') }}" alt="">
            </div>
        </div>
    </div>
</section><!-- End off Business section -->

<!--Test section-->
<section id="info" class="test bg-grey fix">
    <div class="container">
        <div class="row">                        
            <div class="main_test fix">

                <div class="col-md-6" style="padding-top: 20px; padding-bottom: 20px;">
                    <h2><center><b>KOMENTAR</b></center></h2>
                    <form action="{{ url('/commented') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Nama">
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" class="form-control" placeholder="Email"> 
                        </div>
                        <div class="col-md-12" style="padding-top: 10px;">
                            <input type="text" name="subject" class="form-control" placeholder="Subjek"> 
                        </div>
                        <div class="col-md-12" style="padding-top: 10px;">
                            <textarea name="message" class="form-control" rows="10" placeholder="Message"></textarea> 
                        </div>
                        <div class="col-md-12" style="padding-top: 10px;">
                            <button type="submit" class="form-control btn-success" style="background-color: #efdb3e;"><b>KIRIM</b></button>
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="test_item fix sm-m-top-30">
                        <img src="assets/images/google-charts-piechart.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- End off test section -->

@endsection