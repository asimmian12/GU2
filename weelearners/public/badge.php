<?php 
/* Include Config File */
include 'config/config.php';

/* Include Header File */
include 'includes/header.php';

/* The database Query for All Badges */
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

<!-- The main Banner Section -->
<section class="section-banner flex flex-col items-center">
    <!-- The page Heading -->
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Badges Page</h1>
    
    <!-- THe welcome Message -->
    <p class="paragraph-text" id="paragraph-text">
        Welcome to the Badges Page! Here you can see all badge submissions from parents, and teachers which students have earned.
    </p>
</section>

<!-- The All Badges Section heading -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Badges</h1>
<!-- The All Badges Section -->
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="div-badge">
    <!-- Fetching all Badges from the database -->
    <?php while ($badge->fetch()) : ?>

        <!-- The individual Badge Card -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center" id="div-pending-item">
            <!-- the badge Name -->
            <h2 id="main-heading" class="text-xl font-bold mb-2"><?= htmlspecialchars($bName ?? ' ') ?></h2>
            
            <!-- The badge Image -->
            <img class="mx-auto mb-2" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            
            <!-- The badge Description -->
            <p id="paragraph-text" class="mb-3"><?= htmlspecialchars($bDesc ?? ' ') ?></p>
   
            <!-- The more info button -->
            <div class="flex flex-col justify-center items-center gap-2">
                <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>" class="text-white bg-blue-500 hover:bg-blue-600 font-medium py-1 px-3 rounded-md text-sm transition">
                    More Info
                </a>
                
                <!-- The Print Button -->
                <button onclick="window.print()" class="ml-4 text-gray-600 hover:text-indigo-600">
                    <i class="fa-solid fa-print"></i>
                </button>
            </div>
        </div>
    <?php endwhile; ?>
</section>

<!-- The contact Information Section heading-->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
 <!-- The contact Information Section -->
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
    <!-- The emergency Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMERGENCY</h3>
        <p class="text-gray-700">0141 272 9000</p>
    </div>
    
    <!-- The location Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">LOCATION</h3>
        <p class="text-gray-700">50 Prospecthill Road</p>
        <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
    </div>
    
    <!-- The email Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMAIL</h3>
        <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
    </div>
    
    <!-- The working Hours Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">WORKING HOURS</h3>
        <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
        <p class="text-gray-700">Sunday: Emergency only</p>
    </div>
</section>

<!-- Include Footer File -->
<?php include 'includes/footer.php'; ?>