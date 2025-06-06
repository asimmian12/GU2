<?php 
// <!-- Include the config file -->
include '../config/config.php';
// <!-- Include the header file -->
include '../includes/header.php';

// By fetching IDs from URL parameters
$photoID = $_GET['aid'] ?? null;
$videoID = $_GET['vid'] ?? null;
$badgeID = $_GET['bid'] ?? null;
$testimonalsID = $_GET['tid'] ?? null;


// Fetch The Main Content Items
if ($photoID) {
    $photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE id = ? AND is_active = 1");
    $photo->bind_param("i", $photoID);
    $photo->execute();
    $photo->store_result();
    $photo->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);
}


if ($videoID) {
    $video = $conn->prepare("SELECT id, title, description, release_date, image, video_url FROM videos WHERE id = ? AND is_active = 1");
    $video->bind_param("i", $videoID);
    $video->execute();
    $video->store_result();
    $video->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage, $vVideoURL);
}


if ($badgeID) {
    $badge = $conn->prepare("SELECT id, badge_name, description, fk_user_id, badge_img FROM badge WHERE id = ?");
    $badge->bind_param("i", $badgeID);
    $badge->execute();
    $badge->store_result();
    $badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);
}


if ($testimonalsID) {
    $testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE id = ?");
    $testimonals->bind_param("i", $testimonalsID);
    $testimonals->execute();
    $testimonals->store_result();
    $testimonals->bind_result($tID, $tName, $tDesc, $tUserID);
}
// Fetch Suggested Content
if ($photoID) {
    $suggestedPhotos = $conn->prepare("SELECT id, albName, albDescription, image FROM photo WHERE id != ? AND is_active = 1 ORDER BY RAND() LIMIT 3");
    $suggestedPhotos->bind_param("i", $photoID);
    $suggestedPhotos->execute();
    $suggestedPhotosResult = $suggestedPhotos->get_result();
}


if ($videoID) {
    $suggestedVideos = $conn->prepare("SELECT id, title, description, image FROM videos WHERE id != ? AND is_active = 1 ORDER BY RAND() LIMIT 3");
    $suggestedVideos->bind_param("i", $videoID);
    $suggestedVideos->execute();
    $suggestedVideosResult = $suggestedVideos->get_result();
}


if ($badgeID) {
    $suggestedBadges = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE id != ? ORDER BY RAND() LIMIT 3");
    $suggestedBadges->bind_param("i", $badgeID);
    $suggestedBadges->execute();
    $suggestedBadgesResult = $suggestedBadges->get_result();
}


if ($testimonalsID) {
    $suggestedTestimonials = $conn->prepare("SELECT id, testimonals_name, description FROM testimonals WHERE id != ? ORDER BY RAND() LIMIT 3");
    $suggestedTestimonials->bind_param("i", $testimonalsID);
    $suggestedTestimonials->execute();
    $suggestedTestimonialsResult = $suggestedTestimonials->get_result();
}
?>

<!-- The main's banner Section -->
<section class="section-banner flex flex-col items-center">
  <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">More Information Page</h1>
  <p class="paragraph-text" id="paragraph-text">
    Welcome to the More Information page. Here you can find detailed information about the specific content you are interested in. Whether it's a photo, video, badge, or testimonial, we provide comprehensive details to help you understand more about it. You can also find the release date and the user who uploaded it. If you have any questions or need further assistance, please feel free to contact us using the details at the bottom of this page. Thank you for visiting our More Information page.
  </p>
</section>

<!-- The photo Section -->
<?php if ($photoID && $photo->num_rows > 0) : ?>
    <!-- THe photo sectino with heading -->
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">More Photo Details</h1>
    <!-- The photo section -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-photo">
        <!-- Fetching photos -->
        <?php while ($photo->fetch()) : ?>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
                <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? 'No Photo Name') ?></h2>
                <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($pImage ?? 'default.jpg')) ?>" alt="Photo Cover">
                <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($pDesc ?? 'No description available') ?></p>
                <p id="paragraph-text" class="text-sm text-gray-500">Released: <?= htmlspecialchars(date('M d, Y', strtotime($pRelease)) ?? 'Date not available') ?></p>
                <p id="paragraph-text" class="text-sm text-gray-500">Uploaded by Anonymous User ID: <?= htmlspecialchars($pID ?? '') ?></p>
            </div>
        <?php endwhile ?>
    </section>


    <!-- Suggested Photos -->
    <?php if (isset($suggestedPhotosResult) && $suggestedPhotosResult->num_rows > 0) : ?>
        <!-- The suggested photos section with heading -->
        <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Suggested Photos</h1>
        <!-- The section photo -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-photo">
            <?php while ($sp = $suggestedPhotosResult->fetch_assoc()) : ?>
                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($sp['albName'] ?? '') ?></h2>
                    <img class="mx-auto mb-2 max-h-60 object-cover" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($sp['image'] ?? 'default.jpg')) ?>" alt="Photo Cover">
                    <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($sp['albDescription'] ?? '') ?></p>
                    <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?aid=' . $sp['id'] ?? '') ?>">More Information</a>
                </div>
            <?php endwhile ?>
        </section>
    <?php endif; ?>
<?php endif; ?>

