<?php 
    include 'includes/header.php';
    include 'config/config.php';



   if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

    // Bringing in Account Details
    $userId = $_SESSION['id']; 
    $sql = "SELECT 
    id, 
    username, 
    email,
    role 
    FROM user 
    WHERE id = ?";
    $account = $conn->prepare($sql);
    $account->bind_param("i", $userId);
    $account->execute();
    $account->bind_result($id, $username, $email, $role);
    $account->fetch();
    $account->close();
    
    // Bringing in User Details
    $sql = "SELECT 
    username, 
    email, 
    is_active, 
    is_admin,
    role 
    FROM user 
    WHERE id = ?";
    $user = $conn->prepare($sql);
    $user->bind_param("i", $userId);
    $user->execute();
    $user->bind_result($name, $email, $stat, $userType, $role);
    $user->store_result();
?>
<section class="section-banner">
    <h1 class="h1-heading-center">User Dashboard Page</h1>
    <p class="paragraph-text"><h2 class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? ' ') ?>, Welcome to your dashboard in Wee Learners website. Here you can find all the information related to your account. You can view your personal account information.</p>
</section>


<section>
    <?php if (isset($profilePicture)): ?>
        <div>
            <img src="<?= htmlspecialchars(($profilePicture ?? '')) ?>"> 
        </div>
    <?php else: ?>
        <p class="paragraph-text">You can upload upload your profile picture in your Account Details Page.</p>
    <?php endif; ?>
</section>

<h2 class="main-heading">Personal Account Information: </h2>
<section class="section-account-info">
        <?php while ($user->fetch()): ?>
            <div> 
                <p class="paragraph-text">Username: <?= htmlspecialchars($name ?? '') ?></p>
                <p class="paragraph-text">Email: <?= htmlspecialchars($email ?? '') ?></p>
                <p class="paragraph-text">Status: <?= htmlspecialchars($stat == 1 ? 'Active' : 'Inactive') ?></p>
                <p class="paragraph-text">Job Role: <?= htmlspecialchars($role ?? '') ?></p>
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
