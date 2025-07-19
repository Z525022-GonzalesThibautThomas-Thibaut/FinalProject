<?php
session_start();
require_once('database.php');
$tours = $db->query("SELECT * from tour_list")->fetchAll();
$city = $_GET['city'] ?? '';

if (!empty($city)) {
    $stmt = $db->prepare("SELECT * FROM tour_list WHERE city = ?");
    $stmt->execute([$city]);
    $tours = $stmt->fetchAll();
} 
else {
    $tours = $db->query("SELECT * FROM tour_list")->fetchAll();
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="icons/logo.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
        <link rel="stylesheet" href="styles/overall.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/navbar.css">
        <link rel="stylesheet" href="styles/home.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
        <script src="scripts/overall.js" defer></script>
        <script src="scripts/home.js" defer></script>
        <title>JapanTour</title>
    </head>
    <body>
        <nav class="navbar">
            <a class="navbar-logo" href="index.php">
                <img src="icons/logo.png" alt="Logo de JapanTour">
            </a>
            
            <form class="navbar-search-bar" action="search.php" method="get">
                <div class="select-city">
                    <label for="city">City</label>
                    <select name="city" id="city">
                    <option value="" disabled <?= empty($city) ? 'selected' : '' ?> hidden>Choose your city to explore...</option>
                    <option value="tokyo" <?= $city == 'tokyo' ? 'selected' : '' ?>>Tokyo</option>
                    <option value="osaka" <?= $city == 'osaka' ? 'selected' : '' ?>>Osaka</option>
                    <option value="kyoto" <?= $city == 'kyoto' ? 'selected' : '' ?>>Kyoto</option>
                    <option value="hokkaido" <?= $city == 'hokkaido' ? 'selected' : '' ?>>Hokkaido</option>
                    <option value="okinawa" <?= $city == 'okinawa' ? 'selected' : '' ?>>Okinawa</option>

                    </select>
                </div>
                <hr>
                <div class="select-date">
                    <label for="date">Date</label>
                    <input type="text" id="date" name="date" placeholder="When?">
                </div>
                <hr>
                <div class="select-guest">
                    <label for="guests">Guests</label>
                    <input type="number" name="guests" id="guests" min="1" placeholder="Who?">
                </div>
              
                <button type="submit"><img src="icons/magnifying-glass-svgrepo-com.png" alt="Search icon"></button>
            </form>
            <div class="user-options">
                <?php if(isset($_SESSION['user_id'])):?>
                    <div class="log-in">
                        <img src="icons/user.png" alt="User icon">
                        <?php echo $_SESSION['username'];?>
                    </div>
                    <div class="dropdown-menu">
                        <button id="dropdown-button"><img src="icons/menu.png" alt="Menu icon"></button>
                        <div id="dropdown-content" class="dropdown-content">
                        <a href="logout.php">Log out</a>
                        <a href="reservations.php">My reservations</a>
                        <a href="wallet.php">My wallet</a>
                        <a href="delete_account.php"
                        onclick="return confirm('Are you sure you want to delete your account? This action is irreversible.');">
                        Delete my account
                        </a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php">
                        <div class="log-in">
                            <img src="icons/user.png" alt="User icon">
                            Log in
                        </div>
                    </a>
                <?php endif; ?>
            </div>
        </nav>

        <main>
            <div class="home-header">
                <h1>Discover the heart of the city!</h1>
                <p>
                    Uncover hidden gems and iconic sights with our friendly, knowledgeable guides.
                </p>
            </div>

            <div class="city-tours">
                <h2>Plan your next visit...</h2>
                <p>Choose from dozens of city tours!</p>
                <div class="city-tours-cards">
                    <div class="city-tours-cards-track">
                        <?php
                            $tour_sets = array_chunk($tours,3);
                            foreach($tour_sets as $set):
                        ?>
                        <div class="city-tours-cards-set">
                            <?php foreach($set as $tour):?>
                                <a href="tour.php?tour_id=<?=$tour['tour_id']?>">
                                    <div class="city-tour-card">
                                        <img src="<?=$tour['image_url']?>" alt="<?=$tour['tour_name']?> image">
                                        <h3><?=$tour['tour_name']?></h3>
                                        <div class="city">
                                            <div class="city-icon">
                                                <img src="icons/city-svgrepo-com.png" alt="city icon">
                                            </div>
                                            <?=$tour['city']?>
                                        </div>
                                        <div class="price">
                                            ¥<?=number_format($tour['price_yen'],0,'',' ') ?>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                    <div class="cards-nav">
                        <button class="prev">
                            <img src="icons/previous.png">
                        </button>
                        <span class="indicator">1 / 3</span>
                        <button class="next">
                            <img src="icons/next.png">
                        </button>
                    </div>
            </div>

            <div class="informations">
                <div class="information">
                    <img src="icons/city1.png" alt="illustration of city">
                    Explore iconic monuments
                </div>
                <div class="information">
                    <img src="icons/city2.png" alt="illustration of city">
                    Discover hidden lovely spots
                </div>
                <div class="information">
                    <img src="icons/city3.png" alt="illustration of city">
                    Let our guides lead the way
                </div>
            </div>
        </main>

        <footer>
            © 2025 Japan Tour. All rights reserved.
            <br>
            Tours, images, and content may not be reproduced without permission.
            <img src="icons/logo.png">
        </footer>


        
    </body>
</html>