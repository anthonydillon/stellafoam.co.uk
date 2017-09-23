<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
ini_set('error_display', '1');
include("functions.php");
define('sessionlen',20000);
if (isset($_COOKIE["stellafoamadmin"])){
	$splitCookie = explode('_', $_COOKIE["stellafoamadmin"]);
	if($splitCookie[1] > time()-sessionlen){
		if(generate_hash($splitCookie[2].$splitCookie[1]) != $splitCookie[0]){
			header('Location: /admin/login.php');
		}
	}else{
		header('Location: /admin/login.php');
	}
}else{
	header('Location: /admin/login.php');
}
$todo = false;
$message = '';
if(isset($_GET["id"])){
	$id = $_GET["id"];
}else{
	header('Location: /admin/login.php');
}
if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}
if($todo){
	switch($todo){
		case 'editPassword':
			if(isset($_POST["newpassword"])){
				$message = editPassword($id,$_POST["newpassword"]);
				if($message){
					header('Location: /admin/users.php?sp=1');
				}else{
					header('Location: /admin/users.php?sp=0');
				}
			}else{
				$message = 'Error with editing user details';
				header('Location: /admin/users.php?sp=0');
			}
		break;
	}
}
?>
<html>
    <head>
    	<title>Stella Foam - Users Admin</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../css/style.css" media="all" />
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
		h3 {
			font-size: 19px;
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
				<div style="clear:both;"></div>
                <form method="post">
					<input type="hidden" name="todo" value="editPassword" />
					<h3>Edit Password</h3><br/>

                    <table align="center" style="margin-top:30px;padding-right:150px;" cellpadding="12px" cellspacing="12px">
                        <tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">New Password:</td>
                            <td align="left" style="width:50%;"><input type="text" name="newpassword" size="35" /></td>
                        </tr>
                        <tr height="30px;">
                            <td>&nbsp;</td>
                            <td>
                            	<input type="submit" value="Edit Password" style="padding:2px 10px;" />
								<a href="/admin/users.php">Cancel</a>
							</td>
                        </tr>
                    </table><br>
                </form>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
