<?php
include 'config/config.php';
include 'includes/header.php';

$search = $_POST['search'] ?? '';
$searchResults = "%" . $search . "%";

// Bringing In Photo Details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE albName LIKE ? OR albDescription LIKE ?");
$photo->bind_param("ss", $searchResults, $searchResults);
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);

// Bringing In Video Details
$videos = $conn->prepare("SELECT id, title, description, release_date, image FROM videos WHERE title LIKE ? OR description LIKE ?");
$videos->bind_param("ss", $searchResults, $searchResults);
$videos->execute();
$videos->store_result();
$videos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage);

// Bringing In Badge Details
$badge = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE badge_name LIKE ? OR description LIKE ?");
$badge->bind_param("ss", $searchResults, $searchResults);
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bImage);
?>

<h1 class="h1-heading-center">Home Page</h1>
<h2 class="h2-secondary-colour">Search</h2>
<section>
    <?php
    // Display Photo Results
    while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading">Photo: <?= htmlspecialchars($pName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? '') ?></h2>
            <span><?= htmlspecialchars($pRelease ?? '') ?></span>
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?aid=<?= htmlspecialchars($pID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; ?>

    <?php
    // Display Video Results
    while ($videos->fetch()) : ?>
        <div>
            <h2 class="main-heading">Video: <?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? '') ?>" alt="Video Image">
            <h2 class="main-heading"><?= htmlspecialchars($vDesc ?? '') ?></h2>
            <span><?= htmlspecialchars($vRelease ?? '') ?></span>
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?vid=<?= htmlspecialchars($vID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; ?>

    <?php
    // Display Badge Results
    while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading">Badge: <?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            <p><?= htmlspecialchars($bDesc ?? '') ?></p>
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?bid=<?= htmlspecialchars($bID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; ?>
</section>

<?php include 'includes/footer.php'; ?>