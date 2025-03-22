<?php
session_start();
include 'includes/header.php';
include 'config/config.php';

$id = $_SESSION['id'];
$message = '';

$targetDir = "assets/images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES["file"]["name"])) {
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($fileType, $allowTypes)) {
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            $badgeInsert = $conn->prepare("INSERT INTO badge (badge_name, description, fk_user_id, badge_img, is_active) VALUES (?, ?, ?, ?, 0)");
            $badgeInsert->bind_param('ssis', $_POST['badgeName'], $_POST['badgeDescription'], $id, $fileName);

            if ($badgeInsert->execute()) {
                $message = "The file " . $fileName . " has been uploaded and badge inserted successfully.";
            } else {
                $message = "File upload succeeded but badge insertion failed: " . $conn->error;
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
} else {
    $message = 'Please select a file to upload.';
}

header("Location: uploads");
?>