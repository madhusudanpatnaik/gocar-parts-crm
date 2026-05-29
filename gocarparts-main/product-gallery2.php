<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Premium-Car Parts</title>
  <meta name="description" content="Morden Bootstrap HTML5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.jpg">
  <link rel="stylesheet" href="product-gallery.css">
    
   <!-- ======= All CSS Plugins here ======== -->
  <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
  <link rel="stylesheet" href="assets/css/plugins/glightbox.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&display=swap" rel="stylesheet">

  <!-- Plugin css -->
  <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


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
                            
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="shop-list.php">Shop</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column One</a>
                                    
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
                                        <!-- <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item" href="404.php">404 Page</a></li> -->
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
                        <span class="items__count">3</span> 
                    </a>
                </li>
                <li class="offcanvas__stikcy--toolbar__list">
                    <a class="offcanvas__stikcy--toolbar__btn" href="wishlist.php">
                        <span class="offcanvas__stikcy--toolbar__icon"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                        </span>
                        <span class="offcanvas__stikcy--toolbar__label">Wishlist</span>
                        <span class="items__count">3</span> 
                    </a>
                </li>
            </ul>
        </div>
        <!-- End Offcanvas stikcy toolbar -->

        <!-- Start offCanvas minicart -->
        <div class="offCanvas__minicart">
            <div class="minicart__header ">
                <div class="minicart__header--top d-flex justify-content-between align-items-center">
                    <h3 class="minicart__title"> Shopping Cart</h3>
                    <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                        <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"/></svg>
                    </button>
                </div>
                <p class="minicart__header--desc">The organic foods products are limited</p>
            </div>
            <div class="minicart__product">
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.php"><img src="assets/img/product/small-product/product1.webp" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.php">Car & Motorbike Care.</a></h4>
                        <span class="color__variant"><b>Color:</b> Beige</span>
                        <div class="minicart__price">
                            <span class="minicart__current--price">$125.00</span>
                            <span class="minicart__old--price">$140.00</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="1" data-counter />
                                </label>
                                <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                            </div>
                            <button class="minicart__product--remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.php"><img src="assets/img/product/small-product/product2.webp" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.php">Engine And Drivetrain.</a></h4>
                        <span class="color__variant"><b>Color:</b> Green</span>
                        <div class="minicart__price">
                            <span class="minicart__current--price">$115.00</span>
                            <span class="minicart__old--price">$130.00</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button" class="quantity__value decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="1" data-counter />
                                </label>
                                <button type="button" class="quantity__value increase" aria-label="quantity value" value="Increase Value">+</button>
                            </div>
                            <button class="minicart__product--remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="minicart__amount">
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Sub Total:</span>
                    <span><b>$240.00</b></span>
                </div>
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Total:</span>
                    <span><b>$240.00</b></span>
                </div>
            </div>
            <div class="minicart__conditions text-center">
                <input class="minicart__conditions--input" id="accept" type="checkbox">
                <label class="minicart__conditions--label" for="accept">I agree with the <a class="minicart__conditions--link" href="privacy-policy.php">Privacy Policy</a></label>
            </div>
            <div class="minicart__button d-flex justify-content-center">
                <a class="primary__btn minicart__button--link" href="cart.php">View cart</a>
                <a class="primary__btn minicart__button--link" href="checkout.php">Checkout</a>
            </div>
        </div>
        <!-- End offCanvas minicart -->

        <main class="main__content_wrapper">
    <!-- Start breadcrumb section -->
    <section class="hero__slider--section slider__section--bg2 section--padding">
    <div class="container">
        <div class="row">

            <!-- LEFT: Search Form -->
            <div class="col-lg-4">
                <div class="search__filter--area">
                    <!-- Header -->
                    <div class="search__filter--header d-flex mb-3">
                        <div class="search__filter--header__icon">
                            <img src="assets/img/icon/ssd-icon-img.webp" alt="icon-img">
                        </div>
                        <div class="search__filter--header__text ms-3">
                            <h2 class="search__filter--title">Search by Vehicle</h2>
                            <p class="search__filter--desc">Filter your results by entering your Vehicle to ensure you find the parts that fit.</p>
                        </div>
                    </div>

                    

                    <!-- Form Container -->
                    <div class="form-container" style="border: 1px solid #ddd; border-radius: 8px; padding: 20px; background-color: #f9f9f9;">
                        <form class="search__filter--form" action="product-gallery.php" method="GET" onsubmit="return validateForm()">
                            <div class="search__filter--select select mb-3">
                                <select id="category" name="category" class="search__filter--select__field" required>
                                    <option value="" selected disabled>Select Category</option>
                                    <option value="engines">Used Engines</option>
                                    <option value="trans">Transmissions</option>
                                </select>
                            </div>
                            <div class="search__filter--select select mb-3">
                                <select id="make" name="make" class="search__filter--select__field" disabled required>
                                    <option value="" selected disabled>Select Make</option>
                                </select>
                            </div>
                            <div class="search__filter--select select mb-3">
                                <select id="model" name="model" class="search__filter--select__field" disabled required>
                                    <option value="" selected disabled>Select Model</option>
                                </select>
                            </div>
                            <div class="search__filter--select select mb-3">
                                <select id="year" name="year" class="search__filter--select__field" disabled required>
                                    <option value="" selected disabled>Choose Year</option>
                                </select>
                            </div>
                            <div class="search__filter--select select mb-3">
                                <select id="submodel" name="submodel" class="search__filter--select__field" disabled required>
                                    <option value="" selected disabled>Select Submodel</option>
                                </select>
                            </div>
                            <button id="searchBtn" class="search__filter--btn primary__btn w-100" type="submit" disabled>Search</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- RIGHT: Horizontal Scrolling Product List -->
           <div class="col-lg-8">
