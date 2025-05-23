<?php
include 'config/config.php';
include 'includes/header.php';

// To check if user is admin, if not redirects me to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

// Deactivting user
if (isset($_POST['toggle_active'])) {
    $user_id = intval($_POST['user_id']);
    $new_status = ($_POST['new_status'] == 1) ? 0 : 1;
    $user = $conn->prepare("UPDATE user SET is_active = ? WHERE id = ?");
    $user->bind_param("ii", $new_status, $user_id);
    $user->execute();
    $user->close();
}

// Delete user and their related badges that they uploaded
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

// Bringing in User Details
$users = $conn->prepare("SELECT id, username, email, role, is_active, name, release_date, available_day FROM user");
$users->execute();
$users->store_result();
$users->bind_result($userID, $username, $email, $role, $isActive, $name, $release_date, $day);
?>
<section class="section-banner">
    <h1 class="text-3xl font-semibold text-pink-500 mb-4">Admin Dashboard Page</h1>
    <p class="paragraph-text">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to your Admin Dashboard! Here you can manage all users and their badges. You can delete any user with their permisisson or by deactiving their account. You have the ability to update user information, activate or deactivate accounts, and ensure that only authorised users have access to the system. Please review user details carefully before making any changes, as your actions will directly affect user access on the website.</p>
</section>

    <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-4 mb-16">
    <?php while ($users->fetch()): ?>
        <div class="bg-white p-6 rounded-xl shadow-lg flex flex-col space-y-2">
            <p class="text-lg font-bold text-gray-800">Helper ID: <?= htmlspecialchars($userID ?? '') ?></p>
            <p class="text-gray-700">Fullname: <span class="font-semibold"><?= htmlspecialchars($name ?? '') ?></span></p>
            <p class="text-gray-700">Username: <span class="font-semibold"><?= htmlspecialchars($username ?? '') ?></span></p>
            <p class="text-gray-700">Email: <span class="font-semibold"><?= htmlspecialchars($email ?? '') ?></span></p>
            <p class="text-gray-700">Job Role: <span class="font-semibold"><?= htmlspecialchars($role ?? '') ?></span></p>
            <p class="text-gray-700">Date of Upload: <span class="font-semibold"><?= htmlspecialchars($release_date ?? '') ?></span></p>
            <p class="text-gray-700">Available Day: <span class="font-semibold"><?= htmlspecialchars($day ?? '') ?></span></p>
            <p class="text-gray-700">Status: 
                <span class="inline-block px-2 py-1 text-sm rounded 
                    <?= $isActive ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' ?>">
                    <?= htmlspecialchars($isActive ? 'Active' : 'Inactive') ?>
                </span>
            </p>

            <form method="POST" class="mt-4">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($userID ?? '') ?>">
                <input type="hidden" name="new_status" value="<?= htmlspecialchars($isActive ?? '') ?>">
                <button type="submit" name="toggle_active"
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white font-medium py-2 px-4 rounded-md transition">
                    <?= htmlspecialchars($isActive ? 'Deactivate' : 'Activate') ?>
                </button>
            </form>

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



