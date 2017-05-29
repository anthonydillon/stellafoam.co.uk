<?php
include("functions.php");

if(isset($_GET["s"])){
	$stock = get_stock($_GET["s"]);
	$product = get_product($stock["Product_ID"]);
	if(!$stock) {
		$notfound = true;
	}
}else{
	header('Location: /');
}
$sid = false;
$qty = false;
if(isset($_POST["sid"]) && isset($_POST["qty"]) && $_POST["sid"] != '' && $_POST["qty"] != ''){
	$sid = $_POST["sid"];
	$qty = $_POST["qty"];
	$expire = time()+60*60*24;
	$existing = '';

	if(isset($_COOKIE["stellafoamorder"])){
		$orderList = explode('|',$_COOKIE["stellafoamorder"]);
		$readding = false;
		for($i = 0; $i < count($orderList); $i++){
			$orderDetail = explode('-',$orderList[$i]);
			if($orderDetail[0] == $sid){
				$orderDetail[1] += $qty;
				$orderList[$i] = implode('-',$orderDetail );
				$readding = true;
			}
		}
		$existing = implode('|',$orderList);
	}

	if($readding){
		setcookie("stellafoamorder", $existing, $expire);
	}else{
		$existing .= ($existing != '')?'|':'';
		setcookie("stellafoamorder", $existing.$sid.'-'.$qty, $expire);
	}

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - <?php if($notfound) { echo '404'; } else { echo $stock['Stock_Name']; } ?></title>
	<?php
		include '_includes/meta.php';
    ?>

    <style type="text/css">
	#content{
		padding:20px;
	}
	#footer {
		text-align:center;
		clear: both;
		padding: 15px;
		width: 934px;
		background: #f5f3f2;
	}
	#footer a{
		color:#016bb5;
		font-size:13px;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/typography_core.css" media="all" />
 	<link rel="stylesheet" href="/vendor/venobox/venobox.css" type="text/css" media="screen" />
	<script src="/js/numbersonly.js" type="text/javascript"></script>
    <?php
		include '_includes/analytics.php';
    ?>
</head>
<body id="build">
	<div id="pageWrapper">
    <div style="width:190px;float:right"></div>
			<?php
				include '_includes/header.php';
				if($notfound) {
					include '_includes/404.php';
				}else{
			?>
    	<div id="breadcrumb">
			<div class="breadcrumb-wrapper">
				<a href="/" title="Homepage">Homepage</a> >
				<?php echo getCategoryName( $product['Category_ID']).' > <a href="/product.php?p='.$product['Product_ID'].'">'.$product['Product_Title'].'</a> > '.$stock['Stock_Name']; ?>
      </div>
			<div style="float:right;margin-right:2px;">
    		<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					if($sid && !$readding){ $amount++; }
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
        <a href="/cart.php">View basket</a>
      </div>
      <?php
				include '_includes/crumbuser.php';
			?>
		</div>
    <div id="content">
			<div style="clear:both;"></div>
			<div id="product" style="margin-top:10px;">
				<div id="productImage">
					<?php
						$image = '/images/stock/placeholder.png';
						$image_filename = '/images/stock/'.strtolower($stock["Stock_Code"]).'.jpg';
						if (file_exists($_SERVER['DOCUMENT_ROOT'] . $image_filename)) {
							$image = $image_filename;
						}
						echo '<a class="venobox venobox--expand" title="'.$stock["Stock_Name"].'" href="'.$image.'">
							<img src="'.$image.'" alt="'.$stock[$i]["Stock_Name"].'" />
						</a>';
					?>
				</div>
				<div id="info">
					<div id="links">
						<span>
							<a href="mailto:?subject=Stellafoam - <?php echo $stock['Stock_Name']?>&body=<?php echo $stock['Stock_Name'].' %0A%0AVisit: http://www.stellafoam.co.uk/stock.php?s='. $stock['Stock_ID'] .' %0A%0A'. $stock['Stock_Description'] .'%0A%0ASent Via http://www.stellafoam.com'?>">
								<img src="/images/icons/email_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Email this
							</a>
						</span>
					</div>
          <?php
						$size = '';
						$threshold = 18;
						$strLen = strlen($stock['Stock_Name']) + strlen($stock['Stock_Code']);
						if($strLen >= $threshold){
							$dif = (($strLen - $threshold)+1)*2;
							$total = max(24,(40 - $dif) - 2);
							$size = 'style="font-size:'.$total.'px;"';
						}
					?>

					<div id="title" <?php echo $size ?> >
						<?php
							echo $stock['Stock_Name'];
							if($stock['Stock_Code'] != ''){
								echo ' ('.$stock['Stock_Code'].')';
							}
						?>
					</div>
					<div id="tab">
						Description
					</div>
					<div align="left" id="description">
						<p>
							<?php
								echo $stock['Stock_Description'];
							?>
						</p>
					</div>
					<?php
						if($loggedIn) {
							echo '<div class="productPrice">
								<h4>&pound;'.$stock["Price"].' each</h4>
							</div>';
						}
					?>
					<div class="stock-form">
						<form action="" method="post">
							<input type="hidden" name="sid" value="<?php echo $stock["Stock_ID"] ?>" />
							Quantity:
							<input type="number" min="0" max="125" name="qty" value="1" size="3" maxlength="4" onKeyPress="return numbersonly(this, event)" />
							<input type="submit" value="Add" class="stock-add-button"/>
						</form>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
    </div>
		<?php
			}
		?>
  </div>
	<!-- Venobox - lightbox plugin -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script type="text/javascript" src="/vendor/venobox/venobox.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.venobox').venobox();
		});
	</script>
	<!-- End Venobox -->
	<?php
		include '_includes/copyright.php';
	?>
</body>
</html>
