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

<h1 class="h1-heading-center">More Photos</h1>
<section>
    <?php if ($photoID == true) : while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? 'No Photo name is available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? 'default.jpg') ?>" alt="Photo Image">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? 'No photo description is available') ?></h2>
            <p>Uploaded by Anonymus User ID: <?= htmlspecialchars($pID ?? ' ') ?></p>
            <span><?= htmlspecialchars($release ?? 'Release date is not available') ?></span>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="h1-heading-center">More Videos</h1>
<section>
    <?php if ($videoID == true) : while ($video->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? 'No Video title available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? 'default-video.jpg') ?>" alt="Video Thumbnail">
            <p><?= htmlspecialchars($vDesc ?? 'No video description is not available') ?></p>
            <p> Uploaded by Anonymus User ID: <?= htmlspecialchars($vID ?? ' ') ?></p>
            <span><?= htmlspecialchars($vRelease ?? 'Release date is not available') ?></span>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
</section>

<h2 class="h2-secondary-colour">More Badges</h2>
<section>
    <?php if ($badgeID == true) : while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            <p><?= htmlspecialchars($bDesc ?? '') ?></p>
            <p>Uploaded by Anonymus User ID: <?= htmlspecialchars($bID ?? '') ?></p>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
</section>

<h2 class="h2-secondary-colour">More Testimonals</h2>
<section>
    <?php if ($testimonalsID == true) : while ($testimonals->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p><?= htmlspecialchars($tDesc ?? '') ?></p>
            <p>Uploaded by Anonymus User ID: <?= htmlspecialchars($tID ?? '') ?></p>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile; endif; ?>
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

<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>