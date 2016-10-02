<?php

header("Access-Control-Allow-Origin: *");

//  INISIALISASI  //
$servername = "localhost";
$username_root = "root";
$password_root = "";
$dbname = "login_database";

// CREATE CONNECTION //
$conn =mysql_connect($servername, $username_root, $password_root, $dbname)
or die;

//DEFINISIKAN VARIABLE//

$username_edit = $_POST['edit_username'];
$password_edit = $_POST['edit_password'];
$password_edit_hash = MD5($password_edit);
$fullname_edit = $_POST['edit_fullname'];
$phone_edit = $_POST['edit_phone'];
$email_edit = $_POST['edit_email'];

//PILIH DATABASE//
mysql_select_db($dbname);

//CEK USER//
$cekuser = mysql_query("SELECT * FROM userdata WHERE username = '$username_edit' AND password = '$password_edit' ") 
or die(mysql_error());

if (mysql_num_rows($cekuser) == 0) {
    $retJSON = array(
        "error" => 2,
    );
    echo json_encode($retJSON);
}

else {
	if (!$fullname_edit || !$username_edit || !$phone_edit || !$email_edit || !$password_edit) {
	$retJSON = array (
	"error" => 3,
	//	"error_message"=>'Please fill all the field!',
	);
	echo json_encode($retJSON);
}

else {

//$sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";	
$sqledit = "UPDATE userdata SET fullname='$fullname_edit', phone='$phone_edit', email='$email_edit', password='$password_edit' WHERE username='$username_edit' ";

    if (mysql_query($sqledit) === TRUE) {
        $retJSON = array(
        "error" => 1,
        );

    echo json_encode($retJSON);
    }
}
}
// }
//     $retJSON = array(
//         "error" => 2,
//     );

//     die json_encode($retJSON);

mysql_close();

?>