<?php
include '../../config/config.php';
include '../../includes/header.php';

?>
<section class="section-banner">
    <img src="<?= ROOT_DIR ?>assets/images/banner_img.jpg" alt="Cheerful children playing and learning together on the Wee Learners platform in a vibrant welcoming environment with bright colors and smiling faces creating a joyful and inclusive atmosphere">
</section>

<h1 class="h1-heading-center">Contact Us</h1>

    <section class="section-contact-form">
        <form action="#" method="post" class="form-contact-form" id="form-contact-form">
            
            <label for="name">Name: </label>
            <input type="text" class="section-contact-form" name="name" id="name" placeholder="Enter Your Name:  " required>
            
            <label for="email">Email: </label>
            <input type="email" class="section-contact-form" name="email" id="email" placeholder="Enter Your Email:  " required>
            
            <label for="message">Message:</label>
            <textarea type="text" id="message" name="message" class="section-contact-form" placeholder="Enter Your Message" required></textarea>
            
            <input type="submit" class="input-contact-btn" onclick="submitForm()" value="Submit">

            <section class="section-contact-options">
                <div class="login-message">
                    <a href="register">Don't a have an account? <span>REGISTER</span></a>
                </div>
            </section>
        </form>
    </section>
    

    <h2 class="h2-secondary-colour">Contact</h2>
    <section class="section-contact">
    <div class="contact-cards">

    <div class="contact-card">
      <i class="fa-solid fa-phone"></i>
      <h3>EMERGENCY</h3>
      <p class="paragraph-text">0141 272 9000</p>
    </div>

    <div class="contact-card">
      <i class="fa-solid fa-location-dot"></i>
      <h3>LOCATION</h3>
      <p class="paragraph-text">50 Prospecthill Road</p>
      <p class="paragraph-text">G42 9LB, Glasgow, UK</p>
    </div>

    <div class="contact-card">
      <i class="fa-solid fa-envelope"></i>
      <h3>EMAIL</h3>
      <a href="mailto:info@weelearners.ac.uk">info@weelearners.ac.uk</a>
    </div>

    <div class="contact-card">
      <i class="fa-solid fa-clock"></i>
      <h3>WORKING HOURS</h3>
      <p class="paragraph-text">Mon–Sat: 09:00–20:00</p>
      <p class="paragraph-text">Sunday: Emergency only</p>
    </div>
  </div>
</section>


<script src="assets/js/script.js"></script>
<?php include '../../includes/footer.php'; ?>