<div class="horizontal-results" style="overflow-x: auto; white-space: nowrap; border: 1px solid transparent; border-radius: 8px; padding: 20px; background-color: transparent; min-height: 100%;">
<?php
$host = "mysql";
$user = "root";
$password = "REDACTED";
$dbname = "REDACTED_DB";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$make     = $_GET['make']     ?? '';
$model    = $_GET['model']    ?? '';
$submodel = $_GET['submodel'] ?? '';
$year     = (int) ($_GET['year'] ?? 0);
$partName = $_GET['category'] ?? 'Selected Part';

// Sanitize input
$makeSanitized  = $conn->real_escape_string(trim($make));
$modelSanitized = $conn->real_escape_string(trim($model));
$categoryFilter = $conn->real_escape_string(trim($partName));

// Extract engine size from submodel (e.g., 2.0L)
$engine = '';
if (preg_match('/(\d+\.\d+L)/i', $submodel, $match)) {
    $engine = strtolower(trim($match[1]));
}

$sql = "
SELECT p.id, p.name,
    p.price,
    p.category,
    p.image_url AS img
FROM products p
WHERE LOWER(p.name) LIKE '%" . strtolower($makeSanitized) . "%'
AND LOWER(p.name) LIKE '%" . strtolower($modelSanitized) . "%'
AND LOWER(p.category) LIKE '%" . strtolower($categoryFilter) . "%'
ORDER BY p.id DESC
LIMIT 50";

$result = $conn->query($sql);
$shownTitles = [];
$found = false;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $title = strtolower($row['name']);

        if (in_array($title, $shownTitles)) continue;
        $shownTitles[] = $title;

        $yearMatch = false;
        if (preg_match('/(\d{4})\s*[-–]\s*(\d{4})/', $title, $range)) {
            $yearMatch = ($year >= (int)$range[1] && $year <= (int)$range[2]);
        } elseif (preg_match('/\b(\d{4})\b/', $title, $single)) {
            $yearMatch = ($year == (int)$single[1]);
        }
        if (!$yearMatch) continue;

        if ($engine && strpos($title, $engine) === false) continue;

        $found = true;
        $img = $row['img'] ?: 'https://via.placeholder.com/300x200?text=No+Image';
        $price = is_numeric($row['price']) ? '$' . number_format($row['price'], 2) : 'N/A';
        $category = htmlspecialchars($row['category']);
        $productTitle = htmlspecialchars($row['post_title']);

        echo '<div class="product-card" style="display: inline-block; width: 250px; margin-right: 15px; vertical-align: top; border: 1px solid #ccc; border-radius: 8px; padding: 10px; background-color: #fff;">';

echo '<img src="' . $img . '" alt="Product Image" style="width: 100%; height: 150px; object-fit: cover; border-radius: 4px;">';

echo '<h3 style="font-size: 16px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 10px;" title="' . $productTitle . '">' . $productTitle . '</h3>';

echo "<p><strong>Category:</strong> $category</p>";
echo "<p><strong>Price:</strong></p><h3 style='margin-top: 0;'>$price</h3>";

echo '<div style="display: flex; gap: 10px; margin-top: 10px;">';

echo '<a href="product-details.php?id=' . $row['ID'] . '" 
        class="search__filter--btn primary__btn" 
        style="flex: 1; background-color: #e74c3c; color: #fff; text-align: center; padding: 10px 0; border-radius: 6px; text-decoration: none; font-weight: bold;">
        View Product
      </a>';

