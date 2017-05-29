<?php
include("functions.php");

$sid = false;
$qty = false;
if(isset($_POST["sid"]) && isset($_POST["qty"]) && $_POST["sid"] != '' && $_POST["qty"] != ''){
	$sid = $_POST["sid"];
	$qty = $_POST["qty"];
	$expire = time()+60*60*24;
	$existing = '';

	if(isset($_COOKIE["stellafoamorder"])){
		$orderList = explode('|',$_COOKIE["stellafoamorder"]);
		$readding = false;
		for($i = 0; $i < count($orderList); $i++){
			$orderDetail = explode('-',$orderList[$i]);
			if($orderDetail[0] == $sid){
				$orderDetail[1] += $qty;
				$orderList[$i] = implode('-',$orderDetail );
				$readding = true;
			}
		}
		$existing = implode('|',$orderList);
	}

	if($readding){
		setcookie("stellafoamorder", $existing, $expire);
	}else{
		$existing .= ($existing != '')?'|':'';
		setcookie("stellafoamorder", $existing.$sid.'-'.$qty, $expire);
	}

}
?>
<div id="breadcrumb">
	<a href="/" title="Homepage">Homepage</a> > Page not found
    <div style="float:right;margin-right:2px;">
     	<?php
			$amount = 0;
			if(isset($_COOKIE["stellafoamorder"])){
				$amount = count(explode('|',$_COOKIE["stellafoamorder"]));
			}
			if($sid && !$readding){ $amount++; }
			echo '<strong>Order List:</strong> '.$amount.' items - ';
		?>
        <a href="/cart.php">View basket</a>
	</div>
    <?php
		include '_includes/crumbuser.php';
	?>
</div>

<div style="margin-top:30px;">
<div id="content" class="page-not-found">
			<div style="clear:both;"></div>
	<h1>404: Page not found.</h1>
	<p>Sorry, we couldn&rsquo;t find that page.</p>
</div>

        <?php
			include  'footer.php';
    	?>
</div></div>
