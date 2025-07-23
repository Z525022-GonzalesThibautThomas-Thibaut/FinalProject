<?php
session_start();

require_once('database.php');
$email =  $firstname = $lastname = $username = $password = $confirm_password = "";
$errors = [];

function sanitize_input($data){
    return htmlspecialchars((stripslashes(trim($data))));
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = sanitize_input($_POST["email"]);
    $firstname = sanitize_input($_POST["firstname"]);
    $lastname = sanitize_input($_POST["lastname"]);
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);
    $confirm_password = sanitize_input($_POST["confirm_password"]);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors[] = "Invalid email.";
    }
    if($password != $confirm_password){
        $errors[] = "Password doesn't match.";
    }
    if(empty(($errors))){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username,first_name,last_name,email,password)
                  VALUES (:username,:firstname, :lastname, :email,:password)";
        $statement = $db->prepare($query);
        try{
            $statement->execute([
                ':username'=>$username,
                ':firstname'=>$firstname,
                ':lastname'=>$lastname,
                ':email'=>$email,
                ':password'=>$hashed_password
            ]);
            $_SESSION['success_message'] = "Registration successful";
            header("Location: login.php");
            exit();
        }
        catch(PDOException $e){
            echo "<p style='color: red;'>An account with that email is already existing, please log in!</p>";
        }
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
        <link rel="stylesheet" href="styles/register.css">
        <title>JapanTour</title>
    </head>

    <body>
        <img src="icons/logo.png" alt="logo">
        <div class="register">
            <div class="before">
                <h1>Create account</h1>
                <hr>
                Already have an account? Sign in <a href="login.php">here</a>
            </div>
            <?php if (!empty($errors)) : ?>
                <div class="errors">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <form action="register.php" method="POST">
                <div class="email">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
              
                <div class="name">
                    <div class="firstname">
                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" required>
                    </div>
                    <div class="lastname">
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" required>
                    </div>
                </div>

                <div class="username">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="confirm-password">
                    <label for="confirm-password">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm_password" required>
                </div>
                <button type="submit">Register</button>
              </form>
              
        </div>
        <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            const password = document.getElementById("password").value;
            const confirmPassword = document.getElementById("confirm-password").value;
            const passwordRegex = /^(?=.*[A-Z])(?=.*\d).{6,}$/;

            if (!passwordRegex.test(password)) {
                alert("Password must contain at least 6 characters, one uppercase letter, and one number.");
                e.preventDefault();
                return;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match.");
                e.preventDefault();
            }
        });
        </script>
    </body>
</html>