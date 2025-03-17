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
?>

<h1 class="h1-heading-center">More Photos</h1>
<section>
    <?php if ($photoID == true) : while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? 'No Album name available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? 'default.jpg') ?>" alt="Photo Image">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? 'No description available') ?></h2>
            <span><?= htmlspecialchars($release ?? 'Release date not available') ?></span>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="h1-heading-center">More Videos</h1>
<section>
    <?php if ($videoID == true) : while ($video->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? 'No Video title available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? 'default-video.jpg') ?>" alt="Video Thumbnail">
            <p><?= htmlspecialchars($vDesc ?? 'No description available') ?></p>
            <span><?= htmlspecialchars($vRelease ?? 'Release date not available') ?></span>
        </div>
    <?php endwhile; endif; ?>
</section>

<h2 class="h2-secondary-colour">More Badges</h2>
<section>
    <?php if ($badgeID == true) : while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? 'No Badge name available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image" style="max-width: 200px; height: auto;">
            <p><?= htmlspecialchars($bDesc ?? 'No description available') ?></p>
        </div>
    <?php endwhile; endif; ?>
</section>

<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>