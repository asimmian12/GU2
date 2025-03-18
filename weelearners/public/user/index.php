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
<h1 class="h1-heading-center">User Dashboard Page</h1>
<h2 class="main-heading">Hi <?= htmlspecialchars($_SESSION['name'] ?? ' ') ?>, Welcome to your User Dashboard!</h2>

<section>
    <?php if (isset($profilePicture)): ?>
        <div>
            <img src="<?= htmlspecialchars(($profilePicture ?? '')) ?>"> 
        </div>
    <?php else: ?>
        <p class="paragraph-text">You can upload upload your profile picture in your Account Details Page.</p>
    <?php endif; ?>
</section>

<h2 class="main-heading">Personal Account Information</h2>
<section>
        <?php while ($user->fetch()): ?>
            <div> 
                <p class="paragraph-text">Username: <?= htmlspecialchars($name ?? '') ?></p>
                <p class="paragraph-text">Email: <?= htmlspecialchars($email ?? '') ?></p>
                <p class="paragraph-text">Status: <?= htmlspecialchars($stat == 1 ? 'Active' : 'Inactive') ?></p>
                <p class="paragraph-text">Job Role: <?= htmlspecialchars($role ?? '') ?></p>
            </div>
        <?php endwhile; ?>
</section>

<?php include 'includes/footer.php'; ?>
