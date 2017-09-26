<?php
include("functions.php");
define('sessionlen',20000);

$sid = false;
$qty = false;
$added = false;
if(isset($_GET["sid"]) && isset($_GET["qty"]) && $_GET["sid"] != '' && $_GET["qty"] != ''){
	$sid = $_GET["sid"];
	$qty = $_GET["qty"];
	$expire = time()+60*60*24;
	$existing = '';

	if(isset($_COOKIE["stellafoamorder"])){
		$orderList = explode('|',$_COOKIE["stellafoamorder"]);
		$readding = false;
		for($i = 0; $i < count($orderList); $i++){
			$orderDetail = explode('-',$orderList[$i]);
			if($orderDetail[0] == $sid){
				echo $orderDetail[1] + ' += ' + $qty;
				$orderDetail[1] += $qty;
				$orderList[$i] = implode('-',$orderDetail );
				$readding = true;
			}
		}
		$existing = implode('|',$orderList);
	}

	if($readding){
		setcookie("stellafoamorder", $existing, $expire);
	}else{
		$existing .= ($existing != '')?'|':'';
		setcookie("stellafoamorder", $existing.$sid.'-'.$qty, $expire);
	}
	$added = $existing.$sid.'-'.$qty;
}

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
		include '_includes/meta.php';
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
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script type="text/javascript">
	$( document ).ready(function() {
		$('.add-another').click(function(e){
			e.preventDefault();
			$('#stock tbody tr.add-row').hide().parent().append('<tr class="new-item"><td colspan="8">Stock code: <input type="text" placeholder="Stock code" name="sid" /></td></tr>');
			$('#stock tbody .new-item input[type="text"]').focus().keypress(function( e ) {
				if ( e.which == 13 ) {
					e.preventDefault();
					var input = $(this).val().replace('&', '%26amp;');
					if (input.indexOf("KMS") === 0) {
						$.getJSON( "/get-item.php?q="+input+"&design=1", function( data ) {
							if(data == ''){
								$( ".new-item td" ).html( '<span>No results</span>' );
							}else{
								var component = data[0];
								var design = data[1];
								var id = component.Stock_Code;
								var price = component.Price;
								var colour = design.Stock_Name;
								var description = component.Stock_Name;
								if (description.indexOf('#') != -1) {
										description = description.substring(description.indexOf('#') + 1);
								}

								$( ".new-item" ).html(' <td>'+id+'</td><td>'+colour+'</td><td>'+description+'</td><td>&#163;'+price+'</td><td><form action="/cart.php" method="get"><input type="text" class="new-item-qty" style="width:40px" name="qty" /><input type="hidden" name="sid" value="'+component.Stock_ID+'" /></form></td><td>'+component.Pack+'</td><td class="new-item-quantity"></td><td align="center"><a title="Delete Product" href=""><img border="0" src="/images/icons//images/icons/delete_icon.gif"></a></td>');
								$('.new-item-qty').focus().on('keyup', function(e){
									this.value = this.value.replace(/[^0-9\.]/g,'');
									if ( e.which == 13 ) {
										$('.new-item-quantity form').submit();
									}else{
										$('.new-item-quantity').html('&#163;'+($(this).val() * price).toFixed(2));
									}
								});
							}
						});
					} else {
						$.getJSON( "/get-item.php?q="+input, function( data ) {
							if(data == ''){
								$( ".new-item td" ).html( '<span>No results</span>' );
							}else{
								var price = data.Price;
								var description = data.Stock_Name;
								if (description.indexOf('#') != -1) {
										description = description.substring(description.indexOf('#') + 1);
								}

								$( ".new-item" ).html(' <td>'+data['Stock_Code']+'</td><td>'+data['Product_Title']+'</td><td>'+description+'</td><td>&#163;'+price+'</td><td><form action="/cart.php" method="get"><input type="text" class="new-item-qty" style="width:40px" name="qty" /><input type="hidden" name="sid" value="'+data.Stock_ID+'" /></form></td><td>'+data.Pack+'</td><td class="new-item-quantity"></td><td align="center"><a title="Delete Product" href=""><img border="0" src="/images/icons//images/icons/delete_icon.gif"></a></td>');
								$('.new-item-qty').focus().on('keyup', function(e){
									this.value = this.value.replace(/[^0-9\.]/g,'');
									if ( e.which == 13 ) {
										$('.new-item-quantity form').submit();
									}else{
										$('.new-item-quantity').html('&#163;'+($(this).val() * price).toFixed(2));
									}
								});
							}
						});
					}
				}
			});
		});
	});
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
	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/typography_core.css" media="all" />
    <?php
		include '_includes/analytics.php';
    ?>
