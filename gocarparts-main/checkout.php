<?php require_once __DIR__ . '/includes/config.php'; ?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Premium-Car Parts</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="productlist.css">
  <!-- Plugin css -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

  <!-- Custom Style CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

</head>
    
<body>

    <!-- Start preloader -->
    <div id="preloader">
        <div id="ctn-preloader" class="ctn-preloader">
            <div class="animation-preloader">
                <div class="spinner"></div>
                <div class="txt-loading">
                    <span data-text-preloader="L" class="letters-loading">
                        L
                    </span>
                    
                    <span data-text-preloader="O" class="letters-loading">
                        O
                    </span>
                    
                    <span data-text-preloader="A" class="letters-loading">
                        A
                    </span>
                    
                    <span data-text-preloader="D" class="letters-loading">
                        D
                    </span>
                    
                    <span data-text-preloader="I" class="letters-loading">
                        I
                    </span>
                    
                    <span data-text-preloader="N" class="letters-loading">
                        N
                    </span>
                    
                    <span data-text-preloader="G" class="letters-loading">
                        G
                    </span>
                </div>
            </div>	

            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>
    </div>
    <!-- End preloader -->
    
    <!-- Start header area -->
    <?php include 'header.php'?>

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas__header">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="index.php">
                        <img src="assets/img/logo/nav-log.webp" alt="Grocee Logo" width="158" height="36">
                    </a>
                    <button class="offcanvas__close--btn" data-offcanvas>close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="index.php">Home</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li"><a href="index.php" class="offcanvas__sub_menu_item">Home One</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index.php" class="offcanvas__sub_menu_item">Home Two</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-3.php" class="offcanvas__sub_menu_item">Home Three</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-4.php" class="offcanvas__sub_menu_item">Home Four</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-5.php" class="offcanvas__sub_menu_item">Home Five</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="shop-list.php">Shop</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column One</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="shop-list.php">Shop Left Sidebar</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="shop-right-sidebar.php">Shop Right Sidebar</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="shop-list.php">Shop Grid</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="shop-grid-list.php">Shop Grid List</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="shop-list.php">Shop List</a></li>
                                    </ul>
                                </li>
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column Two</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="product-details.php">Product Details</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="product-video.php">Video Product</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="product-details.php">Variable Product</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="product-left-sidebar.php">Product Left Sidebar</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="product-gallery.php">Product Gallery</a></li>
                                    </ul>
                                </li>
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column Three</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="my-account.php">My Account</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="my-account-2.php">My Account 2</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="404.php">404 Page</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="loginpage.php">Login Page</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="faq.php">Faq Page</a></li>
                                    </ul>
                                </li>
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column Three</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="about.php">About Us</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="contact.php">Contact Us</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="portfolio.php">Portfolio</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="compare.php">Compare Pages</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="checkout.php">Checkout page</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="blog.php">Blog</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li"><a href="blog.php" class="offcanvas__sub_menu_item">Blog Grid</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="blog-details.php" class="offcanvas__sub_menu_item">Blog Details</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="blog-left-sidebar.php" class="offcanvas__sub_menu_item">Blog Left Sidebar</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="blog-right-sidebar.php" class="offcanvas__sub_menu_item">Blog Right Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="#">Pages</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li"><a href="about.php" class="offcanvas__sub_menu_item">About Us</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="contact.php" class="offcanvas__sub_menu_item">Contact Us</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="cart.php" class="offcanvas__sub_menu_item">Cart Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="portfolio.php" class="offcanvas__sub_menu_item">Portfolio Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="wishlist.php" class="offcanvas__sub_menu_item">Wishlist Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="loginpage.php" class="offcanvas__sub_menu_item">Login Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="404.php" class="offcanvas__sub_menu_item">Error Page</a></li>
                            </ul>
                        </li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="about.php">About</a></li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="contact.php">Contact</a></li>
                    </ul>
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="loginpage.php">
                            <span class="offcanvas__account--items__icon"> 
                                <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                            </span>
                            <span class="offcanvas__account--items__label">Login / Register</span>
                        </a>
                    </div>
                    <div class="offcanvas__account--wrapper d-flex">
                        <div class="offcanvas__account--currency">
                            <a class="offcanvas__account--currency__menu d-flex align-items-center text-black" href="javascript:void(0)">
                                <img src="assets/img/icon/usd-icon.webp" alt="currency">
                                <span>USD</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05" viewBox="0 0 9.797 6.05">
                                    <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                </svg>
                            </a>
                            <div class="offcanvas__account--currency__submenu">
                                <ul>
                                    <li class="currency__items"><a class="currency__text" href="#">CAD</a></li>
                                    <li class="currency__items"><a class="currency__text" href="#">CNY</a></li>
                                    <li class="currency__items"><a class="currency__text" href="#">EUR</a></li>
                                    <li class="currency__items"><a class="currency__text" href="#">GBP</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="language__currency--list">
                            <a class="offcanvas__language--switcher" href="javascript:void(0)">
                                <span>English</span> 
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05" viewBox="0 0 9.797 6.05">
                                    <path  d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z" transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"/>
                                </svg>
                            </a>
                            <div class="offcanvas__dropdown--language">
                                <ul>
                                    <li class="language__items"><a class="language__text" href="#">France</a></li>
                                    <li class="language__items"><a class="language__text" href="#">Russia</a></li>
                                    <li class="language__items"><a class="language__text" href="#">Spanish</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>   
                </nav>
            </div>
        </div>
        <!-- End Offcanvas header menu -->

        <!-- Start Offcanvas stikcy toolbar -->
        <div class="offcanvas__stikcy--toolbar">
            <ul class="d-flex justify-content-between">
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="index.php">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" width="21.51" height="21.443" viewBox="0 0 22 17"><path fill="currentColor" d="M20.9141 7.93359c.1406.11719.2109.26953.2109.45703 0 .14063-.0469.25782-.1406.35157l-.3516.42187c-.1172.14063-.2578.21094-.4219.21094-.1406 0-.2578-.04688-.3515-.14062l-.9844-.77344V15c0 .3047-.1172.5625-.3516.7734-.2109.2344-.4687.3516-.7734.3516h-4.5c-.3047 0-.5742-.1172-.8086-.3516-.2109-.2109-.3164-.4687-.3164-.7734v-3.6562h-2.25V15c0 .3047-.11719.5625-.35156.7734-.21094.2344-.46875.3516-.77344.3516h-4.5c-.30469 0-.57422-.1172-.80859-.3516-.21094-.2109-.31641-.4687-.31641-.7734V8.46094l-.94922.77344c-.11719.09374-.24609.14062-.38672.14062-.16406 0-.30468-.07031-.42187-.21094l-.35157-.42187C.921875 8.625.875 8.50781.875 8.39062c0-.1875.070312-.33984.21094-.45703L9.73438.832031C10.1094.527344 10.5312.375 11 .375s.8906.152344 1.2656.457031l8.6485 7.101559zm-3.7266 6.50391V7.05469L11 1.99219l-6.1875 5.0625v7.38281h3.375v-3.6563c0-.3046.10547-.5624.31641-.7734.23437-.23436.5039-.35155.80859-.35155h3.375c.3047 0 .5625.11719.7734.35155.2344.211.3516.4688.3516.7734v3.6563h3.375z"></path></svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Home</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="shop-list.php">
                    <span class="offcanvas__stikcy--toolbar__icon"> 
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" width="18.51" height="17.443" viewBox="0 0 448 512"><path d="M416 32H32A32 32 0 0 0 0 64v384a32 32 0 0 0 32 32h384a32 32 0 0 0 32-32V64a32 32 0 0 0-32-32zm-16 48v152H248V80zm-200 0v152H48V80zM48 432V280h152v152zm200 0V280h152v152z"></path></svg>
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Shop</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list ">
                    <a class="offcanvas__stikcy--toolbar__btn search__open--btn" href="javascript:void(0)" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg"  width="22.51" height="20.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>   
                        </span>
                    <span class="offcanvas__stikcy--toolbar__label">Search</span>
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn minicart__open--btn" href="javascript:void(0)" data-offcanvas>
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="22.706" height="22.534" viewBox="0 0 14.706 13.534">
                                <g  transform="translate(0 0)">
                                  <g >
                                    <path  data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"/>
                                    <path  data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"/>
                                    <path  data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"/>
                                  </g>
                                </g>
                            </svg> 
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Cart</span>
                         
                    </a>
                </li>
                
            </ul>
        </div>

        <!-- Start serch box area -->
        <div class="predictive__search--box ">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Search Products</h2>
                <form class="predictive__search--form" action="#">
                    <label>
                        <input class="predictive__search--input" placeholder="Search Here" type="text">
                    </label>
                    <button class="predictive__search--button text-white" aria-label="search button"><svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51" height="25.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>  </button>
                </form>
            </div>
            <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
                <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51" height="30.443"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
            </button>
        </div>
        <!-- End serch box area -->
        
    </header>
    <!-- End header area -->
    
    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.php">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start checkout page area -->
        <div class="checkout__page--area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="main checkout__mian">
                            <div id="checkoutMessage" style="margin-bottom: 10px;"></div>
                            <form id="checkoutForm" method="POST" action="place-order.php">
                                    <div class="checkout__content--step section__contact--information">
                                    <div class="section__header checkout__section--header d-flex align-items-center justify-content-between mb-25">
                                        <h2 class="section__header--title h3">Contact information</h2>
                                        
                                    </div>
                                    <div class="customer__information">
                                        <div class="checkout__email--phone mb-12">
                                            <label>
                                                <input class="checkout__input--field border-radius-5"name="email_or_mobile" placeholder="Email or mobile phone mumber"  type="text">
                                            </label>
                                        </div>
                                        <div class="checkout__checkbox">
                                            <input class="checkout__checkbox--input" id="check1" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label" for="check1">
                                                Email me with news and offers</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="checkout__content--step section__shipping--address">
                                    <div class="section__header mb-25">
                                        <h2 class="section__header--title h3">Billing Details</h2>
                                    </div>
                                    <div class="section__shipping--address__content">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list ">
                                                    <label class="checkout__input--label mb-5" for="input1">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="first_name" placeholder="First name (optional)" id="input1"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input2">Last Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="last_name" placeholder="Last name" id="input2"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input3">Company Name <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="company_name" placeholder="Company (optional)" id="input3" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input4">Address <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="address" placeholder="Address1" id="input4" type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                </div>
                                            </div>
                                            <div class="col-12 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input5">Town/City <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="city" placeholder="City" id="input5" type="text">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="country">Country/region <span class="checkout__input--label__star">*</span></label>
                                                    <div class="checkout__input--select select">
                                                        <select class="checkout__input--select__field border-radius-5" name="country" id="country">
                                                            <option value="1">India</option>
                                                            <option value="2">United States</option>
                                                            <option value="3">Netherlands</option>
                                                            <option value="4">Afghanistan</option>
                                                            <option value="5">Islands</option>
                                                            <option value="6">Albania</option>
                                                            <option value="7">Antigua Barbuda</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-20">
                                                <div class="checkout__input--list">
                                                    <label class="checkout__input--label mb-5" for="input6">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                    <input class="checkout__input--field border-radius-5" name="postal_code" placeholder="Postal code" id="input6" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <details>
                                        <summary class="checkout__checkbox mb-20">
                                            <input class="checkout__checkbox--input" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <span class="checkout__checkbox--label">Ship to a different address?</span>
                                        </summary>
                                        <div class="section__shipping--address__content">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list ">
                                                        <label class="checkout__input--label mb-5" for="input7">Fist Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="First name (optional)" id="input7"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input8">Last Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Last name" id="input8"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input9">Company Name <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Company (optional)" id="input9" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input10">Address <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Address1" id="input10" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <input class="checkout__input--field border-radius-5" placeholder="Apartment, suite, etc. (optional)"  type="text">
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input11">Town/City <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="City" id="input11" type="text">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="country2">Country/region <span class="checkout__input--label__star">*</span></label>
                                                        <div class="checkout__input--select select">
                                                            <select class="checkout__input--select__field border-radius-5" id="country2">
                                                                <option value="1">India</option>
                                                                <option value="2">United States</option>
                                                                <option value="3">Netherlands</option>
                                                                <option value="4">Afghanistan</option>
                                                                <option value="5">Islands</option>
                                                                <option value="6">Albania</option>
                                                                <option value="7">Antigua Barbuda</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-20">
                                                    <div class="checkout__input--list">
                                                        <label class="checkout__input--label mb-5" for="input12">Postal Code <span class="checkout__input--label__star">*</span></label>
                                                        <input class="checkout__input--field border-radius-5" placeholder="Postal code" id="input12" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </details>
                                    <div class="checkout__checkbox">
                                        <input class="checkout__checkbox--input" id="checkbox2" type="checkbox">
                                        <span class="checkout__checkbox--checkmark"></span>
                                        <label class="checkout__checkbox--label" for="checkbox2">
                                            Save this information for next time</label>
                                    </div>
                                </div>
                                <input type="hidden" name="cart_data" id="cart_data">
                                <input type="hidden" name="total_price" id="total_price">
                               <input type="hidden" id="currentOrderId" name="currentOrderId" value="">


                                <div class="order-notes mb-20">
                                    <label class="checkout__input--label mb-5" for="order">Order Notes <span class="checkout__input--label__star">*</span></label>
                                   <textarea class="checkout__notes--textarea__field border-radius-5" name="order_notes" id="order" placeholder="Notes about your order, e.g. special notes for delivery." spellcheck="false"></textarea>
                                </div>
                                <input type="hidden" name="payment_method" value="Cash on Delivery">
