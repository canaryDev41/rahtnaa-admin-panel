<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('img/favicon.png')}}" type="image/png">
    <title>راحتنا</title>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>
<body data-spy="scroll" data-target="#mainNav" data-offset="70">

<!--================Header Menu Area =================-->
<div id="app">
    <div>
        <header class="header_area">
            <div class="main_menu" id="mainNav">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="index.html"><img src="{{asset('img/logo.png')}}"
                                                                              alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item active"><a class="nav-link" href="#home">الرئيسية</a></li>
                                <li class="nav-item"><a class="nav-link" href="#feature">المميزات</a></li>
                                <li class="nav-item"><a class="nav-link" href="#video">فيديو تعريفي</a>
                                <li class="nav-item"><a class="nav-link" href="#screen">شاشات التطبيق</a>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->

        <!--================Home Banner Area =================-->
        <section class="home_banner_area" id="home">
            <div class="banner_inner">
                <div class="container">
                    <div class="row banner_content">
                        <div class="col-lg-9">
                            <h2>راحتنا<br/>راحتك راحتنا</h2>
                            <p>راحتنا تطبيق يهدف الى خلق </p>
                            <a class="banner_btn" href="#">Explore Now</a>
                        </div>
                        <div class="col-lg-3">
                            <div class="banner_map_img">
                                <img class="img-fluid" src="img/banner/right-mobile.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Feature Area =================-->
        <section class="feature_area p_120" id="feature">
            <div class="container">
                <div class="main_title">
                    <h2>Unique Features</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua.</p>
                </div>
                <div class="feature_inner row">
                    <div class="col-lg-3 col-md-6">
                        <div class="feature_item">
                            <img src="img/icon/f-icon-1.png" alt="">
                            <h4>Maintenance</h4>
                            <p>inappropriate behavior is often laughed off as boys will be boys,” women face higher
                                conduct
                                standards especially in the workplace. That’s why.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature_item">
                            <img src="{{asset('img/icon/f-icon-1.png')}}" alt="">
                            <h4>Maintenance</h4>
                            <p>inappropriate behavior is often laughed off as boys will be boys,” women face higher
                                conduct
                                standards especially in the workplace. That’s why.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature_item">
                            <img src="{{asset('img/icon/f-icon-1.png')}}" alt="">
                            <h4>Maintenance</h4>
                            <p>inappropriate behavior is often laughed off as boys will be boys,” women face higher
                                conduct
                                standards especially in the workplace. That’s why.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="feature_item">
                            <img src="{{asset('img/icon/f-icon-1.png')}}" alt="">
                            <h4>Maintenance</h4>
                            <p>inappropriate behavior is often laughed off as boys will be boys,” women face higher
                                conduct
                                standards especially in the workplace. That’s why.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Area =================-->

        <!--================Interior Area =================-->
        <section class="interior_area">
            <div class="container">
                <div class="interior_inner row">
                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{asset('img/interior-1.png')}}" alt="">
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="interior_text">
                            <h4>We Believe that Interior beautifies the Total Architecture</h4>
                            <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher
                                conduct
                                standards especially in the workplace. That’s why it’s crucial that, as women, our
                                behavior
                                on the job is beyond reproach. inappropriate behavior is often laughed off.</p>
                            <a class="main_btn" href="#">See Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Interior Area =================-->

        <!--================Interior Area =================-->
        <section class="interior_area interior_two">
            <div class="container">
                <div class="interior_inner row">
                    <div class="col-lg-5 offset-lg-1">
                        <div class="interior_text">
                            <h4>We Believe that Interior beautifies the Total Architecture</h4>
                            <p>inappropriate behavior is often laughed off as “boys will be boys,” women face higher
                                conduct
                                standards especially in the workplace. That’s why it’s crucial that, as women, our
                                behavior
                                on the job is beyond reproach. inappropriate behavior is often laughed off.</p>
                            <a class="main_btn" href="#">See Details</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid" src="{{asset('img/interior-2.png')}}" alt="">
                    </div>
                </div>
                <div class="video_area" id="video">
                    <img class="img-fluid" src="{{asset('img/video-1.png')}}" alt="">
                    <a class="popup-youtube" href="https://www.youtube.com/watch?v=VufDd-QL1c0">
                        <img src="{{asset('img/icon/video-icon-1.png')}}" alt="">
                    </a>
                </div>
            </div>
        </section>
        <!--================End Interior Area =================-->
        <!--================Feature Area =================-->
        <section class="screenshot_area p_120" id="screen">
            <div class="container">
                <div class="main_title">
                    <h2>Unique Screenshots</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et dolore magna aliqua.</p>
                </div>
                <div class="screenshot_inner owl-carousel">
                    <div class="item">
                        <img src="{{asset('img/feature/feature-1.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('img/feature/feature-2.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('img/feature/feature-3.jpg')}}" alt="">
                    </div>
                    <div class="item">
                        <img src="{{asset('img/feature/feature-4.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!--================End Feature Area =================-->

        <!--================Download App Area =================-->
        <section class="download_app_area p_120">
            <div class="container">
                <div class="app_inner">
                    <h2>Download This App Today!</h2>
                    <p>It won’t be a bigger problem to find one video game lover in your neighbor. Since the
                        introduction of
                        Virtual Game, it has been achieving great heights so far as its popularity and technological
                        advancement are concerned.</p>
                    <div class="app_btn_area">
                        <div class="app_btn">
                            <div class="media">
                                <div class="d-flex">
                                    <i class="fa fa-apple" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <a href="#"><h4>Available</h4></a>
                                    <p>on App Store</p>
                                </div>
                            </div>
                        </div>
                        <div class="app_btn">
                            <div class="media">
                                <div class="d-flex">
                                    <i class="fa fa-android" aria-hidden="true"></i>
                                </div>
                                <div class="media-body">
                                    <a href="#"><h4>Available</h4></a>
                                    <p>on App Store</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Download App Area =================-->

        <!--================ start footer Area  =================-->
        <footer class="footer-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3  col-md-6 col-sm-6">
                        <div class="single-footer-widget tp_widgets">
                            <h6 class="footer_title">Top Products</h6>
                            <ul class="list">
                                <li><a href="#">Managed Website</a></li>
                                <li><a href="#">Manage Reputation</a></li>
                                <li><a href="#">Power Tools</a></li>
                                <li><a href="#">Marketing Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <div class="single-footer-widget news_widgets">
                            <h6 class="footer_title">Newsletter</h6>
                            <p>You can trust us. we only send promo offers, not a single spam.</p>
                            <div id="mc_embed_signup">
                                <form target="_blank"
                                      action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                      method="get" class="subscribe_form relative">
                                    <div class="input-group d-flex flex-row">
                                        <input name="EMAIL" placeholder="Your email address"
                                               onfocus="this.placeholder = ''"
                                               onblur="this.placeholder = 'Email Address '" required="" type="email">
                                        <button class="btn sub-btn">Get Started</button>
                                    </div>
                                    <div class="mt-10 info"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 offset-lg-1">
                        <div class="single-footer-widget instafeed">
                            <h6 class="footer_title">Instagram Feed</h6>
                            <ul class="list instafeed d-flex flex-wrap">
                                <li><img src="{{asset('img/instagram/Image-01.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-02.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-03.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-04.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-05.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-06.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-07.jpg')}}" alt=""></li>
                                <li><img src="{{asset('img/instagram/Image-08.jpg')}}" alt=""></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row footer-bottom d-flex justify-content-between align-items-center">
                    <p class="col-lg-8 col-md-8 footer-text m-0">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;@{{currentYear}}
                        All rights reserved | This template is made with <i class="fa fa-heart-o"
                                                                            aria-hidden="true"></i> by
                        <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
</body>
</html>