<!-- The Video Section -->
<?php if ($videoID && $video->num_rows > 0) : ?>
    <!-- The video sectino with heading -->
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">More Video Details</h1>
    <!-- The video section -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-video">
        <!-- Fetching videos -->
        <?php while ($video->fetch()) : ?>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
                <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? 'No Video Title') ?></h2>
                <div class="relative pb-[56.25%] mb-2">
                    <img src="<?= ROOT_DIR . 'assets/images/' . $vImage ?>" alt="<?= $vTitle ?>" class="absolute w-full h-full object-cover">
                </div>
                <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($vDesc ?? 'No description available') ?></p>
                <p id="paragraph-text" class="text-sm text-gray-500">Released: <?= htmlspecialchars(date('M d, Y', strtotime($vRelease)) ?? 'Date not available') ?></p>
                <a href="<?= $vVideoURL ?>" class="text-blue-600 hover:underline mt-2 inline-block">Watch Video</a>
            </div>
        <?php endwhile ?>
    </section>

    <!-- Suggested Videos -->
    <?php if (isset($suggestedVideosResult) && $suggestedVideosResult->num_rows > 0) : ?>
        <!-- The suggested videos section with heading -->
        <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Suggested Videos</h1>
        <!-- The section video -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-video">
            <?php while ($sv = $suggestedVideosResult->fetch_assoc()) : ?>
                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($sv['title'] ?? '') ?></h2>
                    <div class="relative pb-[56.25%] mb-2">
                        <img src="<?= ROOT_DIR . 'assets/images/' . $sv['image'] ?>" alt="<?= $sv['title'] ?>" class="absolute w-full h-full object-cover">
                    </div>
                    <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($sv['description'] ?? '') ?></p>
                    <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?vid=' . $sv['id'] ?? '') ?>">More Information</a>
                </div>
            <?php endwhile ?>
        </section>
    <?php endif; ?>
<?php endif; ?>

<!-- The Badge Section -->
<?php if ($badgeID && $badge->num_rows > 0) : ?>
    <!-- The badge sectino with heading -->
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">More Badge Details</h1>
    <!-- THe section-badge -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-badge">
        <!-- Fetching badges -->
        <?php while ($badge->fetch()) : ?>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
                <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? 'No Badge Name') ?></h2>
                <img class="mx-auto mb-2 w-32 h-32 object-contain" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
                <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($bDesc ?? 'No description available') ?></p>
                <p id="paragraph-text" class="text-sm text-gray-500">Uploaded by User ID: <?= htmlspecialchars($bUserID ?? '') ?></p>
            </div>
        <?php endwhile ?>
    </section>
   

    <!-- Suggested Badges -->
    <?php if (isset($suggestedBadgesResult) && $suggestedBadgesResult->num_rows > 0) : ?>
        <!-- The suggested badges section with heading -->
        <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Suggested Badges</h1>
        <!-- The section badge -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-badge">
            <?php while ($sb = $suggestedBadgesResult->fetch_assoc()) : ?>
                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($sb['badge_name'] ?? '') ?></h2>
                    <img class="mx-auto mb-2 w-32 h-32 object-contain" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($sb['badge_img'] ?? 'default.jpg')) ?>" alt="Badge Image">
                    <p id="paragraph-text" class="mb-1"><?= htmlspecialchars($sb['description'] ?? '') ?></p>
                    <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $sb['id'] ?? '') ?>">More Information</a>
                </div>
            <?php endwhile ?>
        </section>
    <?php endif; ?>
<?php endif; ?>

<!-- The testimonials Section -->
<?php if ($testimonalsID && $testimonals->num_rows > 0) : ?>
    <!-- The testimonials sectino with heading -->
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">More Testimonial Details</h1>
    <!-- The testimonials section -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-review">
        <!-- Fetching testimonials -->
        <?php while ($testimonals->fetch()) : ?>
            <div class="bg-white p-4 rounded-lg shadow-md text-center">
                <div class="flex items-center justify-center mb-2">
                    <div class="bg-pink-100 text-pink-600 rounded-full w-10 h-10 flex items-center justify-center text-lg font-bold mr-2 aspect-square">
                        <?= substr($tName, 0, 1) ?>
                    </div>
                    <h2 id="main-heading" class="text-xl font-bold"><?= htmlspecialchars($tName ?? 'Anonymous') ?></h2>
                </div>
                <p id="paragraph-text" class="mb-1 italic">"<?= htmlspecialchars($tDesc ?? 'No testimonial text') ?>"</p>
                <p id="paragraph-text" class="text-sm text-gray-500">User ID: <?= htmlspecialchars($tUserID ?? '') ?></p>
            </div>
        <?php endwhile ?>
    </section>

    <!-- The section Testimonials -->
    <?php if (isset($suggestedTestimonialsResult) && $suggestedTestimonialsResult->num_rows > 0) : ?>
        <!-- The suggested testimonials section with heading -->
        <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Suggested Testimonials</h1>
        <!-- The section for testimonials -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-review">
            <?php while ($st = $suggestedTestimonialsResult->fetch_assoc()) : ?>
                <div class="bg-white p-4 rounded-lg shadow-md text-center">
                    <div class="flex items-center justify-center mb-2">
                        <div class="bg-pink-100 text-pink-600 rounded-full w-10 h-10 flex items-center justify-center text-lg font-bold mr-2 aspect-square">
                            <?= substr($st['testimonals_name'], 0, 1) ?>
                        </div>
                        <h2 id="main-heading" class="text-xl font-bold"><?= htmlspecialchars($st['testimonals_name'] ?? 'Anonymous') ?></h2>
                    </div>
                    <p id="paragraph-text" class="mb-1 italic">"<?= htmlspecialchars($st['description'] ?? 'No testimonial text') ?>"</p>
                    <a class="text-blue-600 hover:underline mt-2 inline-block" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $st['id'] ?? '') ?>">More Information</a>
                </div>
            <?php endwhile ?>
        </section>
    <?php endif; ?>
<?php endif; ?>

<!-- The contact Section -->
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
<?php include '../includes/footer.php'; ?>