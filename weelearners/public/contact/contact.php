<?php
// Include the configuration file and header
include '../../config/config.php';
include '../../includes/header.php';
?>


<section class="section-banner flex flex-col items-center">
    <!-- Heading for the Contact Us page -->
    <h1 class="text-3xl font-semibold text-center mt-6 mb-4 text-pink-500" id="h1-heading-center">Contact Us Page</h1>
    <!-- Description of the Contact Us page -->
    <p id="paragraph-text" class="paragraph-text mx-2 text-center">
        Welcome to the Contact Us page of Wee Learners. We are here to assist you with any inquiries, feedback, or support you may need. Whether you have questions about our services, suggestions for improvement, or require assistance with any aspect of our platform, we encourage you to reach out to us. Your input is invaluable in helping us provide the best possible experience for our community.
    </p>
</section>

  <div class="h-16"></div>

  <!-- Contact Form Section -->
  <div class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8" id="section-contact-form">
    <div class="relative py-3 w-full max-w-3xl mx-auto">
      <!-- Gradient background for the contact form -->
      <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-sky-500 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl"></div>
      <!-- Contact form container -->
      <div class="relative px-8 py-12 bg-white shadow-lg sm:rounded-3xl sm:p-12">
        <div class="mx-auto">
          <!-- Heading for the contact form -->
          <h1 class="text-3xl font-semibold text-center mt-12 mb-6 text-pink-500" id="h1-heading-center">Get In Touch</h1>
          
          <!-- Contact form -->
          <form action="#" method="POST" id="form-contact-form" class="space-y-6">
            <!-- Name field -->
            <div class="relative">
              <input 
                id="name" 
                name="name" 
                type="text" 
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Your Name"
                required
              >
              <!-- Label for the name field -->
              <label for="name" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Your Name
              </label>
            </div>

            <!-- Email field -->
            <div class="relative">
              <input 
                id="email" 
                name="email" 
                type="email" 
                class="peer placeholder-transparent h-10 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Email Address"
                required
              >
              <!-- Label for the email field -->
              <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Email Address
              </label>
            </div>

            <!-- Message field -->
            <div class="relative">
              <textarea 
                id="message" 
                name="message" 
                rows="5" 
                class="peer placeholder-transparent pt-2 w-full border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-pink-500" 
                placeholder="Your Message"
                required
              ></textarea>
              <!-- Label for the message field -->
              <label for="message" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-400 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">
                Your Message
              </label>
            </div>

            <!-- Submit button -->
            <div>
              <button type="submit" onclick="submitForm()"
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-md font-medium text-white bg-gradient-to-r from-indigo-500 to-indigo-600 hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Send Message
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="h-16"></div>
  <!-- Contact Section -->
  <h2 class="text-2xl font-bold text-center text-indigo-600 mb-6 text-pink-500" id="section-contact">Contact</h2>
  <section class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-6 mb-16 text-center" id="section-contact">
    <!-- Emergency contact information -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <i class="fa-solid fa-phone text-indigo-600 text-2xl mb-2"></i>
      <h3 class="font-semibold text-lg">EMERGENCY</h3>
      <p class="text-gray-700">0141 272 9000</p>
    </div>
    <!-- Location contact information -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <i class="fa-solid fa-location-dot text-indigo-600 text-2xl mb-2"></i>
      <h3 class="font-semibold text-lg">LOCATION</h3>
      <p class="text-gray-700">50 Prospecthill Road</p>
      <p class="text-gray-700">G42 9LB, Glasgow, UK</p>
    </div>
    <!-- Email contact information -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <i class="fa-solid fa-envelope text-indigo-600 text-2xl mb-2"></i>
      <h3 class="font-semibold text-lg">EMAIL</h3>
      <a href="mailto:info@weelearners.ac.uk" class="text-blue-600 hover:underline">info@weelearners.ac.uk</a>
    </div>
    <!-- Working hours contact information -->
    <div class="bg-white p-6 rounded-lg shadow-md">
      <i class="fa-solid fa-clock text-indigo-600 text-2xl mb-2"></i>
      <h3 class="font-semibold text-lg">WORKING HOURS</h3>
      <p class="text-gray-700">Mon–Sat: 09:00–20:00</p>
      <p class="text-gray-700">Sunday: Emergency only</p>
    </div>
  </section>
<script src="assets/js/script.js"></script>
<?php include '../../includes/footer.php'; ?>