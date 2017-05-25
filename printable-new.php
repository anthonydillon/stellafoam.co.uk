<?php
include("functions.php");

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

$details = false;
if(isset($_POST["todo"]) && $_POST["todo"] == 'send'){
	$to  = 'me@anthonydillon.com, sales@stellafoam.co.uk, Mark@stellafoam.co.uk';
	$subject = 'Order from Stellafoam Website';
	$message = '<html><head><title>Order from Stellafoam Website</title></head>
	<body>
	  <img src="http://www.stellafoam.co.uk/header.jpg" style="width:600px;"/>
        <div id="content" style="width:600px;">
        	<div id="title" style="margin-top:40px;margin-bottom:20px;">Stellafoam Order List</div>
            <table id="stock" style="margin-top:40px;margin-bottom:10px;text-align:left;">
            	<tr><th>Name:</th><td>';
	$message .= $_POST["name"];
    $message .= '</td></tr>
                <tr><th>Company Name:</th><td>';
	$message .= $_POST["company"];
    $message .= '</td></tr>
                <tr><th style="vertical-align:text-top;">Address:</th><td>';
	$message .= $_POST["address"];
    $message .= '</td></tr>
                <tr><th>Telephone:</th><td>';
	$message .= $_POST["telephone"];
    $message .= '</td></tr>
                <tr><th>Email:</th><td>';
	$message .= $_POST["email"];
    $message .= '</td></tr>
				<tr><th>Additional Information:</th><td>';
	$message .= $_POST["additional"];
	$message .= '</td></tr></table>';
    $message .= '<table id="stock" width="93%" style="text-align:left;"><thead><tr><th>Stock Code</th><th>Category/Colour</th><th>Stock Description</th><th>Price</th><th>Quantity</th><th>Pack</th><th>Total</th></tr></thead><tbody>';
						if(isset($_COOKIE["stellafoamorder"])){
							$orderList = explode('|',$_COOKIE["stellafoamorder"]);
						}
						$total = 0;
						$originial = 0;
						$saving = 0;
						$overrideArray = array();
						for($i = 0; $i < count($orderList); $i++) {
							$orderDetail = explode('-',$orderList[$i]);
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

								$message .= '<tr>
										<td>'.$info["Stock_Code"].'</td>
										<td>'.$category["Product_Title"].'</td>
										<td>'.$info["Stock_Name"].'</td>
										<td>&pound;'.number_format($info["Price"], 2).'</td>
										<td>'.$orderDetail[1].'</td>
										<td>'.$pack.'</td>
										<td>&pound;'.number_format($total, 2) . $discountDisplay.'</td>
									 </tr>';
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

							$message .= '<tr>
									<td>'.$info["Stock_Code"].'</td>
									<td>'.$category["Product_Title"].'</td>
									<td>'.$info["Stock_Name"].'</td>
									<td>&pound;'.number_format($info["Price"], 2).'</td>
									<td>'.$orderDetail[1].'</td>';
							if(!$spanned) {
								$spanned = true;
								$message .= '<td rowspan="'.$count.'">'.$pack.'</td>';
							}
							$message .= '
									<td>&pound;'.number_format($total, 2) . $discountDisplay.'</td>
								</tr>';
						}
					$message .= '</tbody><tfoot><tr>
							<td colspan="5" style="border:0;"></td>
							<th>Total:</th>';
							$message .= '<td>';
							$message .= '&pound;'.number_format($originial, 2);
							$message .= '</td>
							<td style="border:0;"></td>
						</tr>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Pack Saving:</th>';
							$message .= '&pound;'.number_format($saving, 2);
							$message .= '</td>
							<td style="border:0;"></td>
						</tr>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Total Ex VAT:</th>';
							$message .= '<td>';
							$message .= '&pound;'.number_format($grandtotal, 2);
							$message .= '</td>
							<td style="border:0;"></td>
						</tr>
						<tr>
							<td colspan="5" style="border:0;"></td>
							<th>Inc VAT:</th>';
							$message .= '<td>';
							$message .= '&pound;'.number_format($grandtotal * 1.2, 2);
							$message .= '</td>
							<td style="border:0;"></td>
						</tr>
					</tfoot>
	            </table>';

    $message .= '</div></body></html>';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: '. $to . "\r\n";
	$headers .= 'From: Stellafoam Website <no-reply@stellafoam.co.uk>' . "\r\n";

	$sent = mail($to, $subject, $message, $headers);
	if($sent){
		header('Location: /cart.php?sent');
	}else{
		header('Location: /cart.php?notsent');
	}

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Print Order List</title>
	<?php
		include  'meta.php';
    ?>
    <script language="Javascript1.2">
	  <!--
	  function printpage() {
		window.print();
		window.location = "cart.php"
	  }
	  //-->
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
	<link rel="stylesheet" type="text/css" href="style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="typography_core.css" media="all" />
</head>
<body id="build" style="background-color:#ffffff;" onload="printpage()">
		<div style="colour:#999;font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;font-size: 13px;width:954px;text-align:center;">--- Printable Version ---</div>
        <img src="header.jpg" style="width:954px;"/>
        <div id="content" style="width:954px;">
        	<div id="title" style="margin-top:40px;margin-bottom:20px;">Stellafoam Order List</div>
            <table id="stock" width="93%" style="text-align:left;">
			 		<thead><tr>
	                	<th>Stock Code</th>
	                	<th>Category/Colour</th>
	                	<th>Stock Description</th>
	                	<th>Price</th>
	                	<th>Quantity</th>
	                	<th>Pack</th>
	                	<th>Total</th>
	                </tr></thead>
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
									 </tr>';
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

							echo '<tr>
									<td>'.$info["Stock_Code"].'</td>
									<td>'.$category["Product_Title"].'</td>
									<td>'.$info["Stock_Name"].'</td>
									<td>&pound;'.number_format($info["Price"], 2).'</td>
									<td>'.$orderDetail[1].'</td>';
							if(!$spanned) {
								$spanned = true;
								echo '<td rowspan="'.$count.'">'.$pack.'</td>';
							}
							echo '
									<td>&pound;'.number_format($total, 2) . $discountDisplay.'</td>
								</tr>';
						}
					?>
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
		</div>
 </body>
</html>
