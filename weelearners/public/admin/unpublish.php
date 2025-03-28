<?php
include "../../config/config.php";
include "../../includes/header.php";

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $stmt = $conn->prepare("UPDATE photo SET is_active = 0 WHERE id = ?");
    $stmt->bind_param("i", $aid);

    if ($stmt->execute()) {
        header("Location: pending.php");
        exit;
    } else {
        echo "Error unpublishing photo.";
    }
} elseif (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    $stmt = $conn->prepare("UPDATE badge SET is_active = 0 WHERE id = ?");
    $stmt->bind_param("i", $bid);

    if ($stmt->execute()) {
        header("Location: pending.php");
        exit;
    } else {
        echo "Error unpublishing badge.";
    }
} elseif (isset($_GET['vid'])) {
    $vid = $_GET['vid'];
    $stmt = $conn->prepare("UPDATE videos SET is_active = 0 WHERE id = ?");
    $stmt->bind_param("i", $vid);

    if ($stmt->execute()) {
        header("Location: pending.php");
        exit;
    } else {
        echo "Error unpublishing videos.";
    }
} else{
    echo("Video is not provided");
}
?>