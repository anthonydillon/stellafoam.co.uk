<?php
include("functions.php");
define('sessionlen',20000);
// Report all PHP errors
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
ini_set('error_display', '1');
$user = array();

function login( $username, $password ){
	global $user;
	$user = checkLogin($username, $password);
	if($user){
		if($user == 'admin'){
			setcookie('stellafoamadmin', generate_hash($user.time()).'_'.time().'_'.$user, time() + sessionlen);
			header('Location: /admin');
		}
	}else{
		return false;
	}
}

if(isset($_POST['username']) && isset($_POST['password'])){
	login($_POST['username'],$_POST['password']);
}

?>
<html>
    <head>
    	<title>Stella Foam - Admin</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../css/navigation.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../css/typography_core.css" media="all" />
        <meta name="description" content=''/>
		<meta name="keywords" content=''/>
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
    </head>
    <body id="build">
    	<div id="pageWrapper">
    		<div style="width:190px;float:right"></div>
        	<?php
				include 'header.php';
			?>
		<div id="content">
		<?php
			if(isset($_POST['username'])){ echo '<p align="center" style=color:red">Username or Password incorrect</p>'; }
		?>
		<form method="post">
			<h3 style="font-size: 19px;">Login</h3>
			<table align="center" style="margin-top:30px;padding-right:55px;" cellpadding="12px" cellspacing="12px">
			<tr align="right" style="margin-top:10px;"><td style="width:50%;">Username:</td><td align="left" style="width:50%;"><input type="text" name="username" /></td></tr>
			<tr align="right" style="width:50%"><td style="width:50%;">Password:</td><td align="left" style="width:50%;"><input type="password" name="password"  /></td></tr><tr height="30px;"><td>&nbsp;</td><td>
			<input type="submit" value="Enter" style="padding:2px 10px;" />
			</td></tr></table><br>
		</form>
		</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
