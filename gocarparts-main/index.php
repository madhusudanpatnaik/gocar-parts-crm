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
    <?php include 'header.php' ?>

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

       

        <!-- Start offCanvas minicart -->
        
        <!-- End offCanvas minicart -->

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
        <!-- Start slider section -->
        <section class="hero__slider--section slider__section--bg2 section--padding">
            <div class="container">
                <div class="row row-md-reverse">
                    <div class="col-lg-4">
                        <div class="search__filter--area">
                            <div class="search__filter--header d-flex">
                                <div class="search__filter--header__icon">
                                    <img src="assets/img/icon/ssd-icon-img.webp" alt="icon-img">
                                </div>
                                <div class="search__filter--header__text">
                                    <h2 class="search__filter--title">Search by Vehicle</h2>
                                    <p class="search__filter--desc">Filter your results by entering your Vehicle to
                                        ensure you find the parts that fit.</p>
                                </div>    
                            </div>

                            

             <form class="search__filter--form" action="product-gallery.php" method="GET" onsubmit="return validateForm()">
  <!-- Category -->
  <div class="search__filter--select select">
    <select id="category" name="category" class="search__filter--select__field" required>
      <option value="" selected disabled>Select Category</option>
      <option value="engines">Used Engines</option>
      <option value="trans">Transmissions</option>
    </select>
  </div>

  <!-- Make -->
  <div class="search__filter--select select">
    <select id="make" name="make" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Select Make</option>
    </select>
  </div>

  <!-- Model -->
  <div class="search__filter--select select">
    <select id="model" name="model" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Select Model</option>
    </select>
  </div>

  <!-- Year -->
  <div class="search__filter--select select">
    <select id="year" name="year" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Choose Year</option>
    </select>
  </div>

  <!-- Submodel -->
  <div class="search__filter--select select">
    <select id="submodel" name="submodel" class="search__filter--select__field" disabled required>
      <option value="" selected disabled>Select Submodel</option>
    </select>
  </div>

  <!-- Submit -->
  <button id="searchBtn" class="search__filter--btn primary__btn" type="submit" disabled>Search</button>
</form>

