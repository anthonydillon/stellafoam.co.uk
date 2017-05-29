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
			header('Location: /stellafoam/admin/login.php');
		}
	}else{
		header('Location: /stellafoam/admin/login.php');
	}
}else{
	header('Location: /stellafoam/admin/login.php');
}
$message = '';
$todo = false;
$details = false;
if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}else if(isset($_GET["todo"])){
	$todo = $_GET["todo"];
}
if($todo){
	switch($todo){
		case 'addProduct':
			if(isset($_POST["title"]) && isset($_POST["code"]) && isset($_POST["image"]) && isset($_POST["description"]) && isset($_POST["category"]) && isset($_POST["subcat"])&& isset($_POST["active"])){
				$message = addProduct($_POST["title"], $_POST["code"], $_POST["image"], $_POST["description"], $_POST["category"], $_POST["subcat"], $_POST["active"]);
			}else{
				$message = 'Error with product details';
			}
		break;
		case 'showEditProduct':
			if(isset($_GET["id"])){
				$details = getProductInfo($_GET["id"]);
			}else{
				$message = 'Error with product details';
			}
		break;
		case 'editProduct':
			if(isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["code"]) && isset($_POST["image"]) && isset($_POST["description"]) && isset($_POST["category"]) && isset($_POST["subcat"])){
				$active = 0;
				if( isset($_POST["active"])){
					$active  = 1;
				}
				$message = editProduct($_POST["id"], $_POST["title"], $_POST["code"], $_POST["image"], $_POST["description"], $_POST["category"], $_POST["subcat"],$active);
			}else{
				$message = 'Error with product details';
			}
		break;
		case 'deleteProduct':
			if(isset($_GET["id"])){
				$message = deleteProduct($_GET["id"]);
			}else{
				$message = 'Error with product details';
			}
		break;
	}
}
?>
<html>
    <head>
    	<title>Stella Foam - Admin</title>
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
		h3 {
			font-size: 19px;
		}
		</style>
    </head>
    <body id="build">
    	<div id="pageWrapper">
    		<div style="width:190px;float:right"></div>
        	<?php
				include '_includes/header.php';
			?>
            <div id="content">
				<div style="clear:both;"></div>
                <?php
					if($message != ''){
						echo '<div style="margin-bottom:20px;">'.$message.'</div>';
					}
				?>
                <form method="post">
					<?php
						if($details){
							echo '<input type="hidden" name="todo" value="editProduct" />';
							echo '<input type="hidden" name="id" value="'.$_GET["id"].'" />';
						}else{
							echo '<input type="hidden" name="todo" value="addProduct" />';
						}
					?>
					<h3>
					<?php
						echo ($details)?'Edit '.$details["Product_Title"]:'Add Product';
                    ?>
					</h3>
                    <table align="center" style="margin-top:30px;padding-right:150px;" cellpadding="12px" cellspacing="12px">
                        <tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">Title:</td>
                            <td align="left" style="width:50%;"><input type="text" name="title" size="35" value="<?php echo ($details)?$details["Product_Title"]:'' ?>" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Code:</td>
                            <td align="left" style="width:50%;"><input type="text" name="code" size="35" value="<?php echo ($details)?$details["Product_Code"]:'' ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Image:</td>
                            <td align="left" style="width:50%;"><input type="text" name="image" size="35" value="<?php echo ($details)?$details["Product_Image"]:'' ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Description:</td>
                            <td align="left" style="width:50%;"><textarea rows="5" cols="35" name="description" ><?php echo ($details)?$details["Product_Description"]:'' ?></textarea></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Category:</td>
                            <td align="left" style="width:50%;">
                                <select name="category" style="width:250px" >
                                	<option value="-1">Select Category</option>
                                    <?php
										$categories = getCategories( );
										for($i = 0; $i < count($categories); $i++){
											if($details["Category_ID"] == $categories[$i]["Category_ID"]){
												echo '<option value="'.$categories[$i]["Category_ID"].'" SELECTED >'.ucfirst($categories[$i]["Category_Name"]).'</option>';
											}else{
												echo '<option value="'.$categories[$i]["Category_ID"].'" >'.ucfirst($categories[$i]["Category_Name"]).'</option>';
											}
										}
									?>
                                </select>
                            </td>
                        </tr>
						<tr align="right" style="width:50%">
                            <td style="width:50%;">Subcategory Title:</td>
                            <td align="left" style="width:50%;"><input type="text" name="subcat" size="35" value="<?php echo ($details)?$details["Subcategory_Title"]:'' ?>"/></td>
                        </tr>
						<tr align="right" style="width:50%">
                            <td style="width:50%;">Active:</td>
                            <td align="left" style="width:50%;">
							<?php
								if($details){
									if($details["Product_Active"] == '1'){
										echo '<input type="checkbox" name="active" checked>';
									}else{
										echo '<input type="checkbox" name="active">';
										}
								}else{
									echo '<input type="checkbox" name="active" checked>';
								}
								?>
                        </td></tr>
                        <tr height="30px;">
                            <td>&nbsp;</td>
                            <td><input type="submit" value="<?php echo ($details)?'Edit Product':'Add Product' ?>" style="padding:2px 10px;" />
								<?php
									if($details){
										echo '<a href="/stellafoam/admin">Cancel</a>';
										//echo '<input type="submit" value="Cancel" style="padding:2px 10px;" onclick="javascript:window.location=\'/\'"/>';
									}
								?>
							</td>
                        </tr>
                    </table><br>
                </form>
				<?php if(!$details){ ?>
				<table style="margin-top:30px;margin-bottom:30px;" id="stock" width="70%">
					<tr><th width="80%">Product</th><th width="10%">Edit</th></tr>
					<?php
						$products = getProducts( );
						for($i = 0; $i < count($products); $i++){
							echo '
							<tr><td>'.$products[$i]["Product_Title"].'</td>
							<td><a href="?todo=showEditProduct&id='.$products[$i]["Product_ID"].'"><img src="edit.png" border="0"/></s></td>
							';
						}
					?>
				</table>
				<?php } ?>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
