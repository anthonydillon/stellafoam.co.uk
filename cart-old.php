<?php
include("functions.php");

if(isset($_GET["did"]) && isset($_COOKIE["stellafoamorder"])){
	$orderList = explode('|',$_COOKIE["stellafoamorder"]);
	$orders = '';
	$sep = '';
	for($i = 0; $i < count($orderList); $i++){
		if($i != $_GET["did"]){
			$orders .= $sep.$orderList[$i];
			$sep = '|';
		}
		$expire = time()+60*60*24;
		setcookie("stellafoamorder", $orders, $expire);
		header('Location: /cart.php');
	}
}
if(isset($_GET["clear"])){
	setcookie('stellafoamorder', '', time()+1);
	header('Location: /cart.php');
}
if(isset($_GET["sent"])){
	setcookie('stellafoamorder', '', time()+1);
	if(isset($_GET["clear"])){
		header('Location: /cart.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Order List</title>
	<?php
		include  'meta.php';
    ?>
    <script language="Javascript1.2">
	  function gotoEmail() {
		var error = false;
		if ( document.personalDetails.name.value == "" ){
			document.getElementById('errorMessage').style.visibility = "visible";
			document.getElementById('nameField').style.color = "red";
			error = true;
		}else{
			document.getElementById('nameField').style.color = "#494C4E";
		}
		if ( document.personalDetails.company.value == "" ){
			document.getElementById('errorMessage').style.visibility = "visible";
			document.getElementById('companyField').style.color = "red";
			error = true;
		}else{
			document.getElementById('companyField').style.color = "#494C4E";
		}
		if ( document.personalDetails.telephone.value == "" ){
			document.getElementById('errorMessage').style.visibility = "visible";
			document.getElementById('telephoneField').style.color = "red";
			error = true;
		}else{
			document.getElementById('telephoneField').style.color = "#494C4E";
		}
		if(!error){
			document.personalDetails.todo.value = 'send';
			document.personalDetails.submit();
		}
	  }

	  function gotoPrint() {
		var error = false;
		if ( document.personalDetails.name.value == "" ){
			document.getElementById('errorMessage').style.visibility = "visible";
			document.getElementById('nameField').style.color = "red";
			error = true;
		}else{
			document.getElementById('nameField').style.color = "#494C4E";
		}
		if ( document.personalDetails.company.value == "" ){
			document.getElementById('errorMessage').style.visibility = "visible";
			document.getElementById('companyField').style.color = "red";
			error = true;
		}else{
			document.getElementById('companyField').style.color = "#494C4E";
		}
		if ( document.personalDetails.telephone.value == "" ){
			document.getElementById('errorMessage').style.visibility = "visible";
			document.getElementById('telephoneField').style.color = "red";
			error = true;
		}else{
			document.getElementById('telephoneField').style.color = "#494C4E";
		}
		if(!error){
			document.personalDetails.todo.value = 'print';
			document.personalDetails.submit();
		}
	  }
	  //-->
	</script>
	<script type="text/javascript">
		function showConfirm() {
			var r=confirm("Confirm Call-back?");
			if (r==true){
				gotoEmail();
			}else{
				return false;
			}
		}
	</script>
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Order List
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"]) && !isset($_GET["sent"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View List</a>
        	</div>
            <?php
				include 'crumbuser.php';
			?>
        </div>
        <div id="content">
        	<?php
				if(!$loggedIn){
					echo '<div id="login"><a href="account.php">Login</a></div>';
				}
			?>
        	<div id="title" style="margin-top:20px;">Order List</div>
            <?php
				if(isset($_GET["sent"])){
					echo '<div id="errorMessage" style="font-weight:bold; font-size:16px;margin-top:30px;">
						Your Order Form has been sent successfully<br/><br/>
						<a href="/">Continue Shopping<a/></div>';

				}else if(isset($_GET["notsent"])){
					echo '<div id="errorMessage" style="font-weight:bold; font-size:16px;margin-top:30px;">There was an problem sending your message, please try again later</div>';
				}
			 	if($amount > 0){
			 ?>
            <div class="notice">
       			Please add the products you require to your order list, via the individual colour / product pages. This can then either be e-mailed to us (Customers with a log in only) or brought in, enabling faster collection for your materials.
            </div>
            <div class="notice">
            	<div style="float:left;">Please Note:</div><div style="float:right;width:370px;">Only trade customers with a Stellafoam account can use the on-line ordering service. Once you have submitted your list one of our sales team will call you back as soon as possible to confirm your order and answer any queries you may have.</div>
                <div style="clear:both;"></div>
            </div>
            <div id="errorMessage" style="visibility:hidden; color:#F00; font-weight:bold; font-size:16px;margin-top:10px;margin-bottom:-10px;">Please enter all required details *</div>
            <?php

			if($loggedIn){
				$userDetails = getUserDetails($user[1]);
			}
			?>

            <form name="personalDetails" action="printable.php" method="post">
            <input type="hidden" name="todo" />
            <table id="stock" style="margin-top:20px;margin-bottom:10px;text-align:left;">
            	<tr><th width="150px" id="nameField">Name: *</th><td width="280px"><input type="text" name="name" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[0].'"':''; ?> /></td></tr>
                <tr><th id="companyField">Company Name: *</th><td><input type="text" name="company" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[1].'"':''; ?> /></td></tr>
                <tr><th style="vertical-align:text-top;" id="addressField">Invoice Address:</th><td><textarea name="address" rows="4" cols="33"><?php echo ($loggedIn)?$userDetails[2]:''; ?></textarea></td></tr>
                <tr><th style="vertical-align:text-top;" id="deliveryAddressField">Delivery Address:</th><td><textarea name="deliveryaddress" rows="4" cols="33"><?php echo ($loggedIn)?$userDetails[5]:''; ?></textarea></td></tr>
                <tr><th id="telephoneField">Telephone: *</th><td><input type="text" name="telephone" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[3].'"':''; ?> /></td></tr>
                <tr><th id="emailField">Email:</th><td><input type="text" name="email" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[4].'"':''; ?> /></td></tr>
				<tr><th style="vertical-align:text-top;">Additional Information:</th><td><textarea name="additional" rows="4" cols="33"></textarea></td></tr>
             </table>
				<?php
					if($loggedIn){
				?>
				<span>
                    <a href="#" onclick="showConfirm();" title="Send Order Form">
                        <img src="email_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Email this
                    </a>
                </span>
				<?php
					}
				?>
                <span style="margin-left:50px;">
                	<a href="#" onclick="gotoPrint();" title="Print Order Form">
                    	<img src="print_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Printable version
                    </a>
                </span>
             </form>

             <div style="margin-top:30px;float:right;margin-right:33px;margin-bottom:10px;width:100px;background-color:#DED6D4;border:1px solid #999;padding:5px;"><a href="?clear" title="Clear All Products">Clear All Products</a></div>
             <div style="clear:both;"></div>
	             <table id="stock" width="93%" style="text-align:left;">
	                <tr><th>Stock Code</th><th>Category/Colour </th><th>Stock Description</th><th>Quantity</th><th width="50px">Delete</th></tr>
	                <?php
						if(isset($_COOKIE["stellafoamorder"])){
							$orderList = explode('|',$_COOKIE["stellafoamorder"]);
						}
						for($i = 0; $i < count($orderList); $i++){
							$orderDetail = explode('-',$orderList[$i]);
							$info = getStockInfo($orderDetail[0]);
							$category = get_product($info["Product_ID"]);
							echo '<tr>
									<td>'.$info["Stock_Code"].'</td>
									<td>'.$category["Product_Title"].'</td>
									<td>'.$info["Stock_Name"].'</td>
									<td>'.$orderDetail[1].'</td>
									<td><a href="?did='.$i.'" title="Delete Product"><img src="delete_icon.gif" border="0"/></a></td>
								  </tr>';
						}

					?>
	            </table>
            <?php
				}else{
					if(!isset($_GET["sent"]) && !isset($_GET["notsent"])){
						echo '<br><br><h3 align="center">No Products in your Order List</h3>';
					}
				}
			?>
		</div>
        <?php
			include  'footer.php';
    	?>
    </div>
	<?php
		include  'copyright.php';
	?>
</body>
</html>