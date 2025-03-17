<?php
include 'config/config.php';  
include 'includes/header.php'; 

// Bringing in Published Album Details
$published = $conn->prepare("SELECT
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
WHERE is_active = 0
ORDER BY RAND()");
$published->execute();
$published->store_result();
$published->bind_result($aID, $albName, $albDesc, $release, $image, $artName, $genreName, $rlName);

// Bringing in Unpublished Album Details
$unpublished = $conn->prepare("SELECT
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
ORDER BY RAND()");
$unpublished->execute();
$unpublished->store_result();
$unpublished->bind_result($aID, $albName, $albDesc, $release, $image, $artName, $genreName, $rlName);
?>

<h1 class="h1-heading-center">Unpublished Page</h1>
<div class="div-album"> 
    <section>
        <?php while ($published->fetch()) : ?>
        <div class="div-album-item">
            <h2 class="main-heading"><?= htmlspecialchars($albName ?? ' ') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $image ?? '') ?>" alt="Album Cover"> 
            <h2 class="main-heading"><?= htmlspecialchars($albDesc ?? ' ') ?></h2>
            <span><?= htmlspecialchars($release ?? ' ') ?></span>
            <p class="paragraph-text"><?= htmlspecialchars($genreName ?? '') ?></p>
            <p class="paragraph-text"><?= htmlspecialchars($rlName ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $aID ?? '') ?>">More Information</a>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?aid=' . $aID ?? '') ?>">Publish</a>
        </div>
        <?php endwhile; ?>
    </section>
</div>

<h1 class="h1-heading-center">Published Page</h1>
<div class="div-album">
    <section>
        <?php while ($unpublished->fetch()) : ?>
        <div class="div-album-item">
            <h2 class="main-heading"><?= htmlspecialchars($albName ?? ' ') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $image ?? '' )?>" alt="Album Cover"> 
            <h2 class="main-heading"><?= htmlspecialchars($albDesc ?? ' ') ?></h2>
            <span><?= htmlspecialchars($release ?? ' ') ?></span>
            <p class="paragraph-text"><?= htmlspecialchars($genreName ?? '') ?></p>
            <p class="paragraph-text"><?= htmlspecialchars($rlName ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $aID ?? '') ?>">More Information</a>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?aid=' . $aID ?? '') ?>">Unpublish</a>
        </div>
        <?php endwhile; ?>
    </section>
</div>

<?php include 'includes/footer.php'; ?>