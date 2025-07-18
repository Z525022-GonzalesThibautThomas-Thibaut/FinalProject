<?php
session_start();
require_once('database.php');
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
            
            <form class="navbar-search-bar" action="#" method="get">
                <div class="select-city">
                    <label for="city">City</label>
                    <select name="city" id="city">
                    <option value="" disabled selected hidden>Choose your city to explore...</option>
                    <option value="tokyo">Tokyo</option>
                    <option value="osaka">Osaka</option>
                    <option value="kyoto">Kyoto</option>
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
                        <div class="city-tours-cards-set">
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/asakusa.jpg" alt="asakusa image">
                                    <h3>Asakusa & Skytree</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Tokyo
                                    </div>
                                    <div class="price">
                                        ¥23 000
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/bamboo_kyoto.jpg" alt="bamboo kyoto image">
                                    <h3>Arashiyama bamboo forest</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Kyoto
                                    </div>
                                    <div class="price">
                                        ¥40 000
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/osaka.jpg" alt="osaka castle image">
                                    <h3>Osaka Castle & Park</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Osaka
                                    </div>
                                    <div class="price">
                                        ¥6 000
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="city-tours-cards-set">
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/asakusa.jpg" alt="asakusa image">
                                    <h3>Asakusa & Skytree</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Tokyo
                                    </div>
                                    <div class="price">
                                        ¥23 000
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/asakusa.jpg" alt="asakusa image">
                                    <h3>Asakusa & Skytree</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Tokyo
                                    </div>
                                    <div class="price">
                                        ¥23 000
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/osaka.jpg" alt="osaka castle image">
                                    <h3>Osaka Castle & Park</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Osaka
                                    </div>
                                    <div class="price">
                                        ¥6 000
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="city-tours-cards-set">
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/asakusa.jpg" alt="asakusa image">
                                    <h3>Asakusa & Skytree</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Tokyo
                                    </div>
                                    <div class="price">
                                        ¥23 000
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/bamboo_kyoto.jpg" alt="bamboo kyoto image">
                                    <h3>Arashiyama bamboo forest</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Kyoto
                                    </div>
                                    <div class="price">
                                        ¥40 000
                                    </div>
                                </div>
                            </a>
                            <a href="#">
                                <div class="city-tour-card">
                                    <img src="images/asakusa.jpg" alt="asakusa image">
                                    <h3>Asakusa & Skytree</h3>
                                    <div class="city">
                                        <div class="city-icon">
                                            <img src="icons/city-svgrepo-com.png" alt="city icon">
                                        </div>
                                        Tokyo
                                    </div>
                                    <div class="price">
                                        ¥23 000
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
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