<input type="hidden" name="payment_method" value="Cash on Delivery">

                                <div class="checkout__content--step__footer d-flex align-items-center">
<button type="submit" class="continue__shipping--btn primary__btn border-radius-5">Continue Shiping</button>                                    <a class="previous__link--content" href="cart.php">Return to cart</a>
                                </div>
                            </form>
 
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <aside id="orderSummary" class="checkout__sidebar sidebar border-radius-10 blurred">
                            <h2 class="checkout__order--summary__title text-center mb-15">Your Order Summary</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                      <!-- -------------- -->
                                    </tbody>
                                </table> 
                            </div>
                            <div class="checkout__discount--code">
                               <form id="checkoutForm">
                                    <label>
                                        <input class="checkout__discount--code__input--field border-radius-5" placeholder="Gift card or discount code"  type="text">
                                    </label>
                                    <button class="checkout__discount--code__btn primary__btn border-radius-5" type="submit">Apply</button>
                                </form>
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tbody class="checkout__total--body">
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Subtotal </td>
                                            <td class="checkout__total--amount text-right "id="subtotalAmount ">$0.00</td>
                                        </tr>
                                        <tr class="checkout__total--items">
                                            <td class="checkout__total--title text-left">Shipping</td>
                                            <td class="checkout__total--calculated__text text-right">Calculated at next step</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td class="checkout__total--footer__title checkout__total--footer__list text-left">Total </td>
                                            <td class="checkout__total--footer__amount checkout__total--footer__list text-right" id="totalAmount">$860.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment__history mb-30">
                                <h3 class="payment__history--title mb-20">Payment</h3>
                                <ul class="payment__history--inner d-flex">
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Credit Card</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Bank Transfer</button></li>
                                    <li class="payment__history--list"><button class="payment__history--link primary__btn" type="submit">Paypal</button></li>
                                </ul>
                            </div>
                            <button class="checkout__now--btn primary__btn " id="pay-button" type="submit">Checkout Now</button>
                        </aside>
                    </div>
                    
                </div>
            </div>
        </div>
        
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
   


     <script>
