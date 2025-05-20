<?php
include 'config/config.php';
include 'includes/header.php';

$search = $_POST['search'] ?? '';
$searchResults = "%" . $search . "%";

// Bringing In Photo Details
$photo = $conn->prepare("SELECT id, albName, albDescription, release_date, image FROM photo WHERE albName LIKE ? OR albDescription LIKE ?");
$photo->bind_param("ss", $searchResults, $searchResults);
$photo->execute();
$photo->store_result();
$photo->bind_result($pID, $pName, $pDesc, $pRelease, $pImage);

// Bringing In Video Details
$videos = $conn->prepare("SELECT id, title, description, release_date, image FROM videos WHERE title LIKE ? OR description LIKE ?");
$videos->bind_param("ss", $searchResults, $searchResults);
$videos->execute();
$videos->store_result();
$videos->bind_result($vID, $vTitle, $vDesc, $vRelease, $vImage);

// Bringing In Badge Details
$badge = $conn->prepare("SELECT id, badge_name, description, badge_img FROM badge WHERE badge_name LIKE ? OR description LIKE ?");
$badge->bind_param("ss", $searchResults, $searchResults);
$badge->execute();
$badge->store_result();
$badge->bind_result($bID, $bName, $bDesc, $bImage);

$testimonals = $conn->prepare("SELECT id, testimonals_name, description, fk_user_id FROM testimonals WHERE testimonals_name LIKE ? OR description LIKE ?");
$testimonals->bind_param("ss", $searchResults, $searchResults);
$testimonals->execute();
$testimonals->store_result();
$testimonals->bind_result($tID, $tName, $tDesc, $tUserID);
?>
<section class="section-banner">
  <h1 class="h1-heading-center">Search Results</h1>
  <p class="paragraph-text">
    Welcome to the search results page. Here you can find all the results related to your search query. Our search engine scans through multiple categories including photos, videos, badges, and testimonials to provide you with the most relevant information based on your input. Whether you are looking for a specific album, an inspiring video, a badge to earn, or testimonials from our valued users, all matching results will be displayed below. To refine your search, simply enter a new keyword in the search bar and submit again. The results are dynamically updated to ensure you always have access to the latest and most accurate information available on our platform. Each result includes a brief description and an image (where available), along with a link for more detailed information. If you have any questions or need further assistance, please feel free to contact us using the details at the bottom of this page. Thank you for using our search feature. We are committed to helping you find exactly what you are looking for and making your experience as smooth and informative as possible. Please scroll down to view your search results. If you do not find what you are looking for, try using different keywords, or check back later as our content is regularly updated.
  </p>
</section> 

    <section>
    <?php
    // Display Photo Results
    while ($photo->fetch()) : ?>
        <div>
            <h2 class="main-heading">Photo: <?= htmlspecialchars($pName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $pImage ?? '') ?>" alt="Photo Image">
            <h2 class="main-heading"><?= htmlspecialchars($pDesc ?? '') ?></h2>
            <span><?= htmlspecialchars($pRelease ?? '') ?></span>
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?aid=<?= htmlspecialchars($pID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; ?>
    </section>

    <section>
    <?php
    // Display Video Results
    while ($videos->fetch()) : ?>
        <div>
            <h2 class="main-heading">Video: <?= htmlspecialchars($vTitle ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $vImage ?? '') ?>" alt="Video Image">
            <h2 class="main-heading"><?= htmlspecialchars($vDesc ?? '') ?></h2>
            <span><?= htmlspecialchars($vRelease ?? '') ?></span>
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?vid=<?= htmlspecialchars($vID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; ?>
    </section>
    
    <section>
    <?php
    // Display Badge Results
    while ($badge->fetch()) : ?>
        <div>
            <h2 class="main-heading">Badge: <?= htmlspecialchars($bName ?? '') ?></h2>
            <img src="<?= htmlspecialchars(ROOT_DIR . 'assets/images/' . $bImage ?? '') ?>" alt="Badge Image">
            <p><?= htmlspecialchars($bDesc ?? '') ?></p>
            <a href="<?= ROOT_DIR ?>public/moreinfo.php?bid=<?= htmlspecialchars($bID ?? '') ?>">More Information</a>
        </div>
    <?php endwhile; ?>
    </section>
    
    <section>
    <?php 
    // Display testimonials
    while ($testimonals->fetch()) : ?>
        <div>
            <h2 class="main-heading"><?= htmlspecialchars($tName ?? '') ?></h2>
            <p><?= htmlspecialchars($tDesc ?? '') ?></p>
            <a href="<?= htmlspecialchars(ROOT_DIR . 'public/moreinfo.php?tid=' . $tID ?? '') ?>">More Information</a>
        </div>
        <?php endwhile ?>
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


    
  <?php include 'includes/footer.php'; ?>