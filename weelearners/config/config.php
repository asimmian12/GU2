<?php 

$hn = "localhost";
$un = "admin";
$pw = "password";
$db = "learners_db";

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

<!-- <//?php
// $hn = "localhost";
// $un = "admin";
// $pw = "password";
// $db = "learners_db";

$un = array(
    "admin" => "password"
);

$pw = array(
    "password" => "password"
);

$hn = array(
    "localhost" => "localhost"
);

$db = array(
    "learners_db" => "localhost"
);

$conn = new mysqli($hn['localhost'], $un['admin'], $pw['password'], $db['learners_db']);

try {
    if ($conn->connect_error) {
        throw new Error("Connection failed: " . $conn->connect_error);
    }
} catch (Error) {
    exit();
}

// else{
//     echo "Connection Succuessfull";
// }
?> -->