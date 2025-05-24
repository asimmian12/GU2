<footer class="relative bg-white !text-black overflow-hidden" id="footer">
<!-- The scroll to top button -->
<button onclick="topFunction()" title="Go to Top" class="paragraph_copyright_footer_scroll_to_btn">
  <i class="fa-solid fa-arrow-up">  Back To Top</i>
</button>
  <!-- Main footer content -->
  <div class="relative max-w-7xl mx-auto px-6 py-16 sm:py-20 lg:px-8" id="paragraph-text">
    <!-- Grid layout -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-12">
      
      <!-- Logo/Name section with social media -->
      <div class="group">
        <div class="flex items-center space-x-2 mb-6">
          <h2 class="text-xl font-bold mb-2 text-black-600" id="main-heading">
            Wee Learners
          </h2>
        </div>
        <p id="paragraph-text" class="!text-black mb-6" id="paragraph-text">By nurturing young minds through playful fun, and learning.</p>
        
        <!-- Social media -->
        <div class="flex space-x-4" id="paragraph-text">
          <a href="https://www.facebook.com/" target="_blank" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-all duration-300">
            <i class="fab fa-facebook !text-black"></i>
          </a>
          <a href="https://twitter.com" target="_blank" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-all duration-300">
            <i class="fab fa-twitter !text-black"></i>
          </a>
          <a href="https://instagram.com/" target="_blank" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-all duration-300">
            <i class="fab fa-instagram !text-black"></i>
          </a>
        </div>
      </div>

      <!-- Quick links -->
      <div id="paragraph-text">
        <h3 class="text-lg font-semibold !text-black mb-6">Quick Links</h3>
        <ul class="space-y-3">
          <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <li><a href="<?= ROOT_DIR ?>" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Badge</a></li>
            <li><a href="<?= ROOT_DIR ?>login" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Register</a></li>
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Contact</a></li>
          <?php else : ?>
            <!-- For logged-in users -->
            <li><a href="<?= ROOT_DIR ?>" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Badge</a></li>
            <li><a href="<?= ROOT_DIR ?>login" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Register</a></li>
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="!text-black hover:underline transition-all duration-300 flex items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Contact</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- Contact info -->
      <div id="paragraph-text">
        <h3 class="text-lg font-semibold !text-black mb-6">Contact Details</h3>
        <ul class="space-y-4">
          <li class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-location-dot !text-black"></i>
              </div>
            </div>
            <div class="ml-3">
              <p id="paragraph-text" class="text-sm !text-black">Address</p>
              <p id="paragraph-text" class="!text-black">50 Prospecthill Road</p>
              <p id="paragraph-text" class="!text-black">Glasgow G42 9LB</p>
            </div>
          </li>
          <li class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-phone !text-black"></i>
              </div>
            </div>
            <div class="ml-3">
              <p id="paragraph-text" class="text-sm !text-black">Phone</p>
              <a href="tel:01412729000" class="!text-black hover:underline transition">0141 272 9000</a>
            </div>
          </li>
          <li class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                <i class="fa-solid fa-envelope !text-black"></i>
              </div>
            </div>
            <div class="ml-3">
              <p id="paragraph-text" class="text-sm !text-black">Email</p>
              <a href="mailto:info@weelearners.ac.uk" class="!text-black hover:underline transition">info@weelearners.ac.uk</a>
            </div>
          </li>
        </ul>
      </div>

      <!-- Search form -->
      <div id="paragraph-text">
        <h3 class="text-lg font-semibold !text-black mb-6">Search</h3>
        <p id="paragraph-text" class="!text-black mb-4">Find what you're looking for.</p>
        <form action="search" method="POST" class="mt-4">
          <div class="relative">
            <input type="text" name="search" placeholder="Enter Search" class="w-full bg-gray-100 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none placeholder-gray-500 !text-black">
          </div>
          <button type="submit" class="w-full bg-gray-800 hover:bg-gray-700 !text-white rounded-lg px-4 py-2 transition mt-2">
            Search
          </button>
        </form>
      </div>
    </div>

    <!-- Bottom section -->
    <div class="mt-16 pt-8 border-t border-gray-300 flex flex-col md:flex-row justify-between items-center">
      <p id="paragraph-text" class="!text-black text-sm mb-4 md:mb-0">
        &copy; <span id="year"></span> WeeLearners by Asim Mian. All rights reserved. <?php echo date("d-m-Y");?>.
      </p>
    </div>
  </div>
</footer>
<!-- The Scroll Reveal  -->
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= ROOT_DIR ?>assets/js/script.js" defer></script>
</body>
</html>