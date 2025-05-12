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
        <img src="<?= htmlspecialchars(ROOT_DIR . './assets/images/banner_img.jpg') ?>" alt="Colorful banner showcasing Wee Learners platform with cheerful children playing and learning together in a vibrant and welcoming environment">
</section>


<h1 class="h1-heading-center">Home Page</h1>
<section class="section-intro">
    <p class="paragraph-text">Welcome to Wee Learner which has been the go-to platform, for parents, carers, and children all love coming to us. Our website connects all Parents and Carers of their kids, ranging from Special Needs Education through Mainstream Kids Education. Whether you're searching for a Nursary, for your kids, or want to apply for being a helper, WeeLearners can provide an easy-to-use website where parents and carers can explore a wide range of badge records, for their children, and apply for being a helper, etc.</p>
</section>

<h2 class="h2-secondary-colour">All Photos</h2>
<section>
    <?php while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Photo Cover">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? '') ?></h2>
            <span><?= htmlspecialchars($release ?? '') ?></span>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h2 class="h2-secondary-colour">All Videos</h2>
<section>
    <?php while ($video->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p><?= htmlspecialchars($vDesc ?? '') ?></p>
            <span><?= htmlspecialchars($vRelease ?? '') ?></span>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h2 class="h2-secondary-colour">All Badges</h2>
<section>
    <?php while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image" style="max-width: 200px; height: auto;">
            <p><?= htmlspecialchars($bDesc ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h2 class="h2-secondary-colour">All Reviews</h2>
<section>
    <?php while ($testimonals->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p><?= htmlspecialchars($tDesc ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
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