document.getElementById('pay-button').onclick = function (e) {
    e.preventDefault();

    // Step 1: Get total amount
    let totalAmountText = document.getElementById('totalAmount').innerText;
    totalAmountText = totalAmountText.replace(/[^\d.]/g, '');
    let totalAmount = parseFloat(totalAmountText);

    if (isNaN(totalAmount) || totalAmount <= 0) {
        alert("Invalid total amount!");
        return;
    }

    let amountInPaise = Math.round(totalAmount * 100);

    // Step 2: Create Razorpay order
    fetch('create-order.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ amount: amountInPaise })
    })
    .then(res => res.json())
    .then(data => {
        if (data.error) {
            alert("Error: " + data.error);
            return;
        }

        // ✅ Step 3: Configure Razorpay options
        var options = {
            key: <?= json_encode(RAZORPAY_KEY_ID) ?>,
            amount: data.amount,
            currency: "INR",
            name: "Demo Test",
            order_id: data.id,

            // ✅ Final payment handler
            handler: function (response) {
                alert("Payment successful! ID: " + response.razorpay_payment_id);

                const orderId = document.getElementById("currentOrderId").value;
                const cartData = JSON.parse(document.getElementById("cart_data").value);  // hidden input has cart_data

                fetch("update-order-items.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        order_id: orderId,
                        payment_id: response.razorpay_payment_id,
                        cart_data: cartData
                    })
                })
                .then(res => res.text())
                .then(data => {
                    if (data.trim() === "success") {
                        alert("Payment details saved to order_items.");
                    } else {
                        alert("Failed to save payment info: " + data);
                    }
                })
                .catch(err => {
                    console.error("Error:", err);
                });
            },

            prefill: {
                name: "Test User",
                email: "test@example.com",
                contact: "9876543210"
            },
            theme: {
                color: "#3399cc"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    })
    .catch(error => {
        alert("Failed to initiate payment.");
        console.error("Fetch error:", error);
    });
};
</script>
  

 <script>
