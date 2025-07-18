<?php
session_start();
require_once('database.php');

$user_id = $_SESSION['user_id'];
if(isset($_GET['reservation_id'])){
    $reservation_id = (int) $_GET['reservation_id'];
    $statement = $db->prepare("SELECT * FROM reservation WHERE reservation_id = ? AND user_id = ?");
    $statement->execute([$reservation_id,$user_id]);
    if($statement->rowCount()===1){
        $statement = $db->prepare("DELETE FROM reservation WHERE reservation_id = ?");
        $statement->execute([$reservation_id]);
    }
}
header ("Location: reservations.php");
exit();