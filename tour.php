<?php 
session_start();
require_once('database.php');
$tour_id = $_GET['tour_id'];
$statement = $db->prepare("SELECT * FROM tour_list WHERE tour_id = ?");
$statement->execute([$tour_id]);
$tour = $statement->fetch();
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
        <link rel="stylesheet" href="styles/navbar.css">
        <link rel="stylesheet" href="styles/footer.css">
        <link rel="stylesheet" href="styles/tour.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
        <script src="scripts/overall.js" defer></script>
        <script src="scripts/tour.js" defer></script>
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
            <div class="tour-header" style ="background-image: url('<?=$tour['image_url']?>');"></div>

            <div class="informations-reservation">
                <div class="informations">
                    <h1><?= $tour['tour_name']?></h1>
                    <div class="city">
                        <div class="city-icon">
                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                        </div>
                        <?= $tour['city']?>
                    </div>
                    <div class="people">
                        <div class="people-icon">
                            <img src="icons/people.png" alt="people icon">
                        </div>
                        Maximum <?= $tour['available_seats']?> people
                    </div>
                    
                </div>
                <div class="reservation">
                    <div class="unit-price">
                        ¥<?=number_format($tour['price_yen'],0,'',' ') ?>
                        <span class="little">per guest</span>
                    </div>
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="message-area" style="color: red; font-weight: bold; margin-bottom: 10px;">
                            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <form class="reservation-bar" action="reserve.php" method="post">
                        <input type ="hidden" name ="tour_id" value ="<?= $tour['tour_id']?>">
                        <input type ="hidden" name ="unit_price" value ="<?= $tour['price_yen']?>">
                        <div class="date">
                            <label for="tour-date">Date</label>
                            <input type="text" id="tour-date" name="date" placeholder="When?" required>
                        </div>
                        <hr>
                        <div class="guest">
                            <label for="tour-guests">Guests</label>
                            <input type="number" name="guests" id="tour-guests" min="1" placeholder="Who?" required>
                        </div>
                        <div class="total-price">
                        <span class="price-label">Price</span>
                        <span class="calculated-price" id="price_display">¥0</span>
                    </div>
                        <button type="submit">Book</button>
                    
                    
                </form>
                    
                </div>
            </div>

            <div class="description-warning">
                <div class="description">
                    <h3>Description</h3>
                    <p><?= $tour['description']?>
                    </p>
                </div>
                <div class="warning">
                    <img src="icons/cancel.png">
                    <p>Free cancellation up to 48 hours before the tour</p>
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
