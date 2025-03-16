<?php
include '../config/config.php';
include '../includes/header.php';


if (isset($_GET['aid'])) {
    $albumId = $_GET['aid'];
} else {
    echo "More Info isn't provided.";
    exit();
}
// Bringing In Album Details
$albumInfo = $conn->prepare("SELECT
album.id,
album.albName,
album.albDescription,
album.release_date,
album.image,
artist.artName,
genre.genreName,
record_label.rlName
FROM album
INNER JOIN artist ON album.fk_artist_id = artist.id
INNER JOIN genre ON album.fk_genre_id = genre.id
INNER JOIN record_label ON album.fk_record_label_id = record_label.id
WHERE album.id = ?");
$albumInfo->bind_param("i", $albumId);
$albumInfo->execute();
$albumInfo->store_result();
$albumInfo->bind_result($aID, $albName, $albDesc, $release, $albImage, $artName, $genreName, $rlName);
$albumInfo->fetch();

// Bringing In Album Details
$artistAlbums = $conn->prepare("SELECT 
album.id,
album.albName,
album.albDescription,
album.release_date,
album.image,
artist.artName,
genre.genreName,
record_label.rlName
FROM album
INNER JOIN artist ON album.fk_artist_id = artist.id
INNER JOIN genre ON album.fk_genre_id = genre.id
INNER JOIN record_label ON album.fk_record_label_id = record_label.id
ORDER BY RAND() 
LIMIT 3");
$artistAlbums->execute();
$artistAlbums->store_result();
$artistAlbums->bind_result($aID, $albName, $albDesc, $release, $albImage, $artName, $genreName, $rlName);
?>

<h1 class="h1-heading-center">Album Information Page</h1>
<section class="section-album-info">
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($albName ?? '') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $albImage ?? '') ?>" alt="Album Cover">
        <p class="paragraph-album-text"><?= htmlspecialchars($albDesc ?: 'No description available') ?></p>
        <span><?= htmlspecialchars($release ?: 'Release date not available') ?></span>
        <p class="paragraph-album-text"><?= htmlspecialchars($genreName ?? '') ?></p>
        <p class="paragraph-album-text"><?= htmlspecialchars($rlName ?? '') ?></p>
    </div>
</section>

<h1 class="h1-heading-center">More Artists</h1>
<section class="section-vinyl">
    <?php while($artistAlbums->fetch()) : ?>
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($albName ?? 'No Album name available') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $albImage ?? '') ?>" alt="Album Cover">
        <h2 class="main-heading"><?= htmlspecialchars($albDesc ?? 'No description available') ?></h2>
        <span><?= htmlspecialchars($release ?? 'Release date not available') ?></span>
        <h2 class="main-heading"><?= htmlspecialchars($genreName ?? '') ?></h2>
        <h2 class="main-heading"><?= htmlspecialchars($rlName ?? '') ?></h2>
        <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $aID ?? '') ?>">More Information</a>
    </div>
    <?php endwhile ?>
</section>
<script src="../assets/js/script.js"></script>

<?php include '../includes/footer.php'; ?>
