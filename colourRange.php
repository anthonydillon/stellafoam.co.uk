<?php
	include 'functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Colour Range</title>
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

	.colours{
		float:left;
		width:204px;
		height:204px;
		border:1px solid white;
		-moz-border-radius: 15px;
		border-radius: 15px;
		display:block;
		margin:8px 0px 0px 4px;
	}

	.desc{
		background-image:url('images/blacktrans.png');
		width:200px;
		height:25px;
		text-align:center;
		color:white;
		padding-top:5px;
		border: 1px solid black;
	}

	.colours:hover{
		border:1px solid #027fd9;
	}
	.desc:hover{
		color:red;
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Colour Range
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
			<div id="title" style="margin-top:30px;margin-bottom:30px;">Colour Range</div>
        	<div style="text-align:left;padding:20px 40px 20px 40px;">
        	<div style="background-color:black;">
				<?php
					$colours = get_colours();
					$cL = count($colours);
					while($cL--){
						$theColour = $colours[$cL];
						?>
						<a href="/product.php?p=<?php echo $theColour["Product_ID"]; ?>" title="<?php echo $theColour["Product_Title"] ?>">
							<div class="colours" style="background-image:url('<?php echo '/images/'.$theColour["Product_Image"] ?>')">

									<!--<img src="<?php echo '/images/'.$theColour["Product_Image"] ?>" alt="<?php echo $theColour["Product_Title"] ?>" width="200" height="200" border="0"/>
									<div class="desc"><?php echo $theColour["Product_Title"] ?></div>-->

							</div>
							</a>
						<?php
					}
				?>
				<div style="clear:both;height:10px;"></div>
				</div>
			</div>
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