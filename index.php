<?php
require "config/constants.php";
session_start();
if(isset($_SESSION["uid"])){
	header("location:profile.php");
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
    
  <!--
    - favicon
  -->
  <link rel="icon" href="./assets/images/logo/Favicon1.png">

  <!--
    - custom css link
  -->
  <link rel="stylesheet" href="../css/style-prefix.css">

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
              <img src="assets/images/connexion.png" alt="connexion" id="connexion" class="icon">
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

    <nav class="desktop-navigation-menu" id="menubar"  style='visibility:hidden'>

      <div class="container">

        <ul class="desktop-menu-category-list">

          <li class="menu-category">
            <a href="index.php" class="menu-title">Home</a>
          </li>

          <li class="menu-category">
            <a href="#" class="menu-title">Categories</a>
              <ul class="dropdown-list" id="gettopcategory">
              
              </ul>
              
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
        <span class="count" id="bagcount">0</span>
      </button>

      <button class="action-btn">
        <a href="index.html" style="color: black;">
        <ion-icon name="home-outline"></ion-icon>
      </a>
      </button>

      <button class="action-btn">
        <ion-icon name="heart-outline" id="mobFav"></ion-icon>

        <span class="count" id="favcount">0</span>
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
          <a href="#" class="menu-title">Blog</a>
        </li>

        <li class="menu-category">
          <a href="#hot" class="menu-title">Hot Offers</a>
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

  <!-- profil cart -->
   <div class="mini-cart" id="profil">
        <ul class="mini-cart-list">
		    <li class="items"><img src="assets/images/icons/log.png" alt=""><a href="login_form.php">Connexion</a></li>
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
                <h1 class="titleS">For Men</h1>
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
                  <p class="service-desc">For Order Over $100</p>

                </div>

              </a>

              <a href="#" class="service-item">
              
                <div class="service-icon">
                  <ion-icon name="rocket-outline"></ion-icon>
                </div>
              
                <div class="service-content">
              
                  <h3 class="service-title">Livraison Rapide</h3>
                  <p class="service-desc">Livraison 48 wilaya</p>
              
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
              
                  <h3 class="service-title">30% de remboursement</h3>
                  <p class="service-desc">Pour plus de 10000 DA</p>
              
                </div>
              
              </a>

            </div>

      </div>





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
          Copyright &copy; <a href="#">Arezki Bazizi </a> Tous droit réservés.
        </p>

      </div>

    </div>

  </footer>



  <!--
    - custom js link
  -->
  <script>
    'use strict';

//icon 
var favoris = document.getElementById('favoris');
var panier = document.getElementById('panier');
var cart = document.getElementById('BAGSHOP');
var bagList = document.getElementById('bagList');
var vider = document.getElementById('vider');
var total = document.getElementById('total');
var productGrid = document.getElementById('productGrid');
var like = document.getElementById('favoris');
var fav = document.getElementById('fav');
var favList = document.getElementById('favList');
var bagCloseBtn = document.getElementById('bagCloseBtn');
var favCloseBtn = document.getElementById('favCloseBtn');
var bagno = document.getElementById('bag-no');
var favno = document.getElementById('fav-no');
var mobBag = document.getElementById('mobBag');
var mobFav = document.getElementById('mobFav');
var banner = document.getElementById('bannerS');
var productft = document.getElementById('productft');
var category = document.getElementById('get_category');
var Topcat = document.getElementById('gettopcategory');
var menubar = document.getElementById('menubar');
var container = document.getElementById('container');
var connexion = document.getElementById('connexion');
var apercu = document.getElementById('apercu');

//fermer l'apercu du produit ou changer de photo
apercu.addEventListener('click', function(ext){
  var secondary = document.getElementById('secondary');
  if(ext.target.id=='CloseProd'){
  apercu.style.display='none';}
  if(ext.target.id=='img1'){
    secondary.style.display='none';}
  if(ext.target.id=='img2'){
    secondary.style.display='flex';}
    
});


//afficher que les produits et les categories (mode recherche) 
category.addEventListener('click',function(){
  container.style.marginTop='100px';
  banner.style.display='none';
  productft.style.display='none';
  menubar.style.position='unset';
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

Topcat.addEventListener('click',function(){
  container.style.marginTop='100px';
  banner.style.display='none';
  productft.style.display='none';
  menubar.style.position='unset';
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

// ouverture et fermeture panier
panier.addEventListener('click', function(){
  cart.classList.toggle('open');
  fav.classList.remove('open');
  profil.classList.remove('open');

});

bagCloseBtn.addEventListener('click', function(){
  cart.classList.remove('open');
});

//ouverture et fermeture favoris
like.addEventListener('click', function(){
   fav.classList.toggle('open');
   cart.classList.remove('open');
   profil.classList.remove('open');
});

favCloseBtn.addEventListener('click', function(){
  fav.classList.remove('open');
});


// ouverture et fermeture du profil
connexion.addEventListener('click', function(){
  profil.classList.toggle('open');
  fav.classList.remove('open');
  cart.classList.remove('open');

});


//mobile listener 
mobBag.addEventListener('click', function(){
cart.classList.toggle('open');
fav.classList.remove('open');
});

mobFav.addEventListener('click', function(){
  fav.classList.toggle('open');
  cart.classList.remove('open');
  });

//images de produits notifiés
var myPix = new Array("./assets/images/products/jewellery-1.jpg","./assets/images/products/jewellery-2.jpg",
"./assets/images/products/1.jpg","./assets/images/products/2.jpg",
"./assets/images/products/3.jpg","./assets/images/products/4.jpg",
"./assets/images/products/jacket-1.jpg","./assets/images/products/jacket-2.jpg");

//titre de notification
var altPix = new Array("Rose Gold Earrings","Perles jewllery ","produit 3","produit 4",
"sweat-shirt","Chapeau de berly", "produit 7","produit 8","produit 9","produit 10");


// notification toast variables
const notificationToast = document.querySelector('[data-toast]');
const toastCloseBtn = document.querySelector('[data-toast-close]');

// notification toast eventListener
toastCloseBtn.addEventListener('click', function () {
  notificationToast.classList.add('closed');
});



//COMPTE à REBOURS POUR LES PROMOTION
var deadline = new Date("dec 01, 2022 15:37:25").getTime();
  
var x = setInterval(function() { 
var now = new Date().getTime();
var t = deadline - now;
var days = Math.floor(t / (1000 * 60 * 60 * 24));
var hours = Math.floor((t%(1000 * 60 * 60 * 24))/(1000 * 60 * 60));
var minutes = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
var seconds = Math.floor((t % (1000 * 60)) / 1000);
document.getElementById("day").innerHTML =days ;
document.getElementById("hour").innerHTML =hours;
document.getElementById("minute").innerHTML = minutes; 
document.getElementById("second").innerHTML =seconds; 
if (t < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "TIME UP";
        document.getElementById("day").innerHTML ='0';
        document.getElementById("hour").innerHTML ='0';
        document.getElementById("minute").innerHTML ='0' ; 
        document.getElementById("second").innerHTML = '0'; }
}, 1000);

// mobile menu variables
const mobileMenuOpenBtn = document.querySelectorAll('[data-mobile-menu-open-btn]');
const mobileMenu = document.querySelectorAll('[data-mobile-menu]');
const mobileMenuCloseBtn = document.querySelectorAll('[data-mobile-menu-close-btn]');
const overlay = document.querySelector('[data-overlay]');

for (let i = 0; i < mobileMenuOpenBtn.length; i++) {

  // mobile menu function
  const mobileMenuCloseFunc = function () {
    mobileMenu[i].classList.remove('active');
    overlay.classList.remove('active');
  }

  mobileMenuOpenBtn[i].addEventListener('click', function () {
    mobileMenu[i].classList.add('active');
    overlay.classList.add('active');
  });

  mobileMenuCloseBtn[i].addEventListener('click', mobileMenuCloseFunc);
  overlay.addEventListener('click', mobileMenuCloseFunc);

}

// accordion variables
const accordionBtn = document.querySelectorAll('[data-accordion-btn]');
const accordion = document.querySelectorAll('[data-accordion]');

for (let i = 0; i < accordionBtn.length; i++) {

  accordionBtn[i].addEventListener('click', function () {

    const clickedBtn = this.nextElementSibling.classList.contains('active');

    for (let i = 0; i < accordion.length; i++) {

      if (clickedBtn) break;

      if (accordion[i].classList.contains('active')) {

        accordion[i].classList.remove('active');
        accordionBtn[i].classList.remove('active');

      }

    }

    this.nextElementSibling.classList.toggle('active');
    this.classList.toggle('active');

  });



}

//url des produit notifiés
function fonction1()
{
    var randomNum = Math.floor(Math.random() * myPix.length);
    document.getElementById("myPicture").src = myPix[randomNum];
    document.getElementById("myPicture").alt = altPix[randomNum];
    document.getElementById("myTITLE").innerHTML = altPix[randomNum];
 
    process = setTimeout("process = fonction1()", 10000); 

    return process;
}
process = fonction1();



  </script>

  <!--
    - ionicon link
  -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js'></script>
  <script src='https://mverissimo.github.io/tweenslideshow/dist/assets/javascript/script.min.js'></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>