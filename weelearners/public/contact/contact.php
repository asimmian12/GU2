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
    

    <section class="section-contact">
    <h2 class="h2-secondary-colour">Contact</h2>
      <!-- The text container for footer__address -->
      <div class="section-contact-info">
          <p class="paragraph-text"><i class="fa-solid fa-phone">Emerengency:   0141 272 9000</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-location-dot">Location:    50 Prospecthill Road Glasgow G42 9LB</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Email:   info@weelearners.ac.uk</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Working Hours:    Mon-Sat 09:00-20:00 Sunday emergency only.</i></p>
    </div>
</section>

<script src="assets/js/script.js"></script>
<?php include '../../includes/footer.php'; ?>
