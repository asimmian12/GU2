<?php
include 'config/config.php';
include 'includes/header.php';

// Fetching photo details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 1 ORDER BY RAND() LIMIT 5");
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $release, $pImage);

// Fetching video details
$video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND() LIMIT 5");
$video->execute();
$video->store_result();
$video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Fetching badge details
$badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE is_active = 1 ORDER BY RAND() LIMIT 5");
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);
?>

<h1 class="h1-heading-center">Home Page</h1>
<section class="section-intro">
    <p class="paragraph-text">Welcome to Wee Learner which has been the go-to platform, for parents, carers, and children all love coming to us. Our website connects all Parents and Carers of their kids, ranging from Special Needs and to Normal Kids. Whether you're searching for a Nursary, for your kids, or want to apply for being a helper, WeeLearners can provide an easy-to-use website where users can explore a vide range of badge records, for their children, and apply for being a helper, etc.</p>
</section>

<h2 class="h2-secondary-colour">All Photos</h2>
<section>
    <?php while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($pName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Album Cover">
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

<?php include 'includes/footer.php'; ?>