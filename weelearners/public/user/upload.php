<?php 
include 'includes/header.php';
include 'config/config.php';

// To check if user logged on, if not redirects me to login page
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

// Bringing in Uploads Details (Badges)
$uploads = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE fk_user_id = ? ORDER BY RAND() LIMIT 3");
$uploads->bind_param("i", $_SESSION['id']);
$uploads->execute();
$uploads->store_result();
$uploads->bind_result($badgeID, $badgeName, $badgeDescription, $badgeImage);
?>
<div class="min-h-screen bg-white flex flex-col">
  <!-- Banner Section -->
  <section class="section-banner">
    <h1 class="text-3xl font-semibold mt-12 mb-6 text-pink-500 text-center">Upload Badge Page</h1>
    <p class="paragraph-text text-center">
      Hi <?= htmlspecialchars($_SESSION['name'] ?? ' ') ?>, Welcome to your upload badge page in Wee Learners website. 
      Here you can find all the badges related to your account. You can also upload your badge with permission from admin 
      once they get permission from the teachers, if you passed or failed.
    </p>
  </section>

  <div class="h-8"></div>

  <!-- Upload Form Section -->
  <h1 class="text-xl font-semibold text-center mb-6 text-pink-500">Please fill in the details to upload your badge here, and the admin will approve it with the teachers permission, if you have passed or failed.</h1>
  
  <div class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="relative py-3 w-full max-w-3xl mx-auto">
      <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
      <div class="relative px-8 py-12 bg-white shadow-lg sm:rounded-3xl sm:p-12">
        <div class="mx-auto">
          <h1 class="text-2xl font-semibold mb-8 text-pink-500 text-center">Upload Your Badge</h1>
          
          <form action="<?= ROOT_DIR ?>uploadConfig" method="post" enctype="multipart/form-data" class="space-y-6">
            <!-- Badge Name Field -->
            <div class="relative">
              <input 
                id="badgeName" 
                name="badgeName" 
                type="text" 
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Badge Name"
                required
              >
              <label for="badgeName" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Badge Name
              </label>
            </div>

            <!-- Badge Description Field -->
            <div class="relative pt-4">
              <textarea 
                id="badgeDescription" 
                name="badgeDescription" 
                rows="5" 
                class="peer placeholder-transparent pt-2 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Badge Description"
                required
              ></textarea>
              <label for="badgeDescription" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Badge Description
              </label>
            </div>

            <!-- Badge Upload Section -->
            <div class="space-y-2">
              <h3 class="text-lg font-medium text-gray-900">Badge Image Upload</h3>
              <p class="text-sm text-gray-500">JPG, JPEG, or PNG (Max. 5MB)</p>
            </div>

            <!-- Drag and Drop Zone -->
            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition-colors duration-200">
              <div class="space-y-3 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                  <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <div class="flex text-sm text-gray-600">
                  <label for="imgUpload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                    <span>Upload badge image</span>
                    <input id="imgUpload" name="file" type="file" class="sr-only" accept="image/jpeg, image/png" required>
                  </label>
                  <p class="pl-1">or drag and drop</p>
                </div>
                <p class="text-xs text-gray-500" id="badge-file-selected-text">No file selected</p>
              </div>
            </div>

            <!-- Preview (will be shown after selection) -->
            <div id="badge-preview-container" class="hidden mt-4">
              <h4 class="text-sm font-medium text-gray-700 mb-2">Selected Badge Image:</h4>
              <div class="flex items-center space-x-4">
                <img id="badge-preview" src="#" alt="Badge Preview" class="h-20 w-20 rounded-md object-cover border border-gray-200">
                <div>
                  <p id="badge-file-name" class="text-sm font-medium text-gray-900"></p>
                  <p id="badge-file-size" class="text-xs text-gray-500"></p>
                </div>
              </div>
            </div>

            <div class="flex justify-end">
              <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
                Upload Badge
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="h-16"></div>

  <!-- Previously Earned Badges Section -->
  <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500">Previously Earned Badges</h1>
  <section class="grid grid-cols-1 md:grid-cols-3 gap-6 px-6 mb-12">
      <?php while ($uploads->fetch()): ?>
          <div class="bg-white p-6 rounded-lg shadow-md text-center hover:shadow-lg transition-shadow">
              <p class="text-sm text-gray-500 mb-2">Badge ID: <?= htmlspecialchars($badgeID ?? '') ?></p>
              <h2 class="text-xl font-bold mb-2 text-gray-800"><?= htmlspecialchars($badgeName ?? '') ?></h2>
              <img class="mx-auto mb-4 rounded" style="max-width: 200px; height: auto;" src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($badgeImage ?? 'default.jpg')) ?>" alt="Badge Cover">
              <p class="mb-3 text-gray-700"><?= htmlspecialchars($badgeDescription ?? '') ?></p>
              <a class="text-blue-600 hover:underline" href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $badgeID ?? '') ?>">More Information</a>
          </div>
      <?php endwhile; ?>
  </section>

  <div class="h-16"></div>
  
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
</div>


<?php include 'includes/footer.php'; ?>