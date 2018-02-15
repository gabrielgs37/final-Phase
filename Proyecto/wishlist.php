<?php
require_once 'header.php';

$user_id = $_GET['user'];
showWishlist($user_id);

require_once 'footer.php';
?>