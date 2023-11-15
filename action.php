<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";

if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));	

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			$car_icon = $row["cat_icon"];
			echo "
			
			<li class='sidebar-menu-category'>
			<a href='#' class='category' cid='$cid'>
			<button class='sidebar-accordion-menu' data-accordion-btn>
	
				<div class='menu-title-flex'>
					<img src='./assets/images/icons/$car_icon' alt='footwear' class='menu-title-img' width='20'
					  height='20'>
					<p class='menu-title'>$cat_name</p>
				</div>
				  <div>
					<ion-icon name='add-outline' class='add-icon'></ion-icon>
					<ion-icon name='remove-outline' class='remove-icon'></ion-icon>
				  </div>
	
			</button>
			<a>
			</li>
		
			";
		}
		
	}
}

if(isset($_POST["top_category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));	

	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
			
			<li class='dropdown-item'>
                <a href='#' class='category' cid='$cid'>$cat_name</a>
            </li>
		
			";
		}
		
	}
}



if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}


if(isset($_POST["getProduct"])){
	$limit = 9;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products JOIN categories ON products.product_cat=categories.cat_id ";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_image_hover = $row['product_image2'];
			$pro_rate = $row['product_rate'];
			$pro_promo = $row['promo'];
			$cat_title = $row['cat_title'];
			$pro_old = $pro_price + $pro_price*$pro_promo/100;

			if(empty($pro_image_hover)){
				$pro_image_hover = $pro_image;
			}

			If($pro_old == $pro_price){
			$DEL='';
			}
			else{
			$DEL="<del>$pro_old DA</del>";
			}

			if($pro_promo==0){$promo_showcase=" ";}
			else{ 
				$promo_showcase="<p class='showcase-badge'>$pro_promo%</p>";
			}


		if ($pro_rate == 0){
			$rate = "<a href='#1'><ion-icon name='star-outline'></ion-icon></a>
			<a href='#2'><ion-icon name='star'></ion-icon></a>
			<a href='#3'><ion-icon name='star-outline'></ion-icon></a>
			<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
			<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
	
		}elseif($pro_rate == 1){
				$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
                      <a href='#2'><ion-icon name='star-outline'></ion-icon></a>
                      <a href='#3'><ion-icon name='star-outline'></ion-icon></a>
                      <a href='#4'><ion-icon name='star-outline'></ion-icon></a>
                      <a href='#5'><ion-icon name='star-outline'></ion-icon></a>";

		}elseif($pro_rate == 2){
				$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
				<a href='#2'><ion-icon name='star'></ion-icon></a>
				<a href='#3'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
		}elseif($pro_rate == 3) {
				$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
				<a href='#2'><ion-icon name='star'></ion-icon></a>
				<a href='#3'><ion-icon name='star'></ion-icon></a>
				<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
		}elseif($pro_rate == 4) {
				$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
				<a href='#2'><ion-icon name='star'></ion-icon></a>
				<a href='#3'><ion-icon name='star'></ion-icon></a>
				<a href='#4'><ion-icon name='star'></ion-icon></a>
				<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
		}elseif($pro_rate == 5){
				$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
				<a href='#2'><ion-icon name='star'></ion-icon></a>
				<a href='#3'><ion-icon name='star'></ion-icon></a>
				<a href='#4'><ion-icon name='star'></ion-icon></a>
				<a href='#5'><ion-icon name='star'></ion-icon></a>";
		}
			
		echo"
		<div class='showcase'>
			<div class='showcase-banner'>
			 	 <img src='$pro_image' alt='$pro_title' width='300' class='product-img default'>
			  	 <img src='$pro_image_hover' alt='$pro_title' width='300' class='product-img hover'>
			     $promo_showcase

			  <div class='showcase-actions'>
				<button pid='$pro_id' class='btn-action' id='favproduct'>
				  <ion-icon name='heart-outline' id='favBag'></ion-icon>
				</button>
		
				<button pid='$pro_id' class='btn-action' id='viewproduct'>
				  <ion-icon name='eye-outline'></ion-icon>
				</button>

				<button pid='$pro_id' class='btn-action' id='product'>
				  <ion-icon name='bag-add-outline' id='addBag'></ion-icon>
				</button>
			  </div>

			</div>

			<div class='showcase-content'>
			  <a href='#' class='showcase-category'>$cat_title </a>
			  <a href='#'>
				<h3 class='showcase-title'>$pro_title</h3>
			  </a>

			  <div class='showcase-rating'>$rate</div>

			  <div class='price-box'>
				<p class='price'> $pro_price.00 DA</p>
				$DEL
			  </div>
			</div>

		</div>";
		}
	}
}

