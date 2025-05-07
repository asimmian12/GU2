<?php
include '../../config/config.php';
include '../../includes/header.php';
?>

<?php

// The function fetchFromApi is used to retrieve game data from the FreeToGame API

function fetchFromApi($url) {

    // The URL is hardcoded to fetch PC games data from the API

    $url = "https://www.freetogame.com/api/games?platform=pc";

    // The file_get_contents function is used to send a GET request to the API and fetch the response
   
    $response = file_get_contents($url);

    // The JSON response is decoded into an associative array and returned

    return json_decode($response, true);
}

  // The URL is hardcoded to fetch PC games data from the API
  $url = "https://www.freetogame.com/api/games?platform=pc";
  // The fetchFromApi function is called to get the games data and store it in the $games variable
  $games = fetchFromApi($url);



?>

    <h1 class="h2-secondary-colour">Games</h1>
    
    <?php
    shuffle($games);
    $games = array_slice($games, 0, 3);
    ?>

    <section>
        <?php foreach ($games as $game): ?>
            <div>
                <h2 class="main-heading"><?= htmlspecialchars($game['title'] ?? 'No Game Name available') ?></h2>
                <img src="<?= htmlspecialchars($game['thumbnail'] ?? 'No Image Available') ?>"></img>
                <p><?= htmlspecialchars($game['short_description'] ?? 'No description available.') ?></p>
                <a href="<?= htmlspecialchars($game['game_url'] ?? ' No Game URL available') ?>">Play Game</a>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>

<?php
include '../../includes/footer.php';
?>