<?php
include 'config/config.php';
include 'includes/header.php';

// Fetching photo details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $release, $pImage);

// Fetching video details
$video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$video->execute();
$video->store_result();
$video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Fetching badge details
$badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);

// Fetching testimonals details
$testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$testimonals->execute();
$testimonals->store_result();
$testimonals->bind_result($tID, $tName, $tDesc, $tUserID);
?>

<section class="section-banner">
    <h1 class="h1-heading-center">Home Page</h1>
    <p class="paragraph-text">Welcome to Wee Learner which has been the go-to platform, for parents, carers, and children all love coming to us. Our website connects all Parents and Carers of their kids, ranging from Special Needs Education through Mainstream Kids Education. Whether you're searching for a Nursary, for your kids, or want to apply for being a helper, WeeLearners can provide an easy-to-use website where parents and carers can explore a wide range of badge records, for their children, and apply for being a helper, etc.</p>
</section>

<h1 class="h1-heading-center">All Photos</h1>
<section class="section-photo">
    <?php while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Photo Cover">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? '') ?></h2>
            <p class="paragraph-text"><?= htmlspecialchars($release ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h1 class="h1-heading-center">All Videos</h1>
<section class="section-video">
    <?php while ($video->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p class="paragraph-text"><?= htmlspecialchars($vDesc ?? '') ?></p>
            <p class="paragraph-text"><?= htmlspecialchars($vRelease ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h1 class="h1-heading-center">All Badges</h1>
<section class="section-badge">
    <?php while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image" style="max-width: 200px; height: auto;">
            <p class="paragraph-text"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h1 class="h1-heading-center">All Reviews</h1>
<section class="section-review">
    <?php while ($testimonals->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p class="paragraph-text"><?= htmlspecialchars($tDesc ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
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