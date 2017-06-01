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
					$productImage = 'images/' . $product['Product_Image'];
					echo '<a class="venobox venobox--expand" title="'.$product['Product_Title'].'" href="'.$productImage.'">
						<img src="'.$productImage.'" />
					</a>';
				?>
				</div>
				<div id="info">
					<div id="links">
						<span>
							<a href="mailto:?subject=Stellafoam - <?php echo $product['Product_Title']?>&body=<?php echo $product['Product_Title'].' %0A%0AVisit: http://www.stellafoam.co.uk/product.php?p='. $product['Product_ID'] .' %0A%0A'. $product['Product_Description'] .'%0A%0ASent Via http://www.stellafoam.com'?>">
								<img src="/images/icons/email_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Email this
							</a>
						</span>
						<br/><br/>
						<span>
							<a href="productprint.php?p=<?php echo $product['Product_ID']; ?>">
								<img src="/images/icons/print_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Printable version
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
							$prevType = '';
							$firstTime = true;
							$stock = getProductsStock( $product['Product_ID'] );
							if ($stock) {
								echo '<aside class="filter">';
									echo '<h2>Refine</h2>';
									echo '<ul class="filter__list">';
									for($i = 0; $i < count($stock); $i++) {
										if ($stock[$i]["Type_Name"] != $prevType) {
											echo '<li class="filter__list-item">';
											echo '<a href="#product-'.$stock[$i]["Stock_ID"].'" data-product="'.$stock[$i]["Stock_ID"].'">' . $stock[$i]["Type_Name"] . '</a>';
											echo '</li>';
										}
										$prevType = $stock[$i]["Type_Name"];
									}
									echo '</ul>';
								echo '</aside>';

								echo '<div id="stock" class="product-page-stock">';
								for ($i = 0; $i < count($stock); $i++) {
									$image = '/images/stock/placeholder.png';
									$image_filename = '/images/stock/'.strtolower($stock[$i]["Stock_Code"]).'.png';
									$image_thumbnail = '/images/stock/thumbs/'.strtolower($stock[$i]["Stock_Code"]).'.png';
									if (file_exists($_SERVER['DOCUMENT_ROOT'] . $image_thumbnail)) {
										$image = $image_thumbnail;
									}
									if ($stock[$i]["Type_Name"] != $prevType) {
										if (!$firstTime) {
											echo '</div>';
										}
										echo '<div id="product-'.$stock[$i]["Stock_ID"].'">';
										echo '<div class="stock-name"><h3>'.$stock[$i]["Type_Name"].'</h3></div>';
									}
									echo '<div class="stock-row">
										<div class="stock-image">
											<a class="venobox venobox--expand" title="'.$stock[$i]["Stock_Name"].'" href="'.$image_filename.'">
												<img src="'.$image.'" alt="'.$stock[$i]["Stock_Name"].'" />
											</a>
										</div>
										<div class="stock-description">
											<a href="/stock.php?s='.$stock[$i]["Stock_ID"].'">
												<h3>'.$stock[$i]["Stock_Name"].'</h3>
											</a>
											<p class="stock-description--body">'.$stock[$i]["Stock_Description"].'</p>';
										if(strlen($stock[$i]["Stock_Description"]) >= 157) {
											echo '<div class="stock-description--toggle">
												<a class="stock-description--more" href="#">More</a>
												<a class="stock-description--less" href="#">Less</a>
											</div>';
										}
										if($loggedIn) {
											echo '<div>
												<p class="stock-description--price">&pound;'.$stock[$i]["Price"].' each</p>
											</div>';
										}
										echo '</div>
										<div class="stock-form">
											<form action="" method="post">
												<input type="hidden" name="sid" value="'.$stock[$i]["Stock_ID"].'" />
												Quantity:
												<input type="number" min="0" max="125" name="qty" value="1" size="3" maxlength="4" onKeyPress="return numbersonly(this, event)" />
												<input type="submit" value="Add" class="stock-add-button"/>
											</form>
										</div>
									</div>';

									$prevType = $stock[$i]["Type_Name"];
									$firstTime = false;
								}
								echo '</div>';
							} else {
								echo '<h3 align="center">No Stock available</h3>';
							}
						?>

				</div>
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

			<script>
				var filterLinks = document.querySelectorAll('.filter a');
				var stockContainer = document.querySelector('#stock');
				function toggleActiveFilter(e) {
					var i;
					var isActive = e.target.classList.contains('active');
					for (i = 0; i < filterLinks.length; i++) {
						filterLinks[i].classList.remove('active');
					}
					if (!isActive) {
						e.target.classList.add('active');
						stockContainer.classList.remove('show-all');
					} else {
						e.preventDefault();
						window.location.hash = 'all';
						stockContainer.classList.add('show-all');
					}
				}
				for (i = 0; i < filterLinks.length; i++) {
					filterLinks[i].addEventListener('click', toggleActiveFilter, false);
				}
				if (window.location.hash == '' || window.location.hash == '#' || window.location.hash == '#all') {
					stockContainer.classList.add('show-all');
				}

				var moreLinks = document.querySelectorAll('.stock-description--more');
				for (i = 0; i < moreLinks.length; i++) {
					moreLinks[i].addEventListener('click', function (e) {
						e.preventDefault();
						var productItem = e.target.closest('.stock-row');
						productItem.classList.add('show-description');
					});
				}

				var lessLinks = document.querySelectorAll('.stock-description--less');
				for (i = 0; i < lessLinks.length; i++) {
					lessLinks[i].addEventListener('click', function(e) {
						e.preventDefault();
						var productItem = e.target.closest('.stock-row');
						productItem.classList.remove('show-description');
					});
				}
			</script>
			<div style="clear:both;"></div>
        </div>
        <?php
        	}
        ?>
    </div>
	<?php
		include '_includes/copyright.php';
	?>
</body>
</html>
