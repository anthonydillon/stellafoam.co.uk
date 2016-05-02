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
    	
        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Showroom
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
			<div id="title" style="margin-top:30px;">Showroom</div>
        	<div style="text-align:left;padding:20px 40px 40px 40px;">
                <div style="margin-top:30px;">
                	<?php
						$imgDir = "flash/";
						$images = scandir($imgDir); 
						$ignore = array( ".", ".." );
						$imageList = '';
						$$sep = '';
						
						for($i = 0; $i < count($images); $i++) { 
							if(strpos(strtolower($images[$i]), ".jpg")){
								$imageList .= $sep.$images[$i]; 
								$sep = ',';
							}
						}  
                    ?>
					<div style="float:left;margin-right:30px;">
                        <object type="application/x-shockwave-flash"  width="450" height="338" data="flash/showroom.swf">
                        <param name="movie" value="flash/showroom.swf" />
                        <param name="quality" value="high" />
                        <param value="transparent" name="wmode"/>
                        <param name="FlashVars" value="images=<?php echo $imageList ?>" />
                        </object>
                    </div>
					<div style="line-height:200%;">
                    	<p>Why not visit our showroom. Our friendly staff will be happy to talk through any queries you may have about our products or designs.</p>
						<p style="padding-top:100px;">We offer board, door and handle samples for our entire range of colours, allowing your clients to order their products with confidence and peace of mind.</p>
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