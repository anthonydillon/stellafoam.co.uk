<?php

include("functions.php");

define('s1','293ndjxz9dj564%4£%$%££%£%ids02i09e3j923uicm\iosd;dojdfjidf9e23jioocd');
define('s2','-bkp$%£Y21mof^£$^sdmiottw%$%£peqc,cr2mi0-crf2j90f4^2nj90erk0-m348n9b');
define('s3','n"!\d2bfu90g\0-"^%^£-dwd^$%£$uj893gfnh0q4j234njh-cfb-2v1=bv42-bvh349');
define('s4','h\vc8923j89cjfdjfsdj$%£$£ovfduj53hivfdnhufg[gq=q]=q]=rgn-=qtnq904n82');
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
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Kitchens Made Simple</title>
	<?php
		include  'meta.php';
    ?>

    <link rel="stylesheet" type="text/css" href="kms-styles.css" media="all" />
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="typography_core.css" media="all" />
	<link rel="stylesheet" type="text/css" href="kms-styles-print.css" media="print" />
    <?php
		include  'analytics.php';
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
			include  'header.php';
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
                <a href="/cart.php">View List</a>
                <?php
                if(!$loggedIn) {
                 echo '- <a href="#" class="bread-login">Login</a>';
                }

				include 'crumbuser3.php';
			?>
        	</div>
        </div>
        <div id="content">
        	<div class="row">
				<div class="six-col justifyed-text">
				<h1><img src="/images/homepage/stellafoam-kitchens-made-simple.png" alt="Kitchens Made Simple" /></h1>
					<p class="intro">Introducing Stellafoam&rsquo;s new quick and easy way to design, price and order kitchens. With free marketing material, CAD software and samples; (along with all the price savings of seperate component ordering) our customers will have the competitive edge they need to win the kitchen game!</p>
				</div>
				<div class="four-col prepend-two last-col box articad-box">
					<h3>Free ArtiCAD room planner</h3>
					<p>Plan and submit your customers kitchen to recieve a design specific 3D rendered image.</p>
					<a href="http://www.articad.net/myroomplan/planner-manager/?id=125&v=2&guid1=32023178&guid2=9044" class="primary-button" target="_blank">Design your kitchen</a>
				</div>
				<div style="clear:both"></div>
			</div>

			<?php
			if($loggedIn) {
				include  'kms-logged-in.php';
			} else {
				include  'kms-logged-out.php';
			}
		    ?>

		</div>
        <?php
			include  'footer.php';
    	?>
    </div>
	<?php
		include  'copyright.php';
   	?>
   	<script src="js/js-cookie.js"></script>
</body>
</html>