echo '<a href="#" 
        class="search__filter--btn primary__btn" 
        data-product-id="' . $row['ID'] . '" 
        onclick="handleAddToCart(event)" 
        style="flex: 1; background-color: #e74c3c; color: #fff; text-align: center; padding: 10px 0; border-radius: 6px; text-decoration: none; font-weight: bold;">
        Add to Cart
      </a>';

echo '</div>'; // button row

echo '</div>'; // card


    
    }
}

if (!$found) {
    echo '
    <div style="max-width: 700px; margin: 20px auto; border: 2px solid #e74c3c; border-radius: 12px; font-family: Arial, sans-serif; background: #ffffff;">
        <div style="background-color: #fdf2f2; border-bottom: 2px solid #e74c3c; padding: 20px; text-align: center;">
            <h2 style="margin: 0; font-size: 24px; color: #c0392b;">' . htmlspecialchars(ucfirst($modelSanitized . ' ' . $makeSanitized)) . ' Found For Selected Vehicle</h2>
        </div>
        <table style="width: 100%; border-collapse: collapse; background: #fdfdfd;">
            <tr style="border-bottom: 1px dashed #e74c3c;">
                <td style="padding: 14px; font-weight: bold; width: 40%;">Part Status</td>
                <td style="padding: 14px; color: #2ecc71;">Available</td>
            </tr>
            <tr style="border-bottom: 1px dashed #e74c3c;">
                <td style="padding: 14px; font-weight: bold;">Condition</td>
                <td style="padding: 14px; color: #888;">Used</td>
            </tr>
            <tr style="border-bottom: 1px dashed #e74c3c;">
                <td style="padding: 14px; font-weight: bold;">Mileage</td>
                <td style="padding: 14px;">
                    <span style="color: #999;">---</span>
                    <span style="color: #e74c3c; font-weight: bold; margin-left: 10px; cursor: pointer;" onclick="openPopup()">Click To Request Mileage Info</span>

                </td>
            </tr>
            <tr style="border-bottom: 1px dashed #e74c3c;">
                <td style="padding: 14px; font-weight: bold;">Price</td>
                <td style="padding: 14px;">
                    <span style="color: #999;">---</span>
                    <span onclick="openPopup()" style="cursor:pointer; color: #e74c3c; font-weight: bold; margin-left: 10px;">
  Click To Request Quote
</span>

                </td>
            </tr>
            <tr>
                <td style="padding: 14px; font-weight: bold;">Warranty</td>
                <td style="padding: 14px; color: #3498db;">Up to 36 months</td>
            </tr>
        </table>
       <div style="padding: 20px; text-align: center;">
  <span onclick="openPopup()" style="background: #e74c3c; color: white; padding: 12px 20px; text-decoration: none; border-radius: 6px; font-weight: bold; cursor:pointer;">
    Request a Quote
  </span>
</div>

    </div>';
}


$conn->close();
?>
</div>
</div>

<!-- Popup Form -->
<div id="mileagePopup" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5); z-index:9999; justify-content:center; align-items:center;">
  <div style="width:90%; max-width:850px; background:white; border-radius:12px; overflow:hidden; position:relative; display:flex; flex-wrap:wrap;">

    <!-- ❌ Close Button -->
    <span onclick="closePopup()" style="position:absolute; top:10px; right:15px; font-size:24px; cursor:pointer; color:#c0392b; z-index:10;">&times;</span>

    <!-- ✅ Left: Image -->
    <div style="flex:1; background:#f9f9f9; display:flex; align-items:center; justify-content:center; padding:20px; min-width:280px;">
      <img src="https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcS1USbCtlm-2KI_eKhkevpxUv7XW6TEALLuOsn7is_YqDbTPXk-" alt="Megaphone" style="max-width:100%; height:auto;">
    </div>

    <!-- ✅ Right: Form -->
    <div style="flex:1.2; padding:30px; min-width:320px;">
      <h3 style="margin-top:0; color:#2c3e50;">Want the Exact Mileage? Submit Your Info & Our Team Will Call</h3>

      <form onsubmit="return validatePopupForm()" style="display:flex; flex-direction:column; gap:12px;">
        <input type="text" placeholder="Enter your name*" required style="padding:10px; border:1px solid #ccc; border-radius:6px;">
        <input type="email" placeholder="Enter your email*" required style="padding:10px; border:1px solid #ccc; border-radius:6px;">
        <input type="text" placeholder="Enter contact number*" required style="padding:10px; border:1px solid #ccc; border-radius:6px;">
        <input type="text" placeholder="Enter ZipCode*" required style="padding:10px; border:1px solid #ccc; border-radius:6px;">
        <textarea placeholder="Notes, VIN Number etc." style="padding:10px; border:1px solid #ccc; border-radius:6px;"></textarea>
        <button type="submit" style="padding:12px; background:#e74c3c; color:white; font-weight:bold; border:none; border-radius:6px;">Submit</button>
      </form>

      <div style="margin-top:20px; text-align:center; font-size:14px;">
        <strong>For More Information:</strong><br>
        <a href="tel:+18886188881" style="text-decoration:none; color:#2980b9;">📞 +1 (888) 618-8881</a>
      </div>
    </div>
  </div>
