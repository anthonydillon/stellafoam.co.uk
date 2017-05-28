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
$todo = false;
$process = false;
if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}else if(isset($_GET["todo"])){
	$todo = $_GET["todo"];
}
$id = false;
$prods = false;
$cols = false;
$itemInfo = false;
if(isset($_GET["id"])){
	$id = $_GET["id"];
}else if(isset($_POST["id"])){
	$id = $_POST["id"];
}
if(isset($_POST["prods"])){
	if($_POST["prods"] != -1){
		$prods = $_POST["prods"];
	}
}
if(isset($_POST["cols"])){
	if($_POST["cols"] != -1){
		$cols = $_POST["cols"];
	}
}

?>
<html>
    <head>
    	<title>Stella Foam</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" />
    </head>
    <body>
    	<div id="container">
        	<div id="header">
        		<img src="http://www.stellafoam.co.uk/images/topheader.gif" width="767" height="115" />
                <div id="menu">
                	<a href="#">home</a>
                    <a href="#">about us</a>
                    <a href="/">products</a>
                    <a href="#">delivery</a>
                    <a href="#">trade counter</a>
                    <a href="#">contact us</a>
                    <a href="#">availablity charts</a>
                    <a href="#">special order</a>
                </div>
            </div>
            <div id="content">
				<div style="float:left;"><a href="/admin" ><strong>Back</strong></a></div>
				<div style="float:right;"><a href="logout.php" ><strong>Logout</strong></a></div>
				<div style="clear:both;"></div>
				<table align="center"><tr><td align="center">
				<form name="input" action="" method="post">
					<?php
					$coloursList = getColours();
					$productsList = getProducts();

					switch($todo){
						case 'edit':
							if($id && isset($_POST["name"]) && $_POST["name"] != '' && isset($_POST["sizes"]) && $prods && $cols){
								echo editItem($id,$_POST["name"], $_POST["sizes"], $prods, $cols);
							}
							?>
                            <h3>Add Product</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						case 'display':
							if($id){
								$itemInfo = getItemInfo($id);
								$process = true;
							}
							?>
							<h3>Edit Product</h3>
                            <input type="hidden" name="todo" value="edit" />
                            <input type="hidden" name="id" value="<?php echo $id ?>" />
                            <?php
						break;
						case 'delete':
							if($id){
								echo deleteItem($id);
							}
							?>
                            <h3>Add Product</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						default:
							if(isset($_POST["name"]) && $_POST["name"] != '' && isset($_POST["sizes"]) && $prods && $cols){
								echo addItem($_POST["name"], $_POST["sizes"], $prods, $cols);
							}
							?>
                            <h3>Add Item</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						}
					?>
					<table>
					<tr><td>Name:</td><td><input type="text" name="name" value="<?php echo ($itemInfo)?$itemInfo["Item_Title"]:''; ?>" /></td></tr>
					<tr><td>Sizes:</td><td><textarea name="sizes" rows="10" cols="30"><?php echo ($itemInfo)?$itemInfo["Item_Sizes"]:''; ?></textarea></td></tr>
					<tr><td>Product:</td><td>
					<select name="prods">
					<option value="-1">Select Product</option>
					<?php
					for($i = 0; $i < count($productsList); $i++){
						if($itemInfo["Product_ID"] != $productsList[$i][0]){
							echo '<option value="'.$productsList[$i][0].'">'.$productsList[$i][1].'</option>';
						}else{
							echo '<option value="'.$productsList[$i][0].'" selected="selected">'.$productsList[$i][1].'</option>';
						}
					}
					?>
					</select>
					<a href="/admin/products.php">Add Product</a>
					</td></tr>
					<tr><td>Colour:</td><td>
					<select name="cols">
					<option value="-1">Select Colour</option>
					<?php
					for($i = 0; $i < count($coloursList); $i++){
						if($itemInfo["Colour_ID"] != $coloursList[$i][0]){
							echo '<option value="'.$coloursList[$i][0].'">'.$coloursList[$i][1].'</option>';
						}else{
							echo '<option value="'.$coloursList[$i][0].'" selected="selected">'.$coloursList[$i][1].'</option>';
						}
					}
					?>
					</select>
					<a href="/admin/colours.php">Add Colour</a>
					</td></tr></table>
					<input type="submit" value="Submit" />
					</form>
				</td></tr></table>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
