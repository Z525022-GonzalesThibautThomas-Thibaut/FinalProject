<?php 
session_start();
require_once('database.php');
function sanitize_input($data){
    return htmlspecialchars((stripslashes(trim($data))));
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $user_id =$_SESSION['user_id'];
    if($user_id == null){
        header("Location: login.php");
        exit();
    }
    $tour_id = sanitize_input($_POST['tour_id']);
    $date = sanitize_input($_POST['date']);
    $today = date('Y-m-d');
    if ($date < $today) {
        $_SESSION['error'] = "You can't make a reservation on a passed date.";
        header("Location: tour.php?tour_id=" . $tour_id);
        exit();
    }
    $guests = (int)sanitize_input($_POST['guests']);
    $unit_price= (int)sanitize_input($_POST['unit_price']);
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

    $stmtPlacesGlobal = $db->prepare("SELECT available_seats FROM tour_list WHERE tour_id = ?");
    $stmtPlacesGlobal->execute([$tour_id]);
    $PlacesGlobal = $stmtPlacesGlobal->fetch();
    $ValuePlacesGlobal = (int)$PlacesGlobal['available_seats'];

    $stmtPlacesTaken = $db->prepare("SELECT SUM(number_of_guests) AS taken_seats FROM reservation WHERE reservation_date = ?");
    $stmtPlacesTaken->execute([$date]);
    $PlacesTaken = $stmtPlacesTaken->fetch();
    $ValuePlacesTaken = (int)$PlacesTaken['taken_seats'] ?? 0;

    if ($ValuePlacesGlobal - $ValuePlacesTaken < $guests){
        $_SESSION['error'] = " There are not enough places left for this date...";
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
