<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Door Range</title>
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
	p {
		margin-top:20px;
		margin-bottom:20px;
	}
	table{
		width:100%;
		font-size:13px;
		margin-top:20px;
		border-collapse:collapse;
	}

	table td, table th {
		font-size:1em;
		border:1px solid #ddd5d3;
		padding:3px 7px 2px 7px;
	}

	table th {
		width:80px;
		font-size:1.1em;
		text-align:left;
		padding-top:5px;
		padding-bottom:4px;
		background-color:#ffe8c1;
		color:#494C4E;
	}

	table tr.alt td {
		color:#494C4E;
	}

	table form{
		 margin-bottom:10px;
		 margin-top:4px;
	}
	h2 {
		margin-top:40px;
		margin-bottom:20px;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/typography_core.css" media="all" />
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Door Range
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
        <div id="content" style="margin:0px 30px 0px 30px;">
        	<div style="float:right;">
                <a href="madetomeasureprint.php" title="Print Door Range">
                    <img src="/images/icons/print_icon.gif" style="vertical-align:middle;" width="20px" border="0" /> Printable version
                </a>
            </div>
			<div id="title" style="margin-top:30px;margin-bottom:30px;">Door Range</div>
        	<p>Stellafoam has a huge range of door colours and designs to meet all of your client's requirements. Coupled with our efficient and reliable <strong>'made to measure'</strong> service even the most challenging bedroom and kitchen spaces will be no problem!</p>
            <div><span style="padding-right:50px">Max height 2700mm</span> <span style="padding-right:50px">Max width 1200mm</span> <span>Angle Doors Also Available</span></div>
            <div style="height:30px;padding-top:30px;">
				<a href="docs/Customer-Special-Door-Order-Form.pdf" target="_blank">Download Special Order Sheet</a>
			</div>
            <div style="height:30px;">
				<a href="docs/Special-Order-Sheet-For-Angled-Doors.pdf" target="_blank">Download Special Order Sheet For Angled Doors</a>
			</div>
			<div style="height:30px;">
				<a href="docs/Stellafoam-Board-And-Vinyl-Matching-Chart.pdf" target="_blank">Stellafoam Board &amp; Vinyl Matching Chart</a>
			</div>
            <p>
            	We also keep in stock bedroom doors in; Gloss White Duleek and Ivory Shaker.
            </p>
            <p><a href="http://www.poshkitchens.com/" title="Posh Kitchens Cosy Bedrooms" target="_blank"><img src="/images/21-Tuscany-Ivory.jpg" border="0" alt="Tuscany Ivory Bedroom"/><br/>Click picture for full range</a></p>
        </div>
        <?php
			include  'footer.php';
    	?>
    </div>
	<?php
		include  'analytics.php';
    ?>
</body>
</html>