<?php

//php file for Signup Control//
header("Access-Control-Allow-Origin: *");

//  ==============  //
//  INITIALIZATION  //
//  ==============  //

$servername = "localhost";
$username_root = "root";
$password_root = "";
$dbname = "login_database";

// ================= //
// CREATE CONNECTION //
// ================= //
$conn =mysql_connect($servername, $username_root, $password_root, $dbname)
or die;


$username_login = $_POST['login_username'];
$password_login = $_POST['login_password'];
$password_login_hash = MD5($password_login);

mysql_select_db($dbname);

$result = mysql_query("SELECT * FROM userdata WHERE username='".$username_login."' AND password ='".$password_login."' LIMIT 1");

$match = mysql_num_rows($result);

//echo $match;
//var_dump(mysql_fetch_array($result));

$res = mysql_fetch_assoc($result);
 
if ($match > 0) {
	if ($res['active'] = 1) {
		//login success//
		// $fullname = $res['fullname'];
		// $username_login = $res['username'];
		// $password_login_hash = $res['password'];
    	
		$retJSON=array(
    		"error"=>0, 
    	);
    	die(json_encode($retJSON));
	}
} 
		$retJSON=array(
    		"error"=>1,
    	);
		die(json_encode($retJSON));

	//	echo $retJSON;

// echo $username_login;
// echo $password_login;
// echo $password_login_hash;

 

?>