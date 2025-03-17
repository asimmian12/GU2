<?php 
include 'includes/header.php';
include 'config/config.php';

// To check if user logged on, if not redirects me to loginp age
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}


// Bringing in Genre Details
$genre = $conn->prepare('SELECT id, genreName FROM genre');
$genre->execute();
$genre->store_result();
$genre->bind_result($genID, $genreName);

// Bringing in Record Label Details
$rl = $conn->prepare('SELECT id, rlName FROM record_label');
$rl->execute();
$rl->store_result();
$rl->bind_result($rlID, $rlName);

// Bringing in Uploads Details
$uploads = $conn->prepare("SELECT 
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
WHERE album.fk_user_id = ?");
$uploads->bind_param("i", $_SESSION['id']);
$uploads->execute();
$uploads->store_result();
$uploads->bind_result($aID, $albName, $albDescription, $release, $image, $artName, $genreName, $rlName);
?>

<h1 class="h1-heading-center">Uploading Vinyl Page</h1>
<h2 class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, would you like to upload an album for sale?</h2>
<section class="uploadVinyl">
    <form action="<?= ROOT_DIR ?>uploadConfig" method="post" enctype="multipart/form-data">
        <label for="imgUpload">Select Album Image</label>
        <input type="file" name="file" id="imgUpload" required>
        
        <label for="albumName">Album Name</label>
        <input type="text" name="albName" id="albumName" required>
            
        <label for="albumDescription">Album Description</label>
        <textarea name="albDescription" id="albumDescription" required></textarea>
            
        <label for="artistName">Artist Name</label>
        <input type="text" name="artName" id="artistName" required>
            
        <label for="artistDescription">Artist Description</label>
        <textarea name="artDescription" id="artistDescription" required></textarea>
        
        <label for="fk_genre_id">Select Genre</label>
        <select name="fk_genre_id" id="fk_genre_id" required>
            <option value="">Select Genre</option>
            <?php while ($genre->fetch()): ?>
                <option value="<?= htmlspecialchars($genID ?? '') ?>"><?= htmlspecialchars($genreName ?? '') ?></option>
                <?php endwhile; ?>
            </select>
            
            
        <label for="fk_record_label_id">Select Record Label</label>
        <select name="fk_record_label_id" id="fk_record_label_id" required>
            <option value="">Select Record Label</option>
            <?php while ($rl->fetch()): ?>
                <option value="<?= htmlspecialchars($rlID ?? '') ?>"><?= htmlspecialchars($rlName ?? '') ?></option>
                <?php endwhile; ?>
            </select>
            
        <input type="submit" name="submit" value="Upload" class="upload-btn">
    </form>
</section>
    
<h1 class="h1-heading-center">User Uploads History Page</h1>
<section class="section-uploads">  
    <section>
        <?php while($uploads->fetch()): ?>
            <div class="div-user-item">
                <p class="paragraph-album-text"><?= htmlspecialchars($albName ?? '') ?></p>
                <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $image ?? '') ?>" alt="Album Cover">
                <p class="paragraph-album-text"><?= htmlspecialchars($albDescription ?? '') ?></p>
                <p class="paragraph-album-text"><?= htmlspecialchars($release ?? '') ?></p>
                <p class="paragraph-album-text"><?= htmlspecialchars($genreName ?? '') ?></p>
                <p class="paragraph-album-text"><?= htmlspecialchars($rlName ?? '') ?></p>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $aID ?? '') ?>">More Information</a>
            </div>
            <?php endwhile; ?>
        </section>
    </section>
</section>

<?php include 'includes/footer.php'; ?>
