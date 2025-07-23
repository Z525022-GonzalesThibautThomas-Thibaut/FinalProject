<?php 
session_start();
require_once('database.php');
require('nav_bar.php');
$user_id = $_SESSION['user_id'];
$query = "
    SELECT r.*, t.tour_name AS tour_name, t.description, t.image_url, t.city
    FROM reservation r
    JOIN tour_list t ON r.tour_id = t.tour_id
    WHERE r.user_id = ?
    ORDER BY r.reservation_date ASC
";
$statement = $db->prepare($query);
$statement->execute([$user_id]);
$reservations = $statement->fetchAll(PDO::FETCH_ASSOC);

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
        <link rel="stylesheet" href="styles/reservations.css">
        <script src="https://cdn.jsdelivr.net/npm/flatpickr" defer></script>
        <script src="scripts/overall.js" defer></script>
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
            <h1>
                <?php if (empty($reservations)): ?>
                    You have no upcoming reservations...
                <?php else: ?>
                    My upcoming city tours...
                <?php endif;?>
            </h1>
            <div class="cards">
                
                    <?php foreach ($reservations as $reservation): ?>
                        <div class="card">
                            <div class="image" style ="background-image: url('images/<?=$reservation['image_url']?>');"></div>
                                <div class="informations">
                                    <h2><?php echo $reservation['tour_name']?></h2>
                                    <div class="tour-city">
                                        <div class="city-icon"><img src="icons/city-svgrepo-com.png" alt="city icon"></div>
                                        <?php echo $reservation['city']?>
                                    </div>
                                    <div class="tour-guests">
                                        <div class="guests-icon"><img src="icons/people.png" alt="guests icon"></div>
                                        <?php echo (int)$reservation['number_of_guests']?> Guests
                                    </div>
                                    <div class="tour-date">
                                        <div class="date-icon"><img src="icons/clock.png" alt="clock icon"></div>
                                        <?php 
                                            $date = new DateTime($reservation['reservation_date']);
                                            echo $date->format('y/m/d');
                                        ?>
                                    </div>
                                    <div class="links">
                                        <a href="tour.php?tour_id=<?= $reservation['tour_id'] ?>">
                                            <div class="tour-page">City Tour Page</div>
                                        </a>
                                        <a href="cancel_reservation.php?reservation_id=<?php echo $reservation['reservation_id'];?>"
                                        onclick = "return confirm('Are you sure you want to cancel this reservation ?');" >
                                            <div class="tour-cancel">Cancel</div>
                                        </a>
                                    </div>
                                </div>
                        </div>
                    <?php endforeach;?>
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