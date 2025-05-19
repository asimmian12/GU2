<?php
include '../../config/config.php';
include '../../includes/header.php';
?>

<?php

// The $json_file variable before calling the function
$json_file = $_SERVER['DOCUMENT_ROOT'] . '/Asim/GU2/weelearners/assets/json/games.json';

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
    <img src="<?= ROOT_DIR ?>assets/images/banner_img.jpg" alt="Cheerful children playing and learning together on the Wee Learners platform in a vibrant welcoming environment with bright colors and smiling faces creating a joyful and inclusive atmosphere">
</section>

<h1 class="h2-secondary-colour">Games</h1>

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

<section class="section-contact">
    <h2 class="h2-secondary-colour">Contact</h2>
      <!-- The text container for footer__address -->
      <div class="section-contact-info">
          <p class="paragraph-text"><i class="fa-solid fa-phone">Emerengency:   0141 272 9000</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-location-dot">Location:    50 Prospecthill Road Glasgow G42 9LB</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Email:   info@weelearners.ac.uk</i></p>
          <p class="paragraph-text"><i class="fa-solid fa-envelope">Working Hours:    Mon-Sat 09:00-20:00 Sunday emergency only.</i></p>
    </div>
</section>

<script src="assets/js/script.js"></script>
<?php include '../../includes/footer.php'; ?>
