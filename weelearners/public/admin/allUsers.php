<?php 
include 'config/config.php';  
include 'includes/header.php'; 

// Bringing in Users Details 
$user = $conn->prepare("SELECT id, username, email, role, is_active FROM user");
$user->execute();
$user->store_result();
$user->bind_result($userID, $username, $email, $role, $isAdmin);
?>
<section class="section-banner">
        <img src="<?= htmlspecialchars(ROOT_DIR . './assets/images/banner_img.jpg') ?>" alt="Colorful banner showcasing Wee Learners platform with cheerful children playing and learning together in a vibrant and welcoming environment">
</section>

<h1 class="h1-heading-center">Current Users Page</h1>
<section class="section-user">
    <?php while ($user->fetch()): ?>
        <div>
            <h1 class="paragraph-text">Username: <?= htmlspecialchars($username ?? '') ?></h1>
            <h2 class="main-heading">Email: <?= htmlspecialchars($email ?? '') ?></h2>
            <h2 class="main-heading">Job Role: <?= htmlspecialchars($role ?? '') ?></h2>
        </div>         
    <?php endwhile; ?>
</section>

<h2 class="h2-secondary-colour">Contact</h2>
    <section class="footer__col">
      <!-- The text container for footer__address -->
      <div class="section-album-info">
          <p class="paragraph-text"><i class="fa-solid fa-phone">Emerengency:   0141 272 9000</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-location-dot">Location:    50 Prospecthill Road Glasgow G42 9LB</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Email:   info@weelearners.ac.uk</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Working Hours:    Mon-Sat 09:00-20:00 Sunday emergency only.</i></p>
        </div>
    </section>

<?php include 'includes/footer.php'; ?>