if(isset($_POST["get_seleted_Category"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products JOIN categories ON products.product_cat=categories.cat_id WHERE product_cat = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products JOIN categories ON products.product_cat=categories.cat_id WHERE product_title LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_image_hover = $row['product_image2'];
			$pro_rate = $row['product_rate'];
			$pro_promo = $row['promo'];
			$cat_title = $row['cat_title'];
			$pro_old = $pro_price + $pro_price*$pro_promo/100;

			if(empty($pro_image_hover)){
				$pro_image_hover = $row['product_image'];
			}

			If($pro_old == $pro_price){
				$DEL='';
				}
				else{
				$DEL="<del> $pro_old DA</del>";
				}
	
				if($pro_promo==0){$promo_showcase=" ";}
				else{ 
					$promo_showcase="<p class='showcase-badge'>$pro_promo%</p>";
				}

			if ($pro_rate == 0){
				$rate = "<a href='#1'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#2'><ion-icon name='star'></ion-icon></a>
				<a href='#3'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
		
			}elseif($pro_rate == 1){
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
						  <a href='#2'><ion-icon name='star-outline'></ion-icon></a>
						  <a href='#3'><ion-icon name='star-outline'></ion-icon></a>
						  <a href='#4'><ion-icon name='star-outline'></ion-icon></a>
						  <a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
	
			}elseif ($pro_rate == 2){
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star-outline'></ion-icon></a>
					<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
					<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
			}elseif ($pro_rate == 3) {
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star'></ion-icon></a>
					<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
					<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
			}elseif ($pro_rate == 4) {
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star'></ion-icon></a>
					<a href='#4'><ion-icon name='star'></ion-icon></a>
					<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
			}elseif ($pro_rate == 5){
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star'></ion-icon></a>
					<a href='#4'><ion-icon name='star'></ion-icon></a>
					<a href='#5'><ion-icon name='star'></ion-icon></a>";
			}
	
	echo "
		<div class='showcase'>
			<div class='showcase-banner'>
			 	 <img src='$pro_image' alt='$pro_title' width='300' class='product-img default'>
			  	 <img src='$pro_image_hover' alt='$pro_title' width='300' class='product-img hover'>
				   $promo_showcase

			  <div class='showcase-actions'>
				<button pid='$pro_id' class='btn-action' id='favproduct'>
				  <ion-icon name='heart-outline'></ion-icon>
				</button>

				<button pid='$pro_id' class='btn-action' id='viewproduct'>
				  <ion-icon name='eye-outline'></ion-icon>
				</button>

				<button pid='$pro_id' class='btn-action' id='product'>
				  <ion-icon name='bag-add-outline' ></ion-icon>
				</button>
			  </div>

			</div>

			<div class='showcase-content'>
			  <a href='#' class='showcase-category'>$cat_title</a>
			  <a href='#'>
				<h3 class='showcase-title'>$pro_title</h3>
			  </a>
			  <div class='showcase-rating'>$rate</div>

			  <div class='price-box'>
				<p class='price'>$pro_price.00 DA</p>
				$DEL
			  </div>
			</div>
		</div> 
	";
	}
}
	

if(isset($_POST["addToFavoris"])){	

	$p_id = $_POST["proId"];

	if(isset($_SESSION["uid"])){

	$user_id = $_SESSION["uid"];

	$sql = "SELECT * FROM favoris WHERE p_id='$p_id' AND user_id ='$user_id'";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	if($count > 0){
		echo "
			<div class='alert alert-warning'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is already added into the favoris Continue Shopping..!</b>
			</div>
		";

	}else{
		$sql = "INSERT INTO `favoris`
		(`p_id`, `ip_add`, `user_id`) 
		VALUES ('$p_id','$ip_add','$user_id')";
		if(mysqli_query($con,$sql)){
			echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Product is Added To Favoris..!</b>
				</div>
			";
		}
	}
	}else{
		$sql = "SELECT id FROM favoris WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>";
				exit();
		}
		$sql = "INSERT INTO `favoris`
		(`p_id`, `ip_add`, `user_id`) 
		VALUES ('$p_id','$ip_add','-1')";
		if (mysqli_query($con,$sql)) {
			echo "
				<div class='alert alert-success'>
					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<b>Your product is Added Successfully..!</b>
				</div>
			";
			exit();
		}
		
	}
	
}	




	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id='$p_id' AND user_id ='$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";

		}else{
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product is Added Successfully..!</b>
					</div>
				";
				exit();
			}
			
		}
		
	}	

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Count User favoris item
if (isset($_POST["count_fav_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_fav_item FROM favoris WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_fav_item FROM favoris WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_fav_item"];
	exit();
}
//Count User cart item

//get favoris items
if (isset($_POST["getFavorisItem"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id FROM products a,favoris b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id FROM products a,favoris b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}

	$query = mysqli_query($con,$sql);
	//display favoris item in dropdown menu
	if(mysqli_num_rows($query) > 0){
		$n=0;
		while($row=mysqli_fetch_array($query)) {
			$n++;
			$product_id = $row["product_id"];
			$product_title = $row["product_title"];
			$product_price = $row["product_price"];
			$product_image = $row["product_image"];
			echo'
				<li class="clearfix">
				<a class="closeFav" remove_id="'.$product_id.'">
					<span class="remove"></span>
				</a>
				<img src="'.$product_image.'" alt="Product">
				<span class="mini-item-name">'.$product_title.'</span>
				<span class="mini-item">'.CURRENCY.'</span>
				<span class="mini-item-price" id="price">'.$product_price.'</span>
				</li>';
		}
	
	}
}


//Remove Item From FAVORIS
if (isset($_POST["removeItemFromFavoris"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM favoris WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM favoris WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from Favoris</b>
				</div>";
		exit();
	}
}


/// end favoris items 

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo'
					<li class="clearfix">
					<a class="remove" remove_id="'.$product_id.'">
					<span class="remove"></span>
					</a>
					<img src="'.$product_image.'" alt="Product">
					<span class="mini-item-name">'.$product_title.'</span>
					<span class="mini-item">'.CURRENCY.'</span>
					<span class="mini-item-price" id="price">'.$product_price.'</span>
					<span class="mini-item-quantity" id="qnt"> x 1 </span>
					</li>';
				}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}

	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'<div class="row">
								<div class="col-md-2">
									<div class="btn-group">
										<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="glyphicon glyphicon-trash"></span></a>
										<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="glyphicon glyphicon-ok-sign"></span></a>
									</div>
								</div>
								<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
								<input type="hidden" name="" value="'.$cart_item_id.'"/>
								<div class="col-md-2"><img class="img-responsive" src="'.$product_image.'"></div>
								<div class="col-md-2">'.$product_title.'</div>
								<div class="col-md-2"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
								<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly"></div>
								<div class="col-md-2"><input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly"></div>
							</div>';
				}
				
				echo '<div class="row">
							<div class="col-md-8"></div>
							<div class="col-md-4">
								<b class="net_total" style="font-size:20px;"> </b>
					</div>';
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Commander" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){

					//checkout form
					echo '
						</form>
						<form action="payment_success.php" method="POST">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="upload" value="1">
									<label for="nom">Nom</label>
									<input type="text" name="nom">
									<label for="prenom">Prenom</label>
									<input type="text" name="prenom">
									<label for="num">Numéro de téléphone mobile</label>
									<input type="tel" name="num">
									<label for="wilaya">Wilaya</label>
									<select name="wilaya" id="wilaya">
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
									<input type="hidden" name="add_order" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo 
									'
									<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
									<input type="hidden" name="item_number_'.$x.'" value="'.$row["product_id"].'">
							  		<input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
							  		<input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   

								'<input type="hidden" name="return" value="payment_success.php"/>
					                <input type="hidden" name="notify_url" value="payment_success.php">
									<input type="hidden" name="add_order" value="1">
									<input type="hidden" name="cancel_return" value="cancel.php"/>
									<input type="hidden" name="currency_code" value="DZ"/>
									<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Commander" >
									<input type="hidden" name="x" value='.$x.'>
									<input type="hidden" name="uid" value='.$_SESSION["uid"].'>
								</form>';
				}
			}
	}
	
	
}



