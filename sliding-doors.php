<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
<head> 
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<title>Stellafoam - Sliding Doors</title> 
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
    	
        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Sliding Doors
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
			<div id="title" style="margin:30px 0px 30px 0px;">Sliding Doors</div>
        	<div style="margin-bottom:30px;">
            	Our Sliding Door systems are available to your own colour combination from the choices below. Sizes also to your specification in 2, 3, 4 or 5 door runs.<br/>Soft closing doors are available.<br/>Please call sales office for information <strong>01708 522551</strong>.
            </div>
            
            <div style="float:right; width:450px; text-align:left;">
            	<h3>Solid Panel Colours</h3>
            	<table width="100%" cellpadding="10" cellspacing="10">
                    <tr><td width="45%"><a href="product.php?p=17">Acacia</a></td>
                    <td width="33%"><a href="product.php?p=156">Agnola Beech</a></td>
                    <td width="33%"><a href="product.php?p=31">Maple</a></td></tr>
                    <tr><td><a href="product.php?p=35">Plumwood</a> *</td>
                    <td><a href="product.php?p=24">Classic Walnut</a> *</td>
                    <td><a href="product.php?p=32">Normandy Oak</a></td></tr>
                    <tr><td><a href="product.php?p=37">Stamford Walnut</a></td>
                    <td><a href="product.php?p=28">Ivory (Pearl)</a></td>
                    <td><a href="product.php?p=33">Ontario Maple</a></td></tr>
                    <tr><td><a href="product.php?p=38">Steamed Beech</a></td>
                    <td><a href="product.php?p=22">Light Birch</a></td>
                    <td><a href="product.php?p=34">Pamplona Oak</a></td></tr>
                    <tr><td><a href="product.php?p=42">Tiepolo (Natural)</a> *</td>
                    <td><a href="product.php?p=27">Golden Walnut</a></td>
                    <td><a href="product.php?p=36">Pippy Oak</a></td></tr>
                    <tr><td><a href="product.php?p=43">Wenge</a></td>
                    <td><a href="product.php?p=45">White (Pearl)</a></td>
                    <td><a href="product.php?p=30">Zebrano</a></td></tr>
                 </table>
                 <p>* Maximum 1m Wide Doors'</p>
				<div style="height:20px;"></div>
            	<h3>Glass Panel Finishes</h3>
            	<table width="100%" cellpadding="10" cellspacing="10">
                    <tr><td width="45%">Mirror</td>
                    <td width="33%">Blue Pastel</td>
                    <td width="33%">Beige</td></tr>
                    <tr><td>Bronze Mirror</td>
                    <td>Blue Metal</td>
                    <td>Light Beige</td></tr>
                    <tr><td>Smoke Grey Mirror</td>
                    <td>Blue Luminous</td>
                    <td>Classic Brown</td>
                    </tr>
                    <tr><td>White Pure</td>
                    <td>Grey Classic</td>
                    <td>Light Brown</td></tr>
                    <tr><td>White Soft</td>
                    <td>Grey Metal</td>
                    <td>Dark Brown</td></tr>
                    <tr><td>Green Pastel</td>
                    <td>Red Burgandy</td>
                    <td>Red Luminous</td></tr>
                 </table>
				<div style="height:20px;"></div>
                <h3>Anodised Frame Colours</h3>
                <table width="100%" cellpadding="10" cellspacing="10">
                    <tr><td width="45%">Silver</td>
                    <td width="33%">Gold</td>
                    <td width="33%">Platinum</td></tr>
                    <tr><td>Bronze</td>
                    <td>Matt Gold</td>
                    <td>White</td></tr>
                </table>
                <div style="height:20px;"></div>
                <h3>Foil Framed Colours</h3>
                <table width="100%" cellpadding="10" cellspacing="10">
                    <td width="33%">Steamed Beech</td></tr>
                    <tr><td>Light Oak</td>
                </table>
            </div>
            <?php
				$imgDir = "flash/sliding-doors/";
				$images = scandir($imgDir); 
				$ignore = array( ".", ".." );
				$imageList = '';
				$$sep = '';
				
				for($i = 0; $i < count($images); $i++) { 
					if(strpos(strtolower($images[$i]), ".jpg")){
						$imageList .= $sep.'sliding-doors/'.$images[$i]; 
						$sep = ',';
					}
				}  
			?>
            <div style="width:450px; height:338px; margin:0px 10px 20px 10px;">
            <object type="application/x-shockwave-flash"  width="450" height="338" data="flash/showroom.swf">
                <param name="movie" value="flash/showroom.swf" />
                <param name="quality" value="high" />
                <param value="transparent" name="wmode"/>
                <param name="FlashVars" value="images=<?php echo $imageList ?>" />
            </object>
            <!--<img src="sliding-doors.jpg" width="350px" alt="Sliding Doors"/>-->
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