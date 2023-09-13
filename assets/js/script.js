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
var bagtotal = document.getElementById('bagtotal');
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

Topcat.addEventListener('click',function(){
  container.style.marginTop='100px';
  banner.style.display='none';
  productft.style.display='none';
  menubar.style.position='unset';
  window.scrollTo({ top: 0, behavior: 'smooth' });
});

category.addEventListener('click',function(){
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
var altPix = new Array("Rose Gold Earrings","Bague de luxe","produit 3","Sweat Bleu",
"sweat-shirt","Chapeau de berly", "Mens Winter Leathers Jackets","produit 8","produit 9","produit 10");


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