document.getElementById("checkoutForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch("place-order.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.json())
    .then(response => {
        if (response.status === "success") {
            // Set the hidden input with the order ID
            document.getElementById("currentOrderId").value = response.order_id;

            // Optional: show confirmation
            const summary = document.getElementById("orderSummary");
            summary.classList.remove("blurred");
            summary.classList.add("unblurred");

            document.getElementById("checkoutMessage").innerHTML = "✅ Continue Shipping!";
            document.getElementById("checkoutMessage").className = "success-msg";
        } else {
            document.getElementById("checkoutMessage").innerHTML = "❌ Error placing order.";
            document.getElementById("checkoutMessage").className = "error-msg";
        }
    });
});
</script> 



        <!-- End checkout page area -->

        <!-- Start shipping section -->
        <section class="shipping__section">
            <div class="container">
                <div class="shipping__inner style2 d-flex">
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping1.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Free Shipping</h2>
                            <p class="shipping__content--desc">Free shipping over $100</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping2.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Support 24/7</h2>
                            <p class="shipping__content--desc">Contact us 24 hours a day</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping3.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">100% Money Back</h2>
                            <p class="shipping__content--desc">You have 30 days to Return</p>
                        </div>
                    </div>
                    <div class="shipping__items style2 d-flex align-items-center">
                        <div class="shipping__icon">  
                            <img src="assets/img/other/shipping4.webp" alt="icon-img">
                        </div>
                        <div class="shipping__content">
                            <h2 class="shipping__content--title h3">Payment Secure</h2>
                            <p class="shipping__content--desc">We ensure secure payment</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End shipping section -->
    </main>

       <?php include 'footer.php'; ?>


    <!-- Scroll top bar -->
    <button id="scroll__top"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 244l144-144 144 144M256 120v292"/></svg></button>

