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
    
<?php include 'includes/footer.php'; ?>

