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
$date = date('d-m-y h:i:s');
$num_order= time().$_SESSION['uid'];

while($i <= $x){
$user_id= $_SESSION['uid'];
$product_id= $_POST['item_number_'.$i];
$amount =$_POST['amount_'.$i];
$qty =$_POST['quantity_'.$i];

$bdd->exec("INSERT INTO orders (user_id, mob, product_id, qty, total, p_status, num_order,daate) VALUES ($user_id, $product_id, $qty, $amount,'COMPLETED',$num_order,$date)");
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
				<form id="add_order" action="payment_success.php" method="POST">
                <label for="nom">Nom</label>
				<input type="text" name="nom">
                <label for="prenom">Prenom</label>
				<input type="text" name="prenom">
                <label for="num">Numéro de téléphone mobile</label>
				<input type="tel" name="num">
                <label for="wilaya">Wilaya</label>
				<select name='wilaya' id='wilaya'>
				<option value = "1">Adrar</option>
				<option value = "2">Chlef</option>
				<option value = "3">Laghouat</option>
				<option value = "4">Oum El Bouaghi</option>
				<option value = "5">Batna</option>
				<option value = "6">Bejaia</option>
				<option value = "7">Biskra</option>
				<option value = "8">Bechar</option>
				<option value = "9">Blida</option>
				<option value = "10">Bouira</option>
				<option value = "11">Tamanrasset</option>
				<option value = "12">Tebessa</option>
				<option value = "13">Tlemcen</option>
				<option value = "14">Tiaret</option>
				<option value = "15">Tizi Ouzou</option>
				<option value = "16">Alger</option>
				<option value = "17">Djelfa</option>
				<option value = "18">Jijel</option>
				<option value = "19">Setif</option>
				<option value = "20">Saida</option>
				<option value = "21">Skikda</option>
				<option value = "22">Sidi Bel Abbes</option>
				<option value = "23">Annaba</option>
				<option value = "24">Guelma</option>
				<option value = "25">Constantine</option>
				<option value = "26">Medea</option>
				<option value = "27">Mostaganem</option>
				<option value = "28">MSila</option>
				<option value = "29">Mascara</option>
				<option value = "30">Ouargla</option>
				<option value = "31">Oran</option>
				<option value = "32">El Bayadh</option>
				<option value = "33">Illizi</option>
				<option value = "34">Bordj Bou Arreridj</option>
				<option value = "35">Boumerdes</option>
				<option value = "36">El Tarf</option>
				<option value = "37">Tindouf</option>
				<option value = "38">Tissemsilt</option>
				<option value = "39">El Oued</option>
				<option value = "40">Khenchela</option>
				<option value = "41">Souk Ahras</option>
				<option value = "42">Tipaza</option>
				<option value = "43">Mila</option>
				<option value = "44">Ain Defla</option>
				<option value = "45">Naama</option>
				<option value = "46">Ain Temouchent</option>
				<option value = "47">Ghardaia</option>
				<option value = "48">Relizane</option>
				</select>
                <label for="commune">Commune, adresse</label>
				<input type="text" name="adresse" >
				<input type="hidden" name="add_order" value="1">
                <input type="submit" value='confirmer la commande' name ='submit'id='submit'>
				<input type="hidden" name="user_id" value='<?php echo $_SESSION['uid'];?>'>
				<input type="hidden" name="x" value='<?php echo $x;?>'>
				<input type="hidden" name="product_id" value='<?php echo serialize($product_id);?>'>
				<input type="hidden" name="qty" value='<?php echo serialize($qty);?>'>
				<input type="hidden" name="amount" value='<?php echo serialize($amount);?>'>
				<input type="hidden" name="num_order" value='<?php echo $num_order;?>'>
				<input type="hidden" name="date" value='<?php echo $date;?>'>
                </form>

<script>var CURRENCY = '<?php echo CURRENCY; ?>';
</script>
</body>	
</html>
