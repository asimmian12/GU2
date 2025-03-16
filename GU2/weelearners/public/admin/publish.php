<?php

include "../../config/config.php";


$aid = $_GET["aid"];
$publish = $conn->prepare("UPDATE
album
SET 
is_active = 1
WHERE id = $aid");

$publish->execute();
header("Location: ../../pending");



