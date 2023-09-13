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
var menubar = document.getElementById('menubar');
var container = document.getElementById('container');
var connexion = document.getElementById('connexion');
var profil = document.getElementById('profil');

///listener 


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

