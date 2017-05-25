<?php
include("functions.php");
if(isset($_GET["p"])){
	$product = get_product($_GET["p"]);
}else{
	header('Location: /stellafoam');
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Print <?php echo $product['Product_Title']?></title>
	<?php
		include  'meta.php';
    ?>
    <script language="Javascript1.2">
	  <!--
	  function printpage() {
		window.print();
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
		<div style="colour:#999;font-size: 13px;width:954px;text-align:center;">--- Printable Version ---</div>
        <img src="header.jpg" style="width:954px;"/>
        <div id="content" style="width:954px;">
        	<div id="product" style="margin-top:10px;">
				<div style="float:left;margin-left:30px;font-size:13px;">
					<img src="images/<?php echo $product['Product_Image'] ?>" style="margin-bottom:35px;"/>
				</div>
				<div id="info">
                    <?php
						$size = '';
						$threshold = 18;
						if(strlen($product['Product_Title']) >= $threshold){
							$dif = ((strlen($product['Product_Title']) - $threshold)+1)*2;
							$total = max(24,(40 - $dif) - 2);
							$size = 'style="font-size:'.$total.'px;"';
						}
					?>

					<div id="title" <?php echo $size ?> >
						<?php
							echo $product['Product_Title'];
							if($product['Product_Code'] != ''){
								echo ' ('.$product['Product_Code'].')';
							}
						?>
					</div>
					<div id="tab">
						Description
					</div>
					<div align="left" id="description">
						<p>
							<?php
								echo $product['Product_Description'];
							?>
						</p>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
 </body>
</html>
