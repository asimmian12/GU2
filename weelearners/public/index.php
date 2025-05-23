<?php
include 'config/config.php';
include 'includes/header.php';

// Fetching photo details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $release, $pImage);

// Fetching video details
$video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$video->execute();
$video->store_result();
$video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// Fetching badge details
$badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);

// Fetching testimonals details
$testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$testimonals->execute();
$testimonals->store_result();
$testimonals->bind_result($tID, $tName, $tDesc, $tUserID);
?>

<section class="section-banner">
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">Home Page</h1>
    <p class="paragraph-text">Welcome to Wee Learner which has been the go-to platform, for parents, carers, and children all love coming to us. Our website connects all Parents and Carers of their kids, ranging from Special Needs Education through Mainstream Kids Education. Whether you're searching for a Nursary, for your kids, or want to apply for being a helper, WeeLearners can provide an easy-to-use website where parents and carers can explore a wide range of badge records, for their children, and apply for being a helper, etc.</p>
</section>


<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All Photos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php while ($photo->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? '') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Photo Cover">
            <p class="mb-1"><?= htmlspecialchars($pDesc ?? '') ?></p>
            <p class="text-sm text-gray-500"><?= htmlspecialchars($release ?? '') ?></p>
            <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All Videos</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php while ($video->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p class="mb-1"><?= htmlspecialchars($vDesc ?? '') ?></p>
            <p class="text-sm text-gray-500"><?= htmlspecialchars($vRelease ?? '') ?></p>
            <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php while ($badge->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            <p class="mb-2"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All Reviews</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php while ($testimonals->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p class="mb-2"><?= htmlspecialchars($tDesc ?? '') ?></p>
            <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
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


<?php include 'includes/footer.php'; ?>