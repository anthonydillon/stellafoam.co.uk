<?php

include("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - About Us</title>
	<?php
		include  'meta.php';
    ?>

    <style type="text/css">
	#content{
    	font-family: 'Open Sans', sans-serif;
    	font-weight: 300;
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
	#footer a {
		color: #016bb5;
		font-size: 13px;
	}
	#content {
		padding: 0;
	}
	#content h1 {
		font-size: 32px;
		line-height: 1.3;
		margin-bottom: .6em;
	}
	#content h2 {
		font-size: 26px;
		line-height: 1.4;
		margin-bottom: .5em;
		font-weight: 300;
	}
	#content h3 {
		font-size: 18px;
		line-height: 1.5;
		margin-bottom: .4em;
		font-weight: 300;
	}
	#content h4 {
		font-size: 16px;
		line-height: 1.5;
		margin-bottom: .5em;
	}
	#content p {
		font-size: 16px;
		line-height: 1.5;
		margin-bottom: 1em;
	}
	.hero-image {
		float:right;
		margin: 0 0 0 50px;
		border-radius: 50%;
		overflow: hidden;
		width: 250px;
		height: 250px;
	}
	.row {
		text-align:left;
		padding: 40px;
	}
	.row.stripe-grey {
		background: #f7f7f7;
	}
	.row.stripe-dark {
		background: #333;
		color: #fff;
	}
	.row .align-right {
		float: right;
		margin: 0 0 50px 50px;
	}
	.row .align-left {
		float: left;
		margin: 0 50px 50px 0;
	}
	.product-list,
	.management-list {
		list-style: none;
		padding: 0;
		margin: 20px 0 0;
	}
	.product-list li {
		width: 140px;
		margin-right: 40px;
		display: inline-block;
		text-align: center;
	}
	.first-row {
		margin-bottom: 30px;
	}
	.product-list li.last-item,
	.management-list li.last-item {
		margin-right: 0;
	}
	.product-list .product-list__image,
	.management-list .management-list__image {
		display: block;
		overflow: hidden;
		margin-bottom: 10px;
		border-radius: 10px;
		width: 140px;
		height: 140px;
	}
	.product-list .product-list__image img {
		width: 140px;
		height: 140px;
	}
	#content .product-list .product-list__long {
		font-size: 16px;
		margin-top: 12px;
	}
	.management-list li {
		width: 420px;
		margin-right: 40px;
		margin-bottom: 20px;
		display: inline-block;
	}
	.management-list .management-list__image {
		width: 140px;
		height: 140px;
		float: left;
		display: inline;
		margin-right: 20px;
	}
	.management-list h3 {
		margin-top: 50px;
	}
	.enquires {
		float: right;
	}
	.map {
		margin-top: 40px;
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > About Us
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/stellafoam/cart.php">View List</a>
        	</div>
        </div>
        <div id="content">
        	<div class="row">
				<div>
					<h1>About us</h1>
					<h2>Our story</h2>
					<div class="hero-image"><img src="aboutus.jpg" alt="About Us Image" /></div>
					<div>
						<p>Founded in 1960 by Leslie Jarvis, Stellafoam began trading supplying foam, rubber and plastics to the furniture industry. Now in its 3rd generation, Stellafoam has become a leading importer and distributor to the industry. Trading from its custom built 30,000 square foot premises just outside of London and delivering using its own fleet of vehicles, Stellafoam has become a one-stop shop to both sole traders and large industrial clients alike. </p>
					</div>
				</div>
			</div>

			<div class="row stripe-dark">
				<h2>Our strengths</h2>
				<p>Stellafoam specialises in co-ordinated ranges that include boards, doors, sliding doors, worktops, profiles, edgings and accessories as well as an extensive range of fittings which include drawers, runners, hinges, handles and sundries. </p>
				<ul class="product-list">
					<li class="first-row">
						<div class="product-list__image">
							<img src="/images/RV.jpg" alt="" />
						</div>
						<h3>Boards</h3>
					</li>
					<li class="first-row">
						<div class="product-list__image">
							<img src="/images/about/doors.jpg" alt="" />
						</div>
						<h3>Doors</h3>
					</li>
					<li class="first-row">
						<div class="product-list__image">
							<img src="/images/about/sliding-doors.jpg" alt="" />
						</div>
						<h3>Sliding doors</h3>
					</li>
					<li class="first-row">
						<div class="product-list__image">
							<img src="/images/NPD.jpg" alt="" />
						</div>
						<h3>Drawers</h3>
					</li class="first-row">
					<li class="first-row last-item">
						<div class="product-list__image">
							<img src="/images/about/clicbox-logo.jpg" alt="" />
						</div>
						<h3 class="product-list__long">Kitchen carcasses</h3>
					</li>
					<li>
						<div class="product-list__image">
							<img src="/images/about/blum-logo.png" alt="" />
						</div>
						<h3>Blum</h3>
					</li>
					<li>
						<div class="product-list__image">
							<img src="/images/about/worktops.jpg" alt="" />
						</div>
						<h3>Worktops</h3>
					</li>
					<li>
						<div class="product-list__image">
							<img src="/images/about/profiles.jpg" alt="" />
						</div>
						<h3>Profiles</h3>
					</li>
					<li>
						<div class="product-list__image">
							<img src="/images/disco-handle.jpg" alt="" />
						</div>
						<h3>Handles</h3>
					</li>
					<li class="last-item">
						<div class="product-list__image">
							<img src="/images/about/edging.jpg" alt="" />
						</div>
						<h3>Edging</h3>
					</li>
				</ul>
			</div>

			<div class="row stripe-grey">
				<h2>Our management team</h2>
				<ul class="management-list">
					<li>
						<img src="/images/placeholder_male.png" alt="" class="management-list__image" >
						<h3>Mark Reed</h3>
						<h4>Managing Director</h4>
					</li>
					<li class="last-item">
						<img src="/images/placeholder_male.png" alt="" class="management-list__image" >
						<h3>Steven Reed</h3>
						<h4>Sales Office Manager</h4>
					</li>
					<li>
						<img src="/images/placeholder_male.png" alt="" class="management-list__image" >
						<h3>Lee Fearn</h3>
						<h4>General Manager</h4>
					</li>
					<li class="last-item">
						<img src="/images/placeholder_female.png" alt="" class="management-list__image" >
						<h3>Nicola Fairley</h3>
						<h4>Accounts Manager</h4>
					</li>
					<li>
						<img src="/images/placeholder_male.png" alt="" class="management-list__image" >
						<h3>Ken Hawkins</h3>
						<h4>Warehousing &amp; Transport Manager</h4>
					</li>
				</ul>
			</div>

			<div class="row">
				<h2>Contact us</h2>
				<div class="enquires">
					<h3>Enquiries</h3>
					<p>Telephone: 01708 522551</p>
					<p>Email: <a href="mailto:sales@stellafoam.co.uk">sales@stellafoam.co.uk</a></p>
				</div>
				<div class="support">
					<h3>Visit us at</h3>
					<p>Stellafoam Ltd.<br />
					Blackwater Close<br />
					Fairview industrial Park<br />
					Rainham<br />
					Essex RM13 8UA</p>
				</div>
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.863565672723!2d0.17586899999999014!3d51.515719000000026!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a5581b84a1f5%3A0xbcdc533d5a8c2080!2sStellafoam+Ltd!5e0!3m2!1sen!2sus!4v1424820600536" width="884" height="450" frameborder="0" style="border:0"></iframe>
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
</body>
</html>
