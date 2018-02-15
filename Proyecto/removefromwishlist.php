<?php
require_once 'db.php';
require_once 'user.php';

if (!isset($_SESSION['user_id'])){
    echo "<script>window.location='index.php'</script>";
} else {
    $userId = $_SESSION['user_id'];
    $wishlistId = $_GET['game'];
    querySQL("DELETE FROM wishlist WHERE wishlist_id = $wishlistId");
    
    echo "<script>window.location='wishlist.php?user=$userId'</script>";
}


?>