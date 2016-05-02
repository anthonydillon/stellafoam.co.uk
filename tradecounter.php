<?php

include("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Trade Centre</title>
	<?php
		include  'meta.php';
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Trade Centre
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View List</a>
        	</div>
        </div>
        <div id="content">
			<div id="title" style="margin-top:30px;">Trade Centre</div>
        	<div style="text-align:left;padding:20px 40px 40px 40px;">
				<div style="margin-top:30px; text-align: center">
					<div>
						<p>For customers who wish to collect our trade counter is open during the following hours :- </p>
						<table style="margin:0 auto;" cellpadding="5" cellspacing="10">
						<tr><th width="40%">Monday</th><td>8.30 - 4.30</td></tr>
						<tr><th>Tuesday</th><td>8.30 - 4.30</td></tr>
						<tr><th>Wednesday</th><td>8.30 - 5.30</td></tr>
						<tr><th>Thursday</th><td>8.30 - 5.30</td></tr>
						<tr><th>Friday</th><td>8.30 - 4.30</td></tr>
						<tr><th>Saturday</th><td>9.00 - 12.00<br />(except Bank holiday weekends)</td></tr>
						<tr><th>Please note:</th><td>The trade centre is closed between 1 - 1.45pm</td></tr>
						</table>
						</p>
						<p>Blackwater Close, Fairview industrial Park, Rainham, Essex RM13 8UA </p>
						<br />
						<p>Call us on <strong>01708 522551</strong> for further information </p>
					</div>
				</div>
			</div>
			<div style="clear:both;height:30px;"></div>
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