<!-- All Script JS Plugins here  -->
<script src="assets/js/vendor/popper.js" defer="defer"></script>
<script src="assets/js/vendor/bootstrap.min.js" defer="defer"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/plugins/glightbox.min.js"></script>

<!-- Customscript js -->
<script src="assets/js/script.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
  fetch("fetch-cart.php?action=fetch", { credentials: "include" })
    .then(res => res.json())
    .then(cartItems => {
      const tbody = document.querySelector(".cart__table--body");
      const subtotalEl = document.querySelectorAll(".checkout__total--amount");
      const totalEl = document.querySelectorAll(".checkout__total--footer__amount");

      let subtotal = 0;
      let cartData = [];

      if (!cartItems.length) {
        tbody.innerHTML = "<tr><td colspan='2'>Your cart is empty.</td></tr>";
        return;
      }

      let html = "";
      cartItems.forEach(item => {
        const price = parseFloat(item.price);
        const qty = parseInt(item.quantity);
        const total = price * qty;
        subtotal += total;

        cartData.push({
          product_name: item.title,
          product_image: item.image,
          price: price,
          quantity: qty
        });

        html += `
          <tr class="cart__table--body__items">
            <td class="cart__table--body__list">
              <div class="product__image two__columns">
                <img src="${item.image}" alt="${item.title}" style="width: 60px;">
                <div><h5>${item.title}</h5><span>Qty: ${qty}</span></div>
              </div>
            </td>
            <td class="cart__table--body__list">$${total.toFixed(2)}</td>
          </tr>
        `;
      });

      tbody.innerHTML = html;
      subtotalEl.forEach(el => el.textContent = `$${subtotal.toFixed(2)}`);
      totalEl.forEach(el => el.textContent = `$${subtotal.toFixed(2)}`);

      // Set hidden form values
      document.getElementById("cart_data").value = JSON.stringify(cartData);
      document.getElementById("total_price").value = subtotal.toFixed(2);
    });
});
</script>





  
</body>
</html>