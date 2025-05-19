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
    <img src="<?= ROOT_DIR ?>assets/images/banner_img.jpg" alt="Cheerful children playing and learning together on the Wee Learners platform in a vibrant welcoming environment with bright colors and smiling faces creating a joyful and inclusive atmosphere">
</section>

<h1 class="h1-heading-center">Current Users Page</h1>
<section class="section-user-info">
    <?php while ($user->fetch()): ?>
        <div>
            <h1 class="paragraph-text">Username: <?= htmlspecialchars($username ?? '') ?></h1>
            <h2 class="main-heading">Email: <?= htmlspecialchars($email ?? '') ?></h2>
            <h2 class="main-heading">Job Role: <?= htmlspecialchars($role ?? '') ?></h2>
        </div>         
    <?php endwhile; ?>
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
