<?php 
include 'config/config.php';  
include 'includes/header.php'; 

// Bringing in Users Details 
$user = $conn->prepare("SELECT id, username, email, role, is_active FROM user");
$user->execute();
$user->store_result();
$user->bind_result($userID, $username, $email, $role, $isAdmin);
?>
<section class="section-banner">
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">Current Users Page</h1>
    <p class="paragraph-text">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to the Current Users Page of Wee Learners. Here, we provide an overview of all registered users within our platform. This page is designed to help administrators and team members manage user roles, monitor activity, and ensure a seamless experience for everyone. Whether you're looking to update user information, review account statuses, or simply get an overview of our community, this page has all the tools you need. Each user listed here plays a vital role in our growing community, and we are committed to maintaining a positive and inclusive environment for all. Thank you for being a part of Wee Learners, and for contributing to our mission of fostering learning and collaboration. If you have any questions or need assistance, please don't hesitate to reach out to our support team. Let's work together to make this platform a welcoming and productive space for everyone!</p>
</section>

<h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">All User's Information</h1>
<section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-4">
    <?php while ($user->fetch()): ?>
        <div class="bg-white p-4 rounded-lg shadow-md text-center">
            <h2 class="text-xl font-bold mb-2">Username</h2>
            <p class="mb-2 text-gray-600"><?= htmlspecialchars($username ?? '') ?></p>
            
            <h2 class="text-xl font-bold mb-2">Email</h2>
            <p class="mb-2 text-gray-600"><?= htmlspecialchars($email ?? '') ?></p>
            
            <h2 class="text-xl font-bold mb-2">Job Role</h2>
            <p class="text-gray-600"><?= htmlspecialchars($role ?? '') ?></p>
        </div>
    <?php endwhile; ?>
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
