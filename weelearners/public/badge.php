<?php
include 'config/config.php';
include 'includes/header.php';

// Bringing In Badge Details
$badge = $conn->prepare("SELECT 
    id,
    badge_name,
    description,
    fk_user_id,
    badge_img
    FROM badge
    WHERE is_active = 1
    ORDER BY RAND() 
    LIMIT 30"); 
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bUserID, $bImage);
?>
<section class="section-banner">
  <h1 class="h1-heading-center">Badges Page</h1>
  <p class="paragraph-text">Welcome to the Badge section of Wee Learners. Here you can find all the badges that have been uploaded by our users. You can click on any badge to get more information about it.</p>
</section>


<section class="section-badge">
    <?php while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . ($bImage ?? 'default.jpg')) ?>" alt="Badge Image">
            <p><?= htmlspecialchars($bDesc ?? '') ?></p>
            <p>Uploaded by Anonymus User ID: <?= htmlspecialchars($bID ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?bid=' . $bID ?? '') ?>">More Information</a>
            <button onclick="window.print()"><i class="fa-solid fa-print"></i></button>
        </div>
    <?php endwhile ?>
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