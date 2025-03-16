<?php 

$hn = "localhost";
$un = "admin";
$pw = "password";
$db = "wee_learners_db";

$conn = new mysqli($hn, $un, $pw, $db);

try {
    if ($conn->connect_error){
    throw new Error("Connection failed: " .$conn->connect_error);
} 
} catch(Error) {
    exit();
}


// else{
//     echo "Connection Succuessfull";
// }

?>