<?php
$loggedIn = false;
$user = array();

if(isset($_COOKIE['stellafoamuser'])){
	$splitCookie = explode('_', $_COOKIE['stellafoamuser']);
	if($splitCookie[1] > time()-sessionlen){
		if(generate_hash($splitCookie[2].$splitCookie[1]) == $splitCookie[0]){
			$loggedIn = true;
			$user = array($splitCookie[3],$splitCookie[2]);
		}
	}
}

if($loggedIn){
	echo '<div style="float:right;width: 425px;">'.$user[0].' - <a href="downloads.php">User Downloads</a> - <a href="logout.php">Logout</a></div>';
}

?>