<!-- SCRIPT -->
<script>
  const categorySelect = document.getElementById("category");
  const makeSelect     = document.getElementById("make");
  const modelSelect    = document.getElementById("model");
  const yearSelect     = document.getElementById("year");
  const submodelSelect = document.getElementById("submodel");
  const searchBtn      = document.getElementById("searchBtn");

  let carData = {}; // Holds data after loading selected file

  // Disable all fields initially
  makeSelect.disabled = modelSelect.disabled = yearSelect.disabled = submodelSelect.disabled = true;
  searchBtn.disabled = true;

  // Dynamically load a script file
  function loadScript(src, callback) {
    const script = document.createElement("script");
    script.src = src;
    script.onload = callback;
    script.onerror = () => alert("Failed to load: " + src);
    document.body.appendChild(script);
  }

  // Category → Load data file → Populate Make
  categorySelect.addEventListener("change", function () {
    const selectedCategory = this.value;

    // Reset everything
    makeSelect.innerHTML     = `<option value="" disabled selected>Select Make</option>`;
    modelSelect.innerHTML    = `<option value="" disabled selected>Select Model</option>`;
    yearSelect.innerHTML     = `<option value="" disabled selected>Choose Year</option>`;
    submodelSelect.innerHTML = `<option value="" disabled selected>Select Submodel</option>`;
    makeSelect.disabled = modelSelect.disabled = yearSelect.disabled = submodelSelect.disabled = true;
    searchBtn.disabled = true;

    // Determine file to load
    let scriptSrc = "";
    if (selectedCategory === "engines") {
      scriptSrc = "carData.js"; // this must declare `const carData = {...}`
    } else if (selectedCategory === "trans") {
      scriptSrc = "transmission.js"; // will later declare `const transmissionsData = {...}`
    }

    if (scriptSrc) {
      loadScript(scriptSrc, () => {
        if (selectedCategory === "engines" && typeof window.carData !== "undefined") {
          carData = window.carData;
        } else if (selectedCategory === "trans" && typeof window.transmissionsData !== "undefined") {
          carData = window.transmissionsData;
        } else {
          alert("Data for selected category is not available.");
          return;
        }

        // Populate make
        Object.keys(carData).forEach(make => {
          const opt = document.createElement("option");
          opt.value = make;
          opt.text = make;
          makeSelect.appendChild(opt);
        });
        makeSelect.disabled = false;
      });
    }
  });

  // Make → Model
  makeSelect.addEventListener("change", function () {
    const selectedMake = this.value;
    modelSelect.innerHTML    = `<option value="" disabled selected>Select Model</option>`;
    yearSelect.innerHTML     = `<option value="" disabled selected>Choose Year</option>`;
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
      modelSelect.disabled = true;
      if (modelSelect.options.length > 1) modelSelect.disabled = false;
    }
  });

  // Model → Year
  modelSelect.addEventListener("change", function () {
    const selectedMake = makeSelect.value;
    const selectedModel = this.value;
    yearSelect.innerHTML     = `<option value="" disabled selected>Choose Year</option>`;
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

  // Year → Submodel
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

  // Submodel → Enable search
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

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="hero__slider--inner hero__slider--activation swiper">
                            <div class="hero__slider--wrapper swiper-wrapper">
                                <div class="swiper-slide ">
                                    <div class="hero__slider--items__style2 home2-slider1-bg">
                                        <div class="slider__content style2">
                                            <span class="slider__subtitle text__secondary">SHOP THE VERY BEST</span>
                                           <h2 class="slider__maintitle--style2 h1" style="color: white;">AUTO PARTS <br> & ACCESSORIES</h2>
                                            <p class="slider__desc text__secondary" style="color: white;">High Quality - Extreme Performance</p>
                                            <a class="primary__btn slider__btn" href="shop-list.php">
                                                Shop now
                                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="hero__slider--layer__style2">
                                            <img class="slider__layer--img " src="assets/img/slider/demo2.jpg" alt="slider-img">
                                        </div>  
                                    </div>
                                </div>
                                
                                <div class="swiper-slide ">
                                    <div class="hero__slider--items__style2 home2-slider1-bg">
                                        <div class="slider__content style2">
                                            <span class="slider__subtitle text__secondary">SHOP THE VERY BEST</span>
                                            <h2 class="slider__maintitle--style2 h1" >AUTO PARTS <br> & ACCESSORIES</h2>
                                            <p class="slider__desc text__secondary" >High Quality - Extreme Performance</p>

                                            <a class="primary__btn slider__btn" href="shop-list.php">
                                                Shop now
                                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor"/>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="hero__slider--layer__style2">
                                            <img class="slider__layer--img " src="assets/img/slider/design.jpg" alt="slider-img">
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <div class="swiper__nav--btn swiper-button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                            </div>
                            <div class="swiper__nav--btn swiper-button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </section>
        <!-- End slider section -->

        <!-- Start categories section -->
        <section class="categories__section section--padding">
            <div class="container">
                <div class="row mb--n30">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-30">
                        <div class="categories__card text-center">
                            <a class="categories__card--link" href="shop-list.php">
                                <span class="categories__icon">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64" height="64" viewBox="0 0 64 64">
                    <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAABFhJREFUeF7tmluoVWUQx3/nQcREBQMzzQs+lBhk5SUqzAI9PXR5EBGFhATxktdjhvrgJSiMrLxRKhIh3uqIIIgGKqQdT2lqeCXywoFMsZcsUBF8sPWP2Yd1Tnvt9W339x3ae615Wnvt+WbN/Nd8M/PNrDoyTnUZt58cgNwDMo5AvgUy7gB5EMy3QKAt8CIw1qPsb4HjHuW1igrlAb8Agz0q/DMwzKO84ADcAB7xqPDvQD+P8joMgO3AWxUo/g0wAahaAA4BH1YAwDLgFeA3YEAFchKXhooBmd8CzcALHt+YPMlnVgkeA3oBQxIA+M7u7wHWAguAN4A7wGsJa84Cf3oENDgApXS9C3QGPgdmA5uAacAtoFsII0vJDBUDMgGA0lOSm5cCYLn9eQLYD7weK3Led/CAH6L4csCBz4nlQT1gceTGK52eEIbpeeCYD9ECYCnwMjATuOggtCfQAnR34A3F8hGwxIdwAXDfBH1gYKTJ/Rh4z5gUvDanLfD4/6/A48A54ClHub2tiDoDKAC3oTgAn0aReGGK0L5WlopNyvg88LjYsxqYb4z9gasOi04DQ43vPCDvUYn+LyUBMA7YnSJ8vAOPg35lsYwBDjqskMGqHURKr13brfk6eoGTSgHwhcWEpGedBEY4KBKC5S+gR4rgecC6dgDo7Wtd4VT5ZeTNU5M8YCMw3QSsB+bY9b4obcn4nbYFQhiYJlNpc7gxPWtVpH5+BUyx+6outV1Et4GHAL3Ud6OAfxh4zv6rTwJgAzDD3OcZ4JItUKYQOP8XmhoLwqOjk+MRU0yGfmbXKrG7RP0J2fROVHk+Gh3RLxsojVkEQLjstQKsJW0LyH2erjEPEAA6hM0tFQRreQvIbqV8xYk2abDR9onuF46o1eQBLwHf275XwNtl14Xjt+7NsnufWEBsA0CxwKYcWo1BsJgtcQCKekDmAcj8FoifBTIZBDMPgIYPVywQ6Mipiqlas4DskD0iVYiiPAvE0mDRLJB5D8h8DMgBiLXEaj0NbrWp9d+1dBqMnwWSGiKFs4CmzeoMNdcSAK4NkUXWGFVqbEgDQEw/RROckZZL1Rm6ntAOUrtsVQe3iuIdoVFAkz2/AVhj14Wm6DbgXqxt9gcwKAmA1oZBmQatiI7YLuOtMsUmsscBSNsC7YWIvykJAB2B1VNzHZ09EfUKNYAQvepzdpeClIsHXAP6xOSoOzwRuKB75Q5GkvR50raKuq83rY2mQBOaXACotwpQhmsgq+8SWkkAqG4eZDP6SsZcGjTsMMmnYq3rkCC4dIVLPl8APAYMBI560FQzBH30INKHD2qthySXGJAKgE8FO0Ux4MfYvH8yoOgbirx4gG/lNEDVJPZh34LLkKchr0r7VHKN8qmC2jG4DjHLlevK/zawxYU5FAB6tuZ2b7oo4ZlH3wCoCPrPtwDFnhMSAM92hRGXAxAG1+qRmntA9byrMJrmHhAG1+qRmntA9byrMJr+Axvxbz1uW9c2AAAAAElFTkSuQmCC" x="0" y="0" width="64" height="64"/>
                  </svg>
                             
                                </span>
                                <h2 class="categories__title">Engines</h2>
                                
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6 mb-30">
                        <div class="categories__card text-center">
                            <a class="categories__card--link" href="shop-list.php">
                                <span class="categories__icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="64" height="64" viewBox="0 0 64 64">
                    <image xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAA8BJREFUeF7tmjePFDEUx38nAQIEiJqKkpICGgQiVwRRkxu+AKlC4o4SkCgQDR3pCxyiAokgEUpKJGpoKchBwD6wJd/bWdvj8c1Ommpmx/Y+/9//Rc8MPb9mer5/BgAGBvQcgcEEek6AwQkOJjCYQDwCG4G9wEozZRJ7/sAC09LP8f/4f+Qn4BHwuuzEmPGxJnButKk54CewJmbhjGO+GEBnR+Bfzrjuv6UsABcdrWqNrQNOAMty/3nJ9b4CW3IzQQAQZC0AIZmeAb+BHWbgE+BpaFLF97uAbcYUhIVXK663YHpZAEQAuSxg8iwA5r7cNbcrwB/k9AkagCKNugLUAUCIkVl9QhsBsGzL4hOaaAIuA4oYmdUnNB2AIh/jAlTZB9kw6HNk0/QBtQHg8+Ia8cWOAiENh96XikgxmWDvAbgJnHISH7ldzEQoFPdrZYDUAJeA5aV4lXewjvu1ASDV3wtgRd79JK9m4/6hnJmozweI9gVtKX+lBnicLHrcRE19W2PouL+qLgCyUi0Cg0n/5/4u96K0bLWIjwE+AGzekLMQag0AWiO2QIpQsndIDAC6GHNT5dXAmbJCpDBgmgBoE3D3+w14BRwB3scCURWAyrm4I2gMA3wAyFK/TOPkOHA/BoSqAIhAdZqABsCagESKTU7Iltzh2giQCyEQfMWQLoJcx2e9cN0A+BoyB4Dbo5aZhMklwHfgRsgvxJbDLtWb5AO0CUoD9zmw3knd3Z7lWNSqCkDdPiCmJedrqY3J62uJNdEEYhIhHwC6wzSrAbgFvDH02WDOA+Rxkgk0nQGyYbd61T5xTgMgsVRCiVziSGwV2BQfUNYE9PggAJOiRlsZUJQ5uowYY4DET5tAHHTiam8AEB9w0tDgHnDY3HcFgKAJ3AWOmVFyL3l1r5ygmMC8cYD7OmACWuPBMNg1JzhG+dEPC7JBHQblA4ilZpZ73xYfUDkVbnMitB+4A6w1CvwBXB+Vx2d9FWHVVHjamaC16Z3A5tRy2Jc7W/CaagJauZLFfjQpfHRDpE0AiMYlRd9aQGs5N5CW2NGUllhRdzemGsxpArKnom7zJAVJw0MaIO9Mq1y+Xjvts/eid76WmDgP2aA+GNEHGKIVWUe+LpPLrmm/NtO/l5Vxt9L4B1OkSVfqStnF9HgfAHI09nLK54KuvFbjb4GHuT6XCx2Pn3doOa0zwqwaL8MAO1aYsMc0G6syLmX+55waTwEgRejWzAmZQGs2kiroAEAqcl2ZNzCgK5pM3cfAgFTkujJvYEBXNJm6j7+EbJ1QbIwJqAAAAABJRU5ErkJggg==" x="0" y="0" width="64" height="64"/>
                  </svg>
                                </span>
                                <h2 class="categories__title">Transmissions</h2>
                                
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        <!-- End categories section -->

        

        <!-- Start banner section -->
        <section class="banner__section section--padding pt-0">
            <div class="container">
                <div class="row  mb--n30">
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="banner__items position__relative">
                            <a class="banner__thumbnail display-block" href="shop-list.php"><img class="banner__thumbnail--img banner__max--height" src="assets/img/banner/part.jpg" alt="banner-img">
                                <div class="banner__content banner__content--style">
                                    <span class="banner__content--subtitle text-white">BIG SALE - UP TO <span class="text__secondary">40% OFF</span></span>
                                    <h2 class="banner__content--title"><span class="banner__content--title__inner">GENUINE</span> PARTS</h2>
                                    <span class="banner__content--subtitle text-white display-block">We supply top brands</span>
                                    <span class="banner__content--btn">Buy now 
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="banner__items position__relative">
                            <a class="banner__thumbnail display-block" href="shop-list.php"><img class="banner__thumbnail--img banner__max--height" src="assets/img/banner/parts.jpg" alt="banner-img">
                                <div class="banner__content banner__content--style">
                                    <span class="banner__content--subtitle text-white">LOWEST PRICE</span>
                                    <h2 class="banner__content--title"><span class="banner__content--title__inner">EVERYTHING</span></h2>
                                    <span class="banner__content--subtitle text-white display-block">ONLINE OFFER</span>
                                    <span class="banner__content--btn">See Offers 
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->

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
        
<!-- SECTION 1: USED ENGINES -->
<section class="product__section section--padding pt-0">
    <div class="container">
        <div class="section__heading border-bottom mb-30">
            <h2 class="section__heading--maintitle">Popular <span>Engine</span></h2>
        </div>
        <div class="product__section--inner pb-15 product__swiper--activation swiper">
            <div class="swiper-wrapper" id="engineContainer">
                <!-- Dynamic products will be inserted here -->
            </div>
            <div class="swiper__nav--btn swiper-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
            <div class="swiper__nav--btn swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 2: TRANSMISSIONS -->
<section class="product__section section--padding pt-0">
    <div class="container">
        <div class="section__heading border-bottom mb-30">
            <h2 class="section__heading--maintitle">Popular <span>Transmissions</span></h2>
        </div>
        <div class="product__section--inner pb-15 product__swiper--activation swiper">
            <div class="swiper-wrapper" id="transmissionContainer">
                <!-- Dynamic products will be inserted here -->
            </div>
            <div class="swiper__nav--btn swiper-button-next">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-chevron-right">
                    <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
            </div>
            <div class="swiper__nav--btn swiper-button-prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="-chevron-left">
                    <polyline points="15 18 9 12 15 6"></polyline>
                </svg>
            </div>
        </div>
    </div>
</section>

<script>
// Engine products
fetch('productlist.php')
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById('engineContainer');
        data.forEach(product => {
            const card = document.createElement('div');
            card.className = 'swiper-slide';
            card.innerHTML = getCardHTML(product);
            container.appendChild(card);
        });
    });

