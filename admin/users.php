<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('error_reporting', E_ALL);
ini_set('error_display', '1');
include("functions.php");
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
$message = '';
$todo = false;
$details = false;
if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}else if(isset($_GET["todo"])){
	$todo = $_GET["todo"];
}

if(isset($_GET["s"])){
	if($_GET["s"] == 1){
		$message = '<p style="color:#00FF00">User edited successfully</p>';
	}else{
		$message = '<p style="color:#FF0000">Database error while editing User</p>';
	}
}

if(isset($_GET["sp"])){
	if($_GET["sp"] == 1){
		$message = '<p style="color:#00FF00">User password edited successfully</p>';
	}else{
		$message = '<p style="color:#FF0000">Error editing User password</p>';
	}
}

if($todo){
	switch($todo){
		case 'addUser':
			if(isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["name"]) && isset($_POST["company"]) && isset($_POST["address"]) && isset($_POST["deliveryaddress"]) && isset($_POST["telephone"]) && isset($_POST["email"])){
				$message = addUser($_POST["username"], $_POST["password"], $_POST["name"], $_POST["company"], $_POST["address"], $_POST["deliveryaddress"], $_POST["telephone"], $_POST["email"]);
			}else{
				$message = 'Error with adding user details';
			}
		break;
		case 'deleteUser':
			if(isset($_GET["id"])){
				$message = deleteUser($_GET["id"]);
			}else{
				$message = 'Error with deleting user';
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
				include  '_includes/header.php';
			?>
            <div id="content">
				<div style="clear:both;"></div>
                <?php
				if($message != ''){
					echo '<div style="margin-bottom:20px;">'.$message.'</div>';
				}
				?>
                <form method="post">
					<input type="hidden" name="todo" value="addUser" />
					<h3>Add User</h3><br/>

                    <table align="center" style="margin-top:30px;padding-right:150px;" cellpadding="12px" cellspacing="12px">
                        <tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">Username:</td>
                            <td align="left" style="width:50%;"><input type="text" name="username" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Password:</td>
                            <td align="left" style="width:50%;"><input type="text" name="password" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Name:</td>
                            <td align="left" style="width:50%;"><input type="text" name="name" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Company:</td>
                            <td align="left" style="width:50%;"><input type="text" name="company" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Address:</td>
                            <td align="left" style="width:50%;"><input type="text" name="address" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Delivery Address:</td>
                            <td align="left" style="width:50%;"><input type="text" name="deliveryaddress" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Telephone:</td>
                            <td align="left" style="width:50%;"><input type="text" name="telephone" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Email:</td>
                            <td align="left" style="width:50%;"><input type="text" name="email" size="35" /></td>
                        </tr>
                        <tr height="30px;">
                            <td>&nbsp;</td>
                            <td>
                            	<input type="submit" value="Add User" style="padding:2px 10px;" />
								<a href="/admin/users.php">Cancel</a>
							</td>
                        </tr>
                    </table><br>
                </form>
				<table style="margin-bottom:30px;" id="stock" width="70%" style="margin-top:30px;">
					<tr><th width="70%">User</th><th width="10%">Edit</th><th width="10%">Delete</th></tr>
					<?php
						$users = getUsers( );
						for($i = 0; $i < count($users); $i++){
							echo '
							<tr><td>'.$users[$i]["User_Name"].'</td>
							<td><a href="editusers.php?id='.$users[$i]["User_ID"].'"><img src="edit.png" border="0"/></a></td>
							<td><a href="?todo=deleteUser&id='.$users[$i]["User_ID"].'"><img src="delete.png" border="0"/></a></td></tr>
							';
						}
					?>
				</table>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
