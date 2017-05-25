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
		width: 132px;
		filter: brightness(0.9);
		-webkit-filter: brightness(0.9);
		-moz-filter: brightness(0.9);
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
		width: 45px;
	}

	.door-list li img {
		border: 1px solid #ddd;
		float: left;
		width: 49px;
		height: 198px;
		filter: brightness(0.9);
		-webkit-filter: brightness(0.9);
		-moz-filter: brightness(0.9);
	}

	.colour-list li img {
		border: 1px solid #ddd;
		float: left;
		width: 45px;
		height: 45px;
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

	.door-colour-image {
		height: 551px;
		width: 132px;
		border: 1px solid #ddd;
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

	.list {
		list-style: circle;
		padding-left: 20px;
		margin-bottom: 30px;
	}

	.list li {
		font-size: 14px;
		line-height: 1.3;
		margin-bottom: 5px;
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
                <a href="/cart.php">View basket</a>
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
				<div class="twelve-col">
					<ul class="list">
						<li>Complete made to measure service, match any colour shown to your preferred design*</li>
						<li>Modern tones as well as classic wood finishes with the best Vinyl to MFC matches in the industry</li>
						<li>Matching 18mm or 22mm worktops and panels, along with a huge range of accessories</li>
						<li>Made to measure heights on curved doors</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>Vinyl wrapped on highest quality HDF</li>
						<li>10 year guarantee</li>
						<li>1-2 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Amalfi"><img src="images/doors/bedroom-vinyl/amalfi.jpg" alt="Amalfi" /></li>
						<li data-name="Amsterdam"><img src="images/doors/bedroom-vinyl/amsterdam.jpg" alt="Amsterdam" /></li>
						<li data-name="Annabelle"><img src="images/doors/bedroom-vinyl/annabelle.jpg" alt="Annabelle" /></li>
						<li data-name="Argon"><img src="images/doors/bedroom-vinyl/argon.jpg" alt="Argon" /></li>
						<li data-name="Aukland"><img src="images/doors/bedroom-vinyl/aukland.jpg" alt="Aukland" /></li>
						<li data-name="Austria"><img src="images/doors/bedroom-vinyl/austria.jpg" alt="Austria" /></li>
						<li data-name="Belfast Shaker"><img src="images/doors/bedroom-vinyl/belfast-shaker.jpg" alt="Belfast Shaker" /></li>
						<li data-name="Bourbon"><img src="images/doors/bedroom-vinyl/bourbon.jpg" alt="Bourbon" /></li>
						<li data-name="Brentford"><img src="images/doors/bedroom-vinyl/brentford.jpg" alt="Brentford" /></li>
						<li data-name="Brisbane"><img src="images/doors/bedroom-vinyl/brisbane.jpg" alt="Brisbane" /></li>
						<li data-name="Cairo"><img src="images/doors/bedroom-vinyl/cairo.jpg" alt="Cairo" /></li>
						<li data-name="Calcutta"><img src="images/doors/bedroom-vinyl/calcutta.jpg" alt="Calcutta" /></li>
						<li data-name="Canberra"><img src="images/doors/bedroom-vinyl/canberra.jpg" alt="Canberra" /></li>
						<li data-name="Cathedral Double Arch"><img src="images/doors/bedroom-vinyl/cathedral-double-arch.jpg" alt="Cathedral Double Arch" /></li>
						<li data-name="Cathedral Single Arch"><img src="images/doors/bedroom-vinyl/cathedral-single-arch.jpg" alt="Cathedral Single Arch" /></li>
						<li data-name="Chamfered"><img src="images/doors/bedroom-vinyl/chamfered.jpg" alt="Chamfered" /></li>
						<li data-name="Chamfered & Grooved"><img src="images/doors/bedroom-vinyl/chamfered-grooved.jpg" alt="Chamfered Grooved" /></li>
						<li data-name="Classic Square"><img src="images/doors/bedroom-vinyl/classic-square.jpg" alt="Classic Square" /></li>
						<li data-name="Cologne"><img src="images/doors/bedroom-vinyl/cologne.jpg" alt="Cologne" /></li>
						<li data-name="Danbury"><img src="images/doors/bedroom-vinyl/danbury.jpg" alt="Danbury" /></li>
						<li data-name="Denton"><img src="images/doors/bedroom-vinyl/denton.jpg" alt="Denton" /></li>
						<li data-name="Derwent"><img src="images/doors/bedroom-vinyl/derwent.jpg" alt="Derwent" /></li>
						<li data-name="Duleek"><img src="images/doors/bedroom-vinyl/duleek.jpg" alt="Duleek" /></li>
						<li data-name="Dundee"><img src="images/doors/bedroom-vinyl/dundee.jpg" alt="Dundee" /></li>
						<li data-name="Europe"><img src="images/doors/bedroom-vinyl/europe.jpg" alt="Europe" /></li>
						<li data-name="Florida"><img src="images/doors/bedroom-vinyl/florida.jpg" alt="Florida" /></li>
						<li data-name="Galaxy"><img src="images/doors/bedroom-vinyl/galaxy.jpg" alt="Galaxy" /></li>
						<li data-name="Glebe"><img src="images/doors/bedroom-vinyl/glebe.jpg" alt="Glebe" /></li>
						<li data-name="Hannover"><img src="images/doors/bedroom-vinyl/hannover.jpg" alt="Hannover" /></li>
						<li data-name="Harriet Single"><img src="images/doors/bedroom-vinyl/harriet-single.jpg" alt="Harriet Single" /></li>
						<li data-name="Harriett Double"><img src="images/doors/bedroom-vinyl/harriett-double.jpg" alt="Harriett Double" /></li>
						<li data-name="Hereford"><img src="images/doors/bedroom-vinyl/hereford.jpg" alt="Hereford" /></li>
						<li data-name="Hour Glass"><img src="images/doors/bedroom-vinyl/hour-glass.jpg" alt="Hour Glass" /></li>
						<li data-name="Houston"><img src="images/doors/bedroom-vinyl/houston.jpg" alt="Houston" /></li>
						<li data-name="Hyde"><img src="images/doors/bedroom-vinyl/hyde.jpg" alt="Hyde" /></li>
						<li data-name="Keeley"><img src="images/doors/bedroom-vinyl/keeley.jpg" alt="Keeley" /></li>
						<li data-name="Letterbox"><img src="images/doors/bedroom-vinyl/letterbox.jpg" alt="Letterbox" /></li>
						<li data-name="Madrid"><img src="images/doors/bedroom-vinyl/madrid.jpg" alt="Madrid" /></li>
						<li data-name="Melbourne"><img src="images/doors/bedroom-vinyl/melbourne.jpg" alt="Melbourne" /></li>
						<li data-name="Miami"><img src="images/doors/bedroom-vinyl/miami.jpg" alt="Miami" /></li>
						<li data-name="Modena"><img src="images/doors/bedroom-vinyl/modena.jpg" alt="Modena" /></li>
						<li data-name="Mona"><img src="images/doors/bedroom-vinyl/mona.jpg" alt="Mona" /></li>
						<li data-name="Monza"><img src="images/doors/bedroom-vinyl/monza.jpg" alt="Monza" /></li>
						<li data-name="Morris"><img src="images/doors/bedroom-vinyl/morris.jpg" alt="Morris" /></li>
						<li data-name="Normandy"><img src="images/doors/bedroom-vinyl/normandy.jpg" alt="Normandy" /></li>
						<li data-name="Oslo"><img src="images/doors/bedroom-vinyl/oslo.jpg" alt="Oslo" /></li>
						<li data-name="Ottowa"><img src="images/doors/bedroom-vinyl/ottowa.jpg" alt="Ottowa" /></li>
						<li data-name="Paris"><img src="images/doors/bedroom-vinyl/paris.jpg" alt="Paris" /></li>
						<li data-name="Pembrook"><img src="images/doors/bedroom-vinyl/pembrook.jpg" alt="Pembrook" /></li>
						<li data-name="Planked"><img src="images/doors/bedroom-vinyl/planked.jpg" alt="Planked" /></li>
						<li data-name="Porto"><img src="images/doors/bedroom-vinyl/porto.jpg" alt="Porto" /></li>
						<li data-name="Prague"><img src="images/doors/bedroom-vinyl/prague.jpg" alt="Prague" /></li>
						<li data-name="Quebec"><img src="images/doors/bedroom-vinyl/quebec.jpg" alt="Quebec" /></li>
						<li data-name="Reymondo"><img src="images/doors/bedroom-vinyl/reymondo.jpg" alt="Reymondo" /></li>
						<li data-name="Reymondo Archo"><img src="images/doors/bedroom-vinyl/reymondo-archo.jpg" alt="Reymondo Archo" /></li>
						<li data-name="Ribbed Cologne"><img src="images/doors/bedroom-vinyl/ribbed-cologne.jpg" alt="Ribbed Cologne" /></li>
						<li data-name="Rio"><img src="images/doors/bedroom-vinyl/rio.jpg" alt="Rio" /></li>
						<li data-name="Rossapenna"><img src="images/doors/bedroom-vinyl/rossapenna.jpg" alt="Rossapenna" /></li>
						<li data-name="Ruskin"><img src="images/doors/bedroom-vinyl/ruskin.jpg" alt="Ruskin" /></li>
						<li data-name="Ryandale"><img src="images/doors/bedroom-vinyl/ryandale.jpg" alt="Ryandale" /></li>
						<li data-name="Saxon Arch"><img src="images/doors/bedroom-vinyl/saxon-arch.jpg" alt="Saxon Arch" /></li>
						<li data-name="Saxon Sqaure"><img src="images/doors/bedroom-vinyl/saxon-sqaure.jpg" alt="Saxon Sqaure" /></li>
						<li data-name="Scoop"><img src="images/doors/bedroom-vinyl/scoop.jpg" alt="Scoop" /></li>
						<li data-name="Shutter Groove"><img src="images/doors/bedroom-vinyl/shutter-groove.jpg" alt="Shutter Groove" /></li>
						<li data-name="Slab"><img src="images/doors/bedroom-vinyl/slab.jpg" alt="Slab" /></li>
						<li data-name="Sperran"><img src="images/doors/bedroom-vinyl/sperran.jpg" alt="Sperran" /></li>
						<li data-name="Square"><img src="images/doors/bedroom-vinyl/square.jpg" alt="Square" /></li>
						<li data-name="Surrey"><img src="images/doors/bedroom-vinyl/surrey.jpg" alt="Stockholm" /></li>
						<li data-name="Stockholm"><img src="images/doors/bedroom-vinyl/stockholm.jpg" alt="Surrey" /></li>
						<li data-name="Tenby"><img src="images/doors/bedroom-vinyl/tenby.jpg" alt="Tenby" /></li>
						<li data-name="Stockholm"><img src="images/doors/bedroom-vinyl/stockholm.jpg" alt="Stockholm" /></li>
						<li data-name="Toronto"><img src="images/doors/bedroom-vinyl/toronto.jpg" alt="Toronto" /></li>
						<li data-name="Tressell"><img src="images/doors/bedroom-vinyl/tressell.jpg" alt="Tressell" /></li>
						<li data-name="Valencia"><img src="images/doors/bedroom-vinyl/valencia.jpg" alt="Valencia" /></li>
						<li data-name="Vancouver"><img src="images/doors/bedroom-vinyl/vancouver.jpg" alt="Vancouver" /></li>
						<li data-name="Verona"><img src="images/doors/bedroom-vinyl/verona.jpg" alt="Verona" /></li>
						<li data-name="Victoria"><img src="images/doors/bedroom-vinyl/victoria.jpg" alt="Victoria" /></li>
						<li data-name="Vienna"><img src="images/doors/bedroom-vinyl/vienna.jpg" alt="Vienna" /></li>
						<li data-name="Warsaw"><img src="images/doors/bedroom-vinyl/warsaw.jpg" alt="Warsaw" /></li>
						<li data-name="Washington"><img src="images/doors/bedroom-vinyl/washington.jpg" alt="Washington" /></li>
						<li data-name="Westbury"><img src="images/doors/bedroom-vinyl/westbury.jpg" alt="Westbury" /></li>
						<li data-name="Windmere"><img src="images/doors/bedroom-vinyl/windmere.jpg" alt="Windmere" /></li>
						<li data-name="Windsor"><img src="images/doors/bedroom-vinyl/windsor.jpg" alt="Windsor" /></li>
						<li data-name="Zenith"><img src="images/doors/bedroom-vinyl/zenith.jpg" alt="Zenith" /></li>
						<li data-name="Zurich"><img src="images/doors/bedroom-vinyl/zurich.jpg" alt="Zurich" /></li>
					</ul>
				</div>
				<div class="four-col last-col">
					<div class="six-col align-center">
						<img class="zoom-door door-image" src="images/doors/bedroom-vinyl/amalfi-large.jpg" style="height:549px" data-zoom-image="images/doors/bedroom-vinyl/amalfi-large.jpg" alt="" />
						<p class="door-name">Amalfi</p>
					</div>
					<div class="six-col last-col align-center">
						<img src="images/AG.jpg" class="door-colour-image" alt="" />
						<p class="door-colour-name">Agnola Beech</p>
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
						<li data-name="Light Grey"><img src="images/LG.jpg" alt="Light Grey" /></li>
						<li data-name="Lissa Oak"><img src="images/LO.jpg" alt="Lissa Oak" /></li>
						<li data-name="Mali Wenge"><img src="images/MW.jpg" alt="Mali Wenge" /></li>
						<li data-name="Metallic"><img src="images/ME.jpg" alt="Metallic" /></li>
						<li data-name="Mussel"><img src="images/MU.jpg" alt="Mussel" /></li>
						<li data-name="Natural Oak"><img src="images/NO.jpg" alt="Natural Oak" /></li>
						<li data-name="Ontario Maple"><img src="images/OM.jpg" alt="Ontario Maple" /></li>
						<li data-name="Pamplona Oak"><img src="images/PO.jpg" alt="Pamplona Oak" /></li>
						<li data-name="Pearl Dakar"><img src="images/DA.jpg" alt="Pearl Dakar" /></li>
						<li data-name="Pippy Oak"><img src="images/PI.jpg" alt="Pippy Oak" /></li>
						<li data-name="Steamed Beech"><img src="images/SB.jpg" alt="Steamed Beech" /></li>
						<li data-name="Stone Grey"><img src="images/SG.jpg" alt="Stone Grey" /></li>
						<li data-name="Tiepolo (Natural)"><img src="images/TI.jpg" alt="Tiepolo (Natural)" /></li>
						<li data-name="Vintage Oak"><img src="images/VO.jpg" alt="Vintage Oak" /></li>
						<li data-name="White Matt"><img src="images/white.jpg" alt="White Matt" /></li>

						<li data-name="Gloss Anthracite"><img src="images/doors/gloss-anthracite.jpg" alt="Gloss Anthracite" /></li>
						<li data-name="Gloss Aubergine"><img src="images/doors/gloss-aubergine.jpg" alt="Gloss Aubergine" /></li>
						<li data-name="Gloss Beige"><img src="images/doors/gloss-beige.jpg" alt="Gloss Beige" /></li>
						<li data-name="Gloss Black"><img src="images/doors/gloss-black.jpg" alt="Gloss Black" /></li>
						<li data-name="Gloss Burgandy"><img src="images/doors/gloss-burgandy.png" alt="Gloss Burgandy" /></li>
						<li data-name="Gloss Cappuccino"><img src="images/doors/gloss-cappuccino.jpg" alt="Gloss Cappuccino" /></li>
						<li data-name="Gloss Cashmere"><img src="images/doors/bedroom-acrylic/gloss-cashmere.jpg" alt="Gloss Cashmere" /></li>
						<li data-name="Gloss Cream"><img src="images/doors/bedroom-acrylic/gloss-cream.jpg" alt="Gloss Cream" /></li>
						<li data-name="Gloss Dakar"><img src="images/doors/bedroom-acrylic/gloss-dakar.jpg" alt="Gloss Dakar" /></li>
						<li data-name="Gloss Ivory"><img src="images/doors/gloss-ivory.jpg" alt="Gloss Ivory" /></li>
						<li data-name="Gloss Light Grey"><img src="images/doors/bedroom-acrylic/gloss-light-grey.jpg" alt="Gloss Light Grey" /></li>
						<li data-name="Gloss Mira Cosa"><img src="images/doors/gloss-mira-cosa.jpg" alt="Gloss Mira Cosa" /></li>
						<li data-name="Gloss Mussel"><img src="images/doors/bedroom-acrylic/gloss-mussell.jpg" alt="Gloss Mussel" /></li>
						<li data-name="Gloss Red"><img src="images/doors/bedroom-acrylic/gloss-red.jpg" alt="Gloss Red" /></li>
						<li data-name="Gloss Silver"><img src="images/doors/gloss-silver.png" alt="Gloss Silver" /></li>
						<li data-name="Gloss Stone Grey"><img src="images/doors/bedroom-acrylic/gloss-stone-grey.jpg" alt="Gloss Stone Grey" /></li>
						<li data-name="Gloss Tiepolo"><img src="images/doors/bedroom-acrylic/gloss-tiepolo.jpg" alt="Gloss Tiepolo" /></li>
						<li data-name="Gloss Walnut"><img src="images/doors/gloss-walnut.jpg" alt="Gloss Walnut" /></li>
						<li data-name="Gloss White"><img src="images/doors/bedroom-acrylic/gloss-white.jpg" alt="Gloss White" /></li>
					</ul>
				</div>
			</div>

			<div class="row stripe-grey is-hidden doors-row" id="bedrooms-acrylic">
				<h2>Acrylic bedroom doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Made to measure acrylic doors, 18mm worktops and panels</li>
						<li>Large selection of colours with matching or two-tone metallic edging</li>
						<li>Metallic reverse</li>
						<li>10 year guarantee</li>
						<li>1-2 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Gloss Black" style="height:187px"><img src="images/doors/gloss-black.jpg" alt="Gloss Black" style="height:187px" /></li>
						<li data-name="Gloss Brown" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-brown.jpg" alt="Gloss Brown" style="height:187px" /></li>
						<li data-name="Gloss Cashmere" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-cashmere.jpg" alt="Gloss Cashmere" style="height:187px" /></li>
						<li data-name="Gloss Cream" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-cream.jpg" alt="Gloss Cream" style="height:187px" /></li>
						<li data-name="Gloss Dakar" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-dakar.jpg" alt="Gloss Dakar" style="height:187px" /></li>
						<li data-name="Gloss Fossil" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-fossil.jpg" alt="Gloss Fossil" style="height:187px" /></li>
						<li data-name="Gloss Light Grey" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-light-grey.jpg" alt="Gloss Light Grey" style="height:187px" /></li>
						<li data-name="Gloss Mira Cosa" style="height:187px"><img src="images/doors/gloss-mira-cosa.jpg" alt="Gloss Mira Cosa" style="height:187px" /></li>
						<li data-name="Gloss Mussell" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-mussell.jpg" alt="Gloss Mussell" style="height:187px" /></li>
						<li data-name="Gloss Red" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-red.jpg" alt="Gloss Red" style="height:187px" /></li>
						<li data-name="Gloss Stone Grey" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-stone-grey.jpg" alt="Gloss Stone Grey" style="height:187px" /></li>
						<li data-name="Gloss Tiepolo" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-tiepolo.jpg" alt="Gloss Tiepolo" style="height:187px" /></li>
						<li data-name="Gloss White" style="height:187px"><img src="images/doors/bedroom-acrylic/gloss-white.jpg" alt="Gloss White" style="height:187px" /></li>
					</ul>
				</div>
				<div class="two-col last-col align-center">
					<img class="zoom-door door-image" src="images/doors/gloss-black.jpg" height="400px" data-zoom-image="images/doors/gloss-black-large.jpg" alt="" />
					<p class="door-name">Gloss Black</p>
				</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="bedrooms-piece">
				<h2>5-Piece bedroom doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Made to measure service up to a max height of 2250mm</li>
						<li>Doors are 22mm thick bar Empire design which is 18mm</li>
						<li>Matching 18mm or 22mm worktops and panels, along with a huge range of accessories</li>
						<li>Curved doors available</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>Centre bar comes loose so you can pick your ideal height</li>
						<li>Vinyl wrapped on highest quality HDF</li>
						<li>10 year guarantee</li>
						<li>1-2 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="twelve-col">
					<div class="twelve-col">
						<h3>Colours</h3>
						<ul class="colour-list">
							<li data-name="Classic Walnut"><img src="images/CW.jpg" alt="Classic Walnut" /></li>
							<li data-name="Golden Walnut"><img src="images/GW.jpg" alt="Golden Walnut" /></li>
							<li data-name="Ivory"><img src="images/IV.jpg" alt="Ivory" /></li>
							<li data-name="Legno Cashmere"><img src="images/doors/legno-cashmere.png" alt="Legno Cashmere" /></li>
							<li data-name="Legno Dakar"><img src="images/doors/legno-dakar.png" alt="Legno Dakar" /></li>
							<li data-name="Legno Ivory"><img src="images/doors/legno-ivory.png" alt="Legno Ivory" /></li>
							<li data-name="Legno Mussel"><img src="images/LM.jpg" alt="Legno Mussel" /></li>
							<li data-name="Lissa Oak"><img src="images/LO.jpg" alt="Lissa Oak" /></li>
							<li data-name="Pippy Oak"><img src="images/PO.jpg" alt="Pippy Oak" /></li>
							<li data-name="Tiepolo (Natural)"><img src="images/TI.jpg" alt="Tiepolo (Natural)" /></li>
						</ul>
					</div>
					<div class="align-center">
						<img src="images/doors/bedroom-five-piece-doors.jpg" alt="" />
					</div>
				</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="bedrooms-painted">
				<h2>Painted bedroom doors</h2>
					<div class="twelve-col">
						<ul class="list">
							<li>Made to measure service</li>
							<li>Doors are 22mm thick bar 'Hyde' and 'Belair' which are 18mm</li>
							<li>Matching 18mm or 22mm worktops and panels, along with a huge range of accessories</li>
							<li>Curved doors available</li>
							<li>Framed doors supplied with gasket but not glass</li>
							<li>Painted on  highest quality HDF</li>
							<li>10 year guarantee</li>
							<li>2-3 week turnaround</li>
							<li>Samples available upon request</li>
						</ul>
					</div>
					<div class="twelve-col">
						<h3>Colours</h3>
						<ul class="colour-list">
							<li data-name="Dakar" class="selected"><img src="images/DA.jpg" alt="Dakar" /></li>
							<li data-name="Denim"><img src="images/doors/denim.png" alt="Denim" /></li>
							<li data-name="Dust Grey"><img src="images/DG.jpg" alt="Dust Grey" /></li>
							<li data-name="Graphite"><img src="images/doors/graphite.png" alt="Graphite" /></li>
							<li data-name="Ice Blue"><img src="images/doors/ice-blue.png" alt="Ice Blue" /></li>
							<li data-name="Ivory"><img src="images/IV.jpg" alt="Ivory" /></li>
							<li data-name="Cashmere"><img src="images/CM.jpg" alt="Cashmere" /></li>
							<li data-name="Light Grey"><img src="images/LG.jpg" alt="Light Grey" /></li>
							<li data-name="Magnolia"><img src="images/doors/magnolia.png" alt="Magnolia" /></li>
							<li data-name="Mussel"><img src="images/MU.jpg" alt="Mussel" /></li>
							<li data-name="Olive"><img src="images/doors/olive.png" alt="Olive" /></li>
							<li data-name="Stone Grey"><img src="images/SG.jpg" alt="Stone Grey" /></li>
							<li data-name="White"><img src="images/white.jpg" alt="White" /></li>
							<li data-name="Natural Oak"><img src="images/NO.jpg" alt="Natural Oak" /></li>
						</ul>
					</div>
					<div class="twelve-col align-center">
						<img src="images/doors/bedroom-painted-finsbury-dust-grey.jpg" alt="" />
					</div>
					<div class="twelve-col align-center">
						<img src="images/doors/bedroom-painted-hyde-stone-grey.jpg" alt="" />
					</div>
					<div class="twelve-col align-center">
						<img src="images/doors/bedroom-painted-reed-light-grey.jpg" alt="" />
					</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="bedroom-veneered">
				<h2>Veneered bedroom doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Standard bedroom sizes, made to measure not available</li>
						<li>Matching 18mm panels and accessories available</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>10 year guarantee</li>
						<li>2-3 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="twelve-col">
					<div class="twelve-col">
						<h3>Colours</h3>
						<ul class="colour-list">
							<li data-name="Natural Oak Unfinished"><img src="images/doors/natural-oak-unfinished.jpg" alt="Natural Oak Unfinished" /></li>
							<li data-name="Natural Oak Lacquered"><img src="images/doors/natural-oak-lacquered.jpg" alt="Natural Oak Lacquered" /></li>
						</ul>
					</div>
					<div class="align-center">
						<img src="images/doors/bedroom-veneered-doors.jpg" alt="" />
					</div>
				</div>
			</div>

			<div class="row stripe-grey is-hidden doors-row" id="kitchens-vinyl">
				<h2>Vinyl Kitchen doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Complete made to measure service, match any colour shown to your preferred design*</li>
						<li>Modern tones as well as classic wood finishes with the best Vinyl to MFC matches in the industry</li>
						<li>Matching 18mm or 22mm worktops and panels, along with a huge range of accessories</li>
						<li>Made to measure heights on curved doors</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>Vinyl wrapped on highest quality HDF</li>
						<li>10 year guarantee</li>
						<li>1-2 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Amsterdam"><img src="images/doors/kitchen-vinyl/amsterdam-kitchen.jpg" alt="Amsterdam" style="height:87px" /></li>
						<li data-name="Annabelle"><img src="images/doors/kitchen-vinyl/annabelle-kitchen.jpg" alt="Annabelle" style="height:87px" /></li>
						<li data-name="Arch"><img src="images/doors/kitchen-vinyl/arch-kitchen.jpg" alt="Arch" style="height:87px" /></li>
						<li data-name="Argon"><img src="images/doors/kitchen-vinyl/argon-kitchen.jpg" alt="Argon" style="height:87px" /></li>
						<li data-name="Auckland"><img src="images/doors/kitchen-vinyl/auckland-kitchen.jpg" alt="Auckland" style="height:87px" /></li>
						<li data-name="Bourbon"><img src="images/doors/kitchen-vinyl/bourbon-kitchen.jpg" alt="Bourbon" style="height:87px" /></li>
						<li data-name="Brentford"><img src="images/doors/kitchen-vinyl/brentford-kitchen.jpg" alt="Brentford" style="height:87px" /></li>
						<li data-name="Brisbane"><img src="images/doors/kitchen-vinyl/brisbane-kitchen.jpg" alt="Brisbane" style="height:87px" /></li>
						<li data-name="Cairo"><img src="images/doors/kitchen-vinyl/cairo-kitchen.jpg" alt="Cairo" style="height:87px" /></li>
						<li data-name="Calcutta"><img src="images/doors/kitchen-vinyl/calcutta-kitchen.jpg" alt="Calcutta" style="height:87px" /></li>
						<li data-name="Cologne"><img src="images/doors/kitchen-vinyl/cologne-kitchen.jpg" alt="Cologne" style="height:87px" /></li>
						<li data-name="Copenhagen"><img src="images/doors/kitchen-vinyl/copenhagen-kitchen.jpg" alt="Copenhagen" style="height:87px" /></li>
						<li data-name="Derwent"><img src="images/doors/kitchen-vinyl/derwent-kitchen.jpg" alt="Derwent" style="height:87px" /></li>
						<li data-name="Duleek"><img src="images/doors/kitchen-vinyl/duleek-kitchen.jpg" alt="Duleek" style="height:87px" /></li>
						<li data-name="Duleek Letterbox"><img src="images/doors/kitchen-vinyl/duleek-letterbox-kitchen.jpg" alt="Duleek Letterbox" style="height:87px" /></li>
						<li data-name="Euroline"><img src="images/doors/kitchen-vinyl/euroline-kitchen.jpg" alt="Euroline" style="height:87px" /></li>
						<li data-name="Europe"><img src="images/doors/kitchen-vinyl/europe-kitchen.jpg" alt="Europe" style="height:87px" /></li>
						<li data-name="Farmhouse Arch"><img src="images/doors/kitchen-vinyl/farmhouse-arch-kitchen.jpg" alt="Farmhouse Arch" style="height:87px" /></li>
						<li data-name="Farmhouse Square"><img src="images/doors/kitchen-vinyl/farmhouse-square-kitchen.jpg" alt="Farmhouse Square" style="height:87px" /></li>
						<li data-name="Galaxy"><img src="images/doors/kitchen-vinyl/galaxy-kitchen.jpg" alt="Galaxy" style="height:87px" /></li>
						<li data-name="Gallo"><img src="images/doors/kitchen-vinyl/gallo-kitchen.jpg" alt="Gallo" style="height:87px" /></li>
						<li data-name="Glebe"><img src="images/doors/kitchen-vinyl/glebe-kitchen.jpg" alt="Glebe" style="height:87px" /></li>
						<li data-name="Hourglass"><img src="images/doors/kitchen-vinyl/hourglass-kitchen.jpg" alt="Hourglass" style="height:87px" /></li>
						<li data-name="Houston"><img src="images/doors/kitchen-vinyl/houston-kitchen.jpg" alt="Houston" style="height:87px" /></li>
						<li data-name="Madrid"><img src="images/doors/kitchen-vinyl/madrid-kitchen.jpg" alt="Madrid" style="height:87px" /></li>
						<li data-name="Manhatton"><img src="images/doors/kitchen-vinyl/manhattan-kitchen.jpg" alt="Manhatton" style="height:87px" /></li>
						<li data-name="Melbourne"><img src="images/doors/kitchen-vinyl/melbourne-kitchen.jpg" alt="Melbourne" style="height:87px" /></li>
						<li data-name="Metro"><img src="images/doors/kitchen-vinyl/metro-kitchen.jpg" alt="Metro" style="height:87px" /></li>
						<li data-name="Mona"><img src="images/doors/kitchen-vinyl/mona-kitchen.jpg" alt="Mona" style="height:87px" /></li>
						<li data-name="Morris"><img src="images/doors/kitchen-vinyl/morris-kitchen.jpg" alt="Morris" style="height:87px" /></li>
						<li data-name="Oslo"><img src="images/doors/kitchen-vinyl/oslo-kitchen.jpg" alt="Oslo" style="height:87px" /></li>
						<li data-name="Ottawa"><img src="images/doors/kitchen-vinyl/ottawa-kitchen.jpg" alt="Ottawa" style="height:87px" /></li>
						<li data-name="Paris"><img src="images/doors/kitchen-vinyl/paris-kitchen.jpg" alt="Paris" style="height:87px" /></li>
						<li data-name="Prague"><img src="images/doors/kitchen-vinyl/prague-kitchen.jpg" alt="Prague" style="height:87px" /></li>
						<li data-name="Quebec"><img src="images/doors/kitchen-vinyl/quebec-kitchen.jpg" alt="Quebec" style="height:87px" /></li>
						<li data-name="Ribbed Shaker"><img src="images/doors/kitchen-vinyl/ribbed-shaker-kitchen.jpg" alt="Ribbed Shaker" style="height:87px" /></li>
						<li data-name="Rosapenna"><img src="images/doors/kitchen-vinyl/rosapenna-kitchen.jpg" alt="Rosapenna" style="height:87px" /></li>
						<li data-name="Ruskin"><img src="images/doors/kitchen-vinyl/ruskin-kitchen.jpg" alt="Ruskin" style="height:87px" /></li>
						<li data-name="Scoop"><img src="images/doors/kitchen-vinyl/scoop-kitchen.jpg" alt="Scoop" style="height:87px" /></li>
						<li data-name="Slab"><img src="images/doors/kitchen-vinyl/slab-kitchen.jpg" alt="Slab" style="height:87px" /></li>
						<li data-name="Springfield"><img src="images/doors/kitchen-vinyl/springfield-kitchen.jpg" alt="Springfield" style="height:87px" /></li>
						<li data-name="Square"><img src="images/doors/kitchen-vinyl/square-kitchen.jpg" alt="Square" style="height:87px" /></li>
						<li data-name="Stamford"><img src="images/doors/kitchen-vinyl/stamford-kitchen.jpg" alt="Stamford" style="height:87px" /></li>
						<li data-name="Stockholm"><img src="images/doors/kitchen-vinyl/stockholm-kitchen.jpg" alt="Stockholm" style="height:87px" /></li>
						<li data-name="Tressel"><img src="images/doors/kitchen-vinyl/tressel-kitchen.jpg" alt="Tressel" style="height:87px" /></li>
						<li data-name="Twin Square"><img src="images/doors/kitchen-vinyl/twin-square-kitchen.jpg" alt="Twin Square" style="height:87px" /></li>
						<li data-name="Vancouver"><img src="images/doors/kitchen-vinyl/vancouver-kitchen.jpg" alt="Vancouver" style="height:87px" /></li>
						<li data-name="Vienna"><img src="images/doors/kitchen-vinyl/vienna-kitchen.jpg" alt="Vienna" style="height:87px" /></li>
						<li data-name="Warsaw"><img src="images/doors/kitchen-vinyl/warsaw-kitchen.jpg" alt="Warsaw" style="height:87px" /></li>
						<li data-name="Windermere"><img src="images/doors/kitchen-vinyl/windermere-kitchen.jpg" alt="Windermere" style="height:87px" /></li>
					</ul>
				</div>
				<div class="four-col last-col">
					<div class="six-col align-center">
						<img class="zoom-door door-image" src="images/doors/kitchen-vinyl/amsterdam-kitchen.jpg" style="height:240px;" data-zoom-image="images/doors/kitchen-vinyl/amsterdam-kitchen-large.jpg" alt="" />
						<p class="door-name">Amsterdam</p>
					</div>
					<div class="six-col last-col align-center">
						<img src="images/AG.jpg" class="door-colour-image" style="height:242px;" alt="" />
						<p class="door-colour-name">Agnola Beech</p>
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
						<li data-name="Light Grey"><img src="images/LG.jpg" alt="Light Grey" /></li>
						<li data-name="Lissa Oak"><img src="images/LO.jpg" alt="Lissa Oak" /></li>
						<li data-name="Mali Wenge"><img src="images/MW.jpg" alt="Mali Wenge" /></li>
						<li data-name="Metallic"><img src="images/ME.jpg" alt="Metallic" /></li>
						<li data-name="Mussel"><img src="images/MU.jpg" alt="Mussel" /></li>
						<li data-name="Natural Oak"><img src="images/NO.jpg" alt="Natural Oak" /></li>
						<li data-name="Ontario Maple"><img src="images/OM.jpg" alt="Ontario Maple" /></li>
						<li data-name="Pamplona Oak"><img src="images/PO.jpg" alt="Pamplona Oak" /></li>
						<li data-name="Pearl Dakar"><img src="images/DA.jpg" alt="Pearl Dakar" /></li>
						<li data-name="Pippy Oak"><img src="images/PI.jpg" alt="Pippy Oak" /></li>
						<li data-name="Steamed Beech"><img src="images/SB.jpg" alt="Steamed Beech" /></li>
						<li data-name="Stone Grey"><img src="images/SG.jpg" alt="Stone Grey" /></li>
						<li data-name="Tiepolo (Natural)"><img src="images/TI.jpg" alt="Tiepolo (Natural)" /></li>
						<li data-name="Vintage Oak"><img src="images/VO.jpg" alt="Vintage Oak" /></li>
						<li data-name="White Matt"><img src="images/white.jpg" alt="White Matt" /></li>
					</ul>
				</div>

				<h3>Gloss Colours</h3>
				<ul class="colour-list eight-col">
					<li data-name="Gloss Anthracite"><img src="images/doors/gloss-anthracite.jpg" alt="Gloss Anthracite" /></li>
					<li data-name="Gloss Aubergine"><img src="images/doors/gloss-aubergine.jpg" alt="Gloss Aubergine" /></li>
					<li data-name="Gloss Beige"><img src="images/doors/gloss-beige.jpg" alt="Gloss Beige" /></li>
					<li data-name="Gloss Black"><img src="images/doors/gloss-black.jpg" alt="Gloss Black" /></li>
					<li data-name="Gloss Burgandy"><img src="images/doors/gloss-burgandy.png" alt="Gloss Burgandy" /></li>
					<li data-name="Gloss Cappuccino"><img src="images/doors/gloss-cappuccino.jpg" alt="Gloss Cappuccino" /></li>
					<li data-name="Gloss Cashmere"><img src="images/doors/bedroom-acrylic/gloss-cashmere.jpg" alt="Gloss Cashmere" /></li>
					<li data-name="Gloss Cream"><img src="images/doors/bedroom-acrylic/gloss-cream.jpg" alt="Gloss Cream" /></li>
					<li data-name="Gloss Dakar"><img src="images/doors/bedroom-acrylic/gloss-dakar.jpg" alt="Gloss Dakar" /></li>
					<li data-name="Gloss Ivory"><img src="images/doors/gloss-ivory.jpg" alt="Gloss Ivory" /></li>
					<li data-name="Gloss Light Grey"><img src="images/doors/bedroom-acrylic/gloss-light-grey.jpg" alt="Gloss Light Grey" /></li>
					<li data-name="Gloss Mira Cosa"><img src="images/doors/gloss-mira-cosa.jpg" alt="Gloss Mira Cosa" /></li>
					<li data-name="Gloss Mussel"><img src="images/doors/bedroom-acrylic/gloss-mussell.jpg" alt="Gloss Mussel" /></li>
					<li data-name="Gloss Red"><img src="images/doors/bedroom-acrylic/gloss-red.jpg" alt="Gloss Red" /></li>
					<li data-name="Gloss Silver"><img src="images/doors/gloss-silver.png" alt="Gloss Silver" /></li>
					<li data-name="Gloss Stone Grey"><img src="images/doors/bedroom-acrylic/gloss-stone-grey.jpg" alt="Gloss Stone Grey" /></li>
					<li data-name="Gloss Tiepolo"><img src="images/doors/bedroom-acrylic/gloss-tiepolo.jpg" alt="Gloss Tiepolo" /></li>
					<li data-name="Gloss Walnut"><img src="images/doors/gloss-walnut.jpg" alt="Gloss Walnut" /></li>
					<li data-name="Gloss White"><img src="images/doors/bedroom-acrylic/gloss-white.jpg" alt="Gloss White" /></li>
				</ul>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-acrylic">
				<h2>Acrylic kitchen doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Made to measure acrylic doors, 18mm worktops and panels</li>
						<li>Large selection of colours with matching or two-tone metallic edging</li>
						<li>Metallic reverse</li>
						<li>10 year guarantee</li>
						<li>1-2 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Gloss Black" style="height:87px"><img src="images/doors/gloss-black.jpg" alt="Gloss Black" style="height:87px" /></li>
						<li data-name="Gloss Brown" style="height:87px"><img src="images/doors/gloss-brown.jpg" alt="Gloss Brown" style="height:87px" /></li>
						<li data-name="Gloss Cashmere" style="height:87px"><img src="images/doors/gloss-cashmere.jpg" alt="Gloss Cashmere" style="height:87px" /></li>
						<li data-name="Gloss Cream" style="height:87px"><img src="images/doors/gloss-cream.jpg" alt="Gloss Cream" style="height:87px" /></li>
						<li data-name="Gloss Dakar" style="height:87px"><img src="images/doors/gloss-dakar.jpg" alt="Gloss Dakar" style="height:87px" /></li>
						<li data-name="Gloss Fossil" style="height:87px"><img src="images/doors/gloss-fossil.jpg" alt="Gloss Fossil" style="height:87px" /></li>
						<li data-name="Gloss Light Grey" style="height:87px"><img src="images/doors/gloss-light-grey.jpg" alt="Gloss Light Grey" style="height:87px" /></li>
						<li data-name="Gloss Mira Cosa" style="height:87px"><img src="images/doors/gloss-mira-cosa.jpg" alt="Gloss Mira Cosa" style="height:87px" /></li>
						<li data-name="Gloss Mussell" style="height:87px"><img src="images/doors/gloss-mussell.jpg" alt="Gloss Mussell" style="height:87px" /></li>
						<li data-name="Gloss Red" style="height:87px"><img src="images/doors/gloss-red.jpg" alt="Gloss Red" style="height:87px" /></li>
						<li data-name="Gloss Stone Grey" style="height:87px"><img src="images/doors/gloss-stone-grey.jpg" alt="Gloss Stone Grey" style="height:87px" /></li>
						<li data-name="Gloss Tiepolo" style="height:87px"><img src="images/doors/gloss-tiepolo.jpg" alt="Gloss Tiepolo" style="height:87px" /></li>
						<li data-name="Gloss White" style="height:87px"><img src="images/doors/gloss-white.jpg" alt="Gloss White" style="height:87px" /></li>
					</ul>
				</div>
				<div class="four-col last-col align-center">
					<img class="zoom-door door-image" src="images/doors/gloss-black.jpg" data-zoom-image="images/doors/gloss-black-large.jpg" alt="" style="height:240px;" />
					<p class="door-name">Gloss Black</p>
				</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-piece">
				<h2>5-Piece kitchen doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Made to measure service up to a max height of 2250mm</li>
						<li>Doors are 22mm thick bar Empire design which is 18mm</li>
						<li>Matching 18mm or 22mm worktops and panels, along with a huge range of accessories</li>
						<li>Curved doors available</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>Centre bar comes loose so you can pick your ideal height</li>
						<li>Vinyl wrapped on highest quality HDF</li>
						<li>10 year guarantee</li>
						<li>1-2 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Empire Pippy Oak" style="height:87px"><img src="images/doors/kitchen-5-piece/empire-pippy-oak.jpg" alt="Empire Pippy Oak" style="height:87px" /></li>
						<li data-name="Pesaro Legno Cashmere" style="height:87px"><img src="images/doors/kitchen-5-piece/pesaro-legno-cashmere.jpg" alt="Pesaro Legno Cashmere" style="height:87px" /></li>
						<li data-name="Pesaro Legno Dakar" style="height:87px"><img src="images/doors/kitchen-5-piece/pesaro-legno-dakar.jpg" alt="Pesaro Legno Dakar" style="height:87px" /></li>
						<li data-name="Pesaro Legno Ivory" style="height:87px"><img src="images/doors/kitchen-5-piece/pesaro-legno-ivory.jpg" alt="Pesaro Legno Ivory" style="height:87px" /></li>
						<li data-name="Pesaro Legno Mussel" style="height:87px"><img src="images/doors/kitchen-5-piece/pesaro-legno-mussel.jpg" alt="Pesaro Legno Mussel" style="height:87px" /></li>
						<li data-name="Turin Lissa Oak" style="height:87px"><img src="images/doors/kitchen-5-piece/turin-lissa-oak.jpg" alt="Turin Lissa Oak" style="height:87px" /></li>
						<li data-name="Tuscany Classic Walnut" style="height:87px"><img src="images/doors/kitchen-5-piece/tuscany-classic-walnut.jpg" alt="Tuscany Classic Walnut" style="height:87px" /></li>
						<li data-name="Tuscany Golden Walnut" style="height:87px"><img src="images/doors/kitchen-5-piece/tuscany-golden-walnut.jpg" alt="Tuscany Golden Walnut" style="height:87px" /></li>
						<li data-name="Tuscany Ivory" style="height:87px"><img src="images/doors/kitchen-5-piece/tuscany-ivory.jpg" alt="Tuscany Ivory" style="height:87px" /></li>
						<li data-name="Tuscany Light Tiepolo" style="height:87px"><img src="images/doors/kitchen-5-piece/tuscany-light-tiepolo.jpg" alt="Tuscany Light Tiepolo" style="height:87px" /></li>
						<li data-name="Tuscany Lissa Oak" style="height:87px"><img src="images/doors/kitchen-5-piece/tuscany-lissa-oak.jpg" alt="Tuscany Lissa Oak" style="height:87px" /></li>
					</ul>
				</div>
				<div class="four-col last-col align-center">
					<img class="zoom-door door-image" src="images/doors/kitchen-5-piece/empire-pippy-oak.jpg" data-zoom-image="images/doors/kitchen-5-piece/empire-pippy-oak-large.jpg" alt="" style="height:240px;" />
					<p class="door-name">Empire Pippy Oak</p>
				</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-painted">
				<h2>Painted kitchen doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Made to measure service on Arena, Belair, Finsbury, Hartford &amp; Hyde. Albany (Solid), Greenwich (Solid), Hampton (Solid), Millburn (Solid)  & Luzzi standard kitchen sizes only</li>
						<li>Only Luzzi available in Gloss Cashmere, Gloss Ivory, Gloss Light Grey &amp; Gloss White (Stock)</li>
						<li>Only Greenwich &amp; Millburn available lacquered, also available sanded</li>
						<li>Doors are 22mm thick bar 'Hyde' and 'Belair' which are 18mm</li>
						<li>Matching 18mm or 22mm worktops and panels as well as accessories available</li>
						<li>Curved doors available</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>Painted on  highest quality HDF or solid wood</li>
						<li>10 year guarantee</li>
						<li>2-3 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Albany" style="height:87px"><img src="images/doors/kitchen-painted/Albany.jpg" alt="Albany" style="height:87px" /></li>
						<li data-name="Arena" style="height:87px"><img src="images/doors/kitchen-painted/Arena.jpg" alt="Arena" style="height:87px" /></li>
						<li data-name="Finsbury" style="height:87px"><img src="images/doors/kitchen-painted/Finsbury.jpg" alt="Finsbury" style="height:87px" /></li>
						<li data-name="Greenwich" style="height:87px"><img src="images/doors/kitchen-painted/Greenwich.jpg" alt="Greenwich" style="height:87px" /></li>
						<li data-name="Hampton" style="height:87px"><img src="images/doors/kitchen-painted/Hampton.jpg" alt="Hampton" style="height:87px" /></li>
						<li data-name="Hartford" style="height:87px"><img src="images/doors/kitchen-painted/Hartford.jpg" alt="Hartford" style="height:87px" /></li>
						<li data-name="Hyde" style="height:87px"><img src="images/doors/kitchen-painted/Hyde.jpg" alt="Hyde" style="height:87px" /></li>
						<li data-name="Luzzi" style="height:87px"><img src="images/doors/kitchen-painted/Luzzi.jpg" alt="Luzzi" style="height:87px" /></li>
						<li data-name="Millburn" style="height:87px"><img src="images/doors/kitchen-painted/Millburn.jpg" alt="Millburn" style="height:87px" /></li>
					</ul>
				</div>
				<div class="two-col align-center">
					<img class="zoom-door door-image" src="images/doors/kitchen-painted/Albany.jpg" style="height:242px;" data-zoom-image="images/doors/kitchen-painted/Albany-large.jpg" alt="" />
					<p class="door-name">Albany</p>
				</div>
				<div class="two-col last-col align-center">
					<img src="images/DA.jpg" class="door-colour-image" style="height:244px;" alt="" />
					<p class="door-colour-name">Dakar</p>
				</div>
				<div class="twelve-col">
					<h3>Colours</h3>
					<ul class="colour-list">
						<li data-name="Anthracite Lacquer" class="selected"><img src="images/doors/anthracite-lacquer.png" alt="Anthracite Lacquer" /></li>
						<li data-name="Chocolate Lacquer" class="selected"><img src="images/doors/chocolate-lacquer.png" alt="Chocolate Lacquer" /></li>
						<li data-name="Dakar"><img src="images/DA.jpg" alt="Dakar" /></li>
						<li data-name="Denim"><img src="images/doors/denim.png" alt="Denim" /></li>
						<li data-name="Dust Grey"><img src="images/DG.jpg" alt="Dust Grey" /></li>
						<li data-name="Graphite"><img src="images/doors/graphite.png" alt="Graphite" /></li>
						<li data-name="Ice Blue"><img src="images/doors/ice-blue.png" alt="Ice Blue" /></li>
						<li data-name="Ivory"><img src="images/IV.jpg" alt="Ivory" /></li>
						<li data-name="Cashmere"><img src="images/CM.jpg" alt="Cashmere" /></li>
						<li data-name="Light Grey"><img src="images/LG.jpg" alt="Light Grey" /></li>
						<li data-name="Magnolia"><img src="images/doors/magnolia.png" alt="Magnolia" /></li>
						<li data-name="Mussel"><img src="images/MU.jpg" alt="Mussel" /></li>
						<li data-name="Natural Lacquer"><img src="images/doors/natural-oak-lacquered.jpg" alt="Natural Lacquer" /></li>
						<li data-name="Olive"><img src="images/doors/olive.png" alt="Olive" /></li>
						<li data-name="Stone Grey"><img src="images/SG.jpg" alt="Stone Grey" /></li>
						<li data-name="White"><img src="images/white.jpg" alt="White" /></li>
						<li data-name="Gloss Cashmere"><img src="images/doors/bedroom-acrylic/gloss-cashmere.jpg" alt="Gloss Cashmere" /></li>
						<li data-name="Gloss Ivory"><img src="images/doors/gloss-ivory.jpg" alt="Gloss Ivory" /></li>
						<li data-name="Gloss Light Grey"><img src="images/doors/bedroom-acrylic/gloss-light-grey.jpg" alt="Gloss Light Grey" /></li>
						<li data-name="Gloss White"><img src="images/doors/bedroom-acrylic/gloss-white.jpg" alt="Gloss White" /></li>
					</ul>
				</div>
			</div>
			<div class="row stripe-grey is-hidden doors-row" id="kitchens-solid">
				<h2>Solid kitchen doors</h2>
				<div class="twelve-col">
					<ul class="list">
						<li>Standard kitchen sizes, made to measure not available</li>
						<li>Matching 18mm panels and accessories available</li>
						<li>Framed doors supplied with gasket but not glass</li>
						<li>10 year guarantee</li>
						<li>2-3 week turnaround</li>
						<li>Samples available upon request</li>
					</ul>
				</div>
				<div class="eight-col">
					<ul class="door-list">
						<li class="selected" data-name="Harvard" style="height:87px"><img src="images/doors/kitchen-solid/Harvard.jpg" alt="Harvard" style="height:87px" /></li>
						<li data-name="Princeton" style="height:87px"><img src="images/doors/kitchen-solid/Princeton.jpg" alt="Princeton" style="height:87px" /></li>
						<li data-name="Shaker" style="height:87px"><img src="images/doors/kitchen-solid/Shaker.jpg" alt="Shaker" style="height:87px" /></li>
						<li data-name="Yale" style="height:87px"><img src="images/doors/kitchen-solid/Yale.jpg" alt="Yale" style="height:87px" /></li>
					</ul>
				</div>
				<div class="four-col last-col align-center">
					<img class="zoom-door door-image" src="images/doors/kitchen-solid/Harvard.jpg" data-zoom-image="images/doors/kitchen-solid/Harvard-large.jpg" alt="" />
					<p class="door-name">Harvard</p>
				</div>
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
					$(currentDoor).find('.door-list li:first-of-type').trigger( "click" );
					$(currentDoor).find('.colour-list:not(.twelve-col) li:first-of-type').trigger( "click" );
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
					var largeImage = 'url(' + imageSrc.replace('.jpg','') + '-large.jpg)';
					$(".zoomContainer .zoomLens").css('background-image', largeImage);
				});

				$(".zoom-door").elevateZoom({
					zoomType	: "lens",
					lensShape : "round",
					lensSize : 200
				});
			});
		</script>
</body>
</html>
