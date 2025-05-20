<?php
include 'includes/header.php';
include 'config/config.php';

// To check if the user is logged in, if not redirects me to login page
if (!isset($_SESSION['loggedin'])){
    header('Location: login');
    exit();
}
// Bringing in User Details
$user = $conn->prepare('SELECT
id, 
name, 
email, 
profile_picture,
role 
FROM user 
WHERE id = ?');
$user->bind_param('i', $_SESSION['id']);
$user->execute();
$user->store_result();
$user->bind_result($user_id, $name, $email, $userPicture, $role);
$user->fetch();

$message = "";
$targetDir = "assets/uploads/";
$fileName = isset($_FILES['section-profile-picture']['name']) ? basename($_FILES['section-profile-picture']['name']) : '';
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['section-profile-picture']['name'])) {
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileType, $allowTypes)){   
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        if (move_uploaded_file($_FILES['section-profile-picture']['tmp_name'], $targetFilePath)) {           
            $accounts = $conn->prepare("UPDATE user SET profile_picture = ? WHERE id = ?");
            $accounts->bind_param('si', $fileName, $_SESSION['id']);

            if ($accounts->execute()) {
                $message = "Profile picture updated successfully.";
                $userPicture = $fileName;
            } else {
                $message = "Failed to update the profile picture in the database.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
    }
} else {
    $message = "Please select a valid file to upload.";
}
?>
<section class="section-banner">
   <h1 class="h1-heading-center">Account Details Page</h1>
   <p class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to your Account Details Page! Here you can find all the information related to your account. You can also upload your profile picture and view your personal account information.</p>
</section>

<section class="section-profile-account">
    <div class="section-profile-info">
        <?php if (isset($userPicture)): ?>
            <img src="<?= htmlspecialchars($targetDir . $userPicture ?? '') ?>" alt="Profile Picture">
        <?php endif; ?>
        <p class="paragraph-text">Username: <?= htmlspecialchars($_SESSION['name'] ?? '') ?></p>
        <p class="paragraph-text">Email: <?= htmlspecialchars($email ?? '') ?></p>
        <p class="paragraph-text">Job Role: <?= htmlspecialchars($role ?? '') ?></p>

    </div>
</section>

<?php if (isset($message)): ?>
    <p class="status-message"><?= htmlspecialchars($message ?? '') ?></p>
<?php endif; ?>
<section class="section-profile-picture">
    <form action="#" method="POST" enctype="multipart/form-data">
        <label for="section-profile-picture">Upload Profile Picture:</label>
        <input type="file" name="section-profile-picture" class="section-profile-picture" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>
</section>

<h2 class="h2-secondary-colour">Contact</h2>
    <section class="section-contact">
    <div class="contact-cards">

    <div class="contact-card">
      <i class="fa-solid fa-phone"></i>
      <h3>EMERGENCY</h3>
      <p class="paragraph-text">0141 272 9000</p>
    </div>

    <div class="contact-card">
      <i class="fa-solid fa-location-dot"></i>
      <h3>LOCATION</h3>
      <p class="paragraph-text">50 Prospecthill Road</p>
      <p class="paragraph-text">G42 9LB, Glasgow, UK</p>
    </div>

    <div class="contact-card">
      <i class="fa-solid fa-envelope"></i>
      <h3>EMAIL</h3>
      <a href="mailto:info@weelearners.ac.uk">info@weelearners.ac.uk</a>
    </div>

    <div class="contact-card">
      <i class="fa-solid fa-clock"></i>
      <h3>WORKING HOURS</h3>
      <p class="paragraph-text">Mon–Sat: 09:00–20:00</p>
      <p class="paragraph-text">Sunday: Emergency only</p>
    </div>
  </div>
</section>



<?php include 'includes/footer.php'; ?>
