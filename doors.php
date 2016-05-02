<?php
include("functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Doors</title>
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

	.box-grey {
		background: #f4f4f4;
		padding: 20px 20px 0 20px;
		box-sizing: border-box;
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
	.door-image {
		border: 1px solid #ddd;
	}
	.colour-image {
		width: 200px;
		margin: 0 auto 20px;
	}
	.align-center {
		text-align: center;
	}
	.door-list,
	.colour-list,
	.inline-list {
		margin: 0;
		padding: 0;
		list-style: none;
	}

	.colour-list .title {
		display: block;
		width: 100%;
	}

	.inline-list li {
		float: left;
		margin-right: 10px;
		margin-bottom: 10px;
		font-size: 16px;
	}

	.door-list li,
	.colour-list li {
		position: relative;
		float: left;
		margin-right: 10px;
		margin-bottom: 10px;
		width: 47px;
	}

	.door-list li img,
	.colour-list li img {
		border: 1px solid #ddd;
		float: left;
	}

	.door-list li img {
		filter: contrast(2);
	}

	.door-list .selected,
	.colour-list .selected {
		-webkit-box-shadow: 1px 0px 0px 4px rgba(0, 0, 0, .4);
		-moz-box-shadow: 1px 0px 0px 4px rgba(0, 0, 0, .4);
		box-shadow: 1px 0px 0px 4px rgba(0, 0, 0, .4);
	}

	.door-list img:hover,
	.colour-list img:hover {
		-webkit-box-shadow: 0px 0px 0px 2px rgba(0, 0, 0, .4);
		-moz-box-shadow: 0px 0px 0px 2px rgba(0, 0, 0, .4);
		box-shadow: 0px 0px 0px 2px rgba(0, 0, 0, .4);
		cursor: pointer;
	}

	.door-list li:hover:after,
	.colour-list li:hover:after {
		content: attr(data-name);
		padding: 5px 10px;
		background: #333;
		color: #fff;
		display: block;
		position: absolute;
		top: -25px;
		white-space: nowrap;
		left: -2px;
		z-index: 10;
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

	.twelve-col {
		display: block;
		width: 100%;
		margin-bottom: 20px;
	}

	.door-colour-image {
		height: 551px;
		padding: 20px;
		border: 1px solid #ddd;
		background: white;
		box-sizing: border-box;
	}

	.door-link {
		border: 1px solid #f4f4f4;
		width: 17%;
		margin-right: 20px;
		display: inline-block;
	}

	.door-link:hover {
		border: 1px solid #d4d4d4;
	}

	.door-link.selected {
		color: #333;
		font-weight: 400;
		text-decoration: none;
	}

	.door-link img {
		border: 4px solid transparent;
	}

	.door-link.selected img {
		border: 4px solid #333;
	}


	</style>
	<link rel="stylesheet" type="text/css" href="kms-styles.css" media="all" />
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Doors
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/cart.php">View List</a>
                <?php
                if(!$loggedIn) {
                 echo '- <a href="#" class="bread-login">Login</a>';
                }

				include 'crumbuser3.php';
			?>
        	</div>
        </div>
    <div id="content">
      <div class="row">
				<div class="align-center twelve-col">
					<h2>Bedroom doors</h2>
					<a href="#bedrooms-vinyl" class="door-link box-grey selected">
						<img src="/images/doors/bedroom-vinyl-doors.jpg" alt="" />
						<p>Vinyl</p>
					</a>
					<a href="#bedrooms-acrylic" class="door-link box-grey">
						<img src="/images/doors/bedroom-acrylic-doors.jpg" alt="" />
						<p>Acrylic</p>
					</a>
					<a href="#bedrooms-piece" class="door-link box-grey">
						<img src="/images/doors/bedroom-five-piece-doors.jpg" alt="" />
						<p>5-Piece</p>
					</a>
					<a href="#bedrooms-painted" class="door-link box-grey">
						<img src="/images/doors/bedroom-painted-doors.jpg" alt="" />
						<p>Painted</p>
					</a>
					<a href="#bedroom-veneered" class="door-link box-grey	">
						<img src="/images/doors/bedroom-veneered-doors.jpg" alt="" />
						<p>Veneered</p>
					</a>
				</div>
				<div class="align-center twelve-col">
					<h2>Kitchen doors</h2>
					<a href="#kitchens-vinyl" class="door-link box-grey">
						<img src="/images/doors/kitchen-vinyl-doors.jpg" alt="" />
						<p>Vinyl</p>
					</a>
					<a href="#kitchens-acrylic" class="door-link box-grey">
						<img src="/images/doors/kitchen-acrylic-doors.jpg" alt="" />
						<p>Acrylic</p>
					</a>
					<a href="#kitchens-piece" class="door-link box-grey">
						<img src="/images/doors/kitchen-five-piece-doors.jpg" alt="" />
						<p>5-Piece</p>
					</a>
					<a href="#kitchens-painted" class="door-link box-grey">
						<img src="/images/doors/kitchen-painted-doors.jpg" alt="" />
						<p>Painted</p>
					</a>
					<a href="#kitchens-solid" class="door-link box-grey">
						<img src="/images/doors/kitchen-solid-doors.jpg" alt="" />
						<p>Solid</p>
					</a>
				</div>
			</div>
			<div class="clear"></div>
			<div class="row stripe-grey doors-row" id="bedrooms-vinyl">
				<h2>Vinyl bedroom doors</h2>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Annabelle"><img src="images/doors/annabelle.jpg" alt="Annabelle" /></li>
						<li data-name="Amsterdam"><img src="images/doors/amsterdam.jpg" alt="Amsterdam" /></li>
						<li data-name="Brisbane"><img src="images/doors/brisbane.jpg" alt="Brisbane" /></li>
						<li data-name="Barkby"><img src="images/doors/barkby.jpg" alt="Barkby" /></li>
						<li data-name="Auckland"><img src="images/doors/auckland.jpg" alt="Auckland" /></li>
						<li data-name="Bourbon"><img src="images/doors/bourbon.jpg" alt="Bourbon" /></li>
					</ul>
				</div>
				<div class="two-col align-center">
					<img id="zoom-door" src="images/doors/amsterdam.jpg" class="door-image" data-zoom-image="images/doors/amsterdam-large.jpg" alt="" />
					<p class="door-name">Amsterdam</p>
				</div>
				<div class="two-col last-col align-center">
					<img src="images/AG.jpg" class="door-colour-image" alt="" />
					<p class="door-colour-name">Melon</p>
				</div>
				<h3>Colours</h3>
				<ul class="colour-list">
					<li data-name="Agnola Beech" class="selected"><img src="images/AG.jpg" alt="Agnola Beech" /></li>
					<li data-name="Brown Avola"><img src="images/BA.jpg" alt="Brown Avola" /></li>
					<li data-name="Grey Avola"><img src="images/GA.jpg" alt="Grey Avola" /></li>
					<li data-name="White Avola"><img src="images/WA.jpg" alt="White Avola" /></li>
					<li data-name="Cashmere"><img src="images/CM.jpg" alt="Cashmere" /></li>
					<li data-name="Classic Walnut"><img src="images/CW.jpg" alt="Classic Walnut" /></li>
					<li data-name="Dust grey"><img src="images/DG.jpg" alt="Dust grey" /></li>
					<li data-name="French Oak"><img src="images/FO.jpg" alt="French Oak" /></li>
					<li data-name="Golden Walnut"><img src="images/GW.jpg" alt="Golden Walnut" /></li>
					<li data-name="Ivory"><img src="images/IV.jpg" alt="Ivory" /></li>
					<li data-name="Legno Alabaster"><img src="images/LA.jpg" alt="Legno Alabaster" /></li>
					<li data-name="Legno Mussel"><img src="images/LM.jpg" alt="Legno Mussel" /></li>
					<li data-name="Legno White"><img src="images/LW.jpg" alt="Legno White" /></li>
					<li data-name="Light Elm"><img src="images/LE.jpg" alt="Light Elm" /></li>
					<li data-name="Lissa Oak"><img src="images/LO.jpg" alt="Lissa Oak" /></li>
					<li data-name="Mali Wenge"><img src="images/MW.jpg" alt="Mali Wenge" /></li>
					<li data-name="Metallic"><img src="images/ME.jpg" alt="Metallic" /></li>
					<li data-name="Mussel"><img src="images/MU.jpg" alt="Mussel" /></li>
					<li data-name="Natural Oak"><img src="images/NO.jpg" alt="Natural Oak" /></li>
					<li data-name="Ontario Maple"><img src="images/OM.jpg" alt="Ontario Maple" /></li>
					<li data-name="Pamplona Oak"><img src="images/PO.jpg" alt="Pamplona Oak" /></li>
					<li data-name="Pearl Darkar"><img src="images/DA.jpg" alt="Pearl Darkar" /></li>
					<li data-name="Pippy Oak"><img src="images/PI.jpg" alt="Pippy Oak" /></li>
					<li data-name="Steamed Beech"><img src="images/SB.jpg" alt="Steamed Beech" /></li>
					<li data-name="Stone Grey"><img src="images/SG.jpg" alt="Stone Grey" /></li>
					<li data-name="Tiepolo (Natural)"><img src="images/TI.jpg" alt="Tiepolo (Natural)" /></li>
					<li data-name="Vintage Oak"><img src="images/VO.jpg" alt="Vintage Oak" /></li>
					<li data-name="White Matt"><img src="images/white.jpg" alt="White Matt" /></li>
				</ul>
			</div>

			<div class="row stripe-grey is-hidden doors-row" id="bedrooms-acrylic">
				<h2>Acrylic bedrooms doors</h2>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="bedrooms-piece">
				<h2>5-Piece bedrooms doors</h2>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="bedrooms-painted">
				<h2>Painted bedrooms doors</h2>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="bedroom-veneered">
				<h2>Veneered bedrooms doors</h2>
			</div>

			<div class="row stripe-grey is-hidden doors-row" id="kitchens-vinyl">
				<h2>Vinyl Kitchen doors</h2>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-acrylic">
				<h2>Acrylic kitchen doors</h2>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Gloss Black"><img src="images/doors/gloss-black.jpg" alt="Gloss Black" /></li>
						<li data-name="Gloss Brown" style="height:87px"><img src="images/doors/gloss-brown.jpg" alt="Gloss Brown" /></li>
						<li data-name="Gloss Cashmere" style="height:87px"><img src="images/doors/gloss-cashmere.jpg" alt="Gloss Cashmere" /></li>
						<li data-name="Gloss Cream" style="height:87px"><img src="images/doors/gloss-cream.jpg" alt="Gloss Cream" /></li>
						<li data-name="Gloss Dakar" style="height:87px"><img src="images/doors/gloss-dakar.jpg" alt="Gloss Dakar" /></li>
						<li data-name="Gloss Fossil" style="height:87px"><img src="images/doors/gloss-fossil.jpg" alt="Gloss Fossil" /></li>
						<li data-name="Gloss Light Grey" style="height:87px"><img src="images/doors/gloss-light-grey.jpg" alt="Gloss Light Grey" /></li>
						<li data-name="Gloss Mussell" style="height:87px"><img src="images/doors/gloss-mussell.jpg" alt="Gloss Mussell" /></li>
						<li data-name="Gloss Red" style="height:87px"><img src="images/doors/gloss-red.jpg" alt="Gloss Red" /></li>
						<li data-name="Gloss Stone Grey" style="height:87px"><img src="images/doors/gloss-stone-grey.jpg" alt="Gloss Stone Grey" /></li>
						<li data-name="Gloss Tiepolo" style="height:87px"><img src="images/doors/gloss-tiepolo.jpg" alt="Gloss Tiepolo" /></li>
						<li data-name="Gloss White" style="height:87px"><img src="images/doors/gloss-white.jpg" alt="Gloss White" /></li>
					</ul>
				</div>
				<div class="four-col last-col align-center">
					<img id="zoom-door" src="images/doors/gloss-black.jpg" class="door-image" data-zoom-image="images/doors/gloss-black-large.jpg" alt="" />
					<p class="door-name">Gloss Black</p>
				</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-piece">
				<h2>5-Piece kitchen doors</h2>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-painted">
				<h2>Painted kitchen doors</h2>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-solid">
				<h2>Solid kitchen doors</h2>
			</div>
		</div>
        <?php
			include  'footer.php';
    	?>
    </div>
	<?php
		include  'copyright.php';
   	?>
   	<script src="js/js-cookie.js"></script>
		<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="js/jquery.elevateZoom-3.0.8.min.js"></script>

		<script>
			$(document).ready(function(e) {
				$('.door-link').click(function(e) {
					e.preventDefault();
					var currentDoor = $(this).attr('href');
					$('.door-link').removeClass('selected');
					$(this).addClass('selected');
					$('.doors-row').hide();
					$(currentDoor).show();
				});

				$('.colour-list li').click(function(e) {
					e.preventDefault();
					$('.colour-list li').removeClass('selected');
					$(this).addClass('selected');
					$('.door-colour-image').attr('src', $(this).find("img").attr('src'));
					$('.door-colour-name').text($(this).find("img").attr('alt'));
				});

				$('.door-list li').click(function(e) {
					e.preventDefault();
					$('.door-list li').removeClass('selected');
					$(this).addClass('selected');
					var imageSrc = $(this).find("img").attr('src');
					$('.door-image').attr('src', imageSrc);
					$('.door-image').attr('data-zoom-image', imageSrc.replace('.jpg','') + '-large.jpg');
					$('.door-name').text($(this).find("img").attr('alt'));
					$(".zoomContainer .zoomLens").css('background-image', imageSrc.replace('.jpg','') + '-large.jpg');
				});

				$("#zoom-door").elevateZoom({
					zoomType	: "lens",
					lensShape : "round",
					lensSize : 200
				});
			});
		</script>
</body>
</html>
