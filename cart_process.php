<?php
$x = $_POST['x'];
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=back;charset=utf8', 'root', 'BAZIZI');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
}
else{ 
$i = 1;
$num_order= time().$_SESSION['uid'];
while($i <= $x)
{
$user_id= $_SESSION['uid'];
$product_id= $_POST['item_number_'.$i];
$amount =$_POST['amount_'.$i];
$qty =$_POST['quantity_'.$i];

$bdd->exec("INSERT INTO orders (user_id, product_id, qty, total, p_status, num_order) VALUES ($user_id, $product_id, $qty, $amount,'COMPLETED',$num_order)");
$i++;
}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Dzairy Shop</title>
		<script src="js/jquery2.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" href="css/cart_process.css"/>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	
<div class='header-div'>
<H1> Fiche de livraison</H1>
<img src='assets/images/logo/Favicon1.png'></div>

<div id="row">
				<form id="add_order" action="payment_success.php" method="GET">
                <label for="nom">Nom</label>
				<input type="text" name="nom">
                <label for="prenom">Prenom</label>
				<input type="text" name="prenom">
                <label for="num">Numéro de téléphone mobile</label>
				<input type="tel" name="num">
                <label for="adresse">Adresse</label>
				<input type="text" name="adresse">
                <label for="wilaya">Wilaya</label>
				<select name='wilaya' id='wilaya'>
					<option value="Adrar">Adrar</option>
					<option value="chlef">chlef</option>
					<option value="leghouat">leghouat</option>
					<option value="Oum lebouaqi">Oum lebouaqi</option>
					<option value="Batna">Batna</option>
					<option value="Bejaia">Bejaia</option>
					<option value="Biskra">Biskra</option>
					<option value="Bechar">Bechar</option>
					<option value="Blida">Blida</option>
					<option value="Bouira">Bouira</option>
				</select>
                <label for="commune">Commune</label>
				<input type="text" name="commune" >
				<input type="hidden" name="add_order" value="1">
                <input type="submit" value='confirmer la commande' id='livraison'>
				<input type="hidden" name="user_id" value='<?php echo $_SESSION["uid"]; ?>'>
                </form>


<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>
</body>	
</html>
