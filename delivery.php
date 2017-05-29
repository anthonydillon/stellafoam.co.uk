<?php

include("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Delivery</title>
	<?php
		include '_includes/meta.php';
    ?>

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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Delivery
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View basket</a>
        	</div>
        </div>
        <div id="content">
			<div id="title" style="margin-top:30px;">Delivery</div>
        	<div style="text-align:left;padding:20px 40px 40px 40px;">
				<div style="margin-top:30px;">
					<div style="float:right;margin-left:30px;"><img src="/images/delivery.jpg" alt="Delivery Image" /></div>
					<div>
						<p>We have our own fleet of purpose built Lorries and only use our own drivers with them. This enables us to give our customers a reliable and fast delivery service, within 48hrs in most cases. Should you be outside our normal delivery area we will pleased to quote you based on the order.</p>
					</div>
				</div>
                <div style="clear:both;"/></div>
                <div style="margin-top:30px;">
					<div style="float:left;margin-right:30px;"><img src="/images/delivery-map.jpg" alt="Delivery Image" /></div>
					<div style="padding-top:200px;">
						<p style="margin-bottom:20px;">Deliveries within our area are free on orders over &pound;150 excluding VAT. </p>						<div>
                            <div style="background-color:#00a2e8;height:30px;width:30px;float:left;margin-right:10px;"></div><p style="font-weight:bold;padding-top:8px;margin-left:60px;height:23px">Standard</p>
                            <div style="background-color:#b5e61d;height:30px;width:30px;float:left;margin-right:10px;margin-top:30px;"></div><p style="font-weight:bold;padding-top:8px;position:relative;margin-top:12px;">Maybe subject to minimium order increase (Includes Congestion Charge Zone)</p>
                            <div style="background-color:#999999;height:30px;width:30px;float:left;margin-right:10px;margin-top:30px;"></div><p style="font-weight:bold;padding-top:8px;position:relative;margin-top:20px;">Please call sales office for further information</p>
                        </div>
					</div>
				</div>
			</div>
			<div style="clear:both;height:30px;"></div>
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