<?php
include '../../config/config.php';
include '../../includes/header.php';

// Bringing in Unpublished Photo Details
$unpublishedPhotos = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 0 ORDER BY RAND()");
$unpublishedPhotos->execute();
$unpublishedPhotos->store_result();
$unpublishedPhotos->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);

// Bringing in Published Photo Details
$publishedPhotos = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 1 ORDER BY RAND()");
$publishedPhotos->execute();
$publishedPhotos->store_result();
$publishedPhotos->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);

// Bringing in Unpublished Badge Details
$unpublishedBadges = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE is_active = 0 ORDER BY RAND()");
$unpublishedBadges->execute();
$unpublishedBadges->store_result();
$unpublishedBadges->bind_result($bID, $bName, $bDesc, $bImage);

// Bringing in Published Badge Details
$publishedBadges = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE is_active = 1 ORDER BY RAND()");
$publishedBadges->execute();
$publishedBadges->store_result();
$publishedBadges->bind_result($bID, $bName, $bDesc, $bImage);

// Bringing in Unpublished video details
$unpublishedVideos = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 0 ORDER BY RAND()");
$unpublishedVideos->execute();
$unpublishedVideos->store_result();
$unpublishedVideos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Bringing in Published video details
$publishedVideos = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND()");
$publishedVideos->execute();
$publishedVideos->store_result();
$publishedVideos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Bringing in Unpublished Badge Details
$unpublishedReviews = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 0 ORDER BY RAND()");
$unpublishedReviews->execute();
$unpublishedReviews->store_result();
$unpublishedReviews->bind_result($tID, $tName, $tDesc, $tUserID);

// Bringing in Published Badge Details
$publishedReviews = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 1 ORDER BY RAND()");
$publishedReviews->execute();
$publishedReviews->store_result();
$publishedReviews->bind_result($tID, $tName, $tDesc, $tUserID);
?>
<section class="section-banner">
    <h1 class="h1-heading-center">Pending Upload Page</h1>
    <p class="paragraph-text">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to your Admin Dashboard! Here you can manage all badges, photos, videos, and reviews. You can delete that if it's deemed as unacceptable to the policy, if you delete it it won't appear, but if you approve it, then it'll appear in the website</p>
</section>

<h1 class="h1-heading-center">Unpublished Photos</h1>
<div class="div-photo">
    <section>
        <?php while ($unpublishedPhotos->fetch()) : ?>
            <div class="div-pending-item">
                <h2 class="main-heading"><?= htmlspecialchars($pName ?? ' ') ?></h2>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
                <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? ' ') ?></h2>
                <span><?= htmlspecialchars($pRelease ?? ' ') ?></span>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?aid=' . $pID) ?>">Publish Photo</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Published Photos</h1>
<div class="div-photo">
    <section>
        <?php while ($publishedPhotos->fetch()) : ?>
            <div class="div-pending-item">
                <h2 class="main-heading"><?= htmlspecialchars($pName ?? ' ') ?></h2>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
                <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? ' ') ?></h2>
                <span><?= htmlspecialchars($pRelease ?? ' ') ?></span>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?aid=' . $pID) ?>">Unpublish Photo</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Unpublished Badges</h1>
<div class="div-badge">
    <section>
        <?php while ($unpublishedBadges->fetch()) : ?>
            <div class="div-pending-item">
                <h2 class="main-heading"><?= htmlspecialchars($bName ?? ' ') ?></h2>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
                <p><?= htmlspecialchars($bDesc ?? ' ') ?></p>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?bid=' . $bID) ?>">Publish Badge</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Published Badges</h1>
<div class="div-badge">
    <section>
        <?php while ($publishedBadges->fetch()) : ?>
            <div class="div-pending-item">
                <h2 class="main-heading"><?= htmlspecialchars($bName ?? ' ') ?></h2>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
                <p><?= htmlspecialchars($bDesc ?? ' ') ?></p>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?bid=' . $bID) ?>">Unpublish Badge</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Unpublished Videos</h1>
<div class="div-video">
    <section>
        <?php while ($unpublishedVideos->fetch()) : ?>
        <div class="div-pending-item">
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p><?= htmlspecialchars($vDesc ?? '') ?></p>
            <span><?= htmlspecialchars($vRelease ?? '') ?></span>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>">More Information</a>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?vid=' . $vID) ?>">Publish Video</a>
        </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Published Videos</h1>
<div class="div-video">
    <section>
        <?php while ($publishedVideos->fetch()) : ?>
            <div class="div-pending-item"> 
                <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? '') ?></h2>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
                <p><?= htmlspecialchars($vDesc ?? '') ?></p>
                <span><?= htmlspecialchars($vRelease ?? '') ?></span>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?vid=' . $vID) ?>">Unpublish Video</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Unpublished Reviews</h1>
<div class="div-review">
    <section>
        <?php while ($unpublishedReviews->fetch()) : ?>
            <div class="div-pending-item"> 
                <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
                <span><?= htmlspecialchars($tDesc ?? '') ?></span>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?tid=' . $tID) ?>">Publish Review</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Published Reviews</h1>
<div class="div-review">
    <section>
        <?php while ($publishedReviews->fetch()) : ?>
        <div class="div-pending-item">
            <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p><?= htmlspecialchars($tDesc ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?tid=' . $tID) ?>">Unpublish Review</a>
        </div>
        <?php endwhile; ?>
    </section>
</div>


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
<?php include '../../includes/footer.php'; ?>



