<?php
/* To Include Config File */
include 'config/config.php';
/* To Include Header File */
include 'includes/header.php';

/* To check if user is admin, redirect to login if not */
if (!isset($_SESSION['loggedin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

/* By handling user activation/deactivation */
if (isset($_POST['toggle_active'])) {
    $user_id = intval($_POST['user_id']);
    $new_status = ($_POST['new_status'] == 1) ? 0 : 1;
    $user = $conn->prepare("UPDATE user SET is_active = ? WHERE id = ?");
    $user->bind_param("ii", $new_status, $user_id);
    $user->execute();
    $user->close();
}

/* By handling user deletion and related badges */
if (isset($_POST['deleteUser'])) {
    $user_id = intval($_POST['user_id']);
    $deleteBadge = $conn->prepare("DELETE FROM badge WHERE fk_user_id = ?");
    $deleteUser = $conn->prepare("DELETE FROM user WHERE id = ?");
    $deleteBadge->bind_param("i", $user_id);
    $deleteUser->bind_param("i", $user_id);
    $deleteBadge->execute();
    $deleteBadge->close();
    $deleteUser->execute();
    $deleteUser->close();
}

/* By fetching all user details from database */
$users = $conn->prepare("SELECT id, username, email, role, is_active, name, release_date, available_day FROM user");
$users->execute();
$users->store_result();
$users->bind_result($userID, $username, $email, $role, $isActive, $name, $release_date, $day);
?>

<!-- /* The Admin Dashboard Banner Section */ -->
<section class="section-banner flex flex-col items-center">
  <!-- /* The Page Heading */ -->
  <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Admin Dashboard Page</h1>
  
  <!-- /* The Welcome Message for the user*/ -->
  <p class="paragraph-text" id="paragraph-text">
    Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to your Admin Dashboard! Here you can manage all users and their badges. 
    You can delete any user with their permisisson or by deactiving their account. You have the ability to update user information, 
    activate or deactivate accounts, and ensure that only authorised users have access to the system. Please review user details 
    carefully before making any changes, as your actions will directly affect user access on the website.
  </p>
</section>

<!-- /* The Heading for All Users */ -->
  <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">All Users</h1>
<!-- /* The users grid section */ -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4 mb-16">
    <!-- Fecthing for users -->
    <?php while ($users->fetch()): ?>
        <!-- /* The individual User Card */ -->
        <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col space-y-2" id="div-users-info">
            <!-- /* The user ID */ -->
            <p id="paragraph-text" class="text-lg font-bold text-gray-800">Helper ID: <?= htmlspecialchars($userID ?? '') ?></p>
            
            <!-- /* The user Full Name */ -->
            <p id="paragraph-text" class="text-gray-700">Fullname: <span class="font-semibold"><?= htmlspecialchars($name ?? '') ?></span></p>
            
            <!-- /* The username */ -->
            <p id="paragraph-text" class="text-gray-700">Username: <span class="font-semibold"><?= htmlspecialchars($username ?? '') ?></span></p>
            
            <!-- /* The email address*/ -->
            <p id="paragraph-text" class="text-gray-700">Email: <span class="font-semibold"><?= htmlspecialchars($email ?? '') ?></span></p>
            
            <!-- /* The job Role */ -->
            <p id="paragraph-text" class="text-gray-700">Job Role: <span class="font-semibold"><?= htmlspecialchars($role ?? '') ?></span></p>
            
            <!-- /* The Date of Upload */ -->
            <p id="paragraph-text" class="text-gray-700">Date of Upload: <span class="font-semibold"><?= htmlspecialchars($release_date ?? '') ?></span></p>
            
            <!-- /* The Available Day */ -->
            <p id="paragraph-text" class="text-gray-700">Available Day: <span class="font-semibold"><?= htmlspecialchars($day ?? '') ?></span></p>
            
            <!-- /* The Account Status */ -->
            <p id="paragraph-text" class="text-gray-700">Status: 
                <span class="inline-block px-2 py-1 text-sm rounded 
                    <?= $isActive ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                    <?= htmlspecialchars($isActive ? 'Active' : 'Inactive') ?>
                </span>
            </p>

            <!-- /* The Active/Deactivate Form */ -->
            <form method="POST" class="mt-4">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($userID ?? '') ?>">
                <input type="hidden" name="new_status" value="<?= htmlspecialchars($isActive ?? '') ?>">
                <button type="submit" name="toggle_active"
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md transition">
                    <?= htmlspecialchars($isActive ? 'Deactivate' : 'Activate') ?>
                </button>
            </form>

            <!-- /* By deleting th user Form */ -->
            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" class="mt-2">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($userID ?? '') ?>">
                <button type="submit" name="deleteUser"
                        class="w-full bg-red-500 hover:bg-red-600 text-white font-medium py-2 px-4 rounded-md transition">
                    Delete
                </button>
            </form>
        </div>
    <?php endwhile; ?>
</section>

<!-- /* The contact Information Section */ -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
  
  <!-- /* The emergency Contact Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">EMERGENCY</h3>
    <p class="text-gray-700">0141 272 9000</p>
  </div>
  
  <!-- /* The location Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">LOCATION</h3>
    <p class="text-gray-700">50 Prospecthill Road</p>
    <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
  </div>
  
  <!-- /* The email Contact Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">EMAIL</h3>
    <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
  </div>
  
  <!-- /* The working Hours Card */ -->
  <div class="bg-white p-6 rounded-lg shadow-md">
    <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
    <h3 class="font-semibold text-lg">WORKING HOURS</h3>
    <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
    <p class="text-gray-700">Sunday: Emergency only</p>
  </div>
</section>

<!-- /* Include Footer File */ -->
<?php include 'includes/footer.php'; ?>