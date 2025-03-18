<!-- For home use only, because css unable to link in my laptop -->
<link rel="stylesheet" href="assets/css/style.css">
<nav class="nav-navbar">
    <div class="div-logo">
        <a href="<?= ROOT_DIR ?>">Wee Learners</a>
    </div>
    <ul class="ul-nav-links" id="ul-nav-links">
        <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <li><a href="<?= ROOT_DIR ?>">Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge">Badge</a></li>
            <li><a href="<?= ROOT_DIR ?>login">Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register">Register</a></li>
        <?php else: ?>
            <!-- For logged-in users -->
            <li><a href="<?= ROOT_DIR ?>">Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge">Badge</a></li>
            <?php if ($_SESSION['is_admin'] == 1) : ?>
                <li><a href="<?= ROOT_DIR ?>admin">Admin Dash</a></li>
                <li><a href="<?= ROOT_DIR ?>public/admin/pending.php">Pending Uploads</a></li>
                <li><a href="<?= ROOT_DIR ?>allUsers">Users</a></li>
            <?php else : ?>
                <li><a href="<?= ROOT_DIR ?>user">User Dash</a></li>
                <li><a href="<?= ROOT_DIR ?>uploads">Upload Badge</a></li>
                <li><a href="<?= ROOT_DIR ?>account">Account Details</a></li>
            <?php endif; ?>
            <li><a href="<?= ROOT_DIR ?>logout">Logout</a></li>
        <?php endif; ?>
    </ul>
    
    <form action="search" method="POST" class="form-search-bar">
        Search: <input type="text" name="search" class="input-search-bar" placeholder="Enter your search:"/>
        <input type="submit" value="Search" class="input-search-btn"/>
    </form>

    <div class="div-hamburger-menu" id="div-hamburger-menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
</nav>
