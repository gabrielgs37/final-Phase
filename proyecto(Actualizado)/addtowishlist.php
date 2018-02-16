<?php
require_once 'db.php';
require_once 'user.php';

if (!isset($_SESSION['user_id'])){
    echo "<script>window.location='login.php'</script>";
}
$gameId = $_GET['game'];
$userId = $_SESSION['user_id'];

//if (!isset($_SESSION['user_id'])){
//    echo "<script>window.location='index.php'</script>";
//}

$result = getResultFromSQL("SELECT * FROM wishlist WHERE user_id = ? AND game_id = ?", [$userId, $gameId]);
$num = count($result);

if ($num == 0){
    querySQL("INSERT INTO wishlist VALUES(null, $userId, $gameId )");
}


    
        echo "<script>window.location='wishlist.php?user=$userId'</script>";
    
    
    
    
    



?>