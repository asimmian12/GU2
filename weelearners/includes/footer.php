<footer class="relative bg-gradient-to-br from-gray-700 to-gray-600 !text-white overflow-hidden" id="footer">
  <!-- Animated background elements -->
  <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-20">
    <div class="absolute top-20 left-10 w-32 h-32 bg-blue-500 rounded-full filter blur-3xl animate-float1"></div>
    <div class="absolute top-40 right-20 w-40 h-40 bg-purple-500 rounded-full filter blur-3xl animate-float2"></div>
    <div class="absolute bottom-10 left-1/2 w-48 h-48 bg-cyan-500 rounded-full filter blur-3xl animate-float3"></div>
  </div>

  <!-- Main footer content -->
  <div class="relative max-w-7xl mx-auto px-6 py-16 sm:py-20 lg:px-8">
    <!-- Grid layout -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
      
      <!-- Logo/Name section with social media -->
      <div class="group">
        <div class="flex items-center space-x-2 mb-6">
          <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center transform group-hover:rotate-12 transition duration-500">
            <i class="fa-solid fa-child !text-white"></i>
          </div>
          <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-blue-500">
            Wee Learners
          </h2>
        </div>
        <p class="!text-white mb-6">Nurturing young minds through playful learning.</p>
        
        <!-- Social media with hover glow -->
        <div class="flex space-x-4">
          <a href="https://www.facebook.com/" target="_blank" class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center hover:bg-blue-500 hover:shadow-lg hover:shadow-blue-500/30 transition-all duration-300">
            <i class="fab fa-facebook !text-white"></i>
          </a>
          <a href="https://twitter.com" target="_blank" class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center hover:bg-blue-400 hover:shadow-lg hover:shadow-blue-400/30 transition-all duration-300">
            <i class="fab fa-twitter !text-white"></i>
          </a>
          <a href="https://instagram.com/" target="_blank" class="w-10 h-10 rounded-full bg-gray-600 flex items-center justify-center hover:bg-orange-500 hover:shadow-lg hover:shadow-orange-500/30 transition-all duration-300">
            <i class="fab fa-instagram !text-white"></i>
          </a>
        </div>
      </div>

      <!-- Quick links with hover effect -->
      <div>
        <h3 class="text-lg font-semibold !text-white mb-6 relative inline-block">
          <span class="relative z-10">Page Links</span>
          <span class="absolute bottom-0 left-0 w-full h-1 bg-blue-400 transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300"></span>
        </h3>
        <ul class="space-y-3">
          <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <li><a href="<?= ROOT_DIR ?>" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Badge</a></li>
            <li><a href="<?= ROOT_DIR ?>login" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Register</a></li>
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Contact</a></li>
          <?php else : ?>
            <!-- For logged-in users -->
            <li><a href="<?= ROOT_DIR ?>" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Badge</a></li>
            <li><a href="<?= ROOT_DIR ?>login" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Register</a></li>
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="!text-white hover:!text-blue-300 hover:pl-2 transition-all duration-300 flex items-center">
              <span class="w-1 h-1 bg-blue-400 rounded-full mr-2 opacity-0 group-hover:opacity-100 transition duration-300"></span>
              <i class="fa fa-arrow-right mr-2 !text-white" aria-hidden="true"></i> Contact</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Contact info with animated icons -->
      <div>
        <h3 class="text-lg font-semibold !text-white mb-6">Contact Details</h3>
        <ul class="space-y-4">
          <li class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-8 h-8 bg-blue-400/20 rounded-full flex items-center justify-center animate-pulse">
                <i class="fa-solid fa-location-dot text-blue-300"></i>
              </div>
            </div>
            <div class="ml-3">
              <p class="text-sm !text-white">Address</p>
              <p class="!text-white">50 Prospecthill Road</p>
              <p class="!text-white">Glasgow G42 9LB</p>
            </div>
          </li>
          <li class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-8 h-8 bg-blue-400/20 rounded-full flex items-center justify-center animate-pulse" style="animation-delay: 0.2s">
                <i class="fa-solid fa-phone text-blue-300"></i>
              </div>
            </div>
            <div class="ml-3">
              <p class="text-sm !text-white">Phone</p>
              <a href="tel:01412729000" class="!text-white hover:!text-blue-300 transition">0141 272 9000</a>
            </div>
          </li>
          <li class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-8 h-8 bg-blue-400/20 rounded-full flex items-center justify-center animate-pulse" style="animation-delay: 0.4s">
                <i class="fa-solid fa-envelope text-blue-300"></i>
              </div>
            </div>
            <div class="ml-3">
              <p class="text-sm !text-white">Email</p>
              <a href="mailto:info@weelearners.ac.uk" class="!text-white hover:!text-blue-300 transition">info@weelearners.ac.uk</a>
            </div>
          </li>
        </ul>
      </div>

      <!-- Search form with floating input -->
      <div>
        <h3 class="text-lg font-semibold !text-white mb-6">Search</h3>
        <p class="!text-white mb-4">Find what you're looking for.</p>
        <form action="search" method="POST" class="mt-4">
          <div class="relative">
            <input type="text" name="search" placeholder="Enter Search" class="w-full bg-gray-600 border border-gray-500 rounded-lg py-3 px-4 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-transparent placeholder-gray-300 !text-white">
          </div>
          <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 !text-white rounded-lg px-4 py-2 transition">
            Search
          </button>
        </form>
      </div>
    </div>

    <!-- Bottom section with animated copyright -->
    <div class="mt-16 pt-8 border-t border-gray-500 flex flex-col md:flex-row justify-between items-center">
      <p class="!text-white text-sm mb-4 md:mb-0">
        &copy; <span id="year" class="text-blue-300"></span> WeeLearners by Asim Mian. All rights reserved. <?php echo date("d-m-Y");?>.
      </p>
    </div>
  </div>
</footer>