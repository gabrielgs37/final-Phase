<?php

require 'header.php';

$idJuego = $_GET['game'];
showGamePage($idJuego);

require_once 'footer.php';

?>