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
?>

<h1 class="h1-heading-center">Unpublished Photos</h1>
<div class="div-album">
    <section>
        <?php while ($unpublishedPhotos->fetch()) : ?>
            <div class="div-album-item">
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
<div class="div-album">
    <section>
        <?php while ($publishedPhotos->fetch()) : ?>
            <div class="div-album-item">
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
<div class="div-album">
    <section>
        <?php while ($unpublishedBadges->fetch()) : ?>
            <div class="div-album-item">
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
<div class="div-album">
    <section>
        <?php while ($publishedBadges->fetch()) : ?>
            <div class="div-album-item">
                <h2 class="main-heading"><?= htmlspecialchars($bName ?? ' ') ?></h2>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
                <p><?= htmlspecialchars($bDesc ?? ' ') ?></p>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?bid=' . $bID) ?>">Unpublish Badge</a>
            </div>
        <?php endwhile; ?>
    </section>
</div>

<?php include '../../includes/footer.php'; ?>