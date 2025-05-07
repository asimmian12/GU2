<!-- The scroll to top button -->
<button onclick="topFunction()" title="Go to Top" class="paragraph_copyright_footer_scroll_to_btn">
  <i class="fa-solid fa-arrow-up">  Back To Top</i>
</button>

<!-- The secontion__container and footer__container footer -->
<footer class="paragraph-copyright" id="footer">
    <!-- The footer col with logo and social media links to X (Twitter) and Instagram -->
    <section class="footer__col">
      <!-- The section for Footer Social Media Links-->
      <section class="footer__socials">
        <p class="paragraph-text">Wee Learners </p>
        <p class="paragraph-text">Find Our Socials: </p>
          <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook"></i></a>
          <a href="https://twitter.com" target="_blank"><i class="fa-solid fa-x"></i></a>
          <a href="https://instagram.com/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
      </section>

  <section class="footer__col">
      <!-- The text container for footer__address -->
      <section class="paragraph-text">
        <p class="paragraph-text">Page Link's: </p>
        <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>">Home</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>badge">Badge</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>login">Login</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>register">Register</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>public/contact/contact.php">Contact</a></p>
        <?php else : ?>
            <!-- For logged-in users -->
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>">Home</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>badge">Badge</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>login">Login</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>register">Register</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>public/contact/contact.php">Contact</a></p>
        <?php endif; ?>
      </section>
  </section>

  <!-- The footer__address section with Google Maps embeded -->
  <section class="footer__col">
      <!-- The text container for footer__address -->
      <section class="paragraph-text">
        <p class="paragraph-text">Wee Learners Contact Details </p>
        <p class="paragraph-text"><i class="fa-solid fa-location-dot">   50 Prospecthill Road</i></p>
        <p class="paragraph-text"><i class="fa-solid fa-location-dot">   Glasgow G42 9LB</i></p>
        <p class="paragraph-text"><i class="fa-solid fa-phone">   0141 272 9000</i></p>
        <p class="paragraph-text"><i class="fa-solid fa-envelope">   info@weelearners.ac.uk</i></p>
      </section>
  </section>

  <section class="footer__col">
    <form action="search" method="POST" class="form-search-bar">
        <p class="paragraph-text">Search:  </p>
        <input type="text" name="search" class="input-search-bar" placeholder="Enter Search:  "/>
        <input type="submit" value="Search" class="input-search-btn"/>
    </form>
</section>  
</section>


  <!-- The Copyright Information -->
  <section class="footer__copyright">
    &copy; WeeLearners By Asim Mian. All rights reserved. <?php echo date("d-m-Y");?>. 
  </section> 
</footer>

<script src="assets/js/script.js"></script>
</body>
</html>


