<?php 
include 'config/config.php';
include 'includes/header.php';
?>

<div class="min-h-screen bg-white-100 flex flex-col">
  <section class="section-banner">
    <h1 class="text-3xl font-semibold mt-12 mb-6 text-pink-500">Register Page</h1>
    <p class="paragraph-text">
      Welcome to the registration page of Wee Learners. Here, you have the opportunity to create a new account and become a part of our vibrant community. 
      By registering, you gain access to a wide range of features, resources, and tools designed to enhance your learning experience. 
      Whether you are here to explore educational content, connect with like-minded individuals, or track your progress, this is the first step to unlocking your potential.
    </p>
  </section>

  <div class="h-16"></div>

  <!-- Register Form Section -->
  <div class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="relative py-3 w-full max-w-3xl mx-auto">
      <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
      <div class="relative px-8 py-12 bg-white shadow-lg sm:rounded-3xl sm:p-12">
        <div class="mx-auto">
          <h1 class="text-2xl font-semibold mb-8 text-pink-500 text-center">Create Your Account</h1>
          
          <form action="<?= ROOT_DIR ?>registerConfig" method="post" class="space-y-6">
            <input type="hidden" name="is_active" value="1">           
            <input type="hidden" name="is_admin" value="1">
            
            <?php if (isset($_SESSION['status_message'])): ?>
              <div class="status-message bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                <?= $_SESSION['status_message'] ?>
                <?php unset($_SESSION['status_message']); ?>
              </div>
            <?php endif; ?>

            <div class="relative">
              <input 
                id="username" 
                name="username" 
                type="text" 
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Username"
                required
              >
              <label for="username" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Username
              </label>
            </div>

            <div class="relative">
              <input 
                id="email" 
                name="email" 
                type="email" 
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Email Address"
                required
              >
              <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Email Address
              </label>
            </div>

            <div class="relative">
              <input 
                id="pswd" 
                name="password" 
                type="password" 
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Password"
                required
              >
              <label for="pswd" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Password
              </label>
            </div>

            <div class="flex items-center justify-between">
              <div class="text-sm">
                <a href="login" class="font-medium text-indigo-600 hover:text-indigo-500">
                  Already have an account? <span class="font-bold">Sign In</span>
                </a>
              </div>
            </div>

            <div>
              <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-md font-medium text-white bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Register
              </button>
            </div>
          </form>

          <div class="mt-8">
            <div class="relative">
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300"></div>
              </div>
              <div class="relative flex justify-center text-sm">
                <span class="px-4 bg-white text-gray-500 font-medium">
                  Or register with social accounts
                </span>
              </div>
            </div>

            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
              <!-- Google -->
              <div>
                <a href="https://www.google.com/" target="_blank" class="w-full flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 hover:shadow-md">
                  <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="-0.5 0 48 48">
                    <path d="M9.82727273,24 C9.82727273,22.4757333 10.0804318,21.0144 10.5322727,19.6437333 L2.62345455,13.6042667 C1.08206818,16.7338667 0.213636364,20.2602667 0.213636364,24 C0.213636364,27.7365333 1.081,31.2608 2.62025,34.3882667 L10.5247955,28.3370667 C10.0772273,26.9728 9.82727273,25.5168 9.82727273,24" fill="#FBBC05"></path>
                    <path d="M23.7136364,10.1333333 C27.025,10.1333333 30.0159091,11.3066667 32.3659091,13.2266667 L39.2022727,6.4 C35.0363636,2.77333333 29.6954545,0.533333333 23.7136364,0.533333333 C14.4268636,0.533333333 6.44540909,5.84426667 2.62345455,13.6042667 L10.5322727,19.6437333 C12.3545909,14.112 17.5491591,10.1333333 23.7136364,10.1333333" fill="#EB4335"></path>
                    <path d="M23.7136364,37.8666667 C17.5491591,37.8666667 12.3545909,33.888 10.5322727,28.3562667 L2.62345455,34.3946667 C6.44540909,42.1557333 14.4268636,47.4666667 23.7136364,47.4666667 C29.4455,47.4666667 34.9177955,45.4314667 39.0249545,41.6181333 L31.5177727,35.8144 C29.3995682,37.1488 26.7323182,37.8666667 23.7136364,37.8666667" fill="#34A853"></path>
                    <path d="M46.1454545,24 C46.1454545,22.6133333 45.9318182,21.12 45.6113636,19.7333333 L23.7136364,19.7333333 L23.7136364,28.8 L36.3181818,28.8 C35.6879545,31.8912 33.9724545,34.2677333 31.5177727,35.8144 L39.0249545,41.6181333 C43.3393409,37.6138667 46.1454545,31.6490667 46.1454545,24" fill="#4285F4"></path>
                  </svg>
                  Continue with Google
                </a>
              </div>

              <!-- Facebook -->
              <div>
                <a href="https://www.facebook.com/" target="_blank" class="w-full flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 hover:shadow-md">
                  <svg class="w-5 h-5 mr-2 text-blue-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                  </svg>
                  Continue with Facebook
                </a>
              </div>

              <!-- Microsoft -->
              <div>
                <a href="https://www.outlook.com/" target="_blank" class="w-full flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 hover:shadow-md">
                  <svg class="w-5 h-5 mr-2 text-blue-500" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1H10.5V10.5H1V1Z" fill="#F25022"></path>
                    <path d="M12.5 1H22V10.5H12.5V1Z" fill="#7FBA00"></path>
                    <path d="M1 12.5H10.5V22H1V12.5Z" fill="#00A4EF"></path>
                    <path d="M12.5 12.5H22V22H12.5V12.5Z" fill="#FFB900"></path>
                  </svg>
                  Continue with Microsoft
                </a>
              </div>

              <!-- Apple -->
              <div>
                <a href="https://www.apple.com/" class="w-full flex justify-center items-center px-4 py-3 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 hover:shadow-md">
                  <svg class="w-5 h-5 mr-2 text-gray-900" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"></path>
                  </svg>
                  Continue with Apple
                </a>
              </div>
            </div>

            <div class="mt-6 text-sm text-gray-500 text-center">
              <p>By registering, you agree to our <a href="/terms" class="font-medium text-pink-600 hover:text-pink-500">Terms of Service</a> and <a href="/privacy" class="font-medium text-pink-600 hover:text-pink-500">Privacy Policy</a>.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
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
</div>

<?php include 'includes/footer.php'; ?>