</div>


<script>
function openPopup() {
    document.getElementById("mileagePopup").style.display = "flex";
}
function closePopup() {
    document.getElementById("mileagePopup").style.display = "none";
}
function validatePopupForm() {
    alert("Thank you! Our team will contact you soon.");
    closePopup();
    return false; // Prevent default form action for now
}
</script>




               
</section>
<br>
<br>

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

        <!-- Start warranty section -->
<section class="shipping__section">
    <div class="container">
        <!-- Section Heading -->
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2 class="section-title" style="font-size: 28px; font-weight: 600;">
                    Discover important details about our warranty policy
                </h2>
            </div>
        </div>

        <div class="shipping__inner style2 d-flex">

            <!-- Exact Fit -->
            <div class="shipping__items style2 d-flex align-items-center">
                <div class="shipping__icon">  
                    <img src="assets/img/pic-23.png" alt="Exact Fit Icon">
                </div>
                <div class="shipping__content">
                    <h2 class="shipping__content--title h3">Exact Fit</h2>
                    <p class="shipping__content--desc">All our products meet or exceed your expectations.</p>
                </div>
            </div>

            <!-- Warranty Duration -->
            <div class="shipping__items style2 d-flex align-items-center">
                <div class="shipping__icon">  
                    <img src="assets/img/pic-25.png" alt="Warranty Icon">
                </div>
                <div class="shipping__content">
                    <h2 class="shipping__content--title h3">60-Day Warranty</h2>
                    <p class="shipping__content--desc">Covers parts for 60 days from delivery.</p>
                </div>
            </div>

            <!-- Exchange Policy -->
            <div class="shipping__items style2 d-flex align-items-center">
                <div class="shipping__icon">  
                    <img src="assets/img/pic-26.png" alt="Exchange Icon">
                </div>
                <div class="shipping__content">
                    <h2 class="shipping__content--title h3">Hassle-Free Exchange</h2>
                    <p class="shipping__content--desc">Free exchange for damaged parts.</p>
                </div>
            </div>

            <!-- OEM Certified -->
            <div class="shipping__items style2 d-flex align-items-center">
                <div class="shipping__icon">  
                    <img src="assets/img/pic-27.png" alt="OEM Parts Icon">
                </div>
                <div class="shipping__content">
                    <h2 class="shipping__content--title h3">Certified OEM Parts</h2>
                    <p class="shipping__content--desc">Only ‘A’ grade OEM parts from dealerships.</p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Start: Filtered Product Horizontal Scroll Section -->
<div class="container my-5">
    <h2 class="section-title mb-4 text-center" style="font-size: 24px; font-weight: 600;">Related Products Based on Your Selection</h2>

    <div class="horizontal-scroll-wrapper" style="overflow-x: auto; white-space: nowrap; padding: 20px; border-radius: 8px; background-color: transparent; border: 1px solid transparent; scrollbar-width: none; -ms-overflow-style: none;">
        <style>
            .horizontal-scroll-wrapper::-webkit-scrollbar {
                display: none;
            }
        </style>

        <?php
// DB Connection
$conn = new mysqli("mysql", "root", "REDACTED", "REDACTED_DB");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form input
$make = $_GET['make'] ?? '';
$make = $conn->real_escape_string(trim($make));
$found = false;

// Query: Fetch all products with the make in the title
$sql = "
SELECT p.id, p.name,
    p.price,
    p.category,
    p.image_url AS img
