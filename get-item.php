<?php

include("config.php");
define('sessionlen',20000);
if(isset($_REQUEST["q"]) && $_REQUEST["q"] != ''){
	if(isset($_REQUEST["design"]) && $_REQUEST["design"] == '1'){
		$return = get_stock(urldecode($_REQUEST["q"]), true);
	} else {
		$return = get_stock(urldecode($_REQUEST["q"]));
	}
	echo $return === "" ? "No stock found" : $return;
}

function get_stock( $id, $withDesign=false ){

	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	if ($withDesign) {
		$design = substr($id, -2, 2);
		$id = mysql_real_escape_string(substr($id, 0, -1));
		$SQL = "SELECT *,Product_Title FROM stock,products WHERE (Stock_Code = '".$id."' OR Stock_Code = '".$design."') AND stock.Product_ID = products.Product_ID ORDER BY Product_Title";
		$result = mysql_query($SQL);
		mysql_close($con);
		$return_array = array();
		if(mysql_num_rows($result) > "0") {
			while($row = mysql_fetch_array($result)) {
				$return_array[] = $row;
			}
		}else{
			return false;
		}
		return json_encode($return_array);
	} else {
		$id = mysql_real_escape_string($id);
		$SQL = "SELECT *,Product_Title FROM stock,products WHERE Stock_Code = '".$id."' AND stock.Product_ID = products.Product_ID";
		$result = mysql_query($SQL);
		mysql_close($con);
		if(mysql_num_rows($result) > "0") {
			while($row = mysql_fetch_array($result)) {
				return json_encode($row);
			}
		}else{
			return false;
		}
	}
}

?>
