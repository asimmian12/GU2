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

// Bringing in Unpublished video details
$unpublishedVideos = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 0 ORDER BY RAND()");
$unpublishedVideos->execute();
$unpublishedVideos->store_result();
$unpublishedVideos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Bringing in Published video details
$publishedVideos = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND()");
$publishedVideos->execute();
$publishedVideos->store_result();
$publishedVideos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Bringing in Unpublished Badge Details
$unpublishedReviews = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 0 ORDER BY RAND()");
$unpublishedReviews->execute();
$unpublishedReviews->store_result();
$unpublishedReviews->bind_result($tID, $tName, $tDesc, $tUserID);

// Bringing in Published Badge Details
$publishedReviews = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 1 ORDER BY RAND()");
$publishedReviews->execute();
$publishedReviews->store_result();
$publishedReviews->bind_result($tID, $tName, $tDesc, $tUserID);
?>
<section class="section-banner">
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Pending Upload Page</h1>
    <p class="paragraph-text" id="paragraph-text">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to your Admin Dashboard! Here you can manage all badges, photos, videos, and reviews. You can delete that if it's deemed as unacceptable to the policy, if you delete it it won't appear, but if you approve it, then it'll appear in the website</p>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Photos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-photo">
    <?php while ($unpublishedPhotos->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? ' ') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($pDesc ?? ' ') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($pRelease ?? ' ') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Photos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-photo">
    <?php while ($publishedPhotos->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? ' ') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($pDesc ?? ' ') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($pRelease ?? ' ') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-badge">
    <?php while ($unpublishedBadges->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? ' ') ?></h2>
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($bDesc ?? ' ') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-badge">
    <?php while ($publishedBadges->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? ' ') ?></h2>
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($bDesc ?? ' ') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Videos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-video">
    <?php while ($unpublishedVideos->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($vDesc ?? '') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($vRelease ?? '') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Videos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-video">
    <?php while ($publishedVideos->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($vDesc ?? '') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($vRelease ?? '') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Unpublished Reviews</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-review">
    <?php while ($unpublishedReviews->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($tDesc ?? '') ?></p>
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

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Published Reviews</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-review">
    <?php while ($publishedReviews->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($tDesc ?? '') ?></p>
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

<!-- Contact Section -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">EMERGENCY</h3>
    <p class="text-gray-700">0141 272 9000</p>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">LOCATION</h3>
    <p class="text-gray-700">50 Prospecthill Road</p>
    <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">EMAIL</h3>
    <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
  </div>
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">WORKING HOURS</h3>
    <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
    <p class="text-gray-700">Sunday: Emergency only</p>
  </div>
</section>


<script src="assets/js/script.js"></script>
<?php include '../../includes/footer.php'; ?>



