<?php

include("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Availablity Charts</title>
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Availability Charts
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
			<div id="title" style="margin-top:30px;">Availability Charts</div>
        	<div style="text-align:left;padding:20px 40px 20px 40px;">
				<p>Please find below 2 availability charts which give a quick general guide to most of our stock range. These do not however cover our full range of stock products so if you do not see the item you require please go to the more specific product pages of this site or again contact our sales office.</p><br />

<p>These pages can be downloaded to use as a quick reference guide.</p><br />
				<div style="text-align:center; padding-bottom:20px;"><img src="avail_board1.jpg"/><br /><a href="docs/availablitychart.pdf">Download these charts</a> (pdf)</div>
                <div style="text-align:center; padding-bottom:20px;"><img src="avail_board2.jpg"/><br /><a href="docs/availablitychart.pdf">Download these charts</a> (pdf)</div>
                <!--<div style="text-align:center;"><img src="avail_general.jpg"/><br /><a href="docs/avail_general.pdf">Download this chart</a> (pdf)</div>-->
			</div>
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