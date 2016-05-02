<?php
session_start();
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
$category = 1;
if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}else if(isset($_GET["todo"])){
	$todo = $_GET["todo"];
}

if(isset($_POST["category"])){
	$category = $_POST["category"];
	$_SESSION['category'] = $category;
}else if(isset($_SESSION['category'])){
	$category = $_SESSION['category'];
}

if($todo){
	switch($todo){
		case 'addProduct':
			if(isset($_POST["title"]) && isset($_POST["code"]) && isset($_POST["image"]) && isset($_POST["description"]) && isset($_POST["override"]) && isset($_POST["pack"]) && isset($_POST["discount"])){
				$message = addProduct($_POST["title"], $_POST["code"], $_POST["image"], $_POST["description"], $_POST["override"], $_POST["pack"], $_POST["discount"] );
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
			if(isset($_POST["id"]) && isset($_POST["title"]) && isset($_POST["code"]) && isset($_POST["image"]) && isset($_POST["description"])){
				$override = 0;
				if(isset($_POST["override"])){
					$override  = 1;
					$pack = $_POST["pack"];
					$discount = $_POST["discount"];
				}else{
					$discount = 0;
					$pack = 0;
				}
				$message = editProduct($_POST["id"], $_POST["title"], $_POST["code"], $_POST["image"], $_POST["description"],$override, $pack, $discount);
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
		case 'editNews':
			if(isset($_POST["news"])){
				$message = editNews($_POST["news"]);
			}else{
				$message = 'Error editing the News';
			}
		break;
	}
}
?>
<html>
    <head>
    	<title>Stella Foam - Admin</title>
        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="../style.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../navigation.css" media="all" />
		<link rel="stylesheet" type="text/css" href="../typography_core.css" media="all" />
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
		dt{
			background: #fff url(subnav-title-bg.jpg) 0 1px no-repeat;
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
					echo '<div style="margin-bottom:20px;">'.$message.'</div>';
				}

				if($details){
				?>
                <form method="post">
					<input type="hidden" name="todo" value="editProduct" />
					<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
					<?php echo '<h3>Edit '.$details["Product_Title"].'</h3><br/>
					<a href="stock.php?pid='.$details["Product_ID"].'">Edit Stock</a>'; ?>

                    <table align="center" style="margin-top:30px;padding-right:150px;" cellpadding="12px" cellspacing="12px">
                        <tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">Title:</td>
                            <td align="left" style="width:50%;"><input type="text" name="title" size="35" value="<?php echo $details["Product_Title"]; ?>" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Code:</td>
                            <td align="left" style="width:50%;"><input type="text" name="code" size="35" value="<?php echo $details["Product_Code"]; ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Image:</td>
                            <td align="left" style="width:50%;"><input type="text" name="image" size="35" value="<?php echo $details["Product_Image"]; ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%;">
                            <td style="width:50%;">Description:</td>
                            <td align="left" style="width:50%;">
								<div style="font-size:11px;color:#999;">To add a new line enter: &lt;br&gt;</div>
								<textarea rows="5" cols="35" name="description" ><?php echo $details["Product_Description"]; ?></textarea>
							</td>
                        </tr>
						<tr align="right" style="width:50%">
                            <td style="width:50%;">Activate product discount:</td>
                            <td align="left" style="width:50%;">
                            <input type="checkbox" name="override" <?php echo ($details["Override_Discount"] == '1')?'checked':''; ?> onclick="document.getElementById('the_discount').disabled=!this.checked;document.getElementById('the_pack').disabled=!this.checked;">
                        </td></tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Pack:</td>
                            <td align="left" style="width:50%;"><input id="the_pack" type="text" name="pack" size="35" <?php echo ($details["Override_Discount"] == '0')?'disabled="disabled"':''; ?> value="<?php echo ($details)?$details["Pack"]:''; ?>"/></td>
                        </tr>
                         <tr align="right" style="width:50%">
                            <td style="width:50%;">Discount:</td>
                            <td align="left" style="width:50%;"><input id="the_discount" type="text" name="discount" size="35" <?php echo ($details["Override_Discount"] == '0')?'disabled="disabled"':''; ?> value="<?php echo ($details)?$details["Discount"]:''; ?>"/></td>
                        </tr>

                        <tr height="30px;">
                            <td>&nbsp;</td>
                            <td>
                            	<input type="submit" value="Edit Colour" style="padding:2px 10px;" />
								<a href="/admin">Cancel</a>
							</td>
                        </tr>
                    </table><br>
                </form>
				<?php
				}else{
				$categories = getCategories();
				?>
                <h3>Admin</h3>
				<br/>
                <form method="post">
                	<input type="hidden" name="todo" value="editNews" />
                	<input type="text" name="news" size="70" value="<?php echo get_news(); ?>"/>
                    <input type="submit" value="Edit Latest News" style="padding:2px 10px;" />
                </form>
                <br/>
                <div style="width:70%; margin:0px auto; text-align:left;">
                <div style="float:right; width:75px;padding-top: 8px;">
                	<a href="products.php">Add Product</a>
                </div>
				<?php
				if(count($categories) > 0){
					echo '<form name="input" action="/admin/" method="post" style="margin-top:30px;margin-bottom:10px; width:400px;"> Sort by Category: <select name="category">';
					for($t = 0; $t < count($categories); $t++){
						if($category == $categories[$t]["Category_ID"]){
							echo '<option value="'.$categories[$t]["Category_ID"].'" selected >'.ucfirst($categories[$t]["Category_Name"]).'</option>';
						}else{
							echo '<option value="'.$categories[$t]["Category_ID"].'" >'.ucfirst($categories[$t]["Category_Name"]).'</option>';
						}
					}
					echo '</select> <input type="submit" value="Go" /> </form>';
				}
				?>

				</div>

				<table style="margin-bottom:30px;" id="stock" width="70%" style="margin-top:30px;">
					<tr><th width="10%">ID</th><th width="70%">Colours</th><th width="10%" style="text-align:center;">Edit</th><th width="10%" style="text-align:center;">Delete</th></tr>
					<?php
						$products = getProducts( $category );
						for($i = 0; $i < count($products); $i++){
							echo '
							<tr><td>'.$products[$i]["Product_ID"].'</td>
							<td>'.$products[$i]["Product_Title"].'</td>
							<td style="text-align:center;"><a href="?todo=showEditProduct&id='.$products[$i]["Product_ID"].'"><img src="edit.png" border="0"/></a></td>
							<td style="text-align:center;"><a href="?todo=deleteProduct&id='.$products[$i]["Product_ID"].'" onClick="javascript: return confirm(\'Are you sure you want to delete '.$products[$i]["Product_Title"].'?\');"><img src="delete.png" border="0"/></a></td>
							';
						}
					?>
				</table>
				<?php
				}
				?>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
