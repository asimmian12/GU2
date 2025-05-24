<!-- For home use only, because css unable to link in my laptop -->
<link rel="stylesheet" href="assets/css/style.css">

<nav class="nav-navbar bg-white py-4 px-8 shadow-md" id="nav-navbar">
    <div class="div-logo flex justify-between items-center" id="div-logo">
        <a href="<?= ROOT_DIR ?>" class="text-lg font-bold text-blue-500">Wee Learners</a>
    </div>
    <ul class="ul-nav-links hidden md:flex justify-between items-center" id="ul-nav-links">
        <?php if (!isset($_SESSION['loggedin'])) : ?>
            <!-- For non-logged-in users -->
            <li><a href="<?= ROOT_DIR ?>" class="text-gray-600 hover:text-blue-500 transition duration-300">Home</a></li>
            <li><a href="<?= ROOT_DIR ?>badge" class="text-gray-600 hover:text-blue-500 transition duration-300">Badge</a></li>
            <li><a href="<?= ROOT_DIR ?>login" class="text-gray-600 hover:text-blue-500 transition duration-300">Login</a></li>
            <li><a href="<?= ROOT_DIR ?>register" class="text-gray-600 hover:text-blue-500 transition duration-300">Register</a></li>
            <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="text-gray-600 hover:text-blue-500 transition duration-300">Contact</a></li>
            <?php else: ?>
                <!-- For logged-in users -->
                <li><a href="<?= ROOT_DIR ?>" class="text-gray-600 hover:text-blue-500 transition duration-300">Home</a></li>
                <li><a href="<?= ROOT_DIR ?>badge" class="text-gray-600 hover:text-blue-500 transition duration-300">Badge</a></li>
                <?php if ($_SESSION['is_admin'] == 1) : ?>
                    <li><a href="<?= ROOT_DIR ?>admin" class="text-gray-600 hover:text-blue-500 transition duration-300">Admin Dash</a></li>
                    <li><a href="<?= ROOT_DIR ?>public/admin/pending.php" class="text-gray-600 hover:text-blue-500 transition duration-300">Pending Uploads</a></li>
                    <li><a href="<?= ROOT_DIR ?>allUsers" class="text-gray-600 hover:text-blue-500 transition duration-300">Users</a></li>
                    <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="text-gray-600 hover:text-blue-500 transition duration-300">Contact</a></li>
                    <?php else : ?>
                        <li><a href="<?= ROOT_DIR ?>user" class="text-gray-600 hover:text-blue-500 transition duration-300">User Dash</a></li>
                        <li><a href="<?= ROOT_DIR ?>public/games/games.php" class="text-gray-600 hover:text-blue-500 transition duration-300">Games</a></li>
                        <li><a href="<?= ROOT_DIR ?>uploads" class="text-gray-600 hover:text-blue-500 transition duration-300">Upload Badge</a></li>
                        <li><a href="<?= ROOT_DIR ?>account" class="text-gray-600 hover:text-blue-500 transition duration-300">Account Details</a></li>
                        <li><a href="<?= ROOT_DIR ?>public/contact/contact.php" class="text-gray-600 hover:text-blue-500 transition duration-300">Contact</a></li>
            <?php endif; ?>
            <li><a href="<?= ROOT_DIR ?>logout" class="text-gray-600 hover:text-blue-500 transition duration-300">Logout</a></li>
        <?php endif; ?>
    </ul>
    
    <a href="<?= ROOT_DIR ?>login"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Login</button></a>
    <a href="<?= ROOT_DIR ?>register"><button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Register</button></a>

    <div class="div-hamburger-menu flex justify-center items-center md:hidden" id="div-hamburger-menu">
        <span class="h-1 w-6 mb-2 bg-gray-600"></span>
        <span class="h-1 w-6 mb-2 bg-gray-600"></span>
        <span class="h-1 w-6 mb-2 bg-gray-600"></span>
    </div>
</nav>
