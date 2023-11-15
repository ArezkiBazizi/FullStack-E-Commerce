<?php
require "config/constants.php";
session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop Dzairy </title>
  <script src="js/jquery2.js"></script>
  <script src="main.js"></script>
  <link rel="icon" href="./assets/images/logo/Favicon1.png">
  <link rel="stylesheet" href="./css/style-prefix.css">

  <!--
    - google font link
  -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
  <div class="overlay" data-overlay></div>


  <!--- 
    notifocation toast 
  --->

  <div class="notification-toast" data-toast>

    <button class="toast-close-btn" data-toast-close>
      <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="toast-banner">
      <img id="myPicture" width="80" height="70">
    </div>

    <div class="toast-detail">

      <p class="toast-message">
        Jettez un coup d'oeil !
      </p>

      <p class="toast-title" id="myTITLE">
      </p>

      <p class="toast-meta">
        <time datetime="PT2M">2 Minutes</time> ago
      </p>

    </div>

  </div>



  <!--
    - HEADER
  -->

  <header>

    <div class="header-main">

      <div class="container">

        <a href="" class="header-logo">
          <img src="./assets/images/logo/logo.png" alt="Shop Dzairy logo" width="120" height="80" class="icon">
        </a>

        <div class="header-search-container">

          <input type="search" name="search" id="search" class="search-field"  placeholder="Enter your product name...">
          <button class="search-btn" type="submit" id="search_btn">
            <ion-icon name="search-outline"></ion-icon>
          </button>

        </div>

        <div class="header-user-actions">
          <button class="action-btn">
            <a style="font-size: 14px; color:black;">
              <img src="assets/images/connexion.png" alt="connexion" id="connexion" class="icon">
              </span><?php echo "Hi, ".$_SESSION["name"]; ?>
            </a>
          </button>

          <button class="action-btn">
           <img src="assets/images/fav.png" alt="favoris" id="favoris" class="icon">
            <span id="favcount" class="count">0</span>
          </button>

          <button class="action-btn">
            <img src="assets/images/bag.png" alt="bag" id="panier" class="icon">
            <span id="bagcount" class="count">0</span>
          </button>

        </div>

      </div>

    </div>

    <nav class="desktop-navigation-menu" id="menubar">

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="profile.php" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>
              <ul class="dropdown-list" id="gettopcategory">
              
              </ul>
              
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Men's</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Shirt</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Shorts & Jeans</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Safety Shoes</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Wallet</a>
              </li>

            </ul>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Women's</a>

            <ul class="dropdown-list">

              <li class="dropdown-item">
                <a href="#">Dress & Frock</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Earrings</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Necklace</a>
              </li>

              <li class="dropdown-item">
                <a href="#">Makeup Kit</a>
              </li>

            </ul>
          </li>



          <li class="menu-category">
            <a href="#" class="menu-title">Hot Offers</a>
          </li>

        </ul>

      </div>

    </nav>

    <div class="mobile-bottom-navigation">

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <button class="action-btn">
        <ion-icon name="bag-handle-outline" id="mobBag"></ion-icon>

        <span class="count" id="mobBagCount">0</span>
      </button>

      <button class="action-btn">
        <a href="index.html" style="color: black;">
        <ion-icon name="home-outline"></ion-icon>
      </a>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline" id="mobFav"></ion-icon>

        <span class="count" id="mobFavCount">0</span>
      </button>

      <button class="action-btn" data-mobile-menu-open-btn>
        <ion-icon name="grid-outline"></ion-icon>
      </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

      <div class="menu-top">
        <h2 class="menu-title">Menu</h2>

        <button class="menu-close-btn" data-mobile-menu-close-btn>
          <ion-icon name="close-outline"></ion-icon>
        </button>
      </div>

      <ul class="mobile-menu-category-list">

        <li class="menu-category">
          <a href="#" class="menu-title">Home</a>
        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Men's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shirt</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Shorts & Jeans</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Safety Shoes</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Wallet</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Women's</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Dress & Frock</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Makeup Kit</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Jewelry</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Earrings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Couple Rings</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Necklace</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Bracelets</a>
            </li>

          </ul>

        </li>

        <li class="menu-category">

          <button class="accordion-menu" data-accordion-btn>
            <p class="menu-title">Perfume</p>

            <div>
              <ion-icon name="add-outline" class="add-icon"></ion-icon>
              <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
          </button>

          <ul class="submenu-category-list" data-accordion>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Clothes Perfume</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Deodorant</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Flower Fragrance</a>
            </li>

            <li class="submenu-category">
              <a href="#" class="submenu-title">Air Freshener</a>
            </li>

          </ul>

        </li>

    

        <li class="menu-category">
          <a href="#" class="menu-title">Hot Offers</a>
        </li>

      </ul>


    </nav>

    <!-- Mini Cart -->
    <div class="mini-cart" id="BAGSHOP" >
        <div class="mini-cart-header">
            <H2> Panier </H2>
            <span class="close" id="bagCloseBtn"></span>
        </div>
        <ul class="mini-cart-list" id="bagList">
        </ul>

        <div class="mini-action-anchors">
            <a href="cart.php" class="cart-anchor" id="Commander">Commander</a>
            <a class="checkout-anchor" id="vider">Vider le panier</a>
        </div>
    </div>


    <!-- fav Cart -->
    <div class="mini-cart" id="fav">
      <div class="mini-cart-header">
          <H2> Favoris </H2>
          <span class="close" id="favCloseBtn"></span>
      </div>
      <ul class="mini-cart-list" id="favList">
    
      </ul>
    </div>

    <!-- Connexion Cart -->
	<div class="mini-cart" id="profil">
	<div class="mini-cart-header"></div>
      <ul class="mini-cart-list" id="conList">
        <li class="items"><img src="assets/images/icons/BAG.png" alt=""><a href="cart.php">Panier</a></li>
		<li class="items"><img src="assets/images/icons/com.png" alt=""><a href="customer_order.php">Mes commandes</a></li>
		<li class="items"><img src="assets/images/icons/logout.png" alt=""><a href="logout.php">Déconexion</a></li>
      </ul>
   </div>



  </header>
  <!--
    - MAIN
  -->
  <main>

  <div id="apercu">    
    </div>


    <!--
      - SLIDER
    -->
  
    <div class="bannerS" id="bannerS">
      <div class="sliderS">
        <section id="slider" class="section">
          <div class="slider__container">
            <div class="slider__item slide-sneak">
              <div class="slider__content grid">
                <div class="columnS">
                  <h1 class="titreS">Air</h1>
                  <h1 class="titreS">Max</h1>
               </div>
              <div class="columnS"><img src="assets/images/sneaker.png" class="image burger"></div>
            </div>
          </div>
          

          <div class="slider__item slide-veste">
            <div class="slider__content grid">
              <div class="columnS">
                <h1 class="titleS">Jacket</h1>
                <h1 class="titleS">Edition</h1>
              </div>
              <div class="columnS"><img src="assets/images/jacket.png" class="image astronaut"></div>
            </div>
          </div>

          <div class="slider__item slide-sweat">
            <div class="slider__content grid">
              <div class="columnS">
                <h1 class="titleS">Hoodies</h1>
                <h1 class="titleS">For Man</h1>
              </div>
              <div class="columnS"><img src="assets/images/hoodie.png" class="image cup"></div>
            </div>
          </div>


        </section>
      </div>
    </div>

    <!--
      - PRODUCT
    -->

    <div class="product-container">

      <div class="container" id='container'>

        <!--
          - SIDEBAR
        -->

        <div class="sidebar  has-scrollbar" data-mobile-menu>

          <div class="sidebar-category">

            <div class="sidebar-top">
              <h2 class="sidebar-title">Category</h2>

              <button class="sidebar-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
              </button>
            </div>

            <ul class="sidebar-menu-category-list">
            <div id="get_category"></div>
            <!---recuperer les categories-->
              
            </ul>

          </div>

          <div class="product-showcase">

            <h3 class="showcase-heading">best sellers</h3>

            <div class="showcase-wrapper">

              <div class="showcase-container">

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/1.jpg" alt="baby fabric shoes" width="75" height="75"
                      class="showcase-img">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">baby fabric shoes</h4>
                    </a>

                    <div class="showcase-rating">
                      <a href="#1"><ion-icon name="star"></ion-icon></a>
                      <a href="#2"><ion-icon name="star"></ion-icon></a>
                      <a href="#3"><ion-icon name="star"></ion-icon></a>
                      <a href="#4"><ion-icon name="star"></ion-icon></a>
                      <a href="#5"><ion-icon name="star"></ion-icon></a>
                    </div>

                    <div class="price-box">
                      <del>3000 DA</del>
                      <p class="price">4000 DA</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/2.jpg" alt="men's hoodies t-shirt" class="showcase-img"
                      width="75" height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">men's hoodies t-shirt</h4>
                    </a>
                    <div class="showcase-rating">
                      <a href="#1"><ion-icon name="star"></ion-icon></a>
                      <a href="#2"><ion-icon name="star"></ion-icon></a>
                      <a href="#3"><ion-icon name="star"></ion-icon></a>
                      <a href="#4"><ion-icon name="star"></ion-icon></a>
                      <a href="#5"><ion-icon name="star"></ion-icon></a>
                    </div>

                    <div class="price-box">
                      <del>1800 DA</del>
                      <p class="price">2200 DA</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/3.jpg" alt="girls t-shirt" class="showcase-img" width="75"
                      height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">girls t-shirt</h4>
                    </a>
                    <div class="showcase-rating">
                      <a href="#1"><ion-icon name="star"></ion-icon></a>
                      <a href="#2"><ion-icon name="star"></ion-icon></a>
                      <a href="#3"><ion-icon name="star"></ion-icon></a>
                      <a href="#4"><ion-icon name="star"></ion-icon></a>
                      <a href="#5"><ion-icon name="star"></ion-icon></a>
                    </div>

                    <div class="price-box">
                      <del>500 DA</del>
                      <p class="price">900 DA</p>
                    </div>

                  </div>

                </div>

                <div class="showcase">

                  <a href="#" class="showcase-img-box">
                    <img src="./assets/images/products/4.jpg" alt="woolen hat for men" class="showcase-img" width="75"
                      height="75">
                  </a>

                  <div class="showcase-content">

                    <a href="#">
                      <h4 class="showcase-title">woolen hat for men</h4>
                    </a>
                    <div class="showcase-rating">
                      <a href="#1"><ion-icon name="star"></ion-icon></a>
                      <a href="#2"><ion-icon name="star"></ion-icon></a>
                      <a href="#3"><ion-icon name="star"></ion-icon></a>
                      <a href="#4"><ion-icon name="star"></ion-icon></a>
                      <a href="#5"><ion-icon name="star"></ion-icon></a>
                    </div>

                    <div class="price-box">
                      <del>1500 DA</del>
                      <p class="price"> 1800 DA</p>
                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>



        <div class="product-box">

          <!--
            - PRODUCT GRID
          -->

        <div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>

          <div class="product-main">

            <h2 class="title">Products</h2>

            <div class="product-grid" id="get_product">

            </div>

          </div>

          <div class="product-featured" id="productft">

            <h2 class="title">Super Promotion</h2>

            <div class="showcase-wrapper has-scrollbar">

              <div class="showcase-container">

                <div class="showcase">
                  
                  <div class="showcase-banner">
                    <img src="./assets/images/products/shampoo.jpg" alt="shampoo, conditioner & facewash packs" class="showcase-img">
                  </div>

                  <div class="showcase-content">
                    
                    <div class="showcase-rating">
                      <a href="#1"><ion-icon name="star"></ion-icon></a>
                      <a href="#2"><ion-icon name="star"></ion-icon></a>
                      <a href="#3"><ion-icon name="star"></ion-icon></a>
                      <a href="#4"><ion-icon name="star"></ion-icon></a>
                      <a href="#5"><ion-icon name="star"></ion-icon></a>
                    </div>
                    <a href="#">
                      <h3 class="showcase-title">Naturel shampoo & facewash packs</h3>
                    </a>

                    <p class="showcase-desc">
                    SHAMPOO 100% NATUREL CONDITIONER & FACEWASH 
                    WITH OLIVIRA
                    </p>

                    <div class="price-box">
                      <p class="price">1500 DA</p>

                      <del>2000 DA</del>
                    </div>

                    <button class="add-cart-btn">add to cart</button>

                    <div class="showcase-status">
                      <div class="wrapper">
                        <p>
                          Vendu: <b>20</b>
                        </p>

                        <p>
                          Stock: <b>40</b>
                        </p>
                      </div>

                      <div class="showcase-status-bar"></div>
                    </div>

                    <div class="countdown-box">

                      <p id="demo" class="countdown-desc">
                        DÉPÊCHEZ-VOUS! L'OFFRE SE TERMINE DANS :
                      </p>

                      <div class="countdown">

                        <div class="countdown-content">

                          <p id="day" class="display-number"></p>

                          <p class="display-text">Days</p>

                        </div>

                        <div class="countdown-content">
                          <p id="hour" class="display-number"></p>
                          <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                          <p id="minute" class="display-number"></p>
                          <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                          <p id="second" class="display-number"></p>
                          <p class="display-text">Sec</p>
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>


    <!--
      - SERVICE
    -->

      <div class="service">

            <h2 class="title">Nos service</h2>

            <div class="service-container">

              <a href="#" class="service-item">

                <div class="service-icon">
                  <ion-icon name="boat-outline"></ion-icon>
                </div>

                <div class="service-content">
                  <h3 class="service-title">Livraison</h3>

                </div>

              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Livraison Rapide</h3>
                  <p class="service-desc">Livraison 58 Wilaya</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="call-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Service apres vente</h3>
                  <p class="service-desc">Disponible : 8AM - 11PM</p>
              
                </div>
              
              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="ticket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">30% De remboursement</h3>
                  <p class="service-desc">Pour plus de 10000 DA</p>
              
                </div>
              
              </a>

            </div>

      </div>





  <!--
    - FOOTER
  -->

  <!--
    - FOOTER
  -->

  <footer>
    <div class="footer-nav">

      <div class="container">

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Notre Compagnie</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Livraison</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">termes et conditions</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">A propos de nous</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Secure payment</a>
          </li>
        
        </ul>

        <ul class="footer-nav-list">
        
          <li class="footer-nav-item">
            <h2 class="nav-title">Services</h2>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Prices drop</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">New products</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Best sales</a>
          </li>
        
          <li class="footer-nav-item">
            <a href="#" class="footer-nav-link">Nous contacter</a>
          </li>

        
        </ul>

        <ul class="footer-nav-list">

          <li class="footer-nav-item">
            <h2 class="nav-title">Contact</h2>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="location-outline"></ion-icon>
            </div>

            <address class="content">
              6785 Rue DALAS
              Amriw, Bejaia, ALGERIA
            </address>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="call-outline"></ion-icon>
            </div>

            <a href="tel:+607936-8058" class="footer-nav-link">(607) 936-8058</a>
          </li>

          <li class="footer-nav-item flex">
            <div class="icon-box">
              <ion-icon name="mail-outline"></ion-icon>
            </div>

            <a href="mailto:example@gmail.com" class="footer-nav-link">Shopdzairy@gmail.com</a>
          </li>

        </ul>

        <ul class="footer-nav-list">
          <li class="footer-nav-item">
            <h2 class="nav-title">Suivez nous</h2>
          </li
        </ul>

      </div>

    </div>

    <div class="footer-bottom">

      <div class="container">
        <p class="copyright">
          Copyright &copy; <a href="#">Dzairy Shop</a> Tous droit réservés.
        </p>

      </div>

    </div>

  </footer>

  <!--
    - custom js link
  -->
  <script src="../assets/js/script.js"></script>

  <!--
    - ionicon link
  -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js'></script>
  <script src='https://mverissimo.github.io/tweenslideshow/dist/assets/javascript/script.min.js'></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>