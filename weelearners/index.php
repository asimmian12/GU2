<?php

// Get the requested URL from the 'url' query parameter
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';


// Define available routes (URL => corresponding PHP file)
$routes = [
    '' => 'public/index.php',          // Home route
    'vinyl' => 'public/vinyl.php',          // Vinyl route
    'register' => 'public/register/index.php',    // register page route
    'login' => 'public/login/index.php', // login page route
    'admin' => 'public/admin/index.php', // admin page route
    'user' => 'public/user/index.php', // user page route
    'uploads' => 'public/user/upload.php', // upload page route
    'account' => 'public/user/account.php', // account page route
    'allUsers' => 'public/admin/allUsers.php', // allusers page route
    'pending' => 'public/admin/pending.php', // pending page route
    'search' => 'public/searchResults.php', // Search Results page route
    'publish' => 'public/admin/publish.php', // publish page route
    'unpublish' => 'public/admin/unpublish.php', // unpublish page route
    // config routes
    'authenticate' => 'public/login/authenticate.php', // logging in user page config route
    'registerConfig' => 'public/register/register.php', // registering user page config route
    'uploadConfig' => 'public/user/uploadConfig.php', // pending page route
    'logout' => 'public/logout.php', // logout page route
   
];

// Check if the URL matches a route
if (array_key_exists($url, $routes)) {
    require $routes[$url];  // Load the appropriate file for the route
} else {
    // If no route matches, show a 404 page
    require '404.php';
}
// 
?>
