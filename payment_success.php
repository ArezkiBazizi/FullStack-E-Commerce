<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=back;charset=utf8', 'root', 'BAZIZI');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}


if (isset($_POST["add_order"])) {
	$x = $_POST['x'];
	$i = 1;
	$date = date('d-m-y h:i:s');
	$num_order= time().$_POST['uid'];
	$user_id= $_POST['uid'];

	while($i <= $x){
	$product_id= $_POST['item_number_'.$i];
	$amount =$_POST['amount_'.$i];
	$qty =$_POST['quantity_'.$i];
	$num = $_POST['num'];
	$bdd->exec("INSERT INTO orders (user_id, mob, product_id, qty, p_status, num_order, daate) VALUES ($user_id, $num, $product_id, $qty, $amount,'COMPLETED',$num_order,$date)");
	$i++;
	}


		$nom = $_POST["nom"];
		$prenom = $_POST["prenom"];
		$num = $_POST["num"];
		$adresse = $_POST["adresse"];
		$wilaya = $_POST["wilaya"];
		$cm_user_id = $_POST["user_id"];

		include_once("db.php");
		$sql = "SELECT p_id,qty FROM cart WHERE user_id ='$cm_user_id'";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			# code...
			while ($row=mysqli_fetch_array($query)) {
			$product_id	= [];
			$qty = [];
			$product_id[] = $row["p_id"];
			$qty[] = $row["qty"];
			}
		
			for ($i=0; $i < count($product_id); $i++) { 
				$sql = "INSERT INTO orders (user_id,product_id,qty,p_status) VALUES ('$cm_user_id','".$product_id[$i]."','".$qty[$i]."','non confirmé')";
				mysqli_query($con,$sql);
			}

			$sql = "DELETE FROM cart WHERE user_id = '$cm_user_id'";
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
		}else{
			header("location:index.php");
		}
		
	}


?>

















































