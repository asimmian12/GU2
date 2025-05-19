<?php 

include 'config/config.php';
include 'includes/header.php';
?>
    <h1 class="h1-heading-center">Login Page</h1>
    <section class="section-login-form">
        <form action="<?= ROOT_DIR ?>authenticate" method="post" class="form-login-form">
            <label for="username">Username</label>
            <input type="text" class="section-login-form" name="username" id="username" placeholder="Enter Your Username" value="<?php  if (isset($_COOKIE["username"])) {echo $_COOKIE["username"]; }else{ echo "";} ?>">
            <label for="pswd">Password</label>
            <input type="password" class="section-login-form" name="password" id="pswd" placeholder="Enter Your Password">
            <input type="submit" class="input-login-btn">
        
            
            <section class="section-login-options">
                <div class="login-message">
                    <a href="register">Don't a have an account? <span>REGISTER</span></a>
                </div>
            </section>
            <?php
                
                if (isset($_SESSION['status_message'])) {
                    echo '<div class="status-message">' . $_SESSION['status_message'] . '</div>';
                    unset($_SESSION['status_message']);
                }
            ?>
        </form>
        <!-- <div class="msg"></div> -->
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

