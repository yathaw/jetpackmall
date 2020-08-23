<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Jetpack Mall </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <!-- Favicon-->
    <link rel="icon" href="{{ asset('logo/favicon.jpg') }}" type="image/gif" sizes="16x16">

    <!-- iconFont -->
    <link rel="stylesheet" type="text/css" href="{{ asset('icon/icofont/icofont.min.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('custom/style.css') }}">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('logo/logo_transparent.png') }}"  alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li>
                    <a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span class="shoppingcartNoti"></span>
                    </a>
                </li>
            </ul>
            <a href="{{ route('cart') }}">
                <div class="header__cart__price">
                    item: <span class="shoppingcartTotal"></span>
                </div>
            </a>
        </div>
        <div class="humberger__menu__widget">

            @guest

                <div class="header__top__right__auth">
                    <a href="{{ route('register') }}"><i class="fa fa-user"></i> Register </a>
                </div>

                <div class="header__top__right__auth">
                    <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                </div>


            @else

                <div class="header__top__right__language">
                    <img src="{{ asset(Auth::user()->profile) }}" alt="" class="userprofile">
                    <div> {{ Auth::user()->name }}'s Account </div>
                    <span class="arrow_carrot-down"></span>
                    <ul>
                        <li><a href="#"> Profile </a></li>
                        <li><a href="#"> Order </a></li>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Sign Out 
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>

            @endif
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active">
                    <a href="{{ route('index') }}">Home</a>
                </li>
                <li><a href="{{ route('promotion') }}"> Promotion </a></li>
                <li><a href="#"> Merchants </a>
                    <ul class="header__menu__dropdown">
                        @foreach($data[0] as $brand)
                            <li>
                                <a href="{{ route('brand',$brand->id) }}">
                                    {{ $brand->name }}
                                </a>
                            </li>

                        @endforeach
                        
                    </ul>
                </li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> jetpack@gmail.com</li>
                <li>
                    <img src="{{ asset('logo/download_mb.png') }}">
                </li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> jetpack@gmail.com</li>
                                <li>Free Shipping for all Order of 20,000 Ks </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>

                            @guest


                            <div class="header__top__right__auth border-right px-3">
                                <a href="{{ route('register') }}">
                                    <i class="fa fa-user"></i> Register
                                </a>
                            </div>

                            <div class="header__top__right__auth px-3">
                                <a href="{{ route('login') }}">
                                    <i class="fa fa-user"></i> Login
                                </a>
                            </div>

                            @else

                            <div class="header__top__right__language">
                                <img src="{{ asset(Auth::user()->profile) }}" alt="" class="userprofile">
                                <div> {{ Auth::user()->name }} Account </div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#"> Profile </a></li>
                                    <li><a href="#"> Order </a></li>
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Sign Out </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{ route('index') }}"><img src="{{ asset('logo/logo_transparent.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('promotion') }}"> Promotion </a>
                            </li>
                            <li><a href="#"> Merchants </a>
                                <ul class="header__menu__dropdown">
                                    @foreach($data[0] as $brand)
                                        <li><a href="{{ route('brand',$brand->id) }}">{{ $brand->name }}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </li>
                            <li><a href="">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li>
                                <a href="{{ route('cart') }}"><i class="fa fa-shopping-bag"></i> <span class="shoppingcartNoti"></span></a>
                            </li>
                        </ul>
                        <a href="{{ route('cart') }}">
                            <div class="header__cart__price">item: <span class="shoppingcartTotal"></span></div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    
    <!-- Hero Section Begin -->
    <section class="hero {{ Request::segment(1) == '' ? '' :'hero-normal' }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Subcategory</span>
                        </div>
                        <ul>
                            @foreach($data[1] as $subcategory)
                            <li>
                                <a href="{{ route('subcategory',$subcategory->id) }}">{{ $subcategory->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">

                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+95 987654321 </h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    

                    @if(Request::segment(1) == '' || Request::segment(1) == 'index')

                    <div class="hero__item set-bg bg-light">
                        <div class="row">
                            <div class="col-8">
                                <h2 class="my-5"> {{ $data[2][0]->name }} </h2>
                                <a href="{{ route('brand',$data[2][0]->id) }}" class="primary-btn">SHOP NOW</a>
                                
                            </div>
                            <div class="col-4">
                                <img src="{{ asset($data[2][0]->logo) }}" class="img-fluid">
                            </div>
                            
                        </div>
                    </div>

                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    {{ $slot }}

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="{{ route('index') }}"><img src="{{ asset('logo/logo_transparent.png') }}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: Junction City, Yangon</li>
                            <li>Phone: +95 987654321</li>
                            <li>Email: jetpack@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p> Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with by <a href="http://myanmaritc.com/" target="_blank"> MMIT </a> 
                            </p>
                        </div>
                        
                        <div class="footer__copyright__payment"><img src="{{ asset('frontend/img/payment-item.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    @if(Auth::check())
        <script>
            var deliveryprice = "{{ Auth::user()->township->price}}";
        </script>


    @endif

    <!-- Js Plugins -->
    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('frontend/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="{{ asset('shoppingcart.js') }}"></script>


</body>

</html>