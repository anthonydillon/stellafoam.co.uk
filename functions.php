<?php

include("config/config.php");
define('sessionlen',20000);

function generate_hash( $value ){

	$valueLen = strLen( $value );

	$majorPepper = substr(s1,0,$valueLen+1);

	$n=$valueLen;
	$valuePeppered = '';
	while( $n-- ){
		$valuePeppered .= $value[$n].$majorPepper[$n];
	}

	$h1 = md5( s1 . substr($valuePeppered,0,$valueLen).$valueLen . s2 );
	$h2 = md5( s3 . substr($valuePeppered,$valueLen).$valueLen . s4 );

	$h = substr( $h1,0,8) . substr( $h2,8,8) . substr( $h1,8,8) . substr( $h2,16,8) . substr( $h1,16,8) . substr( $h2,24,8) . substr( $h1,24,8) . substr( $h2,0,8);
	return ( $h );
}

function getUserDetails($userID){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$pass = md5($pass.key);
	$SQL = "SELECT * FROM user WHERE User_ID = ".$userID;
	$result = mysql_query($SQL);

	mysql_close($con);

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_array($result)) {
  			return array($row['User_Name'],$row['User_Company'],$row['User_Address'],$row['User_Telephone'],$row['User_Email'],$row['User_Delivery_Address']);
		}
	}else{
		return false;
	}
}

function checkLogin($user, $pass){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$pass = md5($pass.key);
	$SQL = "SELECT * FROM user WHERE User_Username = '".$user."' AND User_Password = '".$pass."'";
	$result = mysql_query($SQL);

	mysql_close($con);

	if(mysql_num_rows($result)){
		while($row = mysql_fetch_array($result)) {
  			return array($row['User_Name'],$row['User_ID']);
		}
	}else{
		return false;
	}
}

function get_items( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM items WHERE Product_ID = ".$id." ORDER BY Colour_ID ASC";
	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$return_array[] = array($row['Item_ID'],$row['Item_Title'],$row['Item_Sizes'],$row['Colour_ID']);
		}
	}else{
		return false;
	}
	return $return_array;
}

function get_colours( ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM products WHERE Category_ID = 12 ORDER BY Product_Title DESC";
	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$return_array[] = $row;
		}
	}
	return $return_array;
}

function get_colours_items($colour, $product){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM items WHERE Product_ID = ".$product." AND Colour_ID = ".$colour;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$return_array[] = array($row['Item_Title'],$row['Item_Sizes']);
		}
	}else{
		return false;
	}
	return $return_array;
}

function get_colour( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM colours WHERE Colour_ID = ".$id;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			return $row;
		}
	}else{
		return false;
	}
}

function get_news( ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT News_Text FROM news WHERE News_ID = 1";

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			return stripcslashes($row['News_Text']);
		}
	}else{
		return false;
	}
}

function get_products( $cat ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM products WHERE Category_ID = ".$cat;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$return_array[] = $row;
		}
	}
	return $return_array;
}

function getCategoryName( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT Category_Name FROM Categories WHERE Category_ID = ".$id;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			return ucfirst($row['Category_Name']);
			// return array($row['Product_ID'],$row['Product_Name'],$row['Product_Desc']);
		}
	}else{
		return false;
	}
}

function getProductsStock( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM stock WHERE Product_ID = ".$id." ORDER BY Type_Name, Display_Order DESC";

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$return_array[] = $row;
		}
	}else{
		return false;
	}
	return $return_array;
}

function getStockInfoString($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	// $SQL = "SELECT * FROM stock WHERE Stock_Code = '".$id."'";
	$SQL = "SELECT *,Product_Title FROM stock,products WHERE Stock_Code = '".$id."' AND stock.Product_ID = products.Product_ID ORDER BY Product_Title";

	$result = mysql_query($SQL);
	mysql_close($con);

	while($row = mysql_fetch_array($result)) {
		if (strpos($row["Stock_Name"], '#') !== false) {
			$row["Stock_Name"] = substr($row["Stock_Name"] , strpos($row["Stock_Name"], '#') + 1);
		}

		if ($id == '') {
			$row['Stock_Name'] = '';
		}
		return $row;
	}

	return array('Error getting stock data','#FF0000');
}

function getStockInfo($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM stock WHERE Stock_ID = ".$id;

	$result = mysql_query($SQL);
	mysql_close($con);

	while($row = mysql_fetch_array($result)) {
		return $row;
	}

	return array('Error getting stock data','#FF0000');
}

function get_product( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM products WHERE Product_ID = ".$id;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			return $row;
		}
	}else{
		return false;
	}
}

function get_stock( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM stock WHERE Stock_ID = ".$id;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			return $row;
		}
	}else{
		return false;
	}
}

function get_product_image( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM products WHERE Product_ID = ".$id;

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if(mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			return $row['Product_Image'];
		}
	}else{
		return false;
	}
}

function get_KMS_designs( ) {
	$con = mysql_connect(db_hostname,db_username,db_password);
	$return = '';
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT Stock_Code, Stock_Name, Type_Name FROM stock WHERE Product_ID = 215";

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if (mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$return .= '<option value="'.$row['Stock_Code'].'" data-image="'.$row['Type_Name'].'" data-type="component">'.$row['Stock_Name'].'</option>';
		}
	}
	return $return;
}

function get_KMS_components() {
	$con = mysql_connect(db_hostname,db_username,db_password);
	$return = '';
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT Stock_Name, Stock_Code, Type_Name FROM stock WHERE Product_ID = 211 GROUP BY Stock_Name, Stock_Code, Type_Name";

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if (mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$stockName = $row['Stock_Name'];
			if (strpos($stockName,'#') !== false) {
				$stockName = explode('#', $stockName);
				$return .= '<option value="'.substr($row['Stock_Code'], 0 , -2).'" data-image="'.$row['Type_Name'].'" data-type="component">'.$stockName[1].'</option>';
			}
		}
	}
	return $return;
}

function get_KMS_product($id, $type) {
	$con = mysql_connect(db_hostname,db_username,db_password);
	$return = '';
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT Stock_Name, Stock_Code, Type_Name FROM stock WHERE Product_ID = $id GROUP BY Stock_Name, Stock_Code, Type_Name";

	$result = mysql_query($SQL);
	$return_array = array();

	mysql_close($con);
	if (mysql_num_rows($result) > 0){
		while($row = mysql_fetch_array($result)) {
			$stockName = $row['Stock_Name'];
			if (strpos($stockName,'#') !== false) {
				$stockName = explode('#', $stockName);
				$return .= '<option value="'.$row['Stock_Code'].'" data-image="'.$row['Type_Name'].'" data-type="'.$type.'">'.$stockName[1].'</option>';
			} else {
				$return .= '<option value="'.$row['Stock_Code'].'" data-image="'.$row['Type_Name'].'" data-type="'.$type.'">'.$row['Stock_Name'].'</option>';
			}
		}
	}
	return $return;
}

?>
