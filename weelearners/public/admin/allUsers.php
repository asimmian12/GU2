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
    <h1 class="h1-heading-center">Current Users Page</h1>
    <p class="paragraph-text">Hi <?= htmlspecialchars($_SESSION['name'] ?? '') ?>, Welcome to the Current Users Page of Wee Learners. Here, we provide an overview of all registered users within our platform. This page is designed to help administrators and team members manage user roles, monitor activity, and ensure a seamless experience for everyone. Whether you're looking to update user information, review account statuses, or simply get an overview of our community, this page has all the tools you need. Each user listed here plays a vital role in our growing community, and we are committed to maintaining a positive and inclusive environment for all. Thank you for being a part of Wee Learners, and for contributing to our mission of fostering learning and collaboration. If you have any questions or need assistance, please don't hesitate to reach out to our support team. Let's work together to make this platform a welcoming and productive space for everyone!</p>
</section>

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
