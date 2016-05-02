<?php

include("../config.php");
define('key','st3lla4f0am');

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

?>