</head>
<body id="build">
	<div id="pageWrapper">
        <div style="width:190px;float:right"></div>
        <?php
			include '_includes/header.php';
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
                <a href="/cart.php">View basket</a>
        	</div>
            <?php
				include '_includes/crumbuser.php';
			?>
        </div>
        <div id="content">
        	<?php
				if(!$loggedIn){
					echo '<div id= "login"><a href="account.php">Login</a></div>';
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
				<?php
					if($loggedIn) {
				?>
				<form name="personalDetails" action="printable-new.php" method="post">
				<?php
					}else{
				?>
				<form name="personalDetails" action="printable.php" method="post">
				<?php
					}
				?>
				<input type="hidden" name="todo" />
				<table id="details" style="margin-top:20px;margin-bottom:10px;text-align:left;">
					<tr><th width="150px" id="nameField">Name: *</th><td width="280px"><input type="text" name="name" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[0].'"':''; ?> /></td></tr>
					<tr><th id="companyField">Company Name: *</th><td><input type="text" name="company" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[1].'"':''; ?> /></td></tr>
					<tr><th style="vertical-align:text-top;" id="addressField">Invoice Address:</th><td><textarea name="address" rows="4" cols="33"><?php echo ($loggedIn)?$userDetails[2]:''; ?></textarea></td></tr>
					<tr><th style="vertical-align:text-top;" id="deliveryAddressField">Delivery Address:</th><td><textarea name="deliveryaddress" rows="4" cols="33"><?php echo ($loggedIn)?$userDetails[5]:''; ?></textarea></td></tr>
					<tr><th id="telephoneField">Telephone: *</th><td><input type="text" name="telephone" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[3].'"':''; ?> /></td></tr>
					<tr><th id="emailField">Email:</th><td><input type="text" name="email" size="38" <?php echo ($loggedIn)?'value="'.$userDetails[4].'"':''; ?> /></td></tr>
					<tr><th style="vertical-align:text-top;">Additional Information:</th><td><textarea name="additional" rows="4" cols="33"></textarea></td></tr>
        </table>
				<?php
					if($loggedIn) {
				?>
				<span>
					<a href="#" onclick="showConfirm();" title="Send Order Form">
						<img src="/images/icons/email_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Email this
					</a>
				</span>
				<?php
					}
				?>
                <span style="margin-left:50px;">
                	<a href="#" onclick="gotoPrint();" title="Print Order Form">
                    	<img src="/images/icons/print_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Printable version
                    </a>
                </span>
             </form>

						 <div style="margin-top:30px;float:left;margin-left:33px;margin-bottom:10px;background-color:#DED6D4;border:1px solid #999;padding:5px;"><a href="/kitchens-made-simple.php" title="Kitchens Made Simple">Kitchens Made Simple</a></div>

             <div style="margin-top:30px;float:right;margin-right:33px;margin-bottom:10px;width:100px;background-color:#DED6D4;border:1px solid #999;padding:5px;"><a href="?clear" title="Clear All Products">Clear All Products</a></div>
             <div style="clear:both;"></div>
			 <div class="notice" style="margin-top: -40px; margin-bottom: 10px;">Certain goods are subject to quantity discounts. These are activated by ordering the pack amount, greater, or a specific mixed good total (see drawer boxes).</div>
			 	<?php
					if($loggedIn) {
				?>
			 	<table id="stock" width="93%" style="text-align:left;">
			 		<thead>
						<tr>
							<th>Stock Code</th>
							<th>Category/Colour</th>
							<th>Stock Description</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Pack</th>
							<th>Total</th>
							<th width="50px">Delete</th>
						</tr>
					</thead>
					<tbody>
					<?php
						if($added) {
							$orderList = explode('|',$added);
							echo '<script>window.location.replace("/cart.php");</script>';
						}else{
							if(isset($_COOKIE["stellafoamorder"])){
								$orderList = explode('|',$_COOKIE["stellafoamorder"]);
							}
						}
						$total = 0;
						$originial = 0;
						$saving = 0;
						$overrideArray = array();
						for($i = 0; $i < count($orderList); $i++) {
							$orderDetail = explode('-',$orderList[$i]);
							$stockID = $orderDetail[0];
							if(strpos($stockID, 'KMS') === 0) {
								$splitItem = explode('~',$orderList[$i]);
								$stockID = $splitItem[0];
								$splitItem = explode('-',$splitItem[1]);
								$colour = $splitItem[0];
								$quantity = $splitItem[1];
								$info = getStockInfoString($stockID);
								$pack = ($info["Pack"] != 0)?$info["Pack"]:'&ndash;';
								$total = $info["Price"] * $quantity;
								$originial += $info["Price"] * $quantity;
								$grandtotal += $total;
								$stockDesc = $info["Stock_Name"];
								echo '<tr>
									<td>'.$stockID.'</td>
									<td>'.$colour.'</td>
									<td>'.$stockDesc.'</td>
									<td>&pound;'.number_format($info["Price"], 2).'</td>
									<td>'.$quantity.'</td>
									<td>'.$pack.'</td>
									<td>&pound;'.number_format($total, 2).'</td>
									<td align="center"><a href="?did='.$i.'" title="Delete Product"><img src="/images/icons/delete_icon.gif" border="0"/></a></td>
								  </tr>';
							}else{
								$info = getStockInfo($orderDetail[0]);
								$category = get_product($info["Product_ID"]);
								if($category['Override_Discount'] == '1') {
									$overrideArray[] = $orderDetail;
								}else{

									$discount = ($info["Discount"] != 0)?$info["Discount"].'&#37;':'&ndash;';
									$discountDisplay = '';
									$pack = ($info["Pack"] != 0)?$info["Pack"]:'&ndash;';
									if($discount != '&ndash;' && $pack != '&ndash;'){
										if($orderDetail[1] < $pack){
											$total = ($info["Price"] * $orderDetail[1]);
										}else{
											$total = ($info["Price"] * $orderDetail[1]) * (1 - ($discount / 100));
											$saving += ($info["Price"] * $orderDetail[1]) * ($discount / 100);
											$discountDisplay = ' <span style="color:green">('. $discount .')</span>';
										}
									}else{
										$total = $info["Price"] * $orderDetail[1];
									}
									$originial += $info["Price"] * $orderDetail[1];
									$grandtotal += $total;

									echo '<tr>
											<td>'.$info["Stock_Code"].'</td>
											<td>'.$category["Product_Title"].'</td>
											<td>'.$info["Stock_Name"].'</td>
											<td>&pound;'.number_format($info["Price"], 2).'</td>
											<td>'.$orderDetail[1].'</td>
											<td>'.$pack.'</td>
											<td>&pound;'.number_format($total, 2) . $discountDisplay.'</td>
											<td align="center"><a href="?did='.$i.'" title="Delete Product"><img src="/images/icons/delete_icon.gif" border="0"/></a></td>
										  </tr>';
								}
							}

						}
						$spanned = false;
						$count = count($overrideArray);
						$spanTotalQty = 0;
						$discounted = false;
						for($i = 0; $i < $count; $i++) {
							$orderDetail = $overrideArray[$i];
							$info = getStockInfo($orderDetail[0]);
							$category = get_product($info["Product_ID"]);
							$spanTotalQty += $orderDetail[1];
							if($spanTotalQty >= $category["Pack"]) {
								$discounted = true;
							}
						}
						for($i = 0; $i < $count; $i++) {
							$orderDetail = $overrideArray[$i];
							$info = getStockInfo($orderDetail[0]);
							$category = get_product($info["Product_ID"]);
							$discount = ($category['Pack'] != 0)?$category["Discount"].'&#37;':'&ndash;';
							$discountDisplay = '';
							$pack = ($category["Pack"] != 0)?$category["Pack"]:'&ndash;';
							if($discount != '&ndash;' && $pack != '&ndash;'){
								if($discounted){
									$total = ($info["Price"] * $orderDetail[1]) * (1 - ($discount / 100));
									$saving += ($info["Price"] * $orderDetail[1]) * ($discount / 100);
									$discountDisplay = ' <span style="color:green">('. $discount .')</span>';
								}else{
									$total = ($info["Price"] * $orderDetail[1]);
								}
							}else{
								$total = $info["Price"] * $orderDetail[1];
							}
							$originial += $info["Price"] * $orderDetail[1];
							$grandtotal += $total;

							$description = $info["Stock_Name"];
							if (strpos($description,'#') !== false) {
								$description = substr($description, strpos($description,'#') + 1);
							}
							echo '<tr>
									<td>'.$info["Stock_Code"].'</td>
									<td>'.$category["Product_Title"].'</td>
									<td>'.$description.'</td>
									<td>&pound;'.number_format($info["Price"], 2).'</td>
									<td>'.$orderDetail[1].'</td>';
							if(!$spanned) {
								$spanned = true;
								echo '<td rowspan="'.$count.'">'.$pack.'</td>';
							}
							echo '
									<td>&pound;'.number_format($total, 2) . $discountDisplay.'</td>
									<td align="center"><a href="?did='.$i.'" title="Delete Product"><img src="/images/icons/delete_icon.gif" border="0"/></a></td>
								  </tr>';
						}
					?>
					<tr class="add-row">
						<td><a href="#" class="add-another">+ Add with stock code</a></td>
					</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Total:</th>
							<td><?php echo '&pound;'.number_format($originial, 2); ?></td>
							<td style="border:0;"></td>
						</tr>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Pack Saving:</th>
							<td><?php echo '&pound;'.number_format($saving, 2); ?></td>
							<td style="border:0;"></td>
						</tr>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Total Ex VAT:</th>
							<td><?php echo '&pound;'.number_format($grandtotal, 2); ?></td>
							<td style="border:0;"></td>
						</tr>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Inc VAT:</th>
							<td><?php echo '&pound;'.number_format($grandtotal * 1.2, 2); ?></td>
							<td style="border:0;"></td>
						</tr>
					</tfoot>
	            </table>
	            <?php
				}else{
				?>
				<table id="stock" width="93%" style="text-align:left;">
	                <tr><th>Stock Code</th><th>Category/Colour </th><th>Stock Description</th><th>Quantity</th><th width="50px">Delete</th></tr>
	                <?php
						if(isset($_COOKIE["stellafoamorder"])){
							$orderList = explode('|',$_COOKIE["stellafoamorder"]);
						}
						for($i = 0; $i < count($orderList); $i++){
							$orderDetail = explode('~',$orderList[$i]);
							$stockID = $orderDetail[0];
							if(strpos($stockID, 'KMS') === 0) {
								$exploded = explode('-', $orderDetail[1]);
								$colour = $exploded[0];
								$quantity = $exploded[1];
								$info = getStockInfoString($stockID);
								$pack = ($info["Pack"] != 0)?$info["Pack"]:'&ndash;';
								$total = $info["Price"] * $quantity;
								$originial += $info["Price"] * $quantity;
								$grandtotal += $total;
								$stockDesc = $info["Stock_Name"];
								echo '<tr>
									<td>'.$info["Stock_Code"].'</td>
									<td>'.$colour.'</td>
									<td>'.$stockDesc.'</td>
									<td>'.$quantity.'</td>
									<td align="center"><a href="?did='.$i.'" title="Delete Product"><img src="/images/icons/delete_icon.gif" border="0"/></a></td>
									</tr>';
							}else{
								$info = getStockInfo($orderDetail[0]);
								$category = get_product($info["Product_ID"]);
								echo '<tr>
									<td>'.$info["Stock_Code"].'</td>
									<td>'.$category["Product_Title"].'</td>
									<td>'.$info["Stock_Name"].'</td>
									<td>'.$orderDetail[1].'</td>
									<td><a href="?did='.$i.'" title="Delete Product"><img src="/images/icons/delete_icon.gif" border="0"/></a></td>
								  </tr>';
							}
						}

					?>
	            </table>
	            <?php
	        	}
	        	?>
            <?php
				}else{
					if(!isset($_GET["sent"]) && !isset($_GET["notsent"])){
						echo '<br><br><h3 align="center">No Products in your Order List</h3>';
					}
				}
			?>
		</div>
        <?php
			include '_includes/footer.php';
    	?>
    </div>
	<?php
		include '_includes/copyright.php';
	?>
</body>
</html>
