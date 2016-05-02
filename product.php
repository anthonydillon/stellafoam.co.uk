<?php
include("functions.php");

if(isset($_GET["p"])){
	$product = get_product($_GET["p"]);
	if(!$product) {
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
	<title>Stellafoam - <?php if($notfound) { echo '404'; } else { echo $product['Product_Title']; } ?></title>
	<?php
		include  'meta.php';
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
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="typography_core.css" media="all" />
	<script src="scripts.js" type="text/javascript"></script>
    <?php
		include  'analytics.php';
    ?>
</head>
<body id="build">
	<div id="pageWrapper">
        <div style="width:190px;float:right"></div>
        <?php
			include  'header.php';
			if($notfound) {
				include  '404.php';
			}else{
    	?>

        <div id="breadcrumb">
			<a href="/" title="Homepage">Homepage</a> >
			<?php echo getCategoryName( $product['Category_ID']).' > '.$product['Product_Title']; ?>
            <div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					if($sid && !$readding){ $amount++; }
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View List</a>
        	</div>
            <?php
				include 'crumbuser.php';
			?>
		</div>
        <div id="content">
			<div style="clear:both;"></div>
			<div id="product" style="margin-top:10px;">
				<div id="productImage">
					<img src="images/<?php echo $product['Product_Image'] ?>" />
				</div>
				<div id="info">
					<div id="links">
						<span>
							<a href="mailto:?subject=Stellafoam - <?php echo $product['Product_Title']?>&body=<?php echo $product['Product_Title'].' %0A%0AVisit: http://www.stellafoam.co.uk/product.php?p='. $product['Product_ID'] .' %0A%0A'. $product['Product_Description'] .'%0A%0ASent Via http://www.stellafoam.com'?>">
								<img src="email_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Email this
							</a>
						</span>
						<br/><br/>
						<span>
							<a href="productprint.php?p=<?php echo $product['Product_ID']; ?>">
								<img src="print_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Printable version
							</a>
						</span>
					</div>
                    <?php
						$size = '';
						$threshold = 18;
						$strLen = strlen($product['Product_Title']) + strlen($product['Product_Code']);
						if($strLen >= $threshold){
							$dif = (($strLen - $threshold)+1)*2;
							$total = max(24,(40 - $dif) - 2);
							$size = 'style="font-size:'.$total.'px;"';
						}
					?>

					<div id="title" <?php echo $size ?> >
						<?php
							echo $product['Product_Title'];
							if($product['Product_Code'] != ''){
								echo ' ('.$product['Product_Code'].')';
							}
						?>
					</div>
					<div id="tab">
						Description
					</div>
					<div align="left" id="description">
						<p>
							<?php
								echo $product['Product_Description'];
							?>
						</p>
					</div>
				</div>
				<div style="clear:both;"></div>
				<div id="details">

						<?php
							$count = 0;
							$firstTime = true;
							$prevType = '';
							$lastCount = 0;
							$topForm = '';
							$stock = getProductsStock( $product['Product_ID'] );
							if($stock){
								echo '<table id="stock" width="93%">
								<tr height="34px"><th>Stock</th><th></th><th width="250px">Add to Order List</th></tr>';
								for($i = 0; $i < count($stock); $i++){
									if($stock[$i]["Type_Name"] != $prevType){
										if(!$firstTime){
											echo '</td><td>';
											for($p = 0; $p < $count; $p++){
												$topForm = '';
												$topForm = ($p==0)?'style="margin-top: 0px;"':'';
												echo '<div class="stockName" '.$topForm.'>
														<form action="" method="post">
															<input type="hidden" name="sid" value="'.$stock[$lastCount]["Stock_ID"].'" />
															Quantity: <input type="text" name="qty" size="3" maxlength="4" onKeyPress="return numbersonly(this, event)" />
															<input type="submit" value="Add"/>
														</form>
													</div>';
													$lastCount++;
											}
											echo '</td></tr>';
										}
										$firstTime = false; $count = 0;
										echo '<tr id="product-'.$stock[$i]["Stock_ID"].'"><td style="vertical-align:text-top;">'.$stock[$i]["Type_Name"].'</td><td style="vertical-align:text-top;">';

									}
									echo '<div class="stockName">'.$stock[$i]["Stock_Name"].'</div>';

									$prevType = $stock[$i]["Type_Name"];
									$count++;

								}
								echo '</td><td>';
								for($p = 0; $p < $count; $p++){
									$topForm = '';
									$topForm = ($p==0)?'style="margin-top: 0px;"':'';
									echo '<div class="stockName" '.$topForm.'>
											<form action="product.php?p='.$_GET["p"].'" method="post">
												<input type="hidden" name="sid" value="'.$stock[$lastCount]["Stock_ID"].'" />
												Quantity: <input type="text" name="qty" size="3" maxlength="4" onKeyPress="return numbersonly(this, event)"/>
												<input type="submit" value="Add" />
											</form>
										</div>';
										$lastCount++;
								}
								echo '</td></tr></table>';
							}else{
								echo '<h3 align="center">No Stock available</h3>';
							}
						?>

				</div>
			</div>
			<div style="clear:both;"></div>
        </div>
        <?php
        	}
        ?>
    </div>
	<?php
		include  'copyright.php';
	?>
</body>
</html>