// Transmission products
fetch('productlist2.php')
    .then(res => res.json())
    .then(data => {
        const container = document.getElementById('transmissionContainer');
        data.forEach(product => {
            const card = document.createElement('div');
            card.className = 'swiper-slide';
            card.innerHTML = getCardHTML(product);
            container.appendChild(card);
        });
    });

// Template Function
function getCardHTML(product) {
    const img = product.image || 'https://via.placeholder.com/300x200?text=No+Image';
    const rawPrice = (product.price || '0').toString().replace(/,/g, '');
    const price = isNaN(rawPrice) ? '0.00' : parseFloat(rawPrice).toFixed(2);

    return `
        <div class="product__card medium "data-product-id="${product.id}
             style="position: relative; overflow: hidden; text-align: center; padding: 20px; border-radius: 10px; border: 1px solid #eee; background-color: #fff; transition: all 0.3s ease;"
             onmouseover="this.querySelector('.product__card--price').style.display='none'; this.querySelector('.action__buttons').style.display='flex';"
             onmouseout="this.querySelector('.product__card--price').style.display='block'; this.querySelector('.action__buttons').style.display='none';">

            <div class="product__card--thumbnail" style="margin-bottom: 10px;">
    <a href="product-details.php?id=${product.id}">
        <img src="${img}" alt="${product.title}" style="width: 100%; max-height: 220px; object-fit: contain;">
    </a>
</div><br>

            <div class="product__card--content">
<h3 class="product__card--title" 
    style="font-size: 16px; margin-bottom: 2px; color: #000; word-wrap: break-word; white-space: normal; overflow: visible;">
    ${product.title}
</h3>

                <div class="product__card--price" style="color: red; font-weight: bold; font-size: 18px;margin-top: 0;">
                    $${price}
                </div>

                <div class="product__card--footer d-flex justify-content-center gap-2 action-buttons">
          <a href="product-details.php" class="product__card--btn primary__btn">
            <i class="bi bi-eye me-1"></i> More Opts
          </a>
          <a href="#" class="product__card--btn secondary__btn" onclick="handleAddToCart(event)">
            <i class="bi bi-basket me-1"></i> Add
          </a>
        </div>
            </div>
        </div>
    `;
}

