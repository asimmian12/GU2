<!-- The footer__container footer that's nested with multiple sections to help me do it in parts.-->
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
        <p class="paragraph-text">Page Links: </p>
        <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> Home</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>badge"><i class="fa fa-arrow-right" aria-hidden="true"></i> Badge</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>login"><i class="fa fa-arrow-right" aria-hidden="true"></i> Login</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>register"><i class="fa fa-arrow-right" aria-hidden="true"></i> Register</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>public/contact/contact.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> Contact</a></p>
        <?php else : ?>
            <!-- For logged-in users -->
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>"><i class="fa fa-arrow-right" aria-hidden="true"></i> Home</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>badge"><i class="fa fa-arrow-right" aria-hidden="true"></i> Badge</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>login"><i class="fa fa-arrow-right" aria-hidden="true"></i> Login</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>register"><i class="fa fa-arrow-right" aria-hidden="true"></i> Register</a></p>
            <p class="paragraph-text"><a href="<?= ROOT_DIR ?>public/contact/contact.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> Contact</a></p>
        <?php endif; ?>
      </section>
  </section>

  <!-- The footer__address section with Google Maps embeded -->
  <section class="footer__col">
      <!-- The text container for footer__address -->
      <section class="paragraph-text">
        <p class="paragraph-text">Wee Learners Contact Details </p>
        <p class="section-paragraph-text"><i class="fa-solid fa-location-dot"></i>  50 Prospecthill Road</p>
        <p class="section-paragraph-text"><i class="fa-solid fa-location-dot"></i>  Glasgow G42 9LB</p>
        <p class="section-paragraph-text"><i class="fa-solid fa-phone"></i>   0141 272 9000</p>
        <p class="section-paragraph-text"><i class="fa-solid fa-envelope"></i>  info@weelearners.ac.uk</p>
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
    <p class="paragraph-text">&copy; WeeLearners By Asim Mian. All rights reserved. <?php echo date("d-m-Y");?>.</p>
  </section> 
</footer>

<!-- The Scroll Reveal  -->
<script src="https://unpkg.com/scrollreveal"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="<?= ROOT_DIR ?>assets/js/script.js" defer></script>

</body>
</html>


