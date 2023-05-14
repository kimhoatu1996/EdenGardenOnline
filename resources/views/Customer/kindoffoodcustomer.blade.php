<!DOCTYPE html>
<!--
 Resto by GetTemplates.co
 URL: https://gettemplates.co
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Kinds of Food Eden Garden</title>
    <meta name="description" content="Resto">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
    <link rel="stylesheet" href="../vendor/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/select2/select2.min.css">
    <link rel="stylesheet" href="../vendor/owlcarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/brands.css">

    <!-- Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700|Josefin+Sans:300,400,700">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/style.min.css">

    <!-- Modernizr JS for IE8 support of HTML5 elements and media queries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>

</head>

<body data-spy="scroll" data-target="#navbar" class="static-layout">
    <div id="side-nav" class="sidenav">
        <a href="javascript:void(0)" id="side-nav-close">&times;</a>

        <div class="sidenav-content">
            <p>
                Kuncen WB1, Wirobrajan 10010, DIY
            </p>
            <p>
                <span class="fs-16 primary-color">(+68) 120034509</span>
            </p>
            <p>info@yourdomain.com</p>
        </div>
    </div>
    <div id="side-search" class="sidenav">
        <a href="javascript:void(0)" id="side-search-close">&times;</a>
        <div class="sidenav-content">
            <form action="">
                <div class="input-group md-form form-sm form-2 pl-0">
                    <input class="form-control my-0 py-1 red-border" type="text" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="input-group-text red lighten-3" id="basic-text1">
                            <i class="fas fa-search text-grey" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="canvas-overlay"></div>
    <div class="boxed-page">
        <nav id="navbar-header" class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand navbar-brand-center d-flex align-items-center p-0 only-mobile" href="/">
                    <img src="../img/logo.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="lnr lnr-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex justify-content-between">
                        <li class="nav-item only-desktop">
                            <a class="nav-link" id="side-nav-open" href="#">
                                <span class="lnr lnr-menu"></span>
                            </a>
                        </li>
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item active">
                                <a class="nav-link" href="#">{{ Session::get('CustomerFullName') }}<span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Kind Of Food
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach ($kindsoffood as $name)
                                        <a class="dropdown-item"
                                            href="{{ url('Customer/kindoffoodcustomer/' . $name->KindsOfFoodID) }}">{{ $name->KindsOfFoodName }}</a>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link "
                                    href="{{ url('Customer/customerorder/' . '?customerid=' . session('CustomerID')) }}">
                                    <div
                                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                        <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                                    </div>
                                    <span class="nav-link-text ms-1">Order</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                    <a class="navbar-brand navbar-brand-center d-flex align-items-center only-desktop" href="#">
                        <img src="../img/logo.png" alt="">
                    </a>
                    <ul class="navbar-nav d-flex justify-content-between">
                        <div class="d-flex flex-lg-row flex-column">
                            <li class="nav-item active">
                                <a class="nav-link"
                                    href="{{ url('Customer/customerprofile/' . Session::get('CustomerID')) }}">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('customer.logout') }}">Logout</a>
                            </li>
                        </div>
                        <li class="nav-item">
                            <a id="side-search-open" class="nav-link" href="#">
                                <span class="lnr lnr-magnifier"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="hero">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 hero-left">
                        <h1 class="display-4 mb-5">Eden garden happy<br>When be service you!!!</h1>
                        <div class="mb-2">
                            <a class="btn btn-primary btn-shadow btn-lg" href="#" role="button">Explore
                                Menu</a>
                            <a class="btn btn-icon btn-lg" href="https://www.youtube-nocookie.com/embed/LwNZTfjZTPc"
                                data-featherlight="iframe" data-featherlight-iframe-allowfullscreen="true">
                                <span class="lnr lnr-film-play"></span>
                                Play Video
                            </a>
                        </div>

                        <ul class="hero-info list-unstyled d-flex text-center mb-0">
                            <li class="border-right">
                                <span class="lnr lnr-rocket"></span>
                                <h5>
                                    Fast Delivery
                                </h5>
                            </li>
                            <li class="border-right">
                                <span class="lnr lnr-leaf"></span>
                                <h5>
                                    Fresh Food
                                </h5>
                            </li>
                            <li class="">
                                <span class="lnr lnr-bubble"></span>
                                <h5>
                                    24/7 Support
                                </h5>
                            </li>
                        </ul>

                    </div>
                    <div class="col-lg-6 hero-right">
                        <div class="owl-carousel owl-theme hero-carousel">
                            <div class="item">
                                <img class="img-fluid" src="../img/hero-1.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="../img/hero-2.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-fluid" src="../img/hero-3.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Welcome Section -->
        <section id="gtco-welcome" class="bg-white section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="row">
                        <div class="col-sm-5 img-bg d-flex shadow align-items-center justify-content-center justify-content-md-end img-2"
                            style="background-image: url(../img/hero-2.jpg);">

                        </div>
                        <div class="col-sm-7 py-5 pl-md-0 pl-4">
                            <div class="heading-section pl-lg-5 ml-md-5">
                                <span class="subheading">
                                    About
                                </span>
                                <h2>
                                    Welcome to Eden Garden
                                </h2>
                            </div>
                            <div class="pl-lg-5 ml-md-5">
                                <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came
                                    from it would have been rewritten a thousand times and everything that was left from
                                    its origin would be the word "and" and the Little Blind Text should turn around and
                                    return to its own, safe country. A small river named Duden flows by their place and
                                    supplies it with the necessary regelialia. It is a paradisematic country, in which
                                    roasted parts of sentences fly into your mouth.</p>
                                <h3 class="mt-5">Special Recipe</h3>
                                <div class="row">
                                    <div class="col-4">
                                        <a href="#" class="thumb-menu">
                                            <img class="img-fluid img-cover" src="../../Product_Image/MC005.jpg" />
                                            <h6> Red tilapia with hong kong sauce</h6>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="thumb-menu">
                                            <img class="img-fluid img-cover" src="../../Product_Image/MC006.jpg" />
                                            <h6>Grilled meat skewers</h6>
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a href="#" class="thumb-menu">
                                            <img class="img-fluid img-cover" src="../../Product_Image/MC010.jpg" />
                                            <h6>Crispy fried noodles</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End of Welcome Section -->
        <section id="gtco-special-dishes" class="bg-grey section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="heading-section text-center">
                        <span class="subheading">
                            Specialties
                        </span>
                        <h2>
                            Special Dishes
                        </h2>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-md-6 align-self-center py-5">
                            <h2 class="special-number">01.</h2>
                            <div class="dishes-text">
                                <h3><span>Rice</span><br> Yang Chow Fried Rice</h3>
                                <p class="pt-3">Yang Chow Fried Rice with diverse colors, each grain of golden rice
                                    is soaked with sweet and salty spices, fresh and natural vegetables mixed with
                                    sausages and sausages with a characteristic flavor, the more you eat, the more
                                    passionate you are.</p>
                                <h3 class="special-dishes-price">$10.00</h3>
                                <a href="#" class="btn-primary mt-3">buy</a>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                            <img src="../../../public/Product_Image/MC003.jpg" alt=""
                                class="img-fluid shadow w-100">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">
                            <img src="../../../public/Product_Image/MC008.jpg" alt=""
                                class="img-fluid shadow w-100">
                        </div>
                        <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center order-1 order-md-2 py-5">
                            <h2 class="special-number">02.</h2>
                            <div class="dishes-text">
                                <h3><span>Noodle</span><br> Noodle with Duck</h3>
                                <p class="pt-3">Chinese-style noodles should be both fragrant and smooth, bringing a
                                    bit of toughness to the dish. The fried duck here is crispy, while the tender duck
                                    is for those who want to enjoy the sweetness in every fiber of the meat</p>
                                <h3 class="special-dishes-price">$25.00</h3>
                                <a href="#" class="btn-primary mt-3">buy <span><i
                                            class="fa fa-long-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-md-6 align-self-center py-5">
                            <h2 class="special-number">03.</h2>
                            <div class="dishes-text">
                                <h3><span>Dessert</span><br> Waffle </h3>
                                <p class="pt-3">In terms of appearance, the Belgian Waffle impresses with its light
                                    and crispy texture and distinctive diagonal lines</p>
                                <h3 class="special-dishes-price">$9.00</h3>
                                <a href="#" class="btn-primary mt-3">buy</a>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center mt-4 mt-md-0">
                            <img src="../../../public/Product_Image/DS001.jpg" alt=""
                                class="img-fluid shadow w-100">
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-lg-5 col-md-6 align-self-center order-2 order-md-1 mt-4 mt-md-0">
                            <img src="../../../public/Product_Image/CK02.jpg" alt=""
                                class="img-fluid shadow w-100">
                        </div>
                        <div class="col-lg-5 offset-lg-2 col-md-6 align-self-center order-1 order-md-2 py-5">
                            <h2 class="special-number">04.</h2>
                            <div class="dishes-text">
                                <h3><span>Cocktail</span><br> Margarita</h3>
                                <p class="pt-3">Updating...</p>
                                <h3 class="special-dishes-price">$45.00</h3>
                                <a href="#" class="btn-primary mt-3">buy <span><i
                                            class="fa fa-long-arrow-right"></i></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Menu Section -->
        <section id="gtco-menu" class="section-padding">
            <div class="container">
                <div class="section-content">
                    <div class="row mb-5">
                        <div class="col-md-12">
                            <div class="heading-section text-center">
                                <span class="subheading">
                                    Specialties
                                </span>
                                <h2>
                                    {{ $data[0]->KindsOfFoodName }} MENU
                                </h2>
                            </div>
                        </div>
                    </div>
                    <!--<div class="menus d-flex align-items-center flex-wrap"> -->
                    @foreach ($data as $item)
                        <div class="menus d-flex align-items-center">
                            <div class="menu-img rounded-circle">
                                <img class="img-fluid" src="../../Product_Image/{{ $item->FoodPicture }}"
                                    alt="">
                            </div>
                            <div class="text-wrap">
                                <div class="row align-items-start">
                                    <div class="col-8">
                                        <h4>{{ $item->FoodName }}</h4>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $item->Size }}</p>
                                    </div>
                                    <div class="col-4">
                                        <a href="{{ url('/buy/' . $item->FoodID . '?customerid=' . session('CustomerID')) }}"
                                            class="btn btn-primary">Buy</a>
                                        <h4 class="text-muted menu-price">{{ $item->Price }}</h4>
                                    </div>
                                </div>
                                <p>{{ $item->KindsOfFoodName }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
    </section>

    <!-- <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/T01.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Strawberry Tea</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$25</h4>
                                        </div>
                                    </div>
                                    <p>Tea</p>
                                </div>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/CK06.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Negroni</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$35</h4>
                                        </div>
                                    </div>
                                    <p>Cocktail</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 menu-wrap">
                            <div class="heading-menu">
                                <h3 class="text-center mb-5">Snack Food</h3>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/SF07.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Fried Yam</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$20</h4>
                                        </div>
                                    </div>
                                    <p>Yarms, flour </p>
                                </div>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/SF12.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Stir-fried Quail Eggs with Tamarind</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$20</h4>
                                        </div>
                                    </div>
                                    <p>Quail eggs, tamarind</p>
                                </div>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/SF11.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Rice Rolls</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$30</h4>
                                        </div>
                                    </div>
                                    <p>Seaweed, crab stick, carrot, egg</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 menu-wrap">
                            <div class="heading-menu">
                                <h3 class="text-center mb-5">Dessert</h3>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/DS008.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Fruit beams</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$25</h4>
                                        </div>
                                    </div>
                                    <p>Fruit Dessert</p>
                                </div>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/DS009.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Gelatin dessert</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$25</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="menus d-flex align-items-center">
                                <div class="menu-img rounded-circle">
                                    <img class="img-fluid" src="../../Product_Image/DS010.jpg" alt="">
                                </div>
                                <div class="text-wrap">
                                    <div class="row align-items-start">
                                        <div class="col-8">
                                            <h4>Donut</h4>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-muted menu-price">$30</h4>
                                        </div>
                                    </div>
                                    <p>Cake</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
    <!-- End of menu Section -->
    <!-- Testimonial Section-->
    <section id="gtco-testimonial" class="overlay bg-fixed section-padding"
        style="background-image: url(img/testi-bg.jpg);">
        <div class="container">
            <div class="section-content">
                <div class="heading-section text-center">
                    <span class="subheading">
                        Testimony
                    </span>
                    <h2>
                        Happy Customer
                    </h2>
                </div>
                <div class="row">
                    <!-- Testimonial -->
                    <div class="testi-content testi-carousel owl-carousel">
                        <div class="testi-item">
                            <i class="testi-icon fa fa-3x fa-quote-left"></i>
                            <p class="testi-text">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                                officia deserunt mollit anim id est laborum.</p>
                            <p class="testi-author">John Doe</p>
                            <p class="testi-desc">CEO of <span>GetTemplates</span></p>
                        </div>
                        <div class="testi-item">
                            <i class="testi-icon fa fa-3x fa-quote-left"></i>
                            <p class="testi-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Adipisci non doloribus ut, alias doloremque perspiciatis.</p>
                            <p class="testi-author">Mary Jane</p>
                            <p class="testi-desc">CTO of <span>Unidentity Inc</span></p>
                        </div>
                    </div>
                    <!-- End of Testimonial -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of Testimonial Section-->
    <!-- End of Team Section -->
    <!-- Reservation Section -->



    </div>
    </section>
    <!-- End of Reservation Section -->
    <footer class="mastfoot pb-5 bg-white section-padding pb-0">
        <div class="inner container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-widget pr-lg-5 pr-0">
                        <img src="../img/logo.png" class="img-fluid footer-logo mb-3" alt="">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et obcaecati quisquam id sit
                            omnis explicabo voluptate aut placeat, soluta, nisi ea magni facere, itaque incidunt
                            modi? Magni, et voluptatum dolorem.</p>
                        <nav class="nav nav-mastfoot justify-content-start">
                            <a class="nav-link" href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a class="nav-link" href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a class="nav-link" href="#">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </nav>
                    </div>

                </div>
                <div class="col-lg-4">
                    <div class="footer-widget px-lg-5 px-0">
                        <h4>Open Hours</h4>
                        <ul class="list-unstyled open-hours">
                            <li class="d-flex justify-content-between"><span>Monday</span><span>9:00 - 24:00</span>
                            </li>
                            <li class="d-flex justify-content-between"><span>Tuesday</span><span>9:00 -
                                    24:00</span></li>
                            <li class="d-flex justify-content-between"><span>Wednesday</span><span>9:00 -
                                    24:00</span></li>
                            <li class="d-flex justify-content-between"><span>Thursday</span><span>9:00 -
                                    24:00</span></li>
                            <li class="d-flex justify-content-between"><span>Friday</span><span>9:00 - 02:00</span>
                            </li>
                            <li class="d-flex justify-content-between"><span>Saturday</span><span>9:00 -
                                    02:00</span></li>
                            <li class="d-flex justify-content-between"><span>Sunday</span><span> Closed</span></li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="footer-widget pl-lg-5 pl-0">
                        <h4>Newsletter</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <form id="newsletter">
                            <div class="form-group">
                                <input type="email" class="form-control" id="emailNewsletter"
                                    aria-describedby="emailNewsletter" placeholder="Enter email">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                        </form>
                    </div>

                </div>
                <div class="col-md-12 d-flex align-items-center">
                    <p class="mx-auto text-center mb-0">Copyright 2019. All Right Reserved. Design by <a
                            href="https://gettemplates.co" target="_blank">GetTemplates</a></p>
                </div>

            </div>
        </div>
    </footer>
    </div>
    </div>
    <!-- External JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="../vendor/bootstrap/popper.min.js"></script>
    <script src="../vendor/bootstrap/bootstrap.min.js"></script>
    <script src="../vendor/select2/select2.min.js "></script>
    <script src="../vendor/owlcarousel/owl.carousel.min.js"></script>
    <script src="https://cdn.rawgit.com/noelboss/featherlight/1.7.13/release/featherlight.min.js"></script>
    <script src="../vendor/stellar/jquery.stellar.js" type="text/javascript" charset="utf-8"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js">
    </script>

    <!-- Main JS -->
    <script src="../js/app.min.js "></script>
</body>

</html>
