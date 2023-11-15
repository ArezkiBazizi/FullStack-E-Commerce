<?php
session_start();
require "config/constants.php";

if(isset($_SESSION["uid"])){

	
$CONNEXION = ' <!-- Connexion Cart -->
<div class="mini-cart" id="profil">
<div class="mini-cart-header"></div>
 <ul class="mini-cart-list" id="conList">
        <li class="items"><img src="assets/images/icons/BAG.png" alt=""><a href="cart.php">Panier</a></li>
		<li class="items"><img src="assets/images/icons/com.png" alt=""><a href="customer_order.php">Mes commandes</a></li>
		<li class="items"><img src="assets/images/icons/logout.png" alt=""><a href="logout.php">Déconexion</a></li>
     </ul>
</div>
';}
else{
	$CONNEXION ='<!-- profil cart -->
	<div class="mini-cart" id="profil">
		 <ul class="mini-cart-list">
			 <li class="items"><img src="assets/images/icons/log.png" alt=""><a href="login_form.php">Connexion</a></li>
	   </ul>
	</div>';
	

}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Dzairy Shop</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" href="style.css"/>
		<link rel="stylesheet" href="css/cart.css"/>
		<link rel="stylesheet" href="css/style-prefix.css"/>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
<?php echo($CONNEXION);?>

<div class="header">
    <div class="connexion">
	<a href ='profile.php'>
	<img src="./assets/images/logo/favicon1.png" alt="Shop Dzairy logo" style='width:85px; position:absolute; right:10px'>
	<a>
    <img src="assets/images/icons/log.png" alt="connexion" id="connexion" class="icon" style='width:60px; position:absolute;top:10px;'>
	</div>
</div>
	<div class="container-fluid">
	<div class="header-logo">
	<a href ='profile.php'>
	
	<a>
	</div>

		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Mon Panier</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Action</b></div>
							<div class="col-md-2 col-xs-2"><b>Apercue du produit</b></div>
							<div class="col-md-2 col-xs-2"><b>Nom du produit</b></div>
							<div class="col-md-2 col-xs-2"><b>Quantité</b></div>
							<div class="col-md-2 col-xs-2"><b>Prix unitaire</b></div>
							<div class="col-md-2 col-xs-2"><b>Price total <?php echo CURRENCY; ?></b></div>
						</div>
						<div id="cart_checkout"></div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>

<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>
<script> 
var connexion = document.getElementById('connexion');
// ouverture et fermeture du profil
connexion.addEventListener('click', function(){
  profil.classList.toggle('open');
  fav.classList.remove('open');
  cart.classList.remove('open');

});</script>
</body>	


</html>
















		