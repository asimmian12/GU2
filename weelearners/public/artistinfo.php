<?php
include '../config/config.php';
include '../includes/header.php';


// Bringing in artist details
$artistInfo = $conn->prepare("SELECT
artName,
artDescription
FROM artist
WHERE id = ?");

$artistInfo->bind_param("i", $artistId);
$artistInfo->execute();
$artistInfo->store_result();
$artistInfo->bind_result($artName, $artDesc);
$artistInfo->fetch();

// Bringing in other albums by different artist
$artistAlbums = $conn->prepare("SELECT
alb.albName,
alb.image,
art.artName
FROM album alb
INNER JOIN artist art ON alb.fk_artist_id = art.id
WHERE art.id = ?");
$artistAlbums->bind_param("i", $artistId);
$artistAlbums->execute();
$artistAlbums->store_result();
$artistAlbums->bind_result($artAlbName, $artAlbImg, $albArtistName);

?>
<section>
  <h1><?= htmlspecialchars($artName ?? '') ?></h1>
  <p class="paragraph-text"><?= htmlspecialchars($artDesc ?? '') ?></p>
  <h2 class="main-heading">Albums by this artist:</h2>
  <?php while($artistAlbums->fetch()) : ?>
    <div>
      <h1 class="h1-heading-center"><?= htmlspecialchars($artAlbName ?? '') ?></h1>
      <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $artAlbImg ?? '') ?>" alt="<?= htmlspecialchars($artAlbName ?? '') ?>">
      <p class="paragraph-text">Artist: <?= htmlspecialchars($albArtistName ?? '') ?></p>
    </div>
    <?php endwhile ?>
  </section>
  
<?php include '../includes/footer.php'; ?>
