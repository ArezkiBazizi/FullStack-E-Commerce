<?php
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
include_once("db.php");
$x = $_POST['x'];
$i = 0;
$num = $_POST["num"];
$user_id= $_POST["user_id"];
$date = date('d-m-y h:i:s');
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$adresse = $_POST["adresse"];
$wilaya = $_POST["wilaya"];	
$user_id= $_SESSION['uid'];

while($i < $x){
$num_order= time().$_SESSION['uid'].$i;
$product_id = $_POST['item_number_'.$i];
$amount = $_POST['amount_'.$i];
$qty =$_POST['quantity_'.$i];

$bdd->exec("INSERT INTO `orders` (userid, product_id, qty, total, p_status,num_order, daate, mob) VALUES ('$user_id','$product_id','$qty','$amount', 'non confirmé', '$num_order', '$date','$num')");
$i++;
}


if (isset($_POST["add_order"])) {

	include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id ='$user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			

			$sql = "DELETE FROM cart WHERE user_id = '$user_id'";
			while($i < $x){
				$product_id = $_POST['item_number_'.$i];
				$amount = $_POST['amount_'.$i];
				$qty =$_POST['quantity_'.$i];
				
				$bdd->exec("INSERT INTO `orders` (userid, product_id, qty, total, p_status,num_order, daate, mob) VALUES ('$user_id','$product_id','$qty','$amount', 'non confirmé', '$num_order', '$date','$num')");
				$i++;
				}
			
			if (mysqli_query($con,$sql)) {
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
							<style>
								table tr td {padding:10px;}
							</style>
						</head>
					<body>
						<div class="navbar navbar-inverse navbar-fixed-top">
							<div class="container-fluid">	
								<div class="navbar-header">
									<a href="profile.php" class="navbar-brand">Dzairy Shop</a>
								</div>
								<ul class="nav navbar-nav">
					
								</ul>
							</div>
						</div>
						<p><br/></p>
						<p><br/></p>
						<p><br/></p>
						<div class="container-fluid">
						
							<div class="row">
								<div class="col-md-2"></div>
								<div class="col-md-8">
									<div class="panel panel-default">
										<div class="panel-heading"></div>
										<div class="panel-body">
											<h1>Merci pour votre confiance </h1>
											<hr/>
											<p>Hello <?php echo "<b>".$_SESSION["name"]."</b>"; ?>,Votre commande est en attente de confirmation, vous resservez un appel tres prochainement </b><br/>
											Vous pouvez continuer votre shoping <br/></p>
											<a href="index.php" class="btn btn-success btn-lg">Continuer votre shoping</a>
										</div>
										<div class="panel-footer"></div>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
						</div>
					</body>
					</html>

				<?php
			}
		}
	
	}

}
?>

















































