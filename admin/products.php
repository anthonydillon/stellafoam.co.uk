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
if(isset($_POST["title"]) && isset($_POST["category"]) && isset($_POST["code"]) && isset($_POST["image"]) && isset($_POST["description"])){
	$active  = 1;
	$image = '/images/stock/placeholder.png';
	if($_POST["image"] != ''){
		$image = $_POST["image"];
	}
	$message = addProduct($_POST["title"], $_POST["code"], $image, $_POST["description"],$_POST["category"],$active);
}

?>
<html>
    <head>
    	<title>Stella Foam - Products Admin</title>
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
				include  'header.php';
			?>
            <div id="content">
				<div style="clear:both;"></div>
                <?php
				if($message != ''){
					echo '<div style="margin-bottom:20px;">'.$message.'<br><a href="/admin">Back to Admin</a></div>';
				}
				?>
                <form method="post">
					<?php echo '<h3>Add Product</h3><br/>' ?>

                    <table align="center" style="margin-top:30px;padding-right:150px;" cellpadding="12px" cellspacing="12px">
                    	<tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">Category:</td>
                            <td align="left" style="width:50%;">
                            	<select name="category">
                            		<?php
										$categories = getCategories();
										for($t = 0; $t < count($categories); $t++){
											echo '<option value="'.$categories[$t]["Category_ID"].'" >'.ucfirst($categories[$t]["Category_Name"]).'</option>';
										}
									?>
                                </select>
                            </td>
                        </tr>
                        <tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">Title:</td>
                            <td align="left" style="width:50%;"><input type="text" name="title" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Code:</td>
                            <td align="left" style="width:50%;"><input type="text" name="code" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Image:</td>
                            <td align="left" style="width:50%;"><input type="text" name="image" size="35" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Description:</td>
                            <td align="left" style="width:50%;">
								<div style="font-size:11px;color:#999;">To add a new line enter: &lt;br&gt;</div>
								<textarea rows="5" cols="35" name="description" ></textarea>
							</td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Activate product discount:</td>
                            <td align="left" style="width:50%;">
                            <input type="checkbox" name="override" onclick="document.getElementById('the_discount').disabled=!this.checked;document.getElementById('the_pack').disabled=!this.checked;">
                        </td></tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Pack:</td>
                            <td align="left" style="width:50%;"><input id="the_pack" type="text" name="pack" size="35" disabled="disabled" value=""/></td>
                        </tr>
                         <tr align="right" style="width:50%">
                            <td style="width:50%;">Discount:</td>
                            <td align="left" style="width:50%;"><input id="the_discount" type="text" name="discount" size="35" disabled="disabled" value=""/></td>
                        </tr>
						<!--<tr align="right" style="width:50%">
                            <td style="width:50%;">Active:</td>
                            <td align="left" style="width:50%;">
							<input type="checkbox" name="active" checked>';
                        </td></tr>-->
                        <tr height="30px;">
                            <td>&nbsp;</td>
                            <td>
                            	<input type="submit" value="Add Product" style="padding:2px 10px;" />
								<a href="/admin">Cancel</a>
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
