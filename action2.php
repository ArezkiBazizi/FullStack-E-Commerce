<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=back;charset=utf8', 'root', 'BAZIZI');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$user_id= $_SESSION['uid'];
$adresse = $_POST['adresse'];
$num= $_POST['num'];
$wilaya =$_POST['wilaya'];
$commune =$_POST['commune'];

$bdd->exec("INSERT INTO livraison ( user_id, adresse, num, wilaya, commune) VALUES ( $user_id, $adresse, $num, $wilaya, $commune)");

header("location:payment_success.php");
?>