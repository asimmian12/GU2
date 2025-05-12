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
        <img src="<?= htmlspecialchars(ROOT_DIR . './assets/images/banner_img.jpg') ?>" alt="Colorful banner showcasing Wee Learners platform with cheerful children playing and learning together in a vibrant and welcoming environment">
</section>

<h1 class="h1-heading-center">Upload Badge Page</h1>
<h2 class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, would you like to upload an badge for sale?</h2>
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
    
<h1 class="h1-heading-center">User Uploads History Page</h1>
<section class="section-uploads">  
    <section>
        <?php while($uploads->fetch()): ?>
            <div class="div-user-item">
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
<section class="footer__col">
      <!-- The text container for footer__address -->
      <div class="section-contact-info">
          <p class="paragraph-text"><i class="fa-solid fa-phone">Emerengency:   0141 272 9000</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-location-dot">Location:    50 Prospecthill Road Glasgow G42 9LB</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Email:   info@weelearners.ac.uk</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Working Hours:    Mon-Sat 09:00-20:00 Sunday emergency only.</i></p>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
