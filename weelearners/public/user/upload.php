<?php 
include 'includes/header.php';
include 'config/config.php';

// To check if user logged on, if not redirects me to loginp age
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Bringing in Uploads Details (Badges)
$uploads = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE fk_user_id = ? ORDER BY RAND() LIMIT 3");
$uploads->bind_param("i", $_SESSION['id']);
$uploads->execute();
$uploads->store_result();
$uploads->bind_result($badgeID, $badgeName, $badgeDescription, $badgeImage);
?>

<section class="section-banner">
    <h1 class="h1-heading-center">Upload Badge Page</h1>
    <p class="paragraph-text">  <h2 class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? ' ') ?>, Welcome to your upload bagde page in Wee Learners website. Here you can find all the badges related to your account. You can also upload your badge with permission from admin.</p>
</section>

<section class="uploadBadge">
    <form action="<?= ROOT_DIR ?>uploadConfig" method="post" enctype="multipart/form-data">
        <label for="badgeName">Badge Name</label>
        <input type="text" name="badgeName" id="badgeName" required>

        <label for="imgUpload">Select Badge Image</label>
        <input type="file" name="file" id="imgUpload" required>


        <label for="badgeDescription">Badge Description</label>
        <textarea name="badgeDescription" id="badgeDescription" required></textarea>

        <input type="submit" name="submit" value="Upload" class="upload-btn">
    </form>
</section>
    
<h1 class="h1-heading-center">Previously Earned Badges Page</h1>
<section class="section-uploads">  
    <section>
        <?php while($uploads->fetch()): ?>
            <div class="div-user-badge-item">
                <p class="paragraph-badge-text"><?= htmlspecialchars($badgeID ?? '') ?></p>
                <p class="paragraph-badge-text"><?= htmlspecialchars($badgeName ?? '') ?></p>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $badgeImage ?? '') ?>" alt="Badge Cover">
                <p class="paragraph-badge-text"><?= htmlspecialchars($badgeDescription ?? '') ?></p>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $badgeID ?? '') ?>">More Information</a>
            </div>
            <?php endwhile; ?>
        </section>
    </section>
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
