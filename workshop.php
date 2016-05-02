<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"> 
<head> 
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
	<title>Stellafoam - Workshop</title> 
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
    	
        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Workshop
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
			<div id="title" style="margin-top:30px;">Workshop</div>
        	<div style="text-align:left;padding:0px 40px 0px 40px;">
				<div style="margin-top:30px;">
					<div style="float:right;margin-left:10px;"><img src="saw.jpg" alt="Saw" /></div>
					<div  style="padding-top:80px;">
						<h2>Altendorf F45 Saw</h2><br/>
						<p>Panel sizing saw with scribe blade and 3m beam. Full dust extractor, loading area, waste disposal and recycling service.</p>
					</div>
				</div>
			</div>
			<div style="text-align:left;padding:40px 40px 0px 40px;">
				<div style="margin-top:30px;">
					<div style="float:left;margin-right:20px;"><img src="drilling-machine.jpg" alt="Blum Drilling Machine" /></div>
					<div  style="padding-top:120px;">
						<h2>Blum Drilling Machine</h2><br/>
						<p>Blum pneumatic hinge hole drilling machine, set with 35mm diameter bit.</p>
					</div>
				</div>
				<div style="clear:both;"></div>
			</div>
			<div style="text-align:left;padding:30px 40px 0px 40px;">
				<h2>To Book</h2><br/>
				<p>Please ring the trade centre on <strong>01708 522 551</strong> if you would like to book. The workshop is hired in 30 minute increments up to a full day of 8 hours.</p>
			</div>
			
			<div style="padding:40px 40px 40px 40px;">
				<div style="float:right;text-align:left;width:45%;">
					<div style="margin-top:30px;">
						<div style="float:left;margin-right:10px;"><img src="safety-sign.jpg" alt="Safty Sign" width="120px"/></div>
						<div style="padding-top:10px;">
							<p>Goggles, dust masks and ear plugs are provided.</p>
						</div>
					</div>
				</div>
				
				<div style="text-align:left;width:45%;">
					<div style="float:left;margin-top:30px;">
						<div style="float:left;margin-right:10px;"><img src="explanation-mark.jpg" alt="Explanation Mark" width="100px" /></div>
						<div style="padding-top:15px;">
							<p>To hire these machines you must be a trade customer familiar with light panel cutting machinery and first have an introduction and guide on using this model. Usage terms below to be read and signed.</p>
						</div>
					</div>
				</div>
			</div>
			<div style="clear:both;height:30px;padding-top:30px;"><a href="docs/Saw-Safety-Procedure.pdf" target="_blank">Download Usage Terms</a></div>
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