<?php

include("functions.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Stellafoam - Kitchens Made Simple</title>
	<?php
		include  'meta.php';
    ?>

    <style type="text/css">
	#content{
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
		margin-bottom: 1em;
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
		margin: 0 0 50px 50px;
		border-radius: 50%;
		overflow: hidden;
		width: 250px;
		height: 250px;
	}
	.eight-col {
		width: 80%;
	}
	.three-col {
		width: 23.30%;
		margin-right: 20px;
		float: left;
	}
	.four-col {
		width: 31.5%;
		margin-right: 20px;
		float: left;
	}
	.six-col {
		width: 48%;
		margin-right: 20px;
		float: left;
	}
	.last-col {
		margin-right: 0;
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
	.step span {
		display: inline;
		background: #333;
		color: #fff;
		border-radius: 50%;
		padding: 10px 18px;
		font-size: 18px;
		margin-right: 4px;
	}
	.select-unit__input,
	.select-design__input,
	.select-quantity__input {
    	font-weight: 300;
		width: 100%;
		height: 30px;
		border: 1px solid #333;
		margin-top: 20px;
		margin-bottom: 20px;
		background: #fff;
		padding-left: 10px;
		padding-right: 10px;
	}

	.select-quantity__input {
		width: 100%;
	}

	.select-unit,
	.select-design {
		margin-bottom: 30px;
		text-align: center;
	}

	.select-unit__image,
	.select-design__image {
		width: 100%;
	}

	.summary-list {
		margin: 20px 0;
	}

	.summary-list li {
		font-size: 16px;
		line-height: 2.5;
		margin-bottom: .4em;
		font-weight: 300;
	}

	.box {
		-moz-box-sizing: border-box;
		-webkit-box-sizing: border-box;
		box-sizing: border-box;
		border: 1px solid #888;
		padding: 15px;
	}

	.design-list {
		width: 100%;
		font-size: 14px;
		border-collapse: collapse;
		box-sizing: border-box;
    	-moz-box-sizing: border-box;
    	-webkit-box-sizing: border-box;
	}

	.design-list .right {
		text-align: right;
		font-weight: 700;
		padding-right: 5px;
	}

	.design-list th {
		padding-bottom: 10px;
	}

	.design-list tbody tr {
		border-top: 1px solid #d7d7d7;
	}

	.design-list tbody {
		border-bottom: 1px solid #d7d7d7;
	}

	.design-list td {
		padding: 10px 0;
	}

	.primary-button:link,
	.primary-button:visited,
	.secondary-button:link,
	.secondary-button:visited {
		-webkit-transition: background .3s;
		-moz-transition: background .3s;
		transition: background .3s;
		width: 90%;
		display: inline-block;
		padding: 13px;
		color: #fff;
		font-size: 16px;
		background: #016BB5;
		text-align: center;
	}

	.primary-button:hover {
		text-decoration: none;
		background: #027FD9;
	}

	.secondary-button:link,
	.secondary-button:visited {
		-webkit-transition: background .3s;
		-moz-transition: background .3s;
		transition: background .3s;
		width: auto;
		display: inline-block;
		padding: 10px;
		color: #333;
		font-size: 16px;
		background: #fff;
		text-align: center;
		border: 1px solid #888;
	}

	.secondary-button:hover {
		text-decoration: none;
		background: #d7d7d7;
	}

	.submit-button,
	.print-button {
		float: left;
	}

	.print-button img {
		height: 20px;
	}

	.button-group {
		margin-top: -50px;
		margin-bottom: 10px;
	}

	.delete-icon:link,
	.delete-icon:visited {
		-webkit-transition: background .3s;
		-moz-transition: background .3s;
		transition: background .3s;
		color: #fff;
		background: #d9534f;
		border-color: #d43f3a;
		border-radius: 50%;
		padding: 2px 7px 4px;
		float: right;
		line-height: 1;
	}

	.delete-button:hover {
		background: #c9302c;
		text-decoration: none;
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

        <div id="breadcrumb"><a href="/" title="Homepage">Homepage</a> > Kitchens Made Simple
        	<div style="float:right;margin-right:2px;">
             	<?php
					$amount = 0;
					if(isset($_COOKIE["stellafoamorder"])){
						$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
					}
					echo '<strong>Order List:</strong> '.$amount.' items - ';
				?>
                <a href="/stellafoam/cart.php">Basket</a>
        	</div>
        </div>
        <div id="content">
        	<div class="row">
				<iframe src="http://www.articad.net/myroomplan/planner-manager/?id=125&v=2&guid1=32023178&guid2=9044" width=1000 height=500></iframe>
			</div>

			<div style="clear:both"></div>
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