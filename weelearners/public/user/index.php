<?php 
// Include the header file containing HTML head and navigation
include 'includes/header.php';
// Include the configuration file for database and settings
include 'config/config.php';
// End of PHP includes

// Session check to verify user is logged in
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}
// End of session check

// File upload handling variables
$message = "";
$targetDir = "assets/uploads/";
$fileName = isset($_FILES['profile_picture']['name']) ? basename($_FILES['profile_picture']['name']) : '';
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
// End of file upload variables

// File upload processing
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES['profile_picture']['name'])) {
    $allowTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileType, $allowTypes)) {   
        // Create upload directory if it doesn't exist
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0755, true);
        }
        // Move uploaded file and update database
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $targetFilePath)) {           
            $accounts = $conn->prepare("UPDATE user SET profile_picture = ? WHERE id = ?");
            $accounts->bind_param('si', $fileName, $_SESSION['id']);

            if ($accounts->execute()) {
                $message = "Profile picture updated successfully.";
                $userPicture = $fileName;
                // Refresh the page to show the new image
                header("Refresh:0");
            } else {
                $message = "Failed to update the profile picture in the database.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    } else {
        $message = "Sorry, only JPG, JPEG, PNG, & GIF files are allowed.";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = "Please select a valid file to upload.";
}
// End of file upload processing

// Database query to fetch account details
$userId = $_SESSION['id']; 
$sql = "SELECT 
    id, 
    username, 
    email,
    role,
    profile_picture 
    FROM user 
    WHERE id = ?";
$account = $conn->prepare($sql);
$account->bind_param("i", $userId);
$account->execute();
$account->bind_result($id, $username, $email, $role, $userPicture);
$account->fetch();
$account->close();
// End of account details query

// Database query to fetch user details
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
// End of user details query
?>

<!-- Banner section -->
<section class="section-banner flex flex-col items-center">
    <h1 class="text-3xl font-semibold text-center mt-6 mb-4 text-pink-500" id="h1-heading-center">User Dashboard Page</h1>
    <p id="paragraph-text" class="paragraph-text mx-2">
        Hi <?= htmlspecialchars($_SESSION['name'] ?? ' ') ?>, Welcome to User dashboard Page in Wee Learners website. Here, you can find your account details. Thank you for being a part of Wee Learners!
    </p>
</section>
<!-- End of banner section -->

<!-- section content section -->
<section class="min-h-screen bg-white-50 flex items-center justify-center px-4 py-12">
    <div class="w-full max-w-xl space-y-8">
        <!-- Account Info Section -->
        <section class="bg-white w-full p-6 rounded-lg shadow-md">
            <div class="space-y-4 text-center">
                <?php if (isset($userPicture) && !empty($userPicture)): ?>
                    <!-- Display user profile picture if available -->
                    <img src="<?= htmlspecialchars($targetDir . $userPicture ?? '') ?>" alt="Profile Picture" class="w-32 h-32 rounded-full mx-auto object-cover">
                <?php endif; ?>
                <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Personal Account Details:</h1>
                <!-- Display user details -->
                <p id="paragraph-text" class="text-gray-700">Username: <span class="font-semibold"><?= htmlspecialchars($username ?? '') ?></span></p>
                <p id="paragraph-text" class="text-gray-700">Email: <span class="font-semibold"><?= htmlspecialchars($email ?? '') ?></span></p>
                <p id="paragraph-text" class="text-gray-700">Job Role: <span class="font-semibold"><?= htmlspecialchars($role ?? '') ?></span></p>
            </div>
        </section>
        <!-- End of account info section -->

        <!-- Display upload status message if exists -->
        <?php if (isset($message) && !empty($message)): ?>
            <p id="paragraph-text" class="text-center text-sm text-indigo-600"><?= htmlspecialchars($message ?? '') ?></p>
        <?php endif; ?>
        <!-- End of message display -->

        <!-- Upload Form Section -->
        <section class="bg-white w-full p-8 rounded-xl shadow-lg border border-gray-100">
            <!-- Profile picture upload form -->
            <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                <div class="space-y-2">
                    <h3 class="text-lg font-medium text-gray-900">Profile Picture Upload</h3>
                    <p id="paragraph-text" class="text-sm text-gray-500">JPG, JPEG, or PNG (Max. 5MB)</p>
                </div>

                <!-- Drag and Drop Zone -->
                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-xl hover:border-indigo-400 transition-colors duration-200">
                    <div class="space-y-3 text-center">
                        <!-- Upload icon -->
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                            <!-- File input label -->
                            <label for="profile_picture" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                <span>Upload a file</span>
                                <!-- Hidden file input -->
                                <input id="profile_picture" name="profile_picture" type="file" class="sr-only" accept="image/jpeg, image/png" required>
                            </label>
                            <p id="paragraph-text" class="pl-1">or drag and drop</p>
                        </div>
                        <p id="paragraph-text" class="text-xs text-gray-500" id="file-selected-text">No file selected</p>
                    </div>
                </div>
                <!-- End of drag and drop zone -->

                <!-- Submit button -->
                <div class="flex justify-end">
                    <button type="submit" name="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-200">
                        <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M3 17a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zm3.293-7.707a1 1 0 011.414 0L9 10.586V3a1 1 0 112 0v7.586l1.293-1.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                        Upload Picture
                    </button>
                </div>
                <!-- End of submit button -->
            </form>
        </section>
        <!-- End of upload form section -->
    </div>
  </section>
<!-- End of section content section -->

<!-- Spacer div -->
<div class="h-16"></div>
<!-- End of spacer -->

<!-- Contact Information Section -->
<h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
<section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
    <!-- Emergency Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMERGENCY</h3>
        <p class="text-gray-700">0141 272 9000</p>
    </div>
    
    <!-- Location Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">LOCATION</h3>
        <p class="text-gray-700">50 Prospecthill Road</p>
        <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
    </div>
    
    <!-- Email Contact Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">EMAIL</h3>
        <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
    </div>
    
    <!-- Working Hours Card -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
        <h3 class="font-semibold text-lg">WORKING HOURS</h3>
        <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
        <p class="text-gray-700">Sunday: Emergency only</p>
    </div>
</section>

<!-- Include Footer File -->
<?php include 'includes/footer.php'; ?>