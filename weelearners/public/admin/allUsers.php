<?php 
include 'config/config.php';  
include 'includes/header.php'; 

// Bringing in Users Details 
$user = $conn->prepare("SELECT 
id, 
username, 
email, 
is_admin 
FROM user");
$user->execute();
$user->store_result();
$user->bind_result($userID, $username, $email, $isAdmin);
?>

<h1 class="h1-heading-center">Current Users Page</h1>
<section class="section-user">
    <?php while ($user->fetch()): ?>
        <div>
            <h1 class="paragraph-text">Username: <?= htmlspecialchars($username ?? '') ?></h1>
            <h2 class="main-heading">Email: <?= htmlspecialchars($email ?? '') ?></h2>
            <h2 class="main-heading">Role: <?= htmlspecialchars($isAdmin ? 'Admin' : 'User') ?></h2>
        </div>         
    <?php endwhile; ?>
</section>

<?php include 'includes/footer.php'; ?>
