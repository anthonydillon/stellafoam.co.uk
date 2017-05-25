<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Kitchen Cabinets</title>
	<?php
		include  'meta.php';
    ?>

    <style type="text/css">
	#content{
		padding:20px;
		text-align:center;
	}
	#content img {
		margin-bottom: 5px;
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
	#content a {
		color:#016bb5;
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Kitchen Cabinets
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
			<div id="title" style="margin-top:30px;">ClicBox Flat Pack Kitchen Cabinets</div>
        	<div style="padding: 40px">
	        	<div style="float:left; width:195px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kitchen-1.png" width="195" height="194" />
					<p>18mm think MFC panels. 1mm ABS on leading edges</p>
				</div>
				<div style="float:left; width:195px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kitchen-2.png" width="195" height="194" />
					<p>8mm solid back</p>
				</div>
				<div style="float:left; width:195px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kitchen-3.png" width="195" height="194" />
					<p>No fittings because of UNICLIC technology</p>
				</div>
				<div style="float:left; width:195px; margin-bottom: 20px;">
					<img src="/images/kitchen-4.png" width="195" height="194" />
					<p>Solid top &amp; bottom are interchangeable</p>
				</div>

				<div style="float:left; width:195px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kitchen-5.png" width="195" height="194" />
					<p>18mm adjustable hanging bracket system</p>
				</div>
				<div style="float:left; width:195px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kitchen-6.png" width="195" height="194" />
					<p>Adjustable tool-less legs</p>
				</div>
				<div style="float:left; width:195px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kitchen-7.png" width="195" height="194" />
					<p>Tool-less solid centre-post with a unique Turn-fastener technology</p>
				</div>
				<div style="float:left; width:195px; margin-bottom: 20px;">
					<img src="/images/kitchen-8.png" width="195" height="194" />
					<p>Tool-less and adjustable hanging bracket system</p>
				</div>

				<div style="float:left; width: 410px; margin-right: 20px; margin-bottom: 20px;">
					<img src="/images/kasten-V3-K.jpg" width="410" />
					<p>The complete white range</p>
				</div>
				<div style="float:left; width: 410px; margin-bottom: 20px;">
					<iframe width="410" height="231" src="http://www.youtube.com/embed/QfMTlmEWeMg?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
				</div>

				<div style="float:left; width: 840px; margin-bottom: 20px;">
					<img src="/images/kitchen-10.png" width="840" height="216" />
					<p>The smart drilling patterns offer lots of possibilities, and are adapted for BLUM (Stellafoam Stock), Hettich and Indaux</p>
				</div>
				<div style="float:left; width: 840px; margin-bottom: 20px;">
					<img src="/images/kitchen-11.png" width="840" height="222" />
					<p>Larder pre-drilled patterns</p>
				</div>
				<div style="clear:both;height:30px;padding-top:10px;"><h3><a href="/product.php?p=192" >Click to see Stellafoam&rsquo;s stock range!</a></h3></div>
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