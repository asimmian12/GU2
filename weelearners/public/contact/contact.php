<?php
include '../../config/config.php';
include '../../includes/header.php';

?>
<section class="section-banner">
    <h1 class="h1-heading-center">Contact Us Page</h1>
    <p class="paragraph-text">Welcome to the Contact Us page of Wee Learners. We are here to assist you with any inquiries, feedback, or support you may need. Whether you have questions about our services, suggestions for improvement, or require assistance with any aspect of our platform, we encourage you to reach out to us. Your input is invaluable in helping us provide the best possible experience for our community. On this page, you will find a simple and user-friendly contact form. Please provide your name, email address, and a detailed message so that we can address your concerns effectively. Our team is committed to responding promptly and ensuring that your needs are met with care and professionalism. In addition to the contact form, you can find alternative ways to reach us below, including our phone number, email address, and physical location. We strive to make communication as convenient as possible for you. At Wee Learners, we value every member of our community and are dedicated to fostering a supportive and inclusive environment. If you encounter any issues or have urgent matters to discuss, please do not hesitate to contact us. We are here to help and look forward to hearing from you. Thank you for choosing Wee Learners. Together, we can create a positive and enriching learning experience for everyone. Let us know how we can assist you today! </p>
</section>

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
