<?php
$dbHostname = 'localhost';
    $dbDatabase = 'gabriel_gonzalez2';
    $dbUsername = 'ga.gonzalez2';
    $dbPassword = '2937';

$db = new PDO("mysql:host=$dbHostname;dbname=$dbDatabase;charset=utf8", $dbUsername, $dbPassword);

function getResultFromSQL($sql, $values = []) {
    global $db;
    
    $stmt = $db->prepare($sql);
    $stmt->execute($values);
    
    return $stmt->fetchAll();
}

function querySQL($sql){
    global $db;
    
    $stmt = $db->prepare($sql);
    $stmt->execute();
}

function insertUser($sql){
    global $db;
    
    $stmt = $db->prepare($sql); 
    $stmt->execute(); 
}




function showWishlist($user_id){
    
    $result0 = getResultFromSQL("SELECT * FROM members WHERE id = ?", [$user_id]);
    $memberName = $result0[0]['username'];
    
    $result = getResultFromSQL("SELECT * FROM wishlist WHERE user_id = ?", [$user_id]);
    //$result = $result[0];
        $num = count($result);
        
        if ($num == 0) {
             echo "<div style='margin-top: 250px'><p><h1 style='text-align: center;'>Wishlist Vacio</h1><br><h3 style='text-align: center;'>
             Este usuario no ha agregado juegos a su wishlist o no esta registrado.</h3></p></div>"; 
            
        } else {
        
        
        echo "<div class='row'>
        <div class='col-md-4'>
        </div>
        <div style='' class='col-md-4'>
        <h2 style='text-align: center; background-color: black; color: white; margin-top: 50px; margin-bottom: 15px; padding: 5px; '>Wishlist de $memberName</h2>
        <a href='userpage.php?user=$user_id'><h4><- Pagina De Usuario</h4></a>
        </div>
        <div class='col-md-4'>
        </div>
        </div>";
        
        
        for ($i=0; $i < $num; $i++){
            $result2 = $result[$i];
            $wishlistId = $result2['wishlist_id'];
            
            $game = $result2['game_id'];
            
            $result3 = getResultFromSQL('SELECT * FROM games WHERE game_id = ?', [$game]);
            $result3 = $result3[0];
            $gameTitle =  $result3['game_title'];
            $gameDescription = $result3['game_desc'];
            $gameImage = $result3['game_image'];
            $gamePrice = $result3['game_price'];
            $console = strtoupper($result3['console']);           
            
            
            
            echo "           
            <div class='row'>
            <div class='col-md-4'>
            </div>
            <div style='border: 1px solid #b2b5ba; margin: 1px; background-color: #87b3bc; padding: 5px;' class='col-md-4'>
            <img style='float: left; margin-right: 10px' src='$gameImage' width='100px' height='120px'>
            <p><h4><a style='color: white;' href='productos.php?game=$game'>$gameTitle</a></h4><span style='color: #555759; margin-right: 50px'><b>Console: $console</b>
            </span><b>Price: $$gamePrice&nbsp;&nbsp;&nbsp;&nbsp;</b>";
            
            if($user_id == $_SESSION['user_id']){
                echo "<a href='removefromwishlist.php?game=$wishlistId'>Eliminar del Wishlist</a> </p>";
                }
                
            echo "</div>
            <div class='col-md-4'>
            </div>
            </div>
                
                ";
            
            
        }} }
        
        
        
        