FROM products p
WHERE LOWER(p.name) LIKE '%" . strtolower($make) . "%'
ORDER BY p.id DESC
";

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $img = $row['img'] ?: 'https://via.placeholder.com/300x200?text=No+Image';
        $price = is_numeric($row['price']) ? '$' . number_format($row['price'], 2) : 'N/A';
        $cat = htmlspecialchars($row['category']);
        $postTitle = htmlspecialchars($row['name']);

        echo '<div class="product-card" style="display: inline-block; width: 250px; margin-right: 15px; vertical-align: top; border: 1px solid #ddd; border-radius: 10px; padding: 10px; background: #fff;">';
        echo '<img src="' . $img . '" alt="Product Image" style="width: 100%; height: 160px; object-fit: cover; border-radius: 6px;">';
        echo '<h3 style="
            font-size: 16px;
            margin-top: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            display: block;
            width: 100%;
        " title="' . $postTitle . '">' . $postTitle . '</h3>';
        echo "<p style='margin: 5px 0;'><strong>Category:</strong> $cat</p>";
        echo "<p style='margin: 5px 0;color:red'><strong>Price:</strong> <h3>$price</h3></p>";
        echo '<a href="product-details.php?id=' . $row['ID'] . '" style="display: block; text-align: center; background-color: #e74c3c; color: #fff; padding: 10px; border-radius: 4px; text-decoration: none;">View Product</a>';
        echo '</div>';

        $found = true;
    }
}

if (!$found) {
    echo "<p style='color: red;'>No products found for this brand.</p>";
}

$conn->close();
?>

    </div>
</div>

<!-- End: Horizontal Scroll Section -->



</main>

<!-- Include your dynamic JS script logic from earlier -->
<script>
  const categorySelect = document.getElementById("category");
  const makeSelect = document.getElementById("make");
  const modelSelect = document.getElementById("model");
  const yearSelect = document.getElementById("year");
  const submodelSelect = document.getElementById("submodel");
  const searchBtn = document.getElementById("searchBtn");

  let carData = {};

  function loadScript(src, callback) {
    const script = document.createElement("script");
    script.src = src;
    script.onload = callback;
    document.body.appendChild(script);
  }

  categorySelect.addEventListener("change", function () {
    const selectedCategory = this.value;

    makeSelect.innerHTML = `<option value="" disabled selected>Select Make</option>`;
    modelSelect.innerHTML = `<option value="" disabled selected>Select Model</option>`;
    yearSelect.innerHTML = `<option value="" disabled selected>Choose Year</option>`;
    submodelSelect.innerHTML = `<option value="" disabled selected>Select Submodel</option>`;
    makeSelect.disabled = modelSelect.disabled = yearSelect.disabled = submodelSelect.disabled = true;
    searchBtn.disabled = true;

    let scriptSrc = selectedCategory === "engines" ? "carData.js" : "transmission.js";

    loadScript(scriptSrc, () => {
      carData = selectedCategory === "engines" ? window.carData : window.transmissionsData;
      Object.keys(carData).forEach(make => {
        const opt = document.createElement("option");
        opt.value = make;
        opt.text = make;
        makeSelect.appendChild(opt);
      });
      makeSelect.disabled = false;
    });
  });

  makeSelect.addEventListener("change", function () {
    const selectedMake = this.value;
    modelSelect.innerHTML = `<option value="" disabled selected>Select Model</option>`;
    yearSelect.innerHTML = `<option value="" disabled selected>Choose Year</option>`;
    submodelSelect.innerHTML = `<option value="" disabled selected>Select Submodel</option>`;
    modelSelect.disabled = yearSelect.disabled = submodelSelect.disabled = true;
    searchBtn.disabled = true;

    if (carData[selectedMake]) {
      Object.keys(carData[selectedMake]).forEach(model => {
        const opt = document.createElement("option");
        opt.value = model;
        opt.text = model;
        modelSelect.appendChild(opt);
      });
      modelSelect.disabled = false;
    }
  });

  modelSelect.addEventListener("change", function () {
    const selectedMake = makeSelect.value;
    const selectedModel = this.value;
    yearSelect.innerHTML = `<option value="" disabled selected>Choose Year</option>`;
    submodelSelect.innerHTML = `<option value="" disabled selected>Select Submodel</option>`;
    yearSelect.disabled = submodelSelect.disabled = true;
    searchBtn.disabled = true;

    if (carData[selectedMake] && carData[selectedMake][selectedModel]) {
      Object.keys(carData[selectedMake][selectedModel]).forEach(year => {
        const opt = document.createElement("option");
        opt.value = year;
        opt.text = year;
        yearSelect.appendChild(opt);
      });
      yearSelect.disabled = false;
    }
  });

  yearSelect.addEventListener("change", function () {
    const selectedMake = makeSelect.value;
    const selectedModel = modelSelect.value;
    const selectedYear = this.value;
    submodelSelect.innerHTML = `<option value="" disabled selected>Select Submodel</option>`;
    submodelSelect.disabled = true;
    searchBtn.disabled = true;

    const submodels = carData[selectedMake]?.[selectedModel]?.[selectedYear];
    if (Array.isArray(submodels)) {
      submodels.forEach(sub => {
        const opt = document.createElement("option");
        opt.value = sub;
        opt.text = sub;
        submodelSelect.appendChild(opt);
      });
      submodelSelect.disabled = false;
    } else {
      searchBtn.disabled = false;
    }
  });

  submodelSelect.addEventListener("change", function () {
    searchBtn.disabled = false;
  });

  function validateForm() {

    if (!categorySelect.value || !makeSelect.value || !modelSelect.value || !yearSelect.value || !submodelSelect.value) {
      alert("Please complete all fields.");
      return false;
    }
    return true;
  }
