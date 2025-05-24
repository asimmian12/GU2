<?php 
include 'includes/header.php';
include 'config/config.php';

if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Bringing in Account Details
$userId = $_SESSION['id']; 
$sql = "SELECT 
id, 
username, 
email,
role 
FROM user 
WHERE id = ?";
$account = $conn->prepare($sql);
$account->bind_param("i", $userId);
$account->execute();
$account->bind_result($id, $username, $email, $role);
$account->fetch();
$account->close();

// Bringing in User Details
$sql = "SELECT 
username, 
email, 
is_active, 
is_admin,
role 
FROM user 
WHERE id = ?";
$user = $conn->prepare($sql);
$user->bind_param("i", $userId);
$user->execute();
$user->bind_result($name, $email, $stat, $userType, $role);
$user->store_result();
?>

<div class="min-h-screen bg-white-100 flex flex-col">
  <section class="section-banner">
    <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">User Dashboard Page</h1>
    <p class="paragraph-text" id="paragraph-text">
      Hi <?= htmlspecialchars($_SESSION['name'] ?? ' ') ?>, Welcome to your dashboard in Wee Learners website. 
      Here you can find all the information related to your account. You can view your personal account information.
    </p>
  </section>

  <section class="my-8 flex justify-center">
    <?php if (isset($profilePicture)): ?>
      <div>
        <img src="<?= htmlspecialchars(($profilePicture ?? '')) ?>" alt="Profile Picture" class="rounded-full w-32 h-32 object-cover border-4 border-blue-500"> 
      </div>
    <?php else: ?>
      <p id="paragraph-text" class="text-gray-700 text-center">You can upload your profile picture in your Account Details Page.</p>
    <?php endif; ?>
  </section>

  <div class="h-16"></div>

  <div class="flex-grow flex items-center justify-center py-8 px-4 sm:px-6 lg:px-8">
    <div class="relative py-3 w-full max-w-4xl mx-auto"> 
      <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl" id="section-account-info"></div>
      <div class="relative px-10 py-16 bg-white shadow-lg sm:rounded-3xl sm:p-16" id="section-account-info">
        <div class="mx-auto">
          <h2 id="main-heading" class="text-3xl font-semibold mb-10 text-pink-500 text-center">Personal Account Details</h2> 
          
          <div class="space-y-8"> 
            <?php while ($user->fetch()): ?>
              <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm"> 
                  <p id="paragraph-text" class="text-xl text-gray-800"><strong class="font-semibold text-gray-900">Username:</strong> <?= htmlspecialchars($name ?? '') ?></p> <!-- Larger text -->
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                  <p id="paragraph-text" class="text-xl text-gray-800"><strong class="font-semibold text-gray-900">Email:</strong> <?= htmlspecialchars($email ?? '') ?></p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                  <p id="paragraph-text" class="text-xl text-gray-800"><strong class="font-semibold text-gray-900">Status:</strong> <?= htmlspecialchars($stat == 1 ? 'Active' : 'Inactive') ?></p>
                </div>
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                  <p id="paragraph-text" class="text-xl text-gray-800"><strong class="font-semibold text-gray-900">Job Role:</strong> <?= htmlspecialchars($role ?? '') ?></p>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="h-16"></div>
  
    
  <!-- Contact Section -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
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
</div>
</div>

<?php include 'includes/footer.php'; ?>