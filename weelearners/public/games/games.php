<?php
include '../../config/config.php';
include '../../includes/header.php';
?>

<?php

// The $json_file variable before calling the function
$json_file = $_SERVER['DOCUMENT_ROOT'] . '/GU2/weelearners/assets/json/games.json';

// The function fetchFromApi is used to retrieve game data from the FreeToGame API
function fetchFromApi($json_file) {
    // The file_get_contents function is used to send a GET request to the API and fetch the response
    $response = file_get_contents($json_file);
    // The JSON response is decoded into an  array and returned as boolean value which is true
    return json_decode($response, true);
}

  // The fetchFromApi function is called to get the games data and store it in the $games variable with $json_file being passed as it's parametre
  $games = fetchFromApi($json_file);
  // The games array is shuffling the games randomly
  shuffle($games);
  // The array_slice function is being used to get the first 3 games from the shuffled array
  $games = array_slice($games, 0, 3);
?>
<section class="section-banner">
    <h1 class="h1-heading-center">Games Page</h1>
    <p class="paragraph-text">Welcome to the Games page of Wee Learners. Here, we aim to provide a fun and engaging experience for learners of all ages. Our carefully curated selection of games is designed to entertain, educate, and inspire creativity. Whether you're looking for a quick challenge, an interactive learning opportunity, or just some lighthearted fun, you'll find something here to enjoy. Each game has been chosen with care to ensure it aligns with our mission of fostering a positive and enriching environment for our community. On this page, you'll find a variety of games that cater to different interests and skill levels. Simply click on any game to learn more about it and start playing. We believe that games are a powerful tool for learning and personal growth, and we are excited to share these experiences with you. Thank you for visiting the Games section of Wee Learners. We hope you have a fantastic time exploring and playing the games we have to offer. If you have any feedback or suggestions for new games, please don't hesitate to reach out to us. Let's make learning fun and memorable together!</p>
</section>

<section class="section-game">
    <?php for ($i = 0; $i < count($games); $i++): ?>
        <?php $game = $games[$i]; ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($game['name'] ?? 'No Game Name available') ?></h2>
            <img src="<?= htmlspecialchars($game['game_img'] ?? 'No Image Available') ?>"></img>
            <p><?= htmlspecialchars($game['details'] ?? 'No description available.') ?></p>
            <a href="<?= htmlspecialchars($game['game_url'] ?? ' No Game URL available') ?>">Play Game</a>
        </div>
    <?php endfor; ?>
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


<script src="assets/js/script.js"></script>
<?php include '../../includes/footer.php'; ?>
