<?php
include 'config/config.php';
include 'includes/header.php';

// To check if user is admin, if not redirects me to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['is_admin'] != 1) {
    header("Location: login.php");
    exit();
}

// Deactivting user
if (isset($_POST['toggle_active'])) {
    $user_id = intval($_POST['user_id']);
    $new_status = ($_POST['new_status'] == 1) ? 0 : 1;
    $user = $conn->prepare("UPDATE user SET is_active = ? WHERE id = ?");
    $user->bind_param("ii", $new_status, $user_id);
    $user->execute();
    $user->close();
}

// Delete user and their related badges that they uploaded
if (isset($_POST['deleteUser'])) {
    $user_id = intval($_POST['user_id']);
    $deleteBadge = $conn->prepare("DELETE FROM badge WHERE fk_user_id = ?");
    $deleteUser = $conn->prepare("DELETE FROM user WHERE id = ?");
    $deleteBadge->bind_param("i", $user_id);
    $deleteUser->bind_param("i", $user_id);
    $deleteBadge->execute();
    $deleteBadge->close();
    $deleteUser->execute();
    $deleteUser->close();
}

// Bringing in User Details
$users = $conn->prepare("SELECT id, username, email, role, is_active FROM user");
$users->execute();
$users->store_result();
$users->bind_result($userID, $username, $email, $role, $isActive);
?>

<h1 class="h1-heading-center">Admin Dashboard</h1>
<div>
    <section>
        <?php while ($users->fetch()): ?>
        <div class="div-album-item">
            <h2 class="main-heading">ID: <?= htmlspecialchars($userID ?? '') ?></h2>
            <p class="paragraph-text">User: <?= htmlspecialchars($username ?? '') ?></p>
            <p class="paragraph-text">Email: <?= htmlspecialchars($email ?? '') ?></p>
            <p class="paragraph-text">Job Role: <?= htmlspecialchars($role ?? '') ?></p>
            <p class="paragraph-text">Status: <?= htmlspecialchars($isActive ? 'Active' : 'Inactive') ?></p>

            <form method="POST">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($userID ?? '') ?>">
                <input type="hidden" name="new_status" value="<?= htmlspecialchars($isActive ?? '') ?>">
                <button type="submit" name="toggle_active"><?= htmlspecialchars($isActive ? 'Deactivate' : 'Activate' ?? '') ?></button>
            </form>

            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                <input type="hidden" name="user_id" value="<?= htmlspecialchars($userID ?? '') ?>">
                <button type="submit" name="deleteUser">Delete</button>
            </form>
        </div>
        <?php endwhile; ?>
    </section>
</div>

<?php include 'includes/footer.php'; ?>