<?php
include '../config/config.php';
include '../includes/header.php';

// Fetch Photo ID
if (isset($_GET['aid'])) {
    $photoID = $_GET['aid'];
} else {
    $photoID = null;
}

// Fetch Video ID
if (isset($_GET['vid'])) {
    $videoID = $_GET['vid'];
} else {
    $videoID = null;
}

// Fetch Badge ID
if (isset($_GET['bid'])) {
    $badgeID = $_GET['bid'];
} else {
    $badgeID = null;
}

// Fetch Testimonals ID
if (isset($_GET['tid'])) {
    $testimonalsID = $_GET['tid'];
} else {
    $testimonalsID = null;
}

// Fetching Photo Details
if ($photoID == true) {
    $photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE id = ? AND is_active = 1 LIMIT 3");
    $photo->bind_param("i", $photoID);
    $photo->execute();
    $photo->store_result();
    $photo->bind_result($pID, $pName, $pDesc, $release, $pImage);
}

// Fetching Video Details
if ($videoID == true) {
    $video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE id = ? AND is_active = 1 LIMIT 3");
    $video->bind_param("i", $videoID);
    $video->execute();
    $video->store_result();
    $video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);
}

if ($badgeID == true) {
    $badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE id = ? LIMIT 3");
    $badge->bind_param("i", $badgeID);
    $badge->execute();
    $badge->store_result();
    $badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);
}

if ($testimonalsID == true) {
    $testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE id = ? LIMIT 3");
    $testimonals->bind_param("i", $testimonalsID);
    $testimonals->execute();
    $testimonals->store_result();
    $testimonals->bind_result($tID, $tName, $tDesc, $tUserID);
}
?>

<section class="section-banner">
  <h1 class="h1-heading-center">More Information Page</h1>
  <p class="paragraph-text">
    Welcome to the More Information page. Here you can find detailed information about the specific content you are interested in. Whether it's a photo, video, badge, or testimonial, we provide comprehensive details to help you understand more about it. You can also find the release date and the user who uploaded it. If you have any questions or need further assistance, please feel free to contact us using the details at the bottom of this page. Thank you for visiting our More Information page.
  </p>
</section>

<section class="section-photo">
    <?php if ($photoID == true) : while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? 'No Photo name is available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? 'default.jpg') ?>" alt="Photo Image">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? 'No photo description is available') ?></h2>
            <p class="paragraph-text">Uploaded by Anonymus User ID: <?= htmlspecialchars($pID ?? ' ') ?></p>
            <p class="paragraph-text"><?= htmlspecialchars($release ?? 'Release date is not available') ?></p>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="h1-heading-center">More Videos</h1>
<section class="section-video">
    <?php if ($videoID == true) : while ($video->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? 'No Video title available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? 'default-video.jpg') ?>" alt="Video Thumbnail">
            <p class="paragraph-text"><?= htmlspecialchars($vDesc ?? 'No video description is not available') ?></p>
            <p class="paragraph-text"> Uploaded by Anonymus User ID: <?= htmlspecialchars($vID ?? ' ') ?></p>
            <p class="paragraph-text"><?= htmlspecialchars($vRelease ?? 'Release date is not available') ?></p>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="h1-heading-center">More Badges</h1>
<section class="section-badge">
    <?php if ($badgeID == true) : while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            <p class="paragraph-text"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <p class="paragraph-text">Uploaded by Anonymus User ID: <?= htmlspecialchars($bID ?? '') ?></p>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="h1-heading-center">More Reviews</h1>
<section class="section-review">
    <?php if ($testimonalsID == true) : while ($testimonals->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p class="paragraph-text"><?= htmlspecialchars($tDesc ?? '') ?></p>
            <p class="paragraph-text">Uploaded by Anonymus User ID: <?= htmlspecialchars($tID ?? '') ?></p>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
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


<script src="assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>