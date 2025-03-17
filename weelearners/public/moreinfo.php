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

// Fetching Photo Details (Corrected)
if ($photoID !== null) {
    $photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE id = ? AND is_active = 1 LIMIT 1");
    $photo->bind_param("i", $photoID);
    $photo->execute();
    $photo->store_result();
    $photo->bind_result($pID, $pName, $pDesc, $release, $pImage);
}

// Fetching Video Details (Corrected)
if ($videoID !== null) {
    $video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE id = ? AND is_active = 1 LIMIT 1");
    $video->bind_param("i", $videoID);
    $video->execute();
    $video->store_result();
    $video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);
}

// Fetching Badge Details (Corrected)
if ($badgeID !== null) {
    $badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id FROM badge WHERE id = ? LIMIT 1"); // Assuming badge ID is 'id'
    $badge->bind_param("i", $badgeID);
    $badge->execute();
    $badge->store_result();
    $badge->bind_result($bID, $bName, $bDesc, $bUserID);
}
?>

<h1 class="h1-heading-center">More Photos</h1>
<section class="section-photos">
    <?php if ($photoID !== null && isset($photo) && $photo->num_rows > 0) : while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? 'No Album name available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            <p class="paragraph-album-text"><?= htmlspecialchars($pDesc ?? 'No description available') ?></p>
            <span><?= htmlspecialchars($release ?? 'Release date not available') ?></span>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="h1-heading-center">More Videos</h1>
<section class="section-videos">
    <?php if ($videoID !== null && isset($video) && $video->num_rows > 0) : while ($video->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? 'No Video title available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? '') ?>" alt="Video Thumbnail">
            <p class="paragraph-album-text"><?= htmlspecialchars($vDesc ?? 'No description available') ?></p>
            <span><?= htmlspecialchars($vRelease ?? 'Release date not available') ?></span>
            <a href="<?= htmlspecialchars($vVideoURL ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; endif; ?>
</section>

<h2 class="h2-secondary-colour">Top Badges</h2>
<section class="section-badge">
    <?php if ($badgeID !== null && isset($badge) && $badge->num_rows > 0) : while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? 'No Badge name available') ?></h2>
            <p class="paragraph-album-text"><?= htmlspecialchars($bDesc ?? 'No description available') ?></p>
            <span>User ID: <?= htmlspecialchars($bUserID ?? 'Not available') ?></span>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $badgeID ?? '') ?>">Look Badges</a>
        </div>
    <?php endwhile; endif; ?>
</section>

<script src="../assets/js/script.js"></script>
<?php include '../includes/footer.php'; ?>