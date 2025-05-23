<?php
include '../config/config.php';
include '../includes/header.php';

// Fetch Photo ID
if (isset($_GET['aid'])) {
    $photoID = $_GET['aid'];
} else {
    $photoID = null;
}

// Fetch Video ID
if (isset($_GET['vid'])) {
    $videoID = $_GET['vid'];
} else {
    $videoID = null;
}

// Fetch Badge ID
if (isset($_GET['bid'])) {
    $badgeID = $_GET['bid'];
} else {
    $badgeID = null;
}

// Fetch Testimonals ID
if (isset($_GET['tid'])) {
    $testimonalsID = $_GET['tid'];
} else {
    $testimonalsID = null;
}

// Fetching Photo Details
if ($photoID == true) {
    $photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE id = ? AND is_active = 1 LIMIT 3");
    $photo->bind_param("i", $photoID);
    $photo->execute();
    $photo->store_result();
    $photo->bind_result($pID, $pName, $pDesc, $release, $pImage);
}

// Fetching Video Details
if ($videoID == true) {
    $video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE id = ? AND is_active = 1 LIMIT 3");
    $video->bind_param("i", $videoID);
    $video->execute();
    $video->store_result();
    $video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);
}

if ($badgeID == true) {
    $badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE id = ? LIMIT 3");
    $badge->bind_param("i", $badgeID);
    $badge->execute();
    $badge->store_result();
    $badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);
}

if ($testimonalsID == true) {
    $testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE id = ? LIMIT 3");
    $testimonals->bind_param("i", $testimonalsID);
    $testimonals->execute();
    $testimonals->store_result();
    $testimonals->bind_result($tID, $tName, $tDesc, $tUserID);
}
?>

<section class="section-banner">
 <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">More Information Page</h1>
  <p class="paragraph-text">
    Welcome to the More Information page. Here you can find detailed information about the specific content you are interested in. Whether it's a photo, video, badge, or testimonial, we provide comprehensive details to help you understand more about it. You can also find the release date and the user who uploaded it. If you have any questions or need further assistance, please feel free to contact us using the details at the bottom of this page. Thank you for visiting our More Information page.
  </p>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">Photo Details</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php if ($photoID == true) : while ($photo->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? 'No Photo name available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? 'default.jpg') ?>" alt="Photo Image" class="mx-auto mb-2 max-h-60 object-cover">
            <p class="mb-2"><?= htmlspecialchars($pDesc ?? 'No photo description available') ?></p>
            <p class="text-sm text-gray-500 mb-3">Uploaded by Anonymous User ID: <?= htmlspecialchars($pID ?? '') ?></p>
            <p class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($release ?? 'Release date not available') ?></p>
            <div class="flex justify-center gap-2">
                <button onclick="window.print()" class="text-white bg-gray-500 hover:bg-gray-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    <i class="fa-solid fa-print mr-1"></i> Print
                </button>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">More Videos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php if ($videoID == true) : while ($video->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? 'No Video title available') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? 'default-video.jpg') ?>" alt="Video Thumbnail" class="mx-auto mb-2 max-h-60 object-cover">
            <p class="mb-2"><?= htmlspecialchars($vDesc ?? 'No video description available') ?></p>
            <p class="text-sm text-gray-500 mb-3">Uploaded by Anonymous User ID: <?= htmlspecialchars($vID ?? '') ?></p>
            <p class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($vRelease ?? 'Release date not available') ?></p>
            <div class="flex justify-center gap-2">
                <button onclick="window.print()" class="text-white bg-gray-500 hover:bg-gray-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    <i class="fa-solid fa-print mr-1"></i> Print
                </button>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">More Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php if ($badgeID == true) : while ($badge->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image" class="mx-auto mb-2" style="max-width: 200px; height: auto;">
            <p class="mb-2"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <p class="text-sm text-gray-500 mb-3">Uploaded by Anonymous User ID: <?= htmlspecialchars($bID ?? '') ?></p>
            <div class="flex justify-center gap-2">
                <button onclick="window.print()" class="text-white bg-gray-500 hover:bg-gray-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    <i class="fa-solid fa-print mr-1"></i> Print
                </button>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">More Reviews</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php if ($testimonalsID == true) : while ($testimonals->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p class="mb-2"><?= htmlspecialchars($tDesc ?? '') ?></p>
            <p class="text-sm text-gray-500 mb-3">Uploaded by Anonymous User ID: <?= htmlspecialchars($tID ?? '') ?></p>
            <div class="flex justify-center gap-2">
                <button onclick="window.print()" class="text-white bg-gray-500 hover:bg-gray-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    <i class="fa-solid fa-print mr-1"></i> Print
                </button>
            </div>
        </div>
    <?php endwhile; endif; ?>
</section>


<!-- Contact Section -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center">
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
<?php include '../includes/footer.php'; ?>