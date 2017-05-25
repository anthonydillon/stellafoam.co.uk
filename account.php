<?php

include("functions.php");

define('s1','293ndjxz9dj564%4�%$%��%�%ids02i09e3j923uicm\iosd;dojdfjidf9e23jioocd');
define('s2','-bkp$%�Y21mof^�$^sdmiottw%$%�peqc,cr2mi0-crf2j90f4^2nj90erk0-m348n9b');
define('s3','n"!\d2bfu90g\0-"^%^�-dwd^$%�$uj893gfnh0q4j234njh-cfb-2v1=bv42-bvh349');
define('s4','h\vc8923j89cjfdjfsdj$%�$�ovfduj53hivfdnhufg[gq=q]=q]=rgn-=qtnq904n82');
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

// Report all PHP errors
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
ini_set('error_display', '1');

function login( $username, $password ){
	global $user;
	//if($username == $user[0] && $password == $user[1]){
	$user = checkLogin($username, $password);
	if($user){
		setcookie('stellafoamuser', generate_hash($user[1].time()).'_'.time().'_'.$user[1].'_'.$user[0], time()+sessionlen);
		header('Location: /cart.php');
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
	<title>Stellafoam - Account</title>
	<?php
		include  'meta.php';
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
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="typography_core.css" media="all" />
    <?php
		include  'analytics.php';
    ?>
</head>
<body id="build">
	<div id="pageWrapper">
        <div style="width:190px;float:right"></div>
        <?php
			include  'header.php';
    	?>

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Account

        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View basket</a>
        	</div>
            <?php
					if($loggedIn){ echo '<div style="float:right;margin-right:250px;">'.$user[0].' - <a href="logout.php">Logout</a></div>'; }
			?>
        </div>

        <div id="content">

		<?php
		if(isset($_POST['username']) && isset($_POST['password'])) {
			if(!$loginReturn){
				echo '<p align="center" style="color:red;padding:20px;">Username or Password incorrect</p>';
			}else{
				echo '<p align="center" style="color:green;padding:20px;">Logged in '.$user[0].'</p>';
			}
		}
		?>
		<div class="notice" style="margin-bottom:20px;">
			If you have a trade account with Stellafoam and you would like an on-line account, please contact the sales office on 01708 522551.
        </div>
		<form method="post">
			<h3 style="font-size: 19px;">Login</h3>
			<table align="center" style="margin-top:30px;padding-right:55px;" cellpadding="12px" cellspacing="12px">
			<tr align="right" style="margin-top:10px;"><td style="width:50%;">Username:</td><td align="left" style="width:50%;"><input type="text" name="username" /></td></tr>
			<tr align="right" style="width:50%"><td style="width:50%;">Password:</td><td align="left" style="width:50%;"><input type="password" name="password"  /></td></tr><tr height="30px;"><td>&nbsp;</td><td>
			<input type="submit" value="Enter" style="padding:2px 10px;" />
			</td></tr></table><br>
		</form>
		</div>
			<?php
				include  'copyright.php';
			?>
		</div>
    </body>
</html>