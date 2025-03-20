<?php
session_start();
// Include the database header file
include 'includes/header.php';
// Include the database configuration file
include 'config/config.php';

// User's ID (stored in session)
$id = $_SESSION['id'];

// Status message initialization
$message = '';

// File upload path
$targetDir = "assets/images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES["file"]["name"])) {
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif'); 
    if (in_array($fileType, $allowTypes)) {
        // Create the upload directory if it doesn't exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }

        // Upload file to server
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            // Insert badge details into the badge table, including user ID
            $badgeInsert = $conn->prepare("INSERT INTO badge (badge_name, description, fk_user_id, badge_img) VALUES (?, ?, ?, ?)");
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

// Redirect with the status message
header("Location: uploads");
?>