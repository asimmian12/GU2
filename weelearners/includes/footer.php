<!-- /* Fhe footer container with white background and black text */ -->
<footer class="relative bg-white !text-black overflow-hidden" id="footer">
  
  <!-- /* To scroll to top button with arrow icon */ -->
  <button onclick="topFunction()" title="Go to Top" class="paragraph_copyright_footer_scroll_to_btn">
    <i class="fa-solid fa-arrow-up"> Back To Top</i>
  </button>
  
  <!-- /* The footer main's content container with responsive padding */ -->
  <div class="relative max-w-7xl mx-auto px-4 sm:px-6 py-12 sm:py-16 lg:py-20" id="paragraph-text">
    
    <!-- /* The footer has a grid layout with 1 column on mobile, 4 on desktop */ -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8 sm:gap-10 lg:gap-12">
      
      <!-- /* The footer's brand information section with social media links */ -->
      <div class="group text-center md:text-left">
        
        <!-- /* The footer has a Flex container, for it's brand name */ -->
        <div class="flex justify-center md:justify-start items-center space-x-2 mb-4 sm:mb-6">
          <h2 class="text-xl font-bold text-black-600" id="main-heading">
            Wee Learners
          </h2>
        </div>
        
        <!-- /* The footer has a Social media prompt text */ -->
        <p id="paragraph-text" class="!text-black mb-6">Find Our Socials</p>
        
        <!-- /* The footer has a social media links container */ -->
        <div class="flex justify-center md:justify-start space-x-4" id="paragraph-text">
          
          <!-- /* The footer has a facebook link with icon */ -->
          <a href="https://www.facebook.com/" target="_blank" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-all duration-300">
            <i class="fab fa-facebook !text-black"></i>
          </a>
          
          <!-- /* The footer has a twitter/X link with icon */ -->
          <a href="https://x.com" target="_blank" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-all duration-300">
            <i class="fa-solid fa-x !text-black"></i>
          </a>
          
          <!-- /* The footer has a instagram link with icon */ -->
          <a href="https://instagram.com/" target="_blank" class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center hover:bg-gray-300 transition-all duration-300">
            <i class="fab fa-instagram !text-black"></i>
          </a>
        </div>
      </div>

      <!-- /* The footer has a contact information section */ -->
      <div id="paragraph-text" class="text-center md:text-left">
        
        <!-- /* The footer has a contact details heading */ -->
        <h3 class="text-lg font-semibold !text-black mb-6">Contact Details</h3>
        
        <!-- /* The footer has a contact list container */ -->
        <ul class="space-y-4">
          
          <!-- /* The footer has a address list item */ -->
          <li class="flex flex-col items-center md:items-start">
            <div class="flex items-center">
              
              <!-- /* The footer has a location icon container */ -->
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                <i class="fa-solid fa-location-dot !text-black"></i>
              </div>
              
              <!-- /* The footer has an address text */ -->
              <div class="text-left">
                <p class="text-sm !text-black">Address</p>
                <p class="!text-black">50 Prospecthill Road</p>
                <p class="!text-black">Glasgow G42 9LB</p>
              </div>
            </div>
          </li>
          
          <!-- /* The footer has a phone list item */ -->
          <li class="flex flex-col items-center md:items-start">
            <div class="flex items-center">
              
              <!-- /* The footer has a phone icon container */ -->
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                <i class="fa-solid fa-phone !text-black"></i>
              </div>
              
              <!-- /* The footer has a phone number text */ -->
              <div class="text-left">
                <p class="text-sm !text-black">Phone</p>
                <a href="tel:01412729000" class="!text-black hover:underline transition">0141 272 9000</a>
              </div>
            </div>
          </li>
          
          <!-- /* THe footer has an email list item */ -->
          <li class="flex flex-col items-center md:items-start">
            <div class="flex items-center">
              
              <!-- /* The footer has an email icon container */ -->
              <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center mr-3">
                <i class="fa-solid fa-envelope !text-black"></i>
              </div>
              
              <!-- /* The footer has an email address text */ -->
              <div class="text-left">
                <p class="text-sm !text-black">Email</p>
                <a href="mailto:info@weelearners.ac.uk" class="!text-black hover:underline transition">info@weelearners.ac.uk</a>
              </div>
            </div>
          </li>
        </ul>
      </div>

      <!-- /* The footer has a page links section */ -->
      <div id="paragraph-text" class="text-center md:text-left">
        
        <!-- /* The footer has a page links heading */ -->
        <h3 class="text-lg font-semibold !text-black mb-6">Page Links</h3>
        
        <!-- /* The footer have a page links list container */ -->
        <ul class="space-y-3">
          
          <!-- /* The footer has a conditional check for logged-in status */ -->
          <?php if (!isset($_SESSION['loggedin'])) : ?>
            
            <!-- /* Home page link for non-logged-in users */ -->
            <li><a href="<?= ROOT_DIR ?>" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Home</a></li>
            
            <!-- /* Badge page link */ -->
            <li><a href="<?= ROOT_DIR ?>badge" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Badge</a></li>
            
            <!-- /* Login page link */ -->
            <li><a href="<?= ROOT_DIR ?>login" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Login</a></li>
            
            <!-- /* Register page link */ -->
            <li><a href="<?= ROOT_DIR ?>register" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Register</a></li>
            
            <!-- /* Contact page link */ -->
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Contact</a></li>
          
          <?php else : ?>
            <!-- /* Alternative links for non logged-in users */ -->
            <li><a href="<?= ROOT_DIR ?>" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Home</a></li>
            
            <li><a href="<?= ROOT_DIR ?>badge" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Badge</a></li>
            
            <li><a href="<?= ROOT_DIR ?>login" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Login</a></li>
            
            <li><a href="<?= ROOT_DIR ?>register" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Register</a></li>
            
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="!text-black hover:underline transition-all duration-300 flex justify-center md:justify-start items-center">
              <i class="fa fa-arrow-right mr-2 !text-black" aria-hidden="true"></i> Contact</a></li>
          <?php endif; ?>
        </ul>
      </div>

      <!-- /* The footer has a search form section */ -->
      <div id="paragraph-text" class="flex flex-col items-center md:items-start w-full">
        <div class="max-w-xs w-full text-center md:text-left">
          
          <!-- /* The footer has a search heading */ -->
          <h3 class="text-lg font-semibold !text-black mb-6">Search</h3>
          
          <!-- /* The footer has a search prompt text */ -->
          <p id="paragraph-text" class="!text-black mb-4">Find what you're looking for.</p>
          
          <!-- /* The footer has a search form */ -->
          <form action="search" method="POST" class="mt-4">
            <div class="relative">
              
              <!-- /* The footer has a search input field */ -->
              <input type="text" name="search" placeholder="Enter Search" class="w-full bg-gray-100 border border-gray-300 rounded-lg py-3 px-4 focus:outline-none placeholder-gray-500 !text-black">
            </div>
            
            <!-- /* The footer has a Search submit button */ -->
            <button type="submit" class="w-full bg-gray-800 hover:bg-gray-700 !text-white rounded-lg px-4 py-2 transition mt-2">
              Search
            </button>
          </form>
        </div>
      </div>

    <!-- /* THe footer has a copyright section that shows the date*/ -->
    <div class="mt-12 sm:mt-16 pt-6 sm:pt-8 border-t border-gray-300 flex flex-col justify-center items-center">
      <p id="paragraph-text" class="!text-black text-sm">
        &copy; WeeLearners By Asim Mian. All rights reserved. <?php echo date("d-m-Y");?>.
      </p>
    </div>
  </div>
</footer>

<!-- /* Scroll reveal animation library */ -->
<script src="https://unpkg.com/scrollreveal"></script>

<!-- /* Swiper JS library for carousels */ -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- /* The JavaScript file which is in assets */ -->
<script src="<?= ROOT_DIR ?>assets/js/script.js" defer></script>
</body>
</html>