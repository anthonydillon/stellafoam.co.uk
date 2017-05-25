<?php
include("functions.php");
$details = false;
if(isset($_POST["todo"]) && $_POST["todo"] == 'send'){
	$to  = 'anthony_dillon@hotmail.com, sales@stellafoam.co.uk, Mark@stellafoam.co.uk';
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
	 $message .= '</td></tr>
             </table>
             <table id="stock" width="93%" style="margin-top:30px;text-align:left;">
                <tr><th>Stock Code</th><th>Stock Description</th><th>Quantity</th></tr>';

		if(isset($_COOKIE["stellafoamorder"])){
			$orderList = explode('|',$_COOKIE["stellafoamorder"]);
		}
		for($i = 0; $i < count($orderList); $i++){
			$orderDetail = explode('-',$orderList[$i]);
			$info = getStockInfo($orderDetail[0]);

			$message .= '<tr><td>'.$info["Stock_Code"].'</td><td>'.$info["Stock_Name"].'</td><td>'.$orderDetail[1].'</td></tr>';
		}

    $message .= '</table></div></body></html>';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	$headers .= 'To: Stellafoam Sales <sales@stellafoam.co.uk>, Anthony Dillon <anthony_dillon@hotmail.com>, Mark Reed <Mark@stellafoam.co.uk>' . "\r\n";
	$headers .= 'From: Stellafoam Website <no-reply@anthonydillon.com>' . "\r\n";

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
	<!--<div id="pageWrapper">
        <div style="width:190px;float:right"></div> -->
		<div style="colour:#999;font-size: 13px;width:954px;text-align:center;">--- Printable Version ---</div>
        <img src="header.jpg" style="width:954px;"/>
        <div id="content" style="width:954px;">
        	<div id="title" style="margin-top:40px;margin-bottom:20px;">Stellafoam Order List</div>
            <table id="stock" style="margin-top:40px;margin-bottom:10px;text-align:left;">
            	<tr><th width="150px">Name:</th><td width="280px"><?php echo $_POST["name"]; ?></td></tr>
                <tr><th>Company Name:</th><td><?php echo $_POST["company"]; ?></td></tr>
                <tr><th style="vertical-align:text-top;">Address:</th><td><?php echo $_POST["address"]; ?></td></tr>
                <tr><th>Telephone:</th><td><?php echo $_POST["telephone"]; ?></td></tr>
                <tr><th>Email:</th><td><?php echo $_POST["email"]; ?></td></tr>
				<tr><th style="vertical-align:text-top;">Additional Information:</th><td><?php echo $_POST["additional"]; ?></td></tr>
             </table>
             <table id="stock" width="93%" style="margin-top:30px;text-align:left;">
                <tr><th>Stock Code</th><th>Stock Description</th><th>Quantity</th></tr>
                <?php
					if(isset($_COOKIE["stellafoamorder"])){
						$orderList = explode('|',$_COOKIE["stellafoamorder"]);
					}
					for($i = 0; $i < count($orderList); $i++){
						$orderDetail = explode('-',$orderList[$i]);
						$info = getStockInfo($orderDetail[0]);

						echo '<tr><td>'.$info["Stock_Code"].'</td><td>'.$info["Stock_Name"].'</td><td>'.$orderDetail[1].'</td></tr>';
					}

				?>
            </table>
		</div>
 </body>
</html>
