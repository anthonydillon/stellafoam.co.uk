<?php
include("../config/config.php");
define('sessionlen',20000);

function addProduct($title, $code, $image, $description, $category, $override, $pack = 0, $discount = 0){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "INSERT INTO products (Product_Title, Product_Code, Product_Image, Product_Description, Category_ID, Override_Discount, Pack, Discount) VALUES ('".$title."','".$code."','".$image."','".$description."', ".$category.",'".$override."','".$pack."','".$discount."')";

	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return '<p style="color:#00FF00">Colour added successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while adding Colour</p>';
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

function addUser($username, $password, $name, $company, $address, $deliveryaddress, $telephone, $email){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "INSERT INTO user (User_Username, User_Password, User_Name, User_Company, User_Address, User_Delivery_Address, User_Telephone, User_Email) VALUES ('".$username."','".md5($password.key)."','".$name."','".$company."','".$address."','".$deliveryaddress."','".$telephone."','".$email."')";

	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return '<p style="color:#00FF00">User added successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while adding User</p>';
	}
}

function addStock($name, $code, $type, $description, $pack, $discount, $price, $colour, $inStock, $order){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "INSERT INTO stock (Stock_Name, Stock_Code, Type_Name, Stock_Description, Pack, Discount, Price, Product_ID, In_Stock, Display_Order) VALUES ('".$name."','".$code."','".$type."','".$description."','".$pack."','".$discount."','".$price."',".$colour.",".$inStock.".".$order.")";

	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return '<p style="color:#00FF00">Stock added successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while adding Stock</p>';
	}
}

function getUsers(){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM user";

	$result = mysql_query($SQL);

	mysql_close($con);
	$return = array();
	while($row = mysql_fetch_array($result)) {
  		$return[] = $row;
	}
	return $return;
}


function getCategories(){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM Categories";

	$result = mysql_query($SQL);

	mysql_close($con);
	$return = array();
	while($row = mysql_fetch_array($result)) {
  		$return[] = $row;
	}
	return $return;
}

function getProductsStock( $id ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM stock WHERE Product_ID = ".$id." ORDER BY Stock_Code";
	$result = mysql_query($SQL);
	mysql_close($con);

	$return = array();
	while($row = mysql_fetch_array($result)) {
  		$return[] = $row;
	}
	return $return;
}

function getProductsName( $Products, $ID ){
	for($i = 0; $i < count($Products); $i++){
		if($Products[$i][0] == $ID){
			return $Products[$i][1];
		}
	}
	return false;
}

function getProducts( $id = false ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = 'SELECT * FROM products';
	if($id){
		$SQL .= ' WHERE Category_ID = '.$id;
	}
	$SQL .= ' ORDER BY Product_Title ASC';

	$result = mysql_query($SQL);

	mysql_close($con);
	$return = array();

	while($row = mysql_fetch_array($result)) {
  		$return[] = $row;
	}
	return $return;
}

function getProductInfo($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM products WHERE Product_ID = ".$id;

	$result = mysql_query($SQL);
	mysql_close($con);

	while($row = mysql_fetch_array($result)) {
		return $row;
	}

	return array('Error getting Colour data','#FF0000');
}


function getUserDetails($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT * FROM user WHERE User_ID = ".$id;

	$result = mysql_query($SQL);
	mysql_close($con);

	while($row = mysql_fetch_array($result)) {
		return $row;
	}

	return array('Error getting Colour data','#FF0000');
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

function editNews($news){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);

	$SQL = "UPDATE news SET News_Text = '".addslashes($news)."' WHERE News_ID = 1";
	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return '<p style="color:#00FF00">News edited successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while editing News</p>';
	}
}

function editProduct($id, $title, $code, $image, $description, $override, $pack, $discount){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);

	$SQL = "UPDATE products SET Product_Title = '".$title."', Product_Code = '".$code."', Product_Image = '".$image."', Product_Description = '".$description."', Override_Discount = '".$override."', Pack = '".$pack."', Discount = '".$discount."' WHERE Product_ID  = '".$id."'";
	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return '<p style="color:#00FF00">Colour edited successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while editing Colour</p>';
	}
}

function editUser($id, $username, $name, $company, $address, $deliveryaddress, $telephone, $email){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);

	$SQL = "UPDATE user SET User_Username = '".$username."', User_Name = '".$name."', User_Company = '".$company."', User_Address = '".$address."', User_Delivery_Address = '".$deliveryaddress."', User_Telephone = '".$telephone."', User_Email = '".$email."' WHERE User_ID  = '".$id."'";
	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return true;
	}else{
		return false;
	}
}

function editPassword($id, $pw){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);

	$SQL = "UPDATE user SET User_Password = '".md5($pw.key)."' WHERE User_ID = '".$id."'";
	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return true;
	}else{
		return false;
	}
}

function editStock($id, $name, $code, $type, $description, $pack, $discount, $price, $colour, $inStock, $order){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);

	$SQL = "UPDATE stock SET Stock_Name = '".$name."', Stock_Code = '".$code."', Type_Name = '".$type."', Stock_Description = '".$description."', Pack = '".$pack."', Discount = '".$discount."', Price = '".$price."', Product_ID = '".$colour."', In_Stock = '".$inStock."', Display_Order = '".$order."' WHERE Stock_ID = '".$id."'";
	$result = mysql_query($SQL);

	mysql_close($con);
	if($result != 0){
		return '<p style="color:#00FF00">Stock edited successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while editing Stock</p>';
	}
}

function deleteProduct($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "DELETE FROM products WHERE Product_ID = ".$id;

	$result = mysql_query($SQL);

	mysql_close($con);

	if($result != 0){
		return '<p style="color:#00FF00">Colour deleted successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while deleting Colour</p>';
	}
}

function deleteUser($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "DELETE FROM user WHERE User_ID = ".$id;

	$result = mysql_query($SQL);

	mysql_close($con);

	if($result != 0){
		return '<p style="color:#00FF00">User deleted successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while deleting User</p>';
	}
}

function deleteStock($id){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "DELETE FROM stock WHERE Stock_ID = ".$id;

	$result = mysql_query($SQL);

	mysql_close($con);

	if($result != 0){
		return '<p style="color:#00FF00">Stock deleted successfully</p>';
	}else{
		return '<p style="color:#FF0000">Database error while deleting Stock</p>';
	}
}

function get_highest_Product_order( ){
	$con = mysql_connect(db_hostname,db_username,db_password);
	if (!$con) {
	  die('Could not connect: ' . mysql_error());
	}
	mysql_select_db(db_name, $con);
	$SQL = "SELECT Product_order FROM Products GROUP BY Product_order DESC";

	$result = mysql_query($SQL);
	mysql_close($con);

	$row = mysql_fetch_row($result);

	return $row[0];
	return 1;
}

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

function checkLogin($user, $pass){
	if($user == user && md5($pass.key) == pass){
		return 'admin';
	}else{
		return false;
	}
}


?>
