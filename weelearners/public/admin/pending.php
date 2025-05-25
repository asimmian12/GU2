<?php
/* Include Configuration and Header Files */
include '../../config/config.php';
include '../../includes/header.php';

/* Database Query for Unpublished Photos */
$unpublishedPhotos = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 0 ORDER BY RAND()");
$unpublishedPhotos->execute();
$unpublishedPhotos->store_result();
$unpublishedPhotos->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);

/* Database Query for Published Photos */
$publishedPhotos = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 1 ORDER BY RAND()");
$publishedPhotos->execute();
$publishedPhotos->store_result();
$publishedPhotos->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);

/* Database Query for Unpublished Badges */
$unpublishedBadges = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE is_active = 0 ORDER BY RAND()");
$unpublishedBadges->execute();
$unpublishedBadges->store_result();
$unpublishedBadges->bind_result($bID, $bName, $bDesc, $bImage);

/* Database Query for Published Badges */
$publishedBadges = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE is_active = 1 ORDER BY RAND()");
$publishedBadges->execute();
$publishedBadges->store_result();
$publishedBadges->bind_result($bID, $bName, $bDesc, $bImage);

/* Database Query for Unpublished Videos */
$unpublishedVideos = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 0 ORDER BY RAND()");
$unpublishedVideos->execute();
$unpublishedVideos->store_result();
$unpublishedVideos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

/* Database Query for Published Videos */
$publishedVideos = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND()");
$publishedVideos->execute();
$publishedVideos->store_result();
$publishedVideos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

/* Database Query for Unpublished Reviews */
$unpublishedReviews = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 0 ORDER BY RAND()");
$unpublishedReviews->execute();
$unpublishedReviews->store_result();
$unpublishedReviews->bind_result($tID, $tName, $tDesc, $tUserID);

/* Database Query for Published Reviews */
$publishedReviews = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 1 ORDER BY RAND()");
$publishedReviews->execute();
$publishedReviews->store_result();
$publishedReviews->bind_result($tID, $tName, $tDesc, $tUserID);
?>

<!-- /* Main Banner Section */ -->
<section class="section-banner flex flex-col items-center">
    <!-- /* Page Heading */ -->
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Pending Upload Page</h1>
    
    <!-- /* Welcome Message */ -->
    <p class="paragraph-text" id="paragraph-text">
        Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to Pending Upload Page! Here you can manage all badges, 
        photos, videos, and reviews. You can delete that if it's deemed as unacceptable to the policy, if you delete it it 
        won't appear, but if you approve it, then it'll appear in the website
    </p>
</section>

<!-- /* Unpublished Photos Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Photos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-photo">
    <?php while ($unpublishedPhotos->fetch()) : ?>
        <!-- /* Individual Photo Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Photo Name */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? ' ') ?></h2>
            
            <!-- /* Photo Image */ -->
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            
            <!-- /* Photo Description */ -->
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($pDesc ?? ' ') ?></p>
            
            <!-- /* Release Date */ -->
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($pRelease ?? ' ') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?aid=' . $pID) ?>" class="text-white bg-green-500 hover:bg-green-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Publish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Published Photos Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Photos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-photo">
    <?php while ($publishedPhotos->fetch()) : ?>
        <!-- /* Individual Photo Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Photo Name */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? ' ') ?></h2>
            
            <!-- /* Photo Image */ -->
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            
            <!-- /* Photo Description */ -->
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($pDesc ?? ' ') ?></p>
            
            <!-- /* Release Date */ -->
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($pRelease ?? ' ') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?aid=' . $pID) ?>" class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Unpublish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Unpublished Badges Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-badge">
    <?php while ($unpublishedBadges->fetch()) : ?>
        <!-- /* Individual Badge Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Badge Name */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? ' ') ?></h2>
            
            <!-- /* Badge Image */ -->
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            
            <!-- /* Badge Description */ -->
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($bDesc ?? ' ') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?bid=' . $bID) ?>" class="text-white bg-green-500 hover:bg-green-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Publish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Published Badges Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-badge">
    <?php while ($publishedBadges->fetch()) : ?>
        <!-- /* Individual Badge Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Badge Name */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? ' ') ?></h2>
            
            <!-- /* Badge Image */ -->
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            
            <!-- /* Badge Description */ -->
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($bDesc ?? ' ') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?bid=' . $bID) ?>" class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Unpublish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Unpublished Videos Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Videos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-video">
    <?php while ($unpublishedVideos->fetch()) : ?>
        <!-- /* Individual Video Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Video Title */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            
            <!-- /* Video Thumbnail */ -->
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            
            <!-- /* Video Description */ -->
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($vDesc ?? '') ?></p>
            
            <!-- /* Release Date */ -->
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($vRelease ?? '') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?vid=' . $vID) ?>" class="text-white bg-green-500 hover:bg-green-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Publish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Published Videos Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Videos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-video">
    <?php while ($publishedVideos->fetch()) : ?>
        <!-- /* Individual Video Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Video Title */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            
            <!-- /* Video Thumbnail */ -->
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            
            <!-- /* Video Description */ -->
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($vDesc ?? '') ?></p>
            
            <!-- /* Release Date */ -->
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($vRelease ?? '') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?vid=' . $vID) ?>" class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Unpublish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Unpublished Reviews Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Reviews</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-review">
    <?php while ($unpublishedReviews->fetch()) : ?>
        <!-- /* Individual Review Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Reviewer Name */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            
            <!-- /* Review Text */ -->
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($tDesc ?? '') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/publish.php?tid=' . $tID) ?>" class="text-white bg-green-500 hover:bg-green-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Publish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Published Reviews Section */ -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Reviews</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-review">
    <?php while ($publishedReviews->fetch()) : ?>
        <!-- /* Individual Review Card */ -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- /* Reviewer Name */ -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            
            <!-- /* Review Text */ -->
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($tDesc ?? '') ?></p>
            
            <!-- /* Action Buttons */ -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/admin/unpublish.php?tid=' . $tID) ?>" class="text-white bg-yellow-500 hover:bg-yellow-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    Unpublish
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* Contact Information Section */ -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
  
  <!-- /* Emergency Contact Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">EMERGENCY</h3>
    <p class="text-gray-700">0141 272 9000</p>
  </div>
  
  <!-- /* Location Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">LOCATION</h3>
    <p class="text-gray-700">50 Prospecthill Road</p>
    <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
  </div>
  
  <!-- /* Email Contact Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">EMAIL</h3>
    <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
  </div>
  
  <!-- /* Working Hours Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">WORKING HOURS</h3>
    <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
    <p class="text-gray-700">Sunday: Emergency only</p>
  </div>
</section>

<!-- /* Include Footer File */ -->
<?php include '../../includes/footer.php'; ?>