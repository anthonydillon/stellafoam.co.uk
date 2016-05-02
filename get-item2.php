<?php

include("config.php");
define('sessionlen',20000);
if(isset($_REQUEST["q"]) && $_REQUEST["q"] != ''){
	echo htmlspecialchars($_REQUEST["q"], ENT_QUOTES) . '<br>';
	$return = get_stock(urldecode($_REQUEST["q"]));
	echo $return === "" ? "No stock found" : $return;
}

function get_stock( $id ){

	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$id = mysql_real_escape_string($id);
	$SQL = "SELECT *,Product_Title FROM stock,products WHERE Stock_Code = '".$id."' AND stock.Product_ID = products.Product_ID";
	echo $SQL;
	$result = mysql_query($SQL);
	$return_array = array();
	mysql_close($con);
	if(mysql_num_rows($result) > "0") {
		while($row = mysql_fetch_array($result)) {
			return json_encode($row);
		}
	}else{
		return false;
	}
}

?>