//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


if (isset($_POST["removeallCart"])) {
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Le panier a été vidé</b>
				</div>";
		exit();
	}
}





//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




if(isset($_POST["view_product"])){
	$id = $_POST["product_id"];
	$sql = "SELECT * FROM products WHERE product_id = '$id'";
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id  = $row['product_id'];
			$pro_cat  = $row['product_cat'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			$pro_image2 = $row['product_image2'];
			$pro_desc = $row['product_desc'];
			$pro_rate = $row['product_rate'];

			if(!empty($pro_image2)){
				$little_image="<img src='$pro_image' id='img1'>
				<img src='$pro_image2' id='img2'>";
			}else{
				$little_image="";
			}

			if ($pro_rate == 0){
				$rate = "<a href='#1'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#2'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#3'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
				<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
		
			}elseif($pro_rate == 1){
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
						  <a href='#2'><ion-icon name='star-outline'></ion-icon></a>
						  <a href='#3'><ion-icon name='star-outline'></ion-icon></a>
						  <a href='#4'><ion-icon name='star-outline'></ion-icon></a>
						  <a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
	
			}elseif ($pro_rate == 2){
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star-outline'></ion-icon></a>
					<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
					<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
			}elseif ($pro_rate == 3) {
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star'></ion-icon></a>
					<a href='#4'><ion-icon name='star-outline'></ion-icon></a>
					<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
			}elseif ($pro_rate == 4) {
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star'></ion-icon></a>
					<a href='#4'><ion-icon name='star'></ion-icon></a>
					<a href='#5'><ion-icon name='star-outline'></ion-icon></a>";
			}elseif ($pro_rate == 5){
					$rate = "<a href='#1'><ion-icon name='star'></ion-icon></a>
					<a href='#2'><ion-icon name='star'></ion-icon></a>
					<a href='#3'><ion-icon name='star'></ion-icon></a>
					<a href='#4'><ion-icon name='star'></ion-icon></a>
					<a href='#5'><ion-icon name='star'></ion-icon></a>";
			}
	
	echo"
	<span class='viewClose' id='CloseProd' ></span>  
	<div class='showcase' id='prod'>
		<div class='productimage'>
		<img src='$pro_image' alt='$pro_title' width='65'class='showcase-img'>
		  <img src='$pro_image2' alt='$pro_title' width='65' id='secondary'>
		  <div class='little_img'>
		  $little_image
		  </div>
		</div>
	<div class='showcase-contenue'>
		<a href='#'>
		  <h4 class='showcase-title'>$pro_title</h4>
		</a>

		<div class='showcase-description'>
		  <p class='description' style=
		  'font-size: 18px;color:#857c7c;'>$pro_desc</p>
		</div>

		<div class='showcase-rating'>
		$rate
		</div>

		<div class='showcase-taille' style='height:40px;'>
		<label for='taille'>Taille :</label>
		<select name='taille' id='taille'>
		<option value='volvo'>S</option>
		<option value='saab'>M</option>
		<option value='opel'>L</option>
		<option value='audi'>XL</option>
		<option value='audi'>XXL</option>
		</select>
		</div>

		<div class='price-box'>
		  <p class='price'>$pro_price DA</p>
		</div>

		<button id='favproduct' pid='$pro_id' class='add-cart-btn'>Ajouter au favoris</button>
		<button id='product' pid='$pro_id' class='add-cart-btn'>Ajouter au panier</button>
	</div>

	</div>
	";
	}
}



?>






