<?php
include 'config/config.php';
include 'includes/header.php';

$search = $_POST['search'] ?? '';
$searchResults = "%" . $search . "%";

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
WHERE album.albName LIKE ? OR album.albDescription LIKE ? OR genre.genreName LIKE ?");
$album->bind_param("sss", $searchResults, $searchResults, $searchResults);
$album->execute();
$album->store_result();
$album->bind_result($aID, $albName, $albDescription, $release, $image, $artName, $genreName, $rlName);
?>

<h1 class="h1-heading-center">Home Page</h1>
<h2 class="h2-secondary-colour">Search</h2>
<section>
    <?php while ($album->fetch()) : ?>
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($albName ?? '') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $image ?? '') ?>" alt="Album Cover">
        <h2 class="main-heading"><?= htmlspecialchars($albDescription ?? '') ?></h2>
        <span><?= htmlspecialchars($release ?? '') ?></span> 
        <span><?= htmlspecialchars($genreName ?? '') ?></span> 
        <span><?= htmlspecialchars($rlName ?? '') ?></span> 
        <a href="<?= ROOT_DIR ?>public/moreinfo.php?aid=<?= htmlspecialchars($aID ?? '') ?>">More Information</a>
    </div>
    <?php endwhile; ?>
</section>

<?php include 'includes/footer.php'; ?>
