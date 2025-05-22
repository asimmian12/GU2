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
  <p class="paragraph-text">Welcome to the Badge section of Wee Learners. Here, you can explore a wide variety of badges that have been created and shared by our community of users. Badges are a great way to showcase achievements, recognize contributions, and celebrate milestones. On this page, you will find a curated selection of badges, each with its own unique design and description. Whether you are looking for inspiration, want to learn more about a specific badge, or simply enjoy browsing through creative designs, this is the perfect place for you. Each badge includes a detailed description, an image, and information about the user who uploaded it. You can click on any badge to view more details, including its origin and purpose. If you find a badge particularly interesting, feel free to share it with others or print it out for your personal collection. Our badge library is constantly growing, so be sure to check back often for new additions.  If you have any questions or need assistance, please don't hesitate to reach out to us using the contact information provided below. We hope you enjoy exploring the badges and discovering the creativity of our community. Thank you for being a part of Wee Learners!</p>
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