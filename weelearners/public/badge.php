<?php
include 'config/config.php';
include 'includes/header.php';

// Bringing In Badge Details
$badge = $conn->prepare("SELECT 
    id,
    badge_name,
    description,
    fk_user_id,
    badge_img
    FROM badge
    WHERE is_active = 1
    ORDER BY RAND() 
    LIMIT 30"); 
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);
?>

<!-- Banner Section -->
<section class="section-banner">
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">Badges Page</h1>
    <p class="paragraph-text">Welcome to the Badge section of Wee Learners. Here, you can explore a wide variety of badges that have been created and shared by our community of users. Badges are a great way to showcase achievements, recognize contributions, and celebrate milestones. On this page, you will find a curated selection of badges, each with its own unique design and description. Whether you are looking for inspiration, want to learn more about a specific badge, or simply enjoy browsing through creative designs, this is the perfect place for you. Each badge includes a detailed description, an image, and information about the user who uploaded it. You can click on any badge to view more details, including its origin and purpose. If you find a badge particularly interesting, feel free to share it with others or print it out for your personal collection. Our badge library is constantly growing, so be sure to check back often for new additions.  If you have any questions or need assistance, please don't hesitate to reach out to us using the contact information provided below. We hope you enjoy exploring the badges and discovering the creativity of our community. Thank you for being a part of Wee Learners!</p>
</section>

<!-- Badge Grid -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 mb-12">
    <?php while ($badge->fetch()) : ?>
        <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow">
            <h2 class="text-xl font-bold mb-2 text-black-600"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img class="mx-auto mb-4 rounded" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            <p class="mb-2 text-gray-700"><?= htmlspecialchars($bDesc ?? '') ?></p>
            <p class="mb-2 text-sm text-gray-500">Uploaded by Anonymous User ID: <?= htmlspecialchars($bID ?? '') ?></p>
            <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
            <button onclick="window.print()" class="ml-4 text-gray-600 hover:text-indigo-600">
              <i class="fa-solid fa-print"></i>
            </button>
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
