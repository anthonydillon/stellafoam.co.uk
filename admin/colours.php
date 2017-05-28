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
$colourInfo = null;
if(isset($_GET["todo"])){
	$todo = $_GET["todo"];
}else if(isset($_POST["todo"])){
	$todo = $_POST["todo"];
}

$cols = null;
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
				<div style="float:left;"><a href="/stellafoam/admin" ><strong>Back</strong></a></div>
				<div style="float:right;"><a href="logout.php" ><strong>Logout</strong></a></div>
				<div style="clear:both;"></div>
				<table align="center"><tr><td align="center">
				<form name="input" action="" method="post">
					<?php
						switch($todo){
						case 'add':
							echo addColour($_POST["name"], $_POST["image"]);
							?>
                            <h3>Add Colour</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						case 'edit':
							echo editColour($_POST["id"],$_POST["name"], $_POST["image"]);
							?>
                            <h3>Add Colour</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						case 'display':
							$colourInfo = getColourInfo($cols);
							$process = true;
							?>
							<h3>Edit Colour</h3>
                            <input type="hidden" name="todo" value="edit" />
                            <input type="hidden" name="id" value="<?php echo $cols ?>" />
                            <?php
						break;
						case 'delete':
							echo deleteColour($cols);
							?>
                            <h3>Add Colour</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						default:
							?>
                            <h3>Add Colour</h3>
                            <input type="hidden" name="todo" value="add" />
                            <?php
						break;
						}
					$coloursList = getColours();
					?>
                        <table>
                            <tr><td>Name:</td><td><input type="text" name="name" value="<?php if($colourInfo != null){echo $colourInfo["Colour_Name"];} ?>" /></td></tr>
                            <tr><td>Image:</td><td><input type="text" name="image" value="<?php if($colourInfo != null){echo $colourInfo["Colour_Image"];} ?>" /></td></tr>
                        </table>
                        <input type="submit" value="Add Colour" />
                    </form>
					<?php
						if(!$process){
						?>
							<hr/>
							<form name="input" action="" method="post">
							<input type="hidden" name="todo" value="display" />
							<h3>Edit Colour</h3>
							Colour: <select name="cols">
							<option value="-1">Select Colour</option>
							<?php
								for($i = 0; $i < count($coloursList); $i++){
									if($prods != $coloursList[$i][0]){
										echo '<option value="'.$coloursList[$i][0].'">'.$coloursList[$i][1].'</option>';
									}else{
										echo '<option value="'.$coloursList[$i][0].'" selected="selected">'.$coloursList[$i][1].'</option>';
									}
								}
							?>
							</select>
							<br/>
							<input type="submit" value="Edit Colour" />
							</form>
							<hr/>
							<form name="input" action="" method="post">
							<input type="hidden" name="todo" value="delete" />
							<h3>Delete Colour</h3>
							Colour: <select name="cols">
							<option value="-1">Select Colour</option>
							<?php
								for($i = 0; $i < count($coloursList); $i++){
									if($prods != $coloursList[$i][0]){
										echo '<option value="'.$coloursList[$i][0].'">'.$coloursList[$i][1].'</option>';
									}else{
										echo '<option value="'.$coloursList[$i][0].'" selected="selected">'.$coloursList[$i][1].'</option>';
									}
								}
							?>
							</select>
							<br/>
							<input type="submit" value="Delete Colour" />
							</form>
					<?php
						}
					?>
				</td></tr></table>
			</div>
			<div id="footer">
				<div style="float:left;">Website by Anthony Dillon</div><div style="float:right;">&copy;2010 Stellafoam Ltd. All Rights Reserved.</div>
			</div>
		</div>
    </body>
</html>
