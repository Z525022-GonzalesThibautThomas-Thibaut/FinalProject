<?php
function sanitize_input($data){
    return htmlspecialchars((stripslashes(trim($data))));
}
    $city = sanitize_input($_GET['city'] ?? '');
    $date = sanitize_input($_GET['date'] ?? '');
    $guests = sanitize_input($_GET['guests'] ?? '');

    if (!empty($city) && !empty($date) && !empty($guests)) {
        $stmt = $db->prepare("SELECT tl.*
                                    FROM tour_list tl
                                    LEFT JOIN (
                                        SELECT tour_id, SUM(number_of_guests) AS reserved_guests
                                        FROM reservation
                                        WHERE reservation_date = ?
                                        GROUP BY tour_id
                                    ) r ON tl.tour_id = r.tour_id
                                    WHERE ((tl.available_seats - IFNULL(r.reserved_guests, 0)) >= ? AND tl.city = ?)");
        $stmt->execute([$date, $guests, $city]);
        $tours = $stmt->fetchAll();
    } 
    else if(!empty($city) && empty($date) && !empty($guests)){
        $stmt = $db->prepare("SELECT tl.*
                                    FROM tour_list tl
                                    WHERE ((tl.available_seats) >= ? AND tl.city = ?)");
        $stmt->execute([$guests, $city]);
        $tours = $stmt->fetchAll();
    }
    else if(!empty($city) && !empty($date) && empty($guests)){
        $stmt = $db->prepare("SELECT tl.*
                                    FROM tour_list tl
                                    LEFT JOIN (
                                        SELECT tour_id, SUM(number_of_guests) AS reserved_guests
                                        FROM reservation
                                        WHERE reservation_date = ?
                                        GROUP BY tour_id
                                    ) r ON tl.tour_id = r.tour_id
                                    WHERE ((tl.available_seats - IFNULL(r.reserved_guests, 0)) >= 1 AND tl.city = ?)");
        $stmt->execute([$date, $city]);
        $tours = $stmt->fetchAll();
    }
    else if(!empty($city) && empty($date) && empty($guests)){
        $stmt = $db->prepare("SELECT * FROM tour_list WHERE city = ?");
        $stmt->execute([$city]);
        $tours = $stmt->fetchAll();
    }
    else if(empty($city) && !empty($date) && !empty($guests)){
        $stmt = $db->prepare("SELECT tl.*
                                    FROM tour_list tl
                                    LEFT JOIN (
                                        SELECT tour_id, SUM(number_of_guests) AS reserved_guests
                                        FROM reservation
                                        WHERE reservation_date = ?
                                        GROUP BY tour_id
                                    ) r ON tl.tour_id = r.tour_id
                                    WHERE (tl.available_seats - IFNULL(r.reserved_guests, 0)) >= ?");
        $stmt->execute([$date, $guests]);
        $tours = $stmt->fetchAll();
    }
    else if(empty($city) && empty($date) && !empty($guests)){
        $stmt = $db->prepare("SELECT tl.*
                                    FROM tour_list tl
                                    WHERE (tl.available_seats) >= ?");
        $stmt->execute([$guests]);
        $tours = $stmt->fetchAll();
    }
    else if(empty($city) && !empty($date) && empty($guests)){
        $stmt = $db->prepare("SELECT tl.*
                                    FROM tour_list tl
                                    LEFT JOIN (
                                        SELECT tour_id, SUM(number_of_guests) AS reserved_guests
                                        FROM reservation
                                        WHERE reservation_date = ?
                                        GROUP BY tour_id
                                    ) r ON tl.tour_id = r.tour_id
                                    WHERE (tl.available_seats - IFNULL(r.reserved_guests, 0)) >= 1");
        $stmt->execute([$date]);
        $tours = $stmt->fetchAll();
    }
    else {
        $tours = $db->query("SELECT * FROM tour_list")->fetchAll();
    }
?>