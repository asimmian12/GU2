<!-- The PHP includes section of the page -->
<?php 
// <!-- Include the config file -->
include 'config/config.php';
// <!-- Include the header file -->
include 'includes/header.php';

// Bringing in photo details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $release, $pImage);

// <!-- The query to fetch video details -->
// Bringing in video details
$video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$video->execute();
$video->store_result();
$video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);

// <!-- The query to fetch badge details -->
// Bringing in badge details
$badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);

// <!-- The query to fetch testimonial details -->
// Bringing in testimonals details
$testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE is_active = 1 ORDER BY RAND() LIMIT 3");
$testimonals->execute();
$testimonals->store_result();
$testimonals->bind_result($tID, $tName, $tDesc, $tUserID);

?>

<!-- The main's banner section -->
<section class="section-banner flex flex-col items-center">
    <h1 class="text-3xl font-semibold text-center mt-6 mb-4 text-pink-500" id="h1-heading-center">Home Page</h1>
    <p id="paragraph-text" class="paragraph-text mx-2">Welcome to Wee Learner which has been the go-to platform, for parents, carers, and children all love coming to us. Our website connects all Parents and Carers of their kids, ranging from Special Needs Education through Mainstream Kids Education. Whether you're searching for a Nursary, for your kids, or want to apply for being a helper, WeeLearners can provide an easy-to-use website where parents and carers can explore a wide range of badge records, for their children, and apply for being a helper, etc.</p>
</section>


<!-- The photos section heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Photos</h1>
 <!-- The photos section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-photo">
    <!-- Fetching photo -->
    <?php while ($photo->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? '') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Photo Cover">
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($pDesc ?? '') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500"><?= htmlspecialchars($release ?? '') ?></p>
            <a id="paragraph-text" class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $pID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>


<!-- The videos section with heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Videos</h1>
<!-- The videos section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-video">
    <!-- Fetching video -->
    <?php while ($video->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($vImage ?? 'default-video.jpg')) ?>" alt="Video Thumbnail">
            <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($vDesc ?? '') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500"><?= htmlspecialchars($vRelease ?? '') ?></p>
            <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $vID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>


<!-- The badges section with heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Badges</h1>
<!-- The badge section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-badge">
    <!-- Fetching badge -->
    <?php while ($badge->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            <p id="paragraph-text" class="mb-2"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>


<!-- The review section with heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Reviews</h1>
<!-- The review scetion -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-review">
    <!-- Fetching review -->
    <?php while ($testimonals->fetch()) : ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p id="paragraph-text" class="mb-2"><?= htmlspecialchars($tDesc ?? '') ?></p>
            <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile ?>
</section>

<!-- The contact Section with heading-->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
    <!-- The emergency contact card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMERGENCY</h3>
        <p class="text-gray-700">0141 272 9000</p>
    </div>
    <!-- The location contact card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">LOCATION</h3>
        <p class="text-gray-700">50 Prospecthill Road</p>
        <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
    </div>
    <!-- The email contact card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMAIL</h3>
        <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
    </div>
    <!-- The hours contact card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">WORKING HOURS</h3>
        <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
        <p class="text-gray-700">Sunday: Emergency only</p>
    </div>
</section>

<!-- Include the footer file -->
<?php include 'includes/footer.php'; ?>
