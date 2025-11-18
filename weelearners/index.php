<?php

// To get the requested URL from the 'url' query parameter
$url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : '';

// To define the available routes (for URL that corresponds to the correct PHP file, and route)
$routes = [
    '' => 'public/index.php',          // Home route
    'badge' => 'public/badge.php',          // badge route
    'register' => 'public/register/index.php',    // register page route
    'contact' => 'public/contact/contact.php',    // contact page route
    'login' => 'public/login/index.php', // login page route
    'admin' => 'public/admin/index.php', // admin page route
    'user' => 'public/user/index.php', // user page route
    'uploads' => 'public/user/upload.php', // upload page route
    'account' => 'public/user/account.php', // account page route
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

// To check if the URL matches a route
if (array_key_exists($url, $routes)) {
    // To load the appropriate file for the route
    require $routes[$url];  
} else {
    // If their is no route being matchef, then it shows a 404 page
    require '404.php';
}

?>


