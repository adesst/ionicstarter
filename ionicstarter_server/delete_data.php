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
$username_delete = $_POST['delete_username'];
$password_delete = $_POST['delete_password'];
$password_delete_hash = MD5($password_delete);


//PILIH DATABASE//
mysql_select_db($dbname);

//CEK USER//
$cekuser = mysql_query("SELECT * FROM userdata WHERE username = '$username_delete' AND password = '$password_delete' ") 
or die(mysql_error());


if (mysql_num_rows($cekuser) == 0) {
    $retJSON = array(
        "error" => 2,
    );
    echo json_encode($retJSON);
}

else {
$delete = "DELETE FROM userdata WHERE username='$username_delete' AND password = '$password_delete' ";

    if (mysql_query($delete) === TRUE) {
        $retJSON = array(
        "error" => 1,
        );

    echo json_encode($retJSON);
    }
}
// }
//     $retJSON = array(
//         "error" => 2,
//     );

//     die json_encode($retJSON);

mysql_close();

?>