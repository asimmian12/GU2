<?php 
include 'config/config.php';
include 'includes/header.php';
?>
<section class="section-banner">
  <h1 class="h1-heading-center">Register Page</h1>
<p class="paragraph-text">
  Welcome to the registration page of Wee Learners. Here, you have the opportunity to create a new account and become a part of our vibrant community. By registering, you gain access to a wide range of features, resources, and tools designed to enhance your learning experience. Whether you are here to explore educational content, connect with like-minded individuals, or track your progress, this is the first step to unlocking your potential. 
  On this page, you will find a simple and secure registration form. Please provide accurate details, including your username, email address, and a strong password, to ensure a smooth registration process. Once registered, you will be able to personalize your profile, participate in discussions, and access exclusive content tailored to your interests. 
  Our platform is designed to be user-friendly and inclusive, catering to learners of all ages and backgrounds. If you encounter any issues during the registration process or have questions, our support team is here to assist you. Feel free to reach out using the contact information provided below. 
  We are excited to have you join us and look forward to supporting your learning journey. Thank you for choosing Wee Learners as your trusted platform for growth and discovery. Let’s get started!
</p>
</section>
    <section class="section-register-form">
        <form action="<?= ROOT_DIR ?>registerConfig" method="post" class="form-register-form">
        <input type="hidden" name="is_active" value="1">           
        <input type="hidden" name="is_admin" value="1">
        <label for="username">Username</label>
        <input type="text" class="section-register-form" name="username" id="username" placeholder="Enter Your Username">  
        <label for="email">Email</label>
        <input type="email" class="section-register-form" name="email" id="email" placeholder="Enter Your Email Address"> 
        <label for="pswd">Password</label>
        <input type="password" class="section-register-form" name="password" id="pswd" placeholder="Enter Your Password">        
        <input type="submit" class="input-register-btn">
    
        <section class="section-register-options">
            <div class="register-message">
                <a href="login">Already a have an account? <span>SIGN IN</span></a>
            </div>
        </section>
        <?php
        if (isset($_SESSION['status_message'])) {
            echo '<div class="status-message">' . $_SESSION['status_message'] . '</div>';
            unset($_SESSION['status_message']);
        }
        ?>
        
    </form>
    <!-- <div class="msg"></div>  -->
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


<?php include 'includes/footer.php'; ?>
        

