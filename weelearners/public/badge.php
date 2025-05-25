<!-- The PHP includes section of the page -->
<?php 
// <!-- Include the configuration file for database and settings -->
include 'config/config.php';
// <!-- Include the header file containing HTML head and navigation -->
include 'includes/header.php';
// <!-- End of PHP includes -->

// <!-- Database query to fetch badge details -->
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
// <!-- End of badge query -->
?>

<!-- Banner Section -->
<section class="section-banner flex flex-col items-center">
    <h1 class="text-3xl font-semibold text-center mt-6 mb-4 text-pink-500" id="h1-heading-center">Badges Page</h1>
    <p id="paragraph-text" class="paragraph-text mx-2">
        Welcome to the Badge section of Wee Learners. Here, you can explore a wide variety of badges that have been created and shared by our community of users. Badges are a great way to showcase achievements, recognize contributions, and celebrate milestones.</p>
    </p>
</section>
<!-- End of banner section -->

<!-- Badge Grid Section -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All Badges</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4 mb-12" id="section-badge">
    <?php while ($badge->fetch()) : ?>
        <!-- Individual Badge Card -->
        <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow">
            <!-- Badge Name -->
            <h2 class="text-xl font-bold mb-2 text-black-600" id="main-heading"><?= htmlspecialchars($bName ?? '') ?></h2>
            
            <!-- Badge Image -->
            <img class="mx-auto mb-4 rounded" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            
            <!-- Badge Description -->
            <p id="paragraph-text" class="mb-2 text-gray-700"><?= htmlspecialchars($bDesc ?? '') ?></p>
            
            <!-- Uploader Information -->
            <p id="paragraph-text" class="mb-2 text-sm text-gray-500">Uploaded by Anonymous User ID: <?= htmlspecialchars($bID ?? '') ?></p>
            
            <!-- Action Buttons -->
            <div class="flex justify-center items-center">
                <!-- More Info Link -->
                <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
                
                <!-- Print Button -->
                <button onclick="window.print()" class="ml-4 text-gray-600 hover:text-indigo-600">
                    <i class="fa-solid fa-print"></i>
                </button>
            </div>
            <!-- End of action buttons -->
        </div>
        <!-- End of badge card -->
    <?php endwhile ?>
</section>
<!-- End of badge grid section -->

<!-- Contact Section -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
    <!-- Emergency Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMERGENCY</h3>
        <p class="text-gray-700">0141 272 9000</p>
    </div>
    <!-- End of emergency card -->
    
    <!-- Location Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">LOCATION</h3>
        <p class="text-gray-700">50 Prospecthill Road</p>
        <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
    </div>
    <!-- End of location card -->
    
    <!-- Email Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMAIL</h3>
        <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
    </div>
    <!-- End of email card -->
    
    <!-- Hours Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">WORKING HOURS</h3>
        <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
        <p class="text-gray-700">Sunday: Emergency only</p>
    </div>
    <!-- End of hours card -->
</section>
<!-- End of contact section -->

<!-- The footer section of the page -->
<?php include 'includes/footer.php'; ?>
<!-- End of footer section -->