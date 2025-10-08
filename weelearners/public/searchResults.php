<?php 
// <!-- Include the config file -->
include 'config/config.php';
// <!-- Include the header file c-->
include 'includes/header.php';


// <!-- The search query is being processed -->
$search = $_POST['search'] ?? '';
$searchResults = "%" . $search . "%";


// Bringing In Photo Details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE albName LIKE ? OR albDescription LIKE ?");
$photo->bind_param("ss", $searchResults, $searchResults);
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);


// Bringing In Video Details
$videos = $conn->prepare("SELECT id, title, description, release_date, image FROM videos WHERE title LIKE ? OR description LIKE ?");
$videos->bind_param("ss", $searchResults, $searchResults);
$videos->execute();
$videos->store_result();
$videos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage);


// Bringing In Badge Details
$badge = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE badge_name LIKE ? OR description LIKE ?");
$badge->bind_param("ss", $searchResults, $searchResults);
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bImage);


// Bringing In Testimonals Details
$testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE testimonals_name LIKE ? OR description LIKE ?");
$testimonals->bind_param("ss", $searchResults, $searchResults);
$testimonals->execute();
$testimonals->store_result();
$testimonals->bind_result($tID, $tName, $tDesc, $tUserID);

?>

<!-- The main's banner Section -->
<section class="section-banner flex flex-col items-center">
  <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Search Page</h1>
  <p class="paragraph-text" id="paragraph-text">
    Welcome to the search results page. Here you can find all the results related to your search query.
  </p>
</section>


<!-- The photos Results with heading -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Photos</h1>
<!-- The photo section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-photo">
    <!-- Fetching photos -->
    <?php while ($photo->fetch()) : ?>
        <!-- The individual Photo Card -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($pName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image" class="mx-auto mb-2 max-h-60 object-cover">
            <p id="paragraph-text" class="mb-2"><?= htmlspecialchars($pDesc ?? '') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($pRelease ?? '') ?></p>
            <!-- The More Info Button -->
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?aid=<?= htmlspecialchars($pID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                More Info
            </a>
        </div>
    <?php endwhile; ?>
</section>

<!-- The videos Results Section with heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Videos</h1>
<!-- The video section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-video">
    <!-- Fetching videos -->
    <?php while ($videos->fetch()) : ?>
        <!-- The Individual Video Card -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? '') ?>" alt="Video Image" class="mx-auto mb-2 max-h-60 object-cover">
            <p id="paragraph-text" class="mb-2"><?= htmlspecialchars($vDesc ?? '') ?></p>
            <p id="paragraph-text" class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($vRelease ?? '') ?></p>
            <!-- The More Info Button -->
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?vid=<?= htmlspecialchars($vID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                More Info
            </a>
        </div>
    <?php endwhile; ?>
</section>


<!-- The badges Results Section with heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Badges</h1>
<!-- The badge section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-badge">
    <!-- Fetching badges -->
    <?php while ($badge->fetch()) : ?>
        <!-- Individual Badge Card -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image" class="mx-auto mb-2" style="max-width: 200px; height: auto;">
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <!-- More Info Button -->
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?bid=<?= htmlspecialchars($bID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                More Info
            </a>
        </div>
    <?php endwhile; ?>
</section>

<!-- The reviews Results Section with heading-->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Reviews</h1>
<!-- The review section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-review">
    <!-- Fetching reviews -->
    <?php while ($testimonals->fetch()) : ?>
        <!-- The individual Review Card -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($tDesc ?? '') ?></p>
            <!-- The more Info Button -->
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                More Info
            </a>
        </div>
    <?php endwhile; ?>
</section>

<!-- The contact Section with heading-->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<!-- The contact section -->
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
