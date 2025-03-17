<?php
include '../../config/config.php';

if (isset($_GET['aid'])) {
    $aid = $_GET['aid'];
    $stmt = $conn->prepare("UPDATE photo SET is_active = 1 WHERE id = ?");
    $stmt->bind_param("i", $aid);

    if ($stmt->execute()) {
        header("Location: pending.php");
        exit;
    } else {
        echo "Error publishing photo.";
    }
} elseif (isset($_GET['bid'])) {
    $bid = $_GET['bid'];
    $stmt = $conn->prepare("UPDATE badge SET is_active = 1 WHERE id = ?");
    $stmt->bind_param("i", $bid);

    if ($stmt->execute()) {
        header("Location: pending.php");
        exit;
    } else {
        echo "Error publishing badge.";
    }
} else {
    echo "Photo or badge ID not provided.";
}
?>