function showUserPage($user_id){
    
    $result0 = getResultFromSQL("SELECT * FROM members WHERE id = ?", [$user_id]);
    $result = $result0[0];
    $username = $result['username'];
    $firstname = ucfirst($result['firstname']);
    $lastname = ucfirst($result['lastname']);
    $pueblo = $result['address'];
    $letra = strtoupper($username[0]);
    $id = $result['id'];
    $pueblo = ucfirst($pueblo);
    
    
        
    
   echo "<div class='row'>
        <div class='col-md-4'>
        </div>
        <div style='margin-top: 50px; margin-bottom: 15px;' class='col-md-4'>
        <h2 style='text-align: center; '>Userpage de $username</h2>
        </div>
        <div class='col-md-4'>
        </div>
        </div>


<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4' style='background-color: pink; margin-bottom: 5px; '>
   
   <div class='row'>
   <div class='bg-dark col-md-3'>
    <p style='color: white; margin: 20px;  float: left; background-color: #5c8e29; width: 80px; height: 80px; font-size: 50px; text-align: center; border-radius: 50%'>$letra</p>
    
   </div>
   <div style='color: white; padding: 10px;' class='bg-dark col-md-6'>
   <h4>Username: $username</h4>
   <h4>Nombre: $firstname $lastname</h4>
   <h4>Pueblo: $pueblo</h4>
   </div>
   
   <div style='padding: 10px;' class='bg-danger col-md-3'>
    
    <p style='margin-top: 30px; margin-left: 20px; '><a style='color: white;' href='wishlist.php?user=$id'><h5>Ver Wishlist</h5></a></p>
    
   </div>
   
   
   </div> 
</div>
<div class='col-md-4'></div>
</div>
<br>
<h3 style='text-align: center;'>Comentarios:</h3>"; 
            
     $result2 = getResultFromSQL("SELECT * FROM comments WHERE to_id = ?", [$user_id]);
     $num = count($result2);
     
     for ($i = 0; $i < $num; $i++){
        $result3 = $result2[$i];
        $fromId = $result3['from_id'];
        $comment = $result3['comment'];
        
        $result4 = getResultFromSQL("SELECT * FROM members WHERE id = ?", [$fromId]);
        $name = $result4[0]['username'];
        $letra1 = strtoupper($name[0]);
        
        echo "
        <!-- Mensaje De usuario *******************************-->
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4' style='background-color: #cdd2d8; border-bottom: 1px solid black; '>
    <div class='row'>
        <div class='col-md-3'>
           <b>&nbsp;&nbsp;&nbsp;<a href='userpage.php?user=$fromId'>$name</a>:</b><br>
           <p style='color: white; margin: 20px;  float: left; background-color:";  if($fromId == $user_id){echo "#5c8e29";} else {echo "black";} echo "; width: 80px; height: 80px; font-size: 50px; text-align: center; border-radius: 50%'>$letra1</p> 
        </div>
        <div class='col-md-9'>
            <p style='padding: 20px'> $comment</p>
        </div>
    </div>
    
</div>
<div class='col-md-4'></div>
</div>
<!-- Mensaje De usuario *******************************-->
        ";
        
        
     }
     
     
        
}
function showGame($id){
        $result = getResultFromSQL('SELECT * FROM games WHERE game_id = ?', [$id]);
        
        if (count($result) == 0) {
            return null;
        }
        
        $result = $result[0];
                
        $gameId = $result['game_id'];
        $gameTitle = $result['game_title'];
        $gamePrice = $result['game_price'];
        $gameDesc = $result['game_desc'];
        $gameImage = $result['game_image'];
        $console = $result['console'];
        
                
        
        echo "
        <div class='col-md-3'>
          <a href='productos.php?game=$gameId'>
            <div style='border:1px solid #a1a4a8; padding: 5px'>
              <img src='$gameImage' height='270px' width='240px' style='margin-left: auto; margin-right:auto;' class='juego'> </div>
          </a>
        </div>
        
        ";
        
        }
        
function showGamePage(){
    
    $id = $_GET['game'];
    
    $result = getResultFromSQL('SELECT * FROM games WHERE game_id = ?', [$id]);
        
        if (count($result) == 0) {
            return null;
        }
        
        $result = $result[0];
        
        $gameId = $result['game_id'];
        $gameTitle = $result['game_title'];
        $gamePrice = $result['game_price'];
        $gameDesc = $result['game_desc'];
        $gameImage = $result['game_image'];
        $console = $result['console'];
    
    echo "<div class='py-5'>
    <div class='container'>
      <div class='row'>
        <div class='col-md-4' style='margin-bottom: 160px;'>
          <img src='$gameImage' height='400px' width='100%'> </div>
        <div class='col-md-8'>
          <h2> $gameTitle($console) </h2>
          <p class='descripcionJuego'> $gameDesc </p>
          <br>
          <br>
          <p>Price: <span><b>$$gamePrice</b></span></p>
          
          <a href='addtowishlist.php?game=$gameId' class='btn btn-outline-danger'>Anadir a Wishlist</a>
        </div>
      </div>
    </div>
  </div>";
}

function showChat(){
    $result = getResultFromSQL("SELECT * FROM chat ORDER BY chat_id DESC LIMIT 12",[] );
    $num = count($result);
    $result = array_reverse($result);
    
    echo "<br><br><h2 style='text-align:center;'>Chat</h2>";
    
    
    for($i=0; $i < $num; $i++){
        $comment = $result[$i]['message'];
        $userId = $result[$i]['user_id'];
        
        $result2 = getResultFromSQL("SELECT * FROM members WHERE id = ?", [$userId]);
        $name = $result2[0]['username'];
        
        echo "<div class='row'>
  
<div class='col-md-2'></div>
<div style='border-bottom: 1px solid white;' class='bg-danger col-md-1'><a style='color: black; text-decoration: none;' href='userpage.php?user=$userId'><b>$name</b></a></div>
<div style='border-bottom: 1px solid white;' class='bg-dark col-md-7'>
    <p style='color: white; text-decoration: none;'>$comment </p>
</div>
<div class='col-md-2'></div>
    
</div>";
        
        
        
    }
}

?>