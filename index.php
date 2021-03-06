<?php

include("functions.php");
define('sessionlen',20000);

$loggedIn = false;

$user = array();

if(isset($_COOKIE['stellafoamuser'])){
	$splitCookie = explode('_', $_COOKIE['stellafoamuser']);
	if($splitCookie[1] > time()-sessionlen){
		if(generate_hash($splitCookie[2].$splitCookie[1]) == $splitCookie[0]){
			$loggedIn = true;
			$user = array($splitCookie[3],$splitCookie[2]);
		}
	}
}


function login( $username, $password ){
	global $user;
	//if($username == $user[0] && $password == $user[1]){
	$user = checkLogin($username, $password);
	if($user){
		setcookie('stellafoamuser', generate_hash($user[1].time()).'_'.time().'_'.$user[1].'_'.$user[0], time()+sessionlen);
		header('Location: /');
		return true;
	}else{
		return false;
	}
}

if(isset($_POST['username']) && isset($_POST['password'])){
	$loginReturn = login($_POST['username'],$_POST['password']);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Stellafoam</title>
	<?php
		include '_includes/meta.php';
    ?>

    <style type="text/css">
	#content{
		padding:20px;
		text-align:center;
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
	<?php
		include '_includes/analytics.php';
	?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
	$( document ).ready(function() {
		$('#breadcrumb .bread-login').click(function(e) {
			e.preventDefault();
			$('#breadcrumb .login-form').show();
			$('#breadcrumb #username').focus();
		});
		$('#breadcrumb .login-close').click(function(e) {
			e.preventDefault();
			$('#breadcrumb .login-form').hide();
		});
	});
	</script>
</head>
<body id="build">
	<div id="pageWrapper">
        <div style="width:190px;float:right"></div>
        <?php
			include '_includes/header.php';
    	?>

        <div id="breadcrumb">
        	<div style="float:right;margin-right:2px;position:relative;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View basket</a>
                <?php
                if(!$loggedIn) {
                 echo '- <a href="#" class="bread-login">Login</a>';
                }

				include '_includes/crumbuser.php';
			?>
        	</div>
        </div>

        <div id="content">
        	<div id="welcome">
                <div id="information">
                    <p>Welcome to the Stellafoam website. We are a specialist importer and distributor to the cabinet making industry. </p>
                    <br/>
                    <p>If you are a bedroom / kitchen / study / office manufacturer or maybe a shopfitter, builder, refurbishment contractor or any of the many other associated trades that use melamine faced panels and fittings we have a wide range of products to help you. </p>
                </div>
            </div>

						<a href="/docs/stellafoam-swarovski-brochure.pdf" target="_blank" title="Swarovski handles">
						<div class="new-promo">
            	<h2>SWAROVSKI&reg; HANDLES</h2>
            	<img src="/images/homepage/swarovski-handles.png" class="full" border="0" />
            </div>
            </a>

            <a href="/doors.php" title="Made To Measure">
            <div class="new-promo">
            	<h2>MADE TO MEASURE DOOR SERVICE</h2>
            	<img src="/images/homepage/made-to-measure.jpg" class="full" border="0" />
            </div>
            </a>

						<a href="/docs/stellafoam-new-handle-brochure.pdf" target="_blank" title="The Handles Collection">
            <div class="new-promo last-promo">
            	<h2>THE HANDLES COLLECTION</h2>
            	<img src="/images/homepage/handles-collection.png" border="0" />
            </div>
            </a>

						<div class="new-promo">
            	<h2>OVER 30 COLOURS OF MFC IN STOCK</h2>
            	<img src="/images/DN-denim.jpg" class="full" border="0" />
            </div>

						<a href="/kitchens-made-simple.php" title="Kitchens made simple">
            <div class="new-promo coming-soon">
            	<h2>KITCHENS MADE SIMPLE</h2>
            	<img src="/images/homepage/stellafoam-kitchens-made-simple.png" border="0" />
            </div>
						</a>

            <a href="/product.php?p=193" title="Sliding doors">
            <div class="new-promo last-promo">
            	<h2>SLIDING DOOR COMPONENTS</h2>
            	<img src="/images/homepage/sliding-door-promo.jpg" border="0" />
            </div>
            </a>




            <a href="/workshop.php" title="Hire our Workshop">
            <div class="new-promo workshop-promo">
            	<h2>HIRE OUR WORKSHOP!</h2>
            	<img src="/images/homepage/workshop.jpg" border="0" />
            </div>
            </a>

            <a href="/product.php?p=210" title="">
            <div class="new-promo marketing-promo">
            	<h2>ORDER MARKETING MATERIAL</h2>
            	<img src="/images/homepage/marketing-material-promo.jpg" border="0" />
            </div>
            </a>

            <a href="/product.php?p=180" title="Soft close wooden drawer boxes">
            <div class="new-promo last-promo">
            	<h2 class="smaller">SOFT CLOSE WOODEN DRAWER BOXES</h2>
            	<img src="/images/homepage/wooden-drawer.jpg" class="full" border="0" />
            </div>
            </a>

            <a href="/product.php?p=121" title="Blum hinges">
            <div class="new-promo blum-promo">
            	<h2>BLUM STOCKIST</h2>
            	<p>Including UK exclusive soft close face fix hinge</p>
            	<img src="/images/homepage/blum-logo.png" border="0" />
            </div>
            </a>

            <a href="/product.php?p=246" title="Kitchen worktops">
            <div class="new-promo">
            	<h2>KITCHEN WORKTOPS</h2>
            	<img src="/images/homepage/homepage-worktops.jpg" class="full" border="0" />
            </div>
            </a>

            <a href="/kitchen-cabinets.php" title="Kitchen cabinents">
						<div class="new-promo clicbox-promo last-promo ">
            	<h2 class="smaller">FLAT PACK KITCHEN CABINETS</h2>
            	<img src="/images/homepage/clicbox-logo.jpg" border="0" />
            </div>
            </a>

				</div>
        <?php
			include '_includes/footer.php';
    	?>
    </div>
	<?php
		include '_includes/copyright.php';
	?>
</body>
</html>
