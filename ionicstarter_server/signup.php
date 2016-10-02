<?php

//php file for Signup Control//
header('Access-Control-Allow-Origin:*');

//	==============	//
//	INITIALIZATION  //
//  ==============  //
$servername = "localhost";
$username_root = "root";
$password_root = "";
$dbname = "login_database";

// ================= //
// CREATE CONNECTION //
// ================= //
$conn = mysql_connect($servername, $username_root, $password_root, $dbname)
or die;

// ================= //
// CHECK CONNECTION  //
// ================= //
// if ($conn->connect_error) {
//     die("Connection to mysql database failed: " . $conn->connect_error);
//   //  die($conn->connect_error);
// }
// else {
// 	echo "connection to mysql database successful";
// }

$fullname = $_POST['signup_fullname'];
$phone = $_POST['signup_phone'];
$email = $_POST['signup_email'];
$username = $_POST['signup_username'];
$password = $_POST['signup_password'];
$password_hash = MD5($password);


mysql_select_db($dbname);
//INSERT NEW LOGIN DATA//

$cekuser = mysql_query("SELECT username FROM userdata WHERE username = '$username'");

if (mysql_num_rows($cekuser) != 0) {
	$retJSON = array(
		"error" => 2,
	);
echo json_encode($retJSON);
}

else { 

if (!$fullname || !$username || !$phone || !$email || !$password) {
	$retJSON = array (
	"error" => 3,
	//	"error_message"=>'Please fill all the field!',
	);
echo json_encode($retJSON);
}

else {

$sql = "INSERT INTO userdata (fullname, phone, email, username, password, password_md5) VALUES ('$fullname', '$phone', '$email', '$username', '$password', '$password_hash')";

//$sql = "INSERT INTO userdata (fullname, phone, email, username, password)
//VALUES ('$fullname', '$phone', '$email' '$username', '$password_hash') ";

if (mysql_query($sql) === TRUE) {
    
    $retJSON = array(
		"error" => 1,
	);

	echo json_encode($retJSON);

    // echo "New record created successfully"
    // or die ("Error: " . $sql . "<br>" . $conn ->error);
}
}
}


// if ($conn->query($sql) === TRUE) {
//     $retJSON=array(
//     		"error"=>0,
//     	//	"error_message"=>'New record created successfully!',
//     	);
//     echo json_encode($retJSON);
// } 

// else {
//     $retJSON=array(
//     		"error"=>1,
//     	//	"error_message"=>'Record failed!',
//     	);

//     echo json_encode($retJSON);
//  }

mysql_close();


?>