
<?php
include 'config/config.php';
include 'includes/header.php';

// Bringing In Album Details
$album = $conn->prepare("SELECT 
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
WHERE is_active = 1
ORDER BY RAND() 
LIMIT 20");
$album->execute();
$album->store_result();
$album->bind_result($aID, $albName, $albDesc, $release, $albImage, $artName, $genreName, $rlName);
?>
<h1 class="h1-heading-center">Vinyl Page</h1>

<section class="section-vinyl">
    <?php while($album->fetch()) : ?>
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($albName ?? '') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $albImage ?? '') ?>" alt="Album Cover">
        <h2 class="main-heading"><?= htmlspecialchars($albDesc ?? '') ?></h2>
        <span><?= htmlspecialchars($release ?? '') ?></span>
        <h2 class="main-heading"><?= htmlspecialchars($genreName ?? '') ?></h2>
        <h2 class="main-heading"><?= htmlspecialchars($rlName ?? '') ?></h2>
        <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $aID ?? '') ?>">More Information</a>
    </div>
    <?php endwhile ?>
</section>

<?php include 'includes/footer.php'; ?>