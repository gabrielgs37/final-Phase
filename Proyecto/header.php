<?php 
    require_once 'user.php';
    require_once 'db.php';
    $logout = '';
    if (isset($_SESSION['username'])){
            $strUser = "( {$_SESSION['username']} )";
            $logout = "<a style='text-decoration: none; color: black;' href='logout.php'><b>Logout</b></a>";
            } else {
                $strUser = "<a style='text-decoration: none; color: white;' href='login.php'>Acceder/Registrarse</a>";
                
                }
                $userId = $_SESSION['user_id'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="https://v40.pingendo.com/assets/bootstrap/bootstrap-4.0.0-beta.1.css" type="text/css">
  <link rel='stylesheet' href='style.css'>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-danger">
    <div class="container">
      <a class='navbar-brand' href='index.php'><img src='logo.png' height='80px' width='280px'></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Inicio</a>
          </li>
          
          <li class="nav-item">
            <a href='chat.php' class="nav-link" >Chat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="wishlist.php?user=<?php echo $userId; ?>">Wishlist</a>
          </li>
        </ul>
        <form method='get' action='search.php' class="form-inline m-0">
          <input name='search' class="form-control mr-2" type="text" placeholder="Buscar">
          <button class="btn btn-dark" type="submit">Search</button>
        </form>         
        
        
        <?php
        echo "<span class='text-white' style='padding-left: 20px'><a style='color: white; text-decoration: none;' href='userpage.php?user=$userId'>$strUser</a></span> ";
        echo "<span class='text-white' style='padding-left: 20px'>$logout</span> ";
        ?>
    </div>
    </div>
  </nav>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>