<?php
session_start();
require_once('database.php');
$success_message = "";
$error ="";
if(isset($_SESSION['success_message'])){
    $success_message = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $statement = $db->prepare("SELECT * FROM user where email =?");
    $statement->execute([$email]);
    $user = $statement->fetch();
    if($user && password_verify($password,$user['password'])){
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit();
    }
    else{
        echo "<p style='color: red;'>Wrong email or password!</p>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="icons/logo.png">
        <link rel="stylesheet" href="styles/overall.css">
        <link rel="stylesheet" href="styles/login.css">
        <title>JapanTour</title>
    </head>

    <body>
        <img src="icons/logo.png" alt="logo">
        <div class="login">
            <div class="before">
                <h1>Sign in</h1>
                <hr>
                Don't have an account yet? Create an account <a href="register.php">here</a>
            </div>
            <form action="#" method="POST">
                <?php if(!empty($success_message)): ?>
                        <p style="color: green;"><?php echo ($success_message);?></p>
                <?php endif; ?>
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <button type="submit">Log in</button>
              </form>
              
        </div>
    </body>
</html>