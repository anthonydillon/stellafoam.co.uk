<?php
include("functions.php");

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
	$user = checkLogin($username, $password);
	if($user){
		setcookie('stellafoamuser', generate_hash($user[1].time()).'_'.time().'_'.$user[1].'_'.$user[0], time()+sessionlen);
		header('Location: /kitchens-made-simple.php');
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
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Kitchens Made Simple</title>
	<?php
		include '_includes/meta.php';
    ?>

    <link rel="stylesheet" type="text/css" href="/css/kms-styles.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/typography_core.css" media="all" />
	<link rel="stylesheet" type="text/css" href="/css/kms-styles-print.css" media="print" />
    <?php
		include '_includes/analytics.php';
    ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
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
		$('.print-button').click(function(e) {
			window.print();
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
			<div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Kitchens Made Simple
        <div style="float:right;margin-right:2px;">
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
				<div class="row" style="position: relative; overflow: hidden;">
					<div class="six-col justifyed-text">
						<h1><img src="/images/homepage/stellafoam-kitchens-made-simple.png" alt="Kitchens Made Simple" /></h1>
						<p class="intro">Introducing Stellafoam&rsquo;s new quick and easy way to design, price and order kitchens. With free marketing material, CAD software and samples; (along with all the price savings of seperate component ordering) our customers will have the competitive edge they need to win the kitchen game!</p>
					</div>
					<div class="six-col last-col">
						<img src="/images/luzzi-ivory.jpg" alt="Luzzi ivory kitchen" class="kms-hero-image" />
					</div>
				</div>

				<?php
				if($loggedIn) {
					include '_includes/kms-logged-in.php';
				} else {
					include '_includes/kms-logged-out.php';
				}
				?>

				<div class="row">
					<div class="twelve-col">
						<img src="/images/luzzi-ivory-promo.jpg" alt="Luzzi ivory kitchen" />
					</div>
				</div>
			</div>
			<?php
			include '_includes/footer.php';
			?>
		</div>
	<?php
	include '_includes/copyright.php';
	?>
	<script src="js/js-cookie.js"></script>
</body>
</html>
