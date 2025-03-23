<?php 

include 'config/config.php';
include 'includes/header.php';
?>
    <h1 class="h1-heading-center">Register Page</h1>
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

<?php include 'includes/footer.php'; ?>
    

