<?php

require "config/constants.php";

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
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>



<div class="header">
    <div class="connexion">
    <img src="assets/images/icons/log.png" alt="connexion" id="connexion" class="icon" style='width:50px;'>
	</div>
</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Cart Message--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		

    <div id="view_product">  
    </div>    

</body>	
</html>