function handleAddToCart(event) {
  event.preventDefault();

  const card = event.target.closest('.product__card');
  const productId = card?.getAttribute('data-product-id');

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
        sessionStorage.setItem("redirect_after_login", window.location.pathname);
        window.location.href = "loginpage.php";
      } else if (data === "success") {
        window.location.href = "cart.php";
      } else if (data === "already_exists") {
        alert("Already in cart");
      } else {
        alert("Something went wrong: " + data);
      }
    });
}

</script>

        <!-- Start discount banner section -->
        <section class="discount__banner--section section--padding pt-0">
            <div class="container">
                <div class="discount__banner--thumbnail position-relative">
                   <img class="border-radius-5 discount__banner--img__height" src="assets/img/slider/home2-slider1-bg.png" alt="banner-img"style="display: block; margin: 0 auto;">
                   <div class="discount__banner--content"
     style="
       position: absolute;
       top: 30%;
       right: 9%;
       text-align: right;
       display: flex;
       flex-direction: column;
       align-items: flex-end;
       gap: 10px;
     ">
  
  <span class="discount__banner--content__subtitle" style="color: white;">FLAT 50% DISCOUNT</span>
  
  <h2 class="discount__banner--content__title text-white" style="margin: 0;">
    ALL CAR PARTS
  </h2>
  
  <a class="discount__banner--content__btn primary__btn"
     href="shop-list.php"
     style="
       padding: 10px 20px;
       background-color: red;
       color: white;
       border-radius: 30px;
       text-decoration: none;
       display: inline-flex;
       align-items: center;
     ">Buy now
                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58745 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178V3.6178Z" fill="currentColor"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End discount banner section -->
   
        
        <!-- Start blog section -->
        <section class="blog__section section--padding">
            <div class="container">
                <div class="section__heading section__heading--flex border-bottom d-flex justify-content-between align-items-end mb-30">
                    <h2 class="section__heading--maintitle">Blog & article</h2>
                    <a class="view__all--link" href="blog.php">View all Blog</a>
                </div>
                <div class="blog__section--inner blog__swiper--activation swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="blog__card">
                                <div class="blog__card--thumbnail">
                                    <a class="blog__card--thumbnail__link" href="blog-details.php"><img class="blog__card--thumbnail__img" src="assets/img/blog/blog1.webp" alt="blog-img"></a>
                                    <span class="blog__card--meta__date">20 <br> Oct</span>  
                                </div>
                                <div class="blog__card--content">
                                    <span class="blog__card--meta">By: Rasalina</span>
                                    <h3 class="blog__card--title"><a href="blog-details.php">Beauty Skin Care Product In Stock</a></h3>
                                    <p class="blog__card--desc">Namkand sodales vel online best prices when
                                        an unknown printer took a galley of  </p>
                                    <div class="blog__card--footer d-flex justify-content-between align-items-center">
                                        <a class="blog__card--btn__link" href="blog-details.php">Read more 
                                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <ul class="social__share blog__card--social d-flex">
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://www.facebook.com">
                                                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="visually-hidden">Facebook</span>
                                                </a>
                                            </li>
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://twitter.com">
                                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="visually-hidden">Twitter</span>
                                                </a>
                                            </li>
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://www.instagram.com">
                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/>
                                                    </svg>  
                                                    <span class="visually-hidden">Instagram</span>
                                                </a>
                                            </li>
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://www.youtube.com">
                                                    <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.0117 2.16797C14.8477 1.51172 14.3281 0.992188 13.6992 0.828125C12.5234 0.5 7.875 0.5 7.875 0.5C7.875 0.5 3.19922 0.5 2.02344 0.828125C1.39453 0.992188 0.875 1.51172 0.710938 2.16797C0.382812 3.31641 0.382812 5.77734 0.382812 5.77734C0.382812 5.77734 0.382812 8.21094 0.710938 9.38672C0.875 10.043 1.39453 10.5352 2.02344 10.6992C3.19922 11 7.875 11 7.875 11C7.875 11 12.5234 11 13.6992 10.6992C14.3281 10.5352 14.8477 10.043 15.0117 9.38672C15.3398 8.21094 15.3398 5.77734 15.3398 5.77734C15.3398 5.77734 15.3398 3.31641 15.0117 2.16797ZM6.34375 7.99219V3.5625L10.2266 5.77734L6.34375 7.99219Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="visually-hidden">Youtube</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__card">
                                <div class="blog__card--thumbnail">
                                    <a class="blog__card--thumbnail__link" href="blog-details.php"><img class="blog__card--thumbnail__img" src="assets/img/blog/blog2.webp" alt="blog-img"></a>
                                    <span class="blog__card--meta__date">24 <br> Oct</span>  
                                </div>
                                <div class="blog__card--content">
                                    <span class="blog__card--meta">By: Rasalina</span>
                                    <h3 class="blog__card--title"><a href="blog-details.php">Lorem ipsum dolor sit thre elit.</a></h3>
                                    <p class="blog__card--desc">Namkand sodales vel online best prices when
                                        an unknown printer took a galley of  </p>
                                    <div class="blog__card--footer d-flex justify-content-between align-items-center">
                                        <a class="blog__card--btn__link" href="blog-details.php">Read more 
                                            <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"></path>
                                            </svg>
                                        </a>
                                        <ul class="social__share blog__card--social d-flex">
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://www.facebook.com">
                                                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="visually-hidden">Facebook</span>
                                                </a>
                                            </li>
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://twitter.com">
                                                    <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="visually-hidden">Twitter</span>
                                                </a>
                                            </li>
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://www.instagram.com">
                                                    <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/>
                                                    </svg>  
                                                    <span class="visually-hidden">Instagram</span>
                                                </a>
                                            </li>
                                            <li class="social__share--list">
                                                <a class="social__share--icon" target="_blank" href="https://www.youtube.com">
                                                    <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M15.0117 2.16797C14.8477 1.51172 14.3281 0.992188 13.6992 0.828125C12.5234 0.5 7.875 0.5 7.875 0.5C7.875 0.5 3.19922 0.5 2.02344 0.828125C1.39453 0.992188 0.875 1.51172 0.710938 2.16797C0.382812 3.31641 0.382812 5.77734 0.382812 5.77734C0.382812 5.77734 0.382812 8.21094 0.710938 9.38672C0.875 10.043 1.39453 10.5352 2.02344 10.6992C3.19922 11 7.875 11 7.875 11C7.875 11 12.5234 11 13.6992 10.6992C14.3281 10.5352 14.8477 10.043 15.0117 9.38672C15.3398 8.21094 15.3398 5.77734 15.3398 5.77734C15.3398 5.77734 15.3398 3.31641 15.0117 2.16797ZM6.34375 7.99219V3.5625L10.2266 5.77734L6.34375 7.99219Z" fill="currentColor"/>
                                                    </svg>
                                                    <span class="visually-hidden">Youtube</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__card">
                                <div class="blog__card--thumbnail">
                                    <a class="blog__card--thumbnail__link" href="blog-details.php"><img class="blog__card--thumbnail__img" src="assets/img/blog/blog3.webp" alt="blog-img"></a>
                                    <span class="blog__card--meta__date">22 <br> Oct</span>  
                                </div>
                                <div class="blog__card--content">
                                    <span class="blog__card--meta">By: Rasalina</span>
                                    <h3 class="blog__card--title"><a href="blog-details.php">Possimus libero id moles cumqu.</a></h3>
                                    <p class="blog__card--desc">Namkand sodales vel online best prices when
                                        an unknown printer took a galley of  </p>
                                        <div class="blog__card--footer d-flex justify-content-between align-items-center">
                                            <a class="blog__card--btn__link" href="blog-details.php">Read more 
                                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                            <ul class="social__share blog__card--social d-flex">
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://www.facebook.com">
                                                        <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Facebook</span>
                                                    </a>
                                                </li>
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://twitter.com">
                                                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Twitter</span>
                                                    </a>
                                                </li>
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://www.instagram.com">
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/>
                                                        </svg>  
                                                        <span class="visually-hidden">Instagram</span>
                                                    </a>
                                                </li>
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://www.youtube.com">
                                                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.0117 2.16797C14.8477 1.51172 14.3281 0.992188 13.6992 0.828125C12.5234 0.5 7.875 0.5 7.875 0.5C7.875 0.5 3.19922 0.5 2.02344 0.828125C1.39453 0.992188 0.875 1.51172 0.710938 2.16797C0.382812 3.31641 0.382812 5.77734 0.382812 5.77734C0.382812 5.77734 0.382812 8.21094 0.710938 9.38672C0.875 10.043 1.39453 10.5352 2.02344 10.6992C3.19922 11 7.875 11 7.875 11C7.875 11 12.5234 11 13.6992 10.6992C14.3281 10.5352 14.8477 10.043 15.0117 9.38672C15.3398 8.21094 15.3398 5.77734 15.3398 5.77734C15.3398 5.77734 15.3398 3.31641 15.0117 2.16797ZM6.34375 7.99219V3.5625L10.2266 5.77734L6.34375 7.99219Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Youtube</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> 
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog__card">
                                <div class="blog__card--thumbnail">
                                    <a class="blog__card--thumbnail__link" href="blog-details.php"><img class="blog__card--thumbnail__img" src="assets/img/blog/blog1.webp" alt="blog-img"></a>
                                    <span class="blog__card--meta__date">18 <br> Oct</span>  
                                </div>
                                <div class="blog__card--content">
                                    <span class="blog__card--meta">By: Rasalina</span>
                                    <h3 class="blog__card--title"><a href="blog-details.php">Beauty Skin Care Product In Stock</a></h3>
                                    <p class="blog__card--desc">Namkand sodales vel online best prices when
                                        an unknown printer took a galley of  </p>
                                        <div class="blog__card--footer d-flex justify-content-between align-items-center">
                                            <a class="blog__card--btn__link" href="blog-details.php">Read more 
                                                <svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z" fill="currentColor"></path>
                                                </svg>
                                            </a>
                                            <ul class="social__share blog__card--social d-flex">
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://www.facebook.com">
                                                        <svg width="9" height="15" viewBox="0 0 9 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.62891 8.625L8.01172 6.10938H5.57812V4.46875C5.57812 3.75781 5.90625 3.10156 7 3.10156H8.12109V0.941406C8.12109 0.941406 7.10938 0.75 6.15234 0.75C4.15625 0.75 2.84375 1.98047 2.84375 4.16797V6.10938H0.601562V8.625H2.84375V14.75H5.57812V8.625H7.62891Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Facebook</span>
                                                    </a>
                                                </li>
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://twitter.com">
                                                        <svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12.5508 2.90625C13.0977 2.49609 13.5898 2.00391 13.9727 1.42969C13.4805 1.64844 12.9062 1.8125 12.332 1.86719C12.9336 1.51172 13.3711 0.964844 13.5898 0.28125C13.043 0.609375 12.4141 0.855469 11.7852 0.992188C11.2383 0.417969 10.5 0.0898438 9.67969 0.0898438C8.09375 0.0898438 6.80859 1.375 6.80859 2.96094C6.80859 3.17969 6.83594 3.39844 6.89062 3.61719C4.51172 3.48047 2.37891 2.33203 0.957031 0.609375C0.710938 1.01953 0.574219 1.51172 0.574219 2.05859C0.574219 3.04297 1.06641 3.91797 1.85938 4.4375C1.39453 4.41016 0.929688 4.30078 0.546875 4.08203V4.10938C0.546875 5.50391 1.53125 6.65234 2.84375 6.92578C2.625 6.98047 2.35156 7.03516 2.10547 7.03516C1.91406 7.03516 1.75 7.00781 1.55859 6.98047C1.91406 8.12891 2.98047 8.94922 4.23828 8.97656C3.25391 9.74219 2.02344 10.207 0.683594 10.207C0.4375 10.207 0.21875 10.1797 0 10.1523C1.25781 10.9727 2.76172 11.4375 4.40234 11.4375C9.67969 11.4375 12.5508 7.08984 12.5508 3.28906C12.5508 3.15234 12.5508 3.04297 12.5508 2.90625Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Twitter</span>
                                                    </a>
                                                </li>
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://www.instagram.com">
                                                        <svg width="14" height="13" viewBox="0 0 14 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M7.125 3.60547C5.375 3.60547 3.98047 5.02734 3.98047 6.75C3.98047 8.5 5.375 9.89453 7.125 9.89453C8.84766 9.89453 10.2695 8.5 10.2695 6.75C10.2695 5.02734 8.84766 3.60547 7.125 3.60547ZM7.125 8.80078C6.00391 8.80078 5.07422 7.89844 5.07422 6.75C5.07422 5.62891 5.97656 4.72656 7.125 4.72656C8.24609 4.72656 9.14844 5.62891 9.14844 6.75C9.14844 7.89844 8.24609 8.80078 7.125 8.80078ZM11.1172 3.49609C11.1172 3.08594 10.7891 2.75781 10.3789 2.75781C9.96875 2.75781 9.64062 3.08594 9.64062 3.49609C9.64062 3.90625 9.96875 4.23438 10.3789 4.23438C10.7891 4.23438 11.1172 3.90625 11.1172 3.49609ZM13.1953 4.23438C13.1406 3.25 12.9219 2.375 12.2109 1.66406C11.5 0.953125 10.625 0.734375 9.64062 0.679688C8.62891 0.625 5.59375 0.625 4.58203 0.679688C3.59766 0.734375 2.75 0.953125 2.01172 1.66406C1.30078 2.375 1.08203 3.25 1.02734 4.23438C0.972656 5.24609 0.972656 8.28125 1.02734 9.29297C1.08203 10.2773 1.30078 11.125 2.01172 11.8633C2.75 12.5742 3.59766 12.793 4.58203 12.8477C5.59375 12.9023 8.62891 12.9023 9.64062 12.8477C10.625 12.793 11.5 12.5742 12.2109 11.8633C12.9219 11.125 13.1406 10.2773 13.1953 9.29297C13.25 8.28125 13.25 5.24609 13.1953 4.23438ZM11.8828 10.3594C11.6914 10.9062 11.2539 11.3164 10.7344 11.5352C9.91406 11.8633 8 11.7812 7.125 11.7812C6.22266 11.7812 4.30859 11.8633 3.51562 11.5352C2.96875 11.3164 2.55859 10.9062 2.33984 10.3594C2.01172 9.56641 2.09375 7.65234 2.09375 6.75C2.09375 5.875 2.01172 3.96094 2.33984 3.14062C2.55859 2.62109 2.96875 2.21094 3.51562 1.99219C4.30859 1.66406 6.22266 1.74609 7.125 1.74609C8 1.74609 9.91406 1.66406 10.7344 1.99219C11.2539 2.18359 11.6641 2.62109 11.8828 3.14062C12.2109 3.96094 12.1289 5.875 12.1289 6.75C12.1289 7.65234 12.2109 9.56641 11.8828 10.3594Z" fill="currentColor"/>
                                                        </svg>  
                                                        <span class="visually-hidden">Instagram</span>
                                                    </a>
                                                </li>
                                                <li class="social__share--list">
                                                    <a class="social__share--icon" target="_blank" href="https://www.youtube.com">
                                                        <svg width="16" height="11" viewBox="0 0 16 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M15.0117 2.16797C14.8477 1.51172 14.3281 0.992188 13.6992 0.828125C12.5234 0.5 7.875 0.5 7.875 0.5C7.875 0.5 3.19922 0.5 2.02344 0.828125C1.39453 0.992188 0.875 1.51172 0.710938 2.16797C0.382812 3.31641 0.382812 5.77734 0.382812 5.77734C0.382812 5.77734 0.382812 8.21094 0.710938 9.38672C0.875 10.043 1.39453 10.5352 2.02344 10.6992C3.19922 11 7.875 11 7.875 11C7.875 11 12.5234 11 13.6992 10.6992C14.3281 10.5352 14.8477 10.043 15.0117 9.38672C15.3398 8.21094 15.3398 5.77734 15.3398 5.77734C15.3398 5.77734 15.3398 3.31641 15.0117 2.16797ZM6.34375 7.99219V3.5625L10.2266 5.77734L6.34375 7.99219Z" fill="currentColor"/>
                                                        </svg>
                                                        <span class="visually-hidden">Youtube</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper__nav--btn swiper-button-next">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                    <div class="swiper__nav--btn swiper-button-prev">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- End blog section -->

      
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
  
</body>
</html>