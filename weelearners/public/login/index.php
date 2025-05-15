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
    
<?php include 'includes/footer.php'; ?>

