<?php 
include 'includes/header.php';
include 'config/config.php';

// To check if user logged on, if not redirects me to loginp age
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Bringing in Uploads Details (Badges)
$uploads = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE fk_user_id = ?");
$uploads->bind_param("i", $_SESSION['id']);
$uploads->execute();
$uploads->store_result();
$uploads->bind_result($badgeID, $badgeName, $badgeDescription, $badgeImage);
?>

<h1 class="h1-heading-center">Uploading Badge Page</h1>
<h2 class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, would you like to upload an badge for sale?</h2>
<section class="uploadVinyl">
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
                <p class="paragraph-album-text"><?= htmlspecialchars($badgeID ?? '') ?></p>
                <p class="paragraph-album-text"><?= htmlspecialchars($badgeName ?? '') ?></p>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $badgeImage ?? '') ?>" alt="Album Cover">
                <p class="paragraph-album-text"><?= htmlspecialchars($badgeDescription ?? '') ?></p>
                <!-- <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $badgeID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a> -->
            </div>
            <?php endwhile; ?>
        </section>
    </section>
</section>

<?php include 'includes/footer.php'; ?>
