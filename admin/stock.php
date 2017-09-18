<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
// ini_set('error_reporting', E_ALL);
// ini_set('error_display', '1');
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
$message = '';
$todo = false;
$productID = false;
$details  = false;
$category = 1;
if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}else if(isset($_GET["todo"])){
	$todo = $_GET["todo"];
}

if(isset($_GET["pid"])){
	$productID = $_GET["pid"];
}

if($todo){
	switch($todo){
		case 'addStock':
			if(isset($_POST["name"]) && isset($_POST["code"]) && isset($_POST["type"]) && isset($_POST["description"]) && isset($_POST["pack"]) && isset($_POST["discount"]) && isset($_POST["colour"]) && isset($_POST["order"])){
				$inStock = 1;
				$message = addStock($_POST["name"], $_POST["code"], $_POST["type"],$_POST["description"],$_POST["pack"],$_POST["discount"], $_POST["price"], $_POST["colour"], $inStock, $_POST["order"]);
			}else{
				$message = 'Error with product details';
			}
		break;
		case 'showEditStock':
			if(isset($_GET["id"])){
				$details = getStockInfo($_GET["id"]);
			}else{
				$message = 'Error with product details';
			}
		break;
		case 'editStock':
			if(isset($_POST["id"]) && isset($_POST["name"]) && isset($_POST["code"]) && isset($_POST["type"]) && isset($_POST["description"]) && isset($_POST["price"]) && isset($_POST["pack"]) && isset($_POST["discount"]) && isset($_POST["colour"]) && isset($_POST["order"])){
				$inStock  = 1;
				$message = editStock($_POST["id"], $_POST["name"], $_POST["code"], $_POST["type"],$_POST["description"],$_POST["pack"],$_POST["discount"], $_POST["price"], $_POST["colour"], $inStock, $_POST["order"]);
			}else{
				$message = 'Error with product details';
			}
		break;
		case 'deleteStock':
			if(isset($_GET["id"])){
				$message = deleteStock($_GET["id"]);
			}else{
				$message = 'Error with product details';
			}
		break;
	}
}
?>
<html>
    <head>
    	<title>Stella Foam - Admin - Stock</title>
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

                <?php
				if($message != ''){
					echo '<div style="margin-bottom:20px;">'.$message.'</div>';
				}
				if($productID || $details){
					if($details){
						$productID = $details["Product_ID"];
					}
				?>

                <form action="stock.php?pid= <?php echo $productID; ?>" method="post">
                <input type="hidden" name="colour" size="35" value="<?php echo $productID; ?>"/>
					<?php

					if($details){
						echo '<h3>Edit '.$details["Stock_Name"].'</h3>';
					}else{
						echo '<div style="float:left;"><a href="/admin/?todo=showEditProduct&id='.$productID.'">Back</a></div>';
						$productInfo = getProductInfo($productID);
						echo '<h3>Add Stock to '.$productInfo["Product_Title"].'</h3>';
					}
					?>

                    <table align="center" style="margin-top:30px;padding-right:150px;" cellpadding="12px" cellspacing="12px">
                        <tr align="right" style="margin-top:10px;">
                            <td style="width:50%;">Stock Name:</td>
                            <td align="left" style="width:50%;"><input type="text" name="name" size="35" value="<?php echo ($details)?$details["Stock_Name"]:''; ?>" /></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Stock Code:</td>
                            <td align="left" style="width:50%;"><input type="text" name="code" size="35" value="<?php echo ($details)?$details["Stock_Code"]:''; ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Type Name:</td>
                            <td align="left" style="width:50%;"><input type="text" name="type" size="35" value="<?php echo ($details)?$details["Type_Name"]:''; ?>"/></td>
                        </tr>
												<tr align="right" style="width:50%;">
                            <td style="width:50%;">Description:</td>
                            <td align="left" style="width:50%;">
															<div style="font-size:11px;color:#999;">To add a new line enter: &lt;br&gt;</div>
															<textarea rows="5" cols="35" name="description" ><?php echo $details["Stock_Description"]; ?></textarea>
														</td>
                        </tr>
                         <tr align="right" style="width:50%">
                            <td style="width:50%;">Pack:</td>
                            <td align="left" style="width:50%;"><input type="text" name="pack" size="35" value="<?php echo ($details)?$details["Pack"]:''; ?>"/></td>
                        </tr>
                         <tr align="right" style="width:50%">
                            <td style="width:50%;">Discount:</td>
                            <td align="left" style="width:50%;"><input type="text" name="discount" size="35" value="<?php echo ($details)?$details["Discount"]:''; ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Price:</td>
                            <td align="left" style="width:50%;"><input type="text" name="price" size="35" value="<?php echo ($details)?$details["Price"]:''; ?>"/></td>
                        </tr>
                        <tr align="right" style="width:50%">
                            <td style="width:50%;">Display Order:</td>
                            <td align="left" style="width:50%;"><input type="number" name="order" size="35" value="<?php echo ($details)?$details["Display_Order"]:'0'; ?>"/></td>
                        </tr>

                        <tr height="30px;">
                            <td>&nbsp;</td>
                            <td>
                            <?php
                            	if($details){
								?>	<input type="hidden" name="todo" value="editStock" />
									<input type="hidden" name="id" value="<?php echo $details["Stock_ID"]; ?>" />
                                    <input type="submit" value="Edit Stock" style="padding:2px 10px;" />
                                    <a href="/admin/stock.php?pid=<?php echo $productID; ?>">Cancel</a>
                                <?php
                                }else{
                                ?>
                                	<input type="hidden" name="todo" value="addStock" />
                                    <input type="submit" value="Add Stock" style="padding:2px 10px;" />
                                <?php
                                }
							?>
							</td>
                        </tr>
                    </table><br>
                </form>
                <?php
				if(!$details){
				?>
                <table style="margin-top:10px;margin-bottom:30px;" id="stock" width="80%">
					<tr><th width="20%">Stock Code</th><th width="35%">Stock Name</th><th width="35%">Stock Type</th><th width="10%">Pack</th><th width="10%">Discount</th><th width="10%">Price</th><th width="10%">Edit</th><th width="10%">Delete</th></tr>
					<?php
						$productsStock = getProductsStock( $productID );
						for($i = 0; $i < count($productsStock); $i++){
							echo '
							<tr><td>'.$productsStock[$i]["Stock_Code"].'</td>
							<td>'.$productsStock[$i]["Stock_Name"].'</td>
							<td>'.$productsStock[$i]["Type_Name"].'</td>
							<td>'.$productsStock[$i]["Pack"].'</td>
							<td>'.$productsStock[$i]["Discount"].'</td>
							<td>'.$productsStock[$i]["Price"].'</td>
							<td><a href="?todo=showEditStock&id='.$productsStock[$i]["Stock_ID"].'"><img src="edit.png" border="0"/></a></td>
							<td><a href="?todo=deleteStock&id='.$productsStock[$i]["Stock_ID"].'&pid='.$productID.'"><img src="delete.png" border="0"/></a></td></tr>
							';
						}
					?>
				</table>

				<?php
				}
				}else{
                	echo '<h3>Error</h3><br/><br/><a href="/admin">Back</a>';
				}
				?>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
