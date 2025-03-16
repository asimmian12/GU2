<?php
include 'config/config.php';
include 'includes/header.php';

// Bringing In Photo Details (replacing album with photo)
$photo = $conn->prepare("SELECT
id,
albName,
albDescription,
release_date,
image
FROM photo
WHERE is_active = 1
ORDER BY RAND() 
LIMIT 5");
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $release, $pImage);

// Bringing in photo details for genre (photo with genre)
$genre = $conn->prepare("SELECT
id,
albName,
albDescription,
release_date,
image
FROM photo 
WHERE fk_record_label_id = 2 AND is_active = 1
ORDER BY RAND() 
LIMIT 5");
$genre->execute();
$genre->store_result();
$genre->bind_result($gID, $gName, $gDesc, $gRelease, $gImage);

// Bringing in user details (artist table assumption)
$user = $conn->prepare("SELECT 
id,
name,
profile_picture
FROM user
LIMIT 3");
$user->execute();
$user->store_result();
$user->bind_result($uID, $uName, $uProfilePic);
?>

<h1 class="h1-heading-center">Home Page</h1>
<section class="section-intro">
    <p class="paragraph-text">Welcome to MusicOnline.com! With a successful startup in connecting vinyl enthusiasts, we're thrilled to continue growing and serving music lovers everywhere. Our community focused platform helps both buyers and sellers find exactly what they're looking for, from rare albums to the latest releases. Please stay tuned as we continue to enhance the user experience and bring more features to make buying and selling vinyl easier and more enjoyable than ever.</p>
</section>

<h2 class="h2-secondary-colour">Greatest Songs Of All Time</h2>
<section>
    <?php while($photo->fetch()): ?>
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($pName ?? '') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Album Cover">
        <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? '') ?></h2>
        <span><?= htmlspecialchars($release ?? '') ?></span>
        <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
    </div>
    <?php endwhile ?>
</section>

<h2 class="h2-secondary-colour">Playlist</h2>
<section>
    <?php while($genre->fetch()): ?>
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($gName ?? '') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($gImage ?? 'default.jpg')) ?>" alt="Playlist Cover">
        <h2 class="main-heading"><?= htmlspecialchars($gDesc ?? '') ?></h2>
        <span><?= htmlspecialchars($gRelease ?? '') ?></span>
        <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $gID ?? '') ?>">More Information</a>
    </div>
    <?php endwhile ?>
</section>

<h2 class="h2-secondary-colour">Top Artists</h2>
<section>
    <?php while($user->fetch()): ?>
    <div>
        <h2 class="main-heading"><?= htmlspecialchars($uName ?? '') ?></h2>
        <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($uProfilePic ?? 'default-profile.jpg')) ?>" alt="Artist Image">
        <span>Artist</span>
        <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $uID ?? '') ?>">More Information</a>
    </div>
    <?php endwhile ?>
</section>

<?php include 'includes/footer.php'; ?>
