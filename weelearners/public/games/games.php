<?php 
// <!-- Include the configuration file for database and settings -->
include '../../config/config.php';  
// <!-- Include the header file containing HTML head and navigation -->
include '../../includes/header.php'; 
// <!-- End of PHP includes -->


// Define the path to the JSON file containing game data
$json_file = $_SERVER['DOCUMENT_ROOT'] . '/GU2/weelearners/assets/json/games.json';

// Function to fetch game data from the FreeToGame API
function fetchFromApi($json_file) {
    // <!-- Use file_get_contents to send a GET request to the API and fetch the response -->
    $response = file_get_contents($json_file);
    // <!-- Decode the JSON response into an array and return it -->
    return json_decode($response, true);
}

// Fetch game data from the API and store it in the $games variable
$games = fetchFromApi($json_file);
// Shuffle the games array randomly
shuffle($games);
// Slice the first 3 games from the shuffled array
$games = array_slice($games, 0, 3);
// <!-- End of game data processing -->
?>

<!-- Banner Section -->
<section class="section-banner flex flex-col items-center">
    <h1 class="text-3xl font-semibold text-center mt-6 mb-4 text-pink-500" id="h1-heading-center">Games Page</h1>
    <p id="paragraph-text" class="paragraph-text mx-2">
        Welcome to the Games page of Wee Learners. Here, we aim to provide a fun and engaging experience for learners of all ages. Our carefully curated selection of games is designed to entertain, educate, and inspire creativity. Whether you're looking for a quick challenge, an interactive learning opportunity, or just some lighthearted fun, you'll find something here to enjoy. Each game has been chosen with care to ensure it aligns with our mission of fostering a positive and enriching environment for our community!
    </p>
</section>
<!-- End of banner section -->

<!-- Games Display Section -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Games</h1>
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4 mb-16" id="section-game">
    <?php for ($i = 0; $i < count($games); $i++): ?>
        <?php $game = $games[$i]; ?>
        <!-- Individual Game Card -->
        <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col items-center text-center">
            <!-- Game Title -->
            <h2 id="main-heading" class="text-xl font-bold text-gray-800 mb-2"><?= htmlspecialchars($game['name'] ?? 'No Game Name available') ?></h2>
            <!-- Game Image -->
            <img src="<?= htmlspecialchars($game['game_img'] ?? 'No Image Available') ?>" alt="Game Image" class="w-full h-48 object-cover rounded-md mb-4">
            <!-- Game Description -->
            <p id="paragraph-text" class="text-gray-600 mb-4"><?= htmlspecialchars($game['details'] ?? 'No description available.') ?></p>
            <!-- Play Game Button -->
            <a href="<?= htmlspecialchars($game['game_url'] ?? 'No Game URL available') ?>" class="text-white bg-pink-500 hover:bg-pink-600 font-medium py-2 px-4 rounded-md transition">
                Play Game
            </a>
        </div>
        <!-- End of game card -->
    <?php endfor; ?>
</section>
<!-- End of games section -->

<!-- Contact Information Section -->
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

<!-- JavaScript and Footer Section -->
<!-- Include JavaScript file -->
<script src="assets/js/script.js"></script>
<!-- The footer section of the page -->
<?php include '../../includes/footer.php'; ?>
<!-- End of footer section -->