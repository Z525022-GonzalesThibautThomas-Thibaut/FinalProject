<?php 
session_start();
require_once('database.php');
if($_SERVER['REQUEST_METHOD']==='POST'){
    $user_id =$_SESSION['user_id'];
    $tour_id = $_POST['tour_id'];
    $date = $_POST['date'];
    $guests = (int)$_POST['guests'];
    $unit_price= (int)$_POST['unit_price'];
    $total_price = $unit_price * $guests;
    $stmt = $db->prepare("SELECT balance FROM user WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();
    $balance =(int)$user['balance'];
    if ($balance < $total_price) {
        $_SESSION['error'] = " You don't have enough balance to make this reservation.";
        header("Location: tour.php?tour_id=" . $tour_id);
        exit();
    }
    $statement = $db->prepare("INSERT INTO reservation (tour_id, user_id, reservation_date, number_of_guests,total_price_yen)
                                VALUES(?,?,?,?,?)");
    $statement->execute([$tour_id,$user_id,$date,$guests,$total_price]);
    $statement = $db->prepare("UPDATE user SET balance = balance - ? WHERE user_id = ?");
    $statement->execute([$total_price, $user_id]);
    header("Location: reservations.php");
    exit();
}
?>
