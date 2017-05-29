<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Showroom</title>
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

	img {
		max-width: 100%;
	}
	.box-grey h3 {
		text-align: center;
		padding-top: 10px;
	}
	.clear {
		clear: both;
	}
	.row {
		overflow: hidden;
	}

	body,
	html,
	#content {
		font-size: 16px;
	}

	.no-padding-bottom {
		padding-bottom: 0 !important;
	}

	.is-hidden {
		display: none;
	}

	.eight-col {
		width: 65% !important;
	}

	.six-col {
		width: 46.2% !important;
	}

	.append-four {
    margin-right: 34.03509% !important;
	}

	.twelve-col {
		display: block;
		width: 100%;
		margin-bottom: 20px;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="css/kms-styles.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/navigation.css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/typography_core.css" media="all" />
    <?php
		include  '_includes/analytics.php';
    ?>
</head>
<body id="build">
	<div id="pageWrapper">
        <div style="width:190px;float:right"></div>
        <?php
			include  '_includes/header.php';
    	?>

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Showroom
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
        <main id="content">
					<h1 id="title" style="margin-top:30px;">Showroom</h1>
		      <div class="row">
						<div class="six-col">
		        	<img src="/images/showroom/stellafoam-showroom-hero.png" alt="" />
		        </div>
						<div class="six-col last-col">
		          <p>Why not visit our showroom. Our friendly staff will be happy to talk through any queries you may have about our products or designs.</p>
							<p>We offer board, door and handle samples for our entire range of colours, allowing your clients to order their products with confidence and peace of mind.</p>
						</div>
					</div>
				</main>
       <?php
			include  'footer.php';
    	?>
    </div>
	<?php
		include  'copyright.php';
	?>
</body>
</html>
