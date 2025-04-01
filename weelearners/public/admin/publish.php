<?php
include "../../config/config.php";
include "../../includes/header.php";

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $publish = $conn->prepare("UPDATE photo SET is_active = 1 WHERE id = ?");
    $publish->bind_param("i", $aid);
    $publish->execute();
    header("Location: ../../pending");
    exit;
} elseif (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    $publish = $conn->prepare("UPDATE badge SET is_active = 1 WHERE id = ?");
    $publish->bind_param("i", $bid);
    $publish->execute();
    header("Location: ../../pending");
    exit;
} elseif (isset($_GET['vid'])) {
    $vid = $_GET['vid'];
    $publish = $conn->prepare("UPDATE videos SET is_active = 1 WHERE id = ?");
    $publish->bind_param("i", $vid);
    $publish->execute();
    header("Location: ../../pending");
    exit;
} elseif (isset($_GET['tid'])) {
    $tid = $_GET['tid'];
    $publish = $conn->prepare("UPDATE testimonals SET is_active = 1 WHERE id = ?");
    $publish->bind_param("i", $tid);
    $publish->execute();
    header("Location: ../../pending");
    exit;
} else {
    echo "Nothing is being provided.";
}
?>
