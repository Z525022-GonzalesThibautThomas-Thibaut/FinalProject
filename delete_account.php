<?php
session_start();
require_once('database.php');
$user_id = $_SESSION['user_id'];
$statement = $db->prepare('DELETE FROM user WHERE user_id = ?');
$statement->execute([$user_id]);

session_unset();
session_destroy();
header('Location: index.php');
exit();
?>