</script>


    <!-- Start footer section -->
    <footer class="footer__section footer__bg">
        <div class="container">
            <div class="newsletter__area">
                <div class="newsletter__inner d-flex justify-content-between align-items-center">
                    <div class="newsletter__content">
                        <h2 class="newsletter__title">Subscribe <span class="text__secondary">Newsletter</span></h2>
                        <p class="newsletter__desc">Don’t wait make a smart & logical quote here. Its pretty easy.</p>
                    </div>
                    <div class="newsletter__subscribe">
                        <form class="newsletter__subscribe--form" action="#">
                            <label>
                                <input class="newsletter__subscribe--input" placeholder=" Enter Your Email" type="text">
                            </label>
                            <button class="newsletter__subscribe--button" type="submit">Subscribe Now</button>
                        </form>   
                    </div> 
                </div>
            </div>
            <div class="main__footer">
                <div class="row ">
                    <div class="col-lg-4 col-md-10">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title">About Us <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <div class="footer__widget--inner">
                                <p class="footer__widget--desc">Corporate clients and leisure travelers has
                                    been relying on Groundlink for dependable
                                    safe, and professional chauffeured car end
                                    service in major cities across World.</p>
                                <ul class="social__share footer__social d-flex">
                                    <li class="social__share--list">
                                        <a class="social__share--icon__style2" target="_blank" href="https://www.facebook.com">
                                            <svg width="11" height="17" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/>
                                            </svg>
                                            <span class="visually-hidden">Facebook</span>
                                        </a>
                                    </li>
                                    <li class="social__share--list">
                                        <a class="social__share--icon__style2" target="_blank" href="https://twitter.com">
                                            <svg width="16" height="14" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/>
                                            </svg>
                                            <span class="visually-hidden">Twitter</span>
                                        </a>
                                    </li>
                                    <li class="social__share--list">
                                        <a class="social__share--icon__style2" target="_blank" href="https://www.instagram.com">
                                            <svg width="16" height="15" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/>
                                            </svg>  
                                            <span class="visually-hidden">Instagram</span>
                                        </a>
                                    </li>
                                    <li class="social__share--list">
                                        <a class="social__share--icon__style2" target="_blank" href="https://www.pinterest.com">
                                            <svg width="16" height="17" viewBox="0 0 14 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.5625 7.75C13.5625 4.00391 10.5273 0.96875 6.78125 0.96875C3.03516 0.96875 0 4.00391 0 7.75C0 10.6484 1.77734 13.082 4.29297 14.0664C4.23828 13.5469 4.18359 12.7266 4.32031 12.125C4.45703 11.6055 5.11328 8.76172 5.11328 8.76172C5.11328 8.76172 4.92188 8.35156 4.92188 7.75C4.92188 6.82031 5.46875 6.10938 6.15234 6.10938C6.72656 6.10938 7 6.54688 7 7.06641C7 7.64062 6.61719 8.51562 6.42578 9.33594C6.28906 9.99219 6.78125 10.5391 7.4375 10.5391C8.64062 10.5391 9.57031 9.28125 9.57031 7.44922C9.57031 5.80859 8.39453 4.6875 6.75391 4.6875C4.8125 4.6875 3.69141 6.13672 3.69141 7.61328C3.69141 8.21484 3.91016 8.84375 4.18359 9.17188C4.23828 9.22656 4.23828 9.30859 4.23828 9.36328C4.18359 9.58203 4.04688 10.0469 4.04688 10.1289C4.01953 10.2656 3.9375 10.293 3.80078 10.2383C2.95312 9.82812 2.43359 8.59766 2.43359 7.58594C2.43359 5.45312 3.99219 3.48438 6.91797 3.48438C9.26953 3.48438 11.1016 5.17969 11.1016 7.42188C11.1016 9.74609 9.625 11.6328 7.57422 11.6328C6.89062 11.6328 6.23438 11.2773 6.01562 10.8398C6.01562 10.8398 5.6875 12.1523 5.60547 12.4531C5.44141 13.0547 5.03125 13.793 4.75781 14.2305C5.38672 14.4492 6.07031 14.5312 6.78125 14.5312C10.5273 14.5312 13.5625 11.4961 13.5625 7.75Z" fill="currentColor"/>
                                            </svg>
                                            <span class="visually-hidden">Pinterest</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">My Account <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="my-account.php">My Account</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="cart.php">Shopping Cart</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="cart.php">Login</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="loginpage.php">Register</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="checkout.php">Checkout</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">Resources <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="contact.php">Contact Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="about.php">About Us</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="wishlist.php">Wishlist</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="privacy-policy.php">Privacy Policy</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="faq.php">Frequently</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="footer__widget">
                            <h2 class="footer__widget--title ">FIND IT FAST <button class="footer__widget--button" aria-label="footer widget button"></button>
                                <svg class="footer__widget--title__arrowdown--icon" xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394" viewBox="0 0 10.355 6.394">
                                    <path  d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z" transform="translate(-6 -8.59)" fill="currentColor"></path>
                                </svg>
                            </h2>
                            <ul class="footer__widget--menu footer__widget--inner">
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="shop-list.php">Smartphone ablet</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="shop-list.php">Computer Laptop</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="shop-list.php">TV & Audio</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="shop-list.php">Car Accessories</a></li>
                                <li class="footer__widget--menu__list"><a class="footer__widget--menu__text" href="shop-list.php">Cameras Photos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__bottom">
            <div class="container">
                <div class="footer__bottom--inenr d-flex justify-content-between align-items-center">
                    <div class="footer__logo">
                        <a class="footer__logo--link" href="index.php"><img src="assets/img/logo/nav-log-light.webp" alt="logo-img"></a>
                    </div>
                    <p class="copyright__content"><span class="text__secondary">© 2022</span> Powered by <a class="copyright__content--link" target="_blank" href="https://themeforest.net/search/hooktheme">Hooktheme</a> .  All Rights Reserved.</p>
                    <div class="footer__payment">
                        <img src="assets/img/icon/payment-img.webp" alt="payment-img">
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End footer section -->

    <!-- Quickview Wrapper -->
    <div class="modal fade" id="examplemodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog quickview__main--wrapper modal-dialog-centered">
          <div class="modal-content quickview__main__content">
            <div class="modal-header quickview_m_header">
                <button type="button" class="btn-close quickview__close--btn" data-bs-dismiss="modal" aria-label="Close">✕</button>
            </div>
            <div class="modal-body quickview__inner">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="quickview__gallery">
                            <div class="product__media--preview  swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product1.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product1.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product1.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product2.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product2.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product2.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product3.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product3.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product3.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product4.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product4.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product4.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox" data-gallery="product-media-preview" href="assets/img/product/big-product/product5.webp"><img class="product__media--preview__items--img" src="assets/img/product/big-product/product5.webp" alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox" href="assets/img/product/big-product/product5.webp" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443" viewBox="0 0 512 512"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path></svg>
                                                    <span class="visually-hidden">product view</span> 
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="product__media--nav swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product1.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product2.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product3.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product4.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" src="assets/img/product/small-product/product5.webp" alt="product-nav-img">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper__nav--btn swiper-button-next">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"  class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </div>
                                <div class="swiper__nav--btn swiper-button-prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"  class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="quickview__info">
                            <form action="#">
                                <h2 class="product__details--info__title mb-15">Special offer in Pc products </h2>
                                    
                                <div class="product__card--price mb-15">
                                    <span class="current__price">$239.52</span>
                                    <span class="old__price"> $362.00</span>
                                </div>
                                <ul class="rating product__card--rating mb-20 d-flex">
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z" fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                             </svg>
                                        </span>
                                    </li>
                                    <li class="rating__list">
                                        <span class="rating__icon"> 
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z" fill="currentColor"></path>
                                             </svg>
                                        </span>
                                    </li>
                                    <li>
                                        <span class="rating__review--text">(106) Review</span>
                                    </li>
                                </ul>
                                <p class="product__details--info__desc mb-15">Lorem ipsum dolor sit amet, consectetur adipisicing elit is. Deserunt totam dolores ea numquam labore!.</p>
                                <div class="product__variant">
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-10">Color :</legend>
                                            <div class="variant__color d-flex">
                                                <div class="variant__color--list">
                                                    <input id="color-red1" name="color" type="radio" checked>
                                                    <label class="variant__color--value red" for="color-red1" title="Red"><img class="variant__color--value__img" src="assets/img/product/small-product/product1.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red2" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red2" title="Black"><img class="variant__color--value__img" src="assets/img/product/small-product/product2.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red3" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red3" title="Pink"><img class="variant__color--value__img" src="assets/img/product/small-product/product3.webp" alt="variant-color-img"></label>
                                                </div>
                                                <div class="variant__color--list">
                                                    <input id="color-red4" name="color" type="radio">
                                                    <label class="variant__color--value red" for="color-red4" title="Orange"><img class="variant__color--value__img" src="assets/img/product/small-product/product4.webp" alt="variant-color-img"></label>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                    <div class="product__variant--list mb-20">
                                        <fieldset class="variant__input--fieldset">
                                            <legend class="product__variant--title mb-10">Weight :</legend>
                                            <ul class="variant__size d-flex">
                                                <li class="variant__size--list">
                                                    <input id="weight1" name="weight" type="radio" checked>
                                                    <label class="variant__size--value red" for="weight1">5 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight2" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight2">3 kg</label>
                                                </li>
                                                <li class="variant__size--list">
                                                    <input id="weight3" name="weight" type="radio">
                                                    <label class="variant__size--value red" for="weight3">2 kg</label>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                    <div class="quickview__variant--list quantity d-flex align-items-center mb-15">
                                        <div class="quantity__box">
                                            <button type="button" class="quantity__value quickview__value--quantity decrease" aria-label="quantity value" value="Decrease Value">-</button>
                                            <label>
                                                <input type="number" class="quantity__number quickview__value--number" value="1" data-counter />
                                            </label>
                                            <button type="button" class="quantity__value quickview__value--quantity increase" aria-label="quantity value" value="Increase Value">+</button>
                                        </div>
                                        <button class="primary__btn quickview__cart--btn" type="submit">Add To Cart</button>  
                                    </div>
                                    <div class="quickview__variant--list variant__wishlist mb-15">
                                        <a class="variant__wishlist--icon" href="wishlist.php" title="Add to wishlist">
                                            <svg class="quickview__variant--wishlist__svg" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512"><path d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z" fill="none" stroke="currentColor" stroke-linecap="round"  stroke-width="32"/></svg>
                                            Add to Wishlist
                                        </a>
                                    </div>
                                </div>
                                <div class="quickview__social d-flex align-items-center">
                                    <label class="quickview__social--title">Social Share:</label>
                                    <ul class="quickview__social--wrapper mt-0 d-flex">
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.facebook.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524" viewBox="0 0 7.667 16.524">
                                                    <path  data-name="Path 237" d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z" transform="translate(-960.13 -345.407)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://twitter.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.489" height="13.384" viewBox="0 0 16.489 13.384">
                                                    <path  data-name="Path 303" d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z" transform="translate(-951.23 -1140.849)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Twitter</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.instagram.com">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.497" height="17.492" viewBox="0 0 19.497 19.492">
                                                    <path  data-name="Icon awesome-instagram" d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z" transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                                </svg>
                                                <span class="visually-hidden">Instagram</span>
                                            </a>
                                        </li>
                                        <li class="quickview__social--list">
                                            <a class="quickview__social--icon" target="_blank" href="https://www.youtube.com">
                                                <svg  xmlns="http://www.w3.org/2000/svg" width="16.49" height="11.582" viewBox="0 0 16.49 11.582">
                                                    <path  data-name="Path 321" d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z" transform="translate(-951.269 -1359.8)" fill="currentColor"/>
                                                </svg>
                                                <span class="visually-hidden">Youtube</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Quickview Wrapper End -->

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
function handleAddToCart(event) {
  event.preventDefault();

  const button = event.target.closest('[data-product-id]');
  const productId = button?.getAttribute('data-product-id');

  if (!productId) {
    alert("Product ID missing");
    return;
  }

  fetch("add-to-cart.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded"
    },
    body: new URLSearchParams({
      product_id: productId,
      quantity: 1
    }),
    credentials: "include"
  })
  .then(res => res.text())
  .then(data => {
    if (data === "not_logged_in") {
      // Save current page for redirection after login
      sessionStorage.setItem("redirect_after_login", window.location.href);
      window.location.href = "loginpage.php";
    } else if (data === "success") {
      window.location.href = "cart.php";
    } else if (data === "already_exists") {
      alert("Already in cart");
    } else {
      alert("Something went wrong: " + data);
    }
  })
  .catch(err => {
    console.error("Error:", err);
    alert("Request failed.");
  });
}
</script>

</body>
</html>