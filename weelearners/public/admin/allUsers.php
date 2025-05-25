<?php 
// <!-- Include the configuration file for database and settings -->
include 'config/config.php';  
// <!-- Include the header file containing HTML head and navigation -->
include 'includes/header.php'; 
// <!-- End of PHP includes -->

/* Database Query for User Details */
// Bringing in all user details from database
$user = $conn->prepare("SELECT id, username, email, role, is_active FROM user");
$user->execute();
$user->store_result();
$user->bind_result($userID, $username, $email, $role, $isAdmin);
// <!-- End of user details query -->
?>

<!-- The Main Banner Section -->
<section class="section-banner flex flex-col items-center">
    <h1 class="text-3xl font-semibold text-center mt-6 mb-4 text-pink-500" id="h1-heading-center">Current Users Page</h1>
    <p id="paragraph-text" class="paragraph-text mx-2">
      Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to the Current Users Page of Wee Learners. Here, we provide an overview of all registered users within our platform.
    </p>
</section>
<!-- End of banner section -->

<!-- Users Information Section -->
<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All User's Information</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4" id="section-user-info">
    <?php while ($user->fetch()): ?>
        <!-- Individual User Card -->
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <!-- Username Section -->
            <h2 id="main-heading" class="text-xl font-bold mb-2">Username</h2>
            <p id="paragraph-text" class="mb-2 text-gray-600"><?= htmlspecialchars($username ?? '') ?></p>
            
            <!-- Email Section -->
            <h2 id="main-heading" class="text-xl font-bold mb-2">Email</h2>
            <p id="paragraph-text" class="mb-2 text-gray-600"><?= htmlspecialchars($email ?? '') ?></p>
            
            <!-- Job Role Section -->
            <h2 id="main-heading" class="text-xl font-bold mb-2">Job Role</h2>
            <p id="paragraph-text" class="text-gray-600"><?= htmlspecialchars($role ?? '') ?></p>
        </div>
        <!-- End of user card -->
    <?php endwhile; ?>
</section>
<!-- End of users information section -->

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

<!-- The footer section of the page -->
<?php include 'includes/footer.php'; ?>
<!-- End of footer section -->