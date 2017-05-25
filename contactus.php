<?php

include("functions.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Contact Us</title>
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Trade Counter
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
			<div id="title" style="margin-top:30px;">Contact Us</div>
        	<div style="text-align:left;padding:20px 40px 40px 40px;">
				<div style="margin-top:30px;">
					<div style="float:right;margin-left:30px;">
          	<iframe width="600" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.uk/maps?hl=en&amp;safe=off&amp;ie=UTF8&amp;q=Stellafoam+Ltd,+Blackwater+Close,+Fairview+industrial+Park,+Rainham+,Essex,+RM13+8UA&amp;fb=1&amp;gl=uk&amp;hq=Stellafoam+Ltd,+Blackwater+Close,+Fairview+industrial+Park,&amp;hnear=Rainham,+Essex+RM13+8UA&amp;cid=0,0,4589660101991249483&amp;ll=51.515719,0.175869&amp;spn=0.006295,0.006295&amp;iwloc=A&amp;output=embed"></iframe>
          </div>
					<div>
						<p>There are many ways in which you can get in touch with us... </p><br />

						<p>Visit us at:<br/>
						<strong>Stellafoam Ltd.<br/>
						Blackwater Close<br/>
						Fairview industrial Park<br/>
						Rainham<br/>
						Essex RM13 8UA </strong></p><br />

						<p>Telephone: <strong>01708 522551</strong></p><br />

						<p>Email: <a href="mailto:sales@stellafoam.co.uk" title="Email Us">sales@stellafoam.co.uk</a></p><br />
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
