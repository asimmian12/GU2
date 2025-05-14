<?php
// include '../../config/config.php';
// include '../../includes/header.php';
include 'C:/laragon/www/GU2/weelearners/config/config.php';
include 'C:/laragon/www/GU2/weelearners/includes/header.php';


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
        <img src="<?= htmlspecialchars(ROOT_DIR . './assets/images/banner_img.jpg') ?>" alt="Colorful banner showcasing Wee Learners platform with cheerful children playing and learning together in a vibrant and welcoming environment">
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
<section class="footer__col">
      <!-- The text container for footer__address -->
      <div class="section-contact-info">
          <p class="paragraph-text"><i class="fa-solid fa-phone">Emerengency:   0141 272 9000</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-location-dot">Location:    50 Prospecthill Road Glasgow G42 9LB</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Email:   info@weelearners.ac.uk</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Working Hours:    Mon-Sat 09:00-20:00 Sunday emergency only.</i></p>
    </div>
</section>


<script src="<?= ROOT_DIR ?>assets/js/script.js"></script>
<?php ## include '../../includes/footer.php'; ?>
<?php include 'C:/laragon/www/GU2/weelearners/includes/footer.php'; ?> 

