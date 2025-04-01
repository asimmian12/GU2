<?php
include "../../config/config.php";
include "../../includes/header.php";

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $unpublish = $conn->prepare("UPDATE photo SET is_active = 0 WHERE id = ?");
    $unpublish->bind_param("i", $aid);
    $unpublish->execute();
    header("Location: ../../pending");
    exit;
} elseif (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    $unpublish = $conn->prepare("UPDATE badge SET is_active = 0 WHERE id = ?");
    $unpublish->bind_param("i", $bid);
    $unpublish->execute();
    header("Location: ../../pending");
    exit;
} elseif (isset($_GET['vid'])) {
    $vid = $_GET['vid'];
    $unpublish = $conn->prepare("UPDATE videos SET is_active = 0 WHERE id = ?");
    $unpublish->bind_param("i", $vid);
    $unpublish->execute();
    header("Location: ../../pending");
    exit;
} elseif (isset($_GET['tid'])) {
    $tid = $_GET['tid'];
    $unpublish = $conn->prepare("UPDATE testimonals SET is_active = 0 WHERE id = ?");
    $unpublish->bind_param("i", $tid);
    $unpublish->execute();
    header("Location: ../../pending");
    exit;
} else {
    echo "Nothing is being provided.";
}
?>
