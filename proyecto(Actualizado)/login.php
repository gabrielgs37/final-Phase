<?php 
    require_once 'header.php';
    require_once 'db.php';
    
    
?>

<div class='row'>
<div class='col-md-4'>
</div>
<div style='margin-top:50px; margin-bottom:150px;' class='col-md-4'>
<h3 style='text-align: center; margin-bottom: 50px; ' >Llena los blancos para acceder</h3>
    <form method='post' enctype='multipart/form-data'>
    
      
      
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name='user' aria-describedby="emailHelp" placeholder="Enter Username">        
      </div>
      
       <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name='pass' placeholder="Enter Password">
      </div>
      
      
      <button type="submit" class="btn btn-primary">Login</button>
      
    </form><br>
    <?php
    $error = "";
    echo "<p style='text-align: center; margin-bottom: 20px;' >$error</p>"
    ?>
    
   
    
<?php 
global $db;


if(isset($_POST['user'])){
   $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    if ($user == "" || $pass == ""){
      echo "<p style='text-align: center; margin-bottom: 20px;' >Not all fields were entered</p>"; 
      } else {
        $loggedUser = User::loadFromUsername($user);
        if($loggedUser == null ){
            echo "<p style='text-align: center; margin-bottom: 20px;' >Usuario/Password Invalido</p>";
            } else {
                $_SESSION['username'] = $loggedUser->username;
                $_SESSION['password'] = $loggedUser->password;
                $_SESSION['user_id'] = $loggedUser->id;
                
                header('Location: index.php');
                
                }
        }
}    
    
?>
    
<p style='text-align: center; margin-bottom: 150px;' ><a href='register.php'><b>No tienes cuenta? Registrate aqui</b></a></p>    
    
</div>
<div class='col-md-4'>
</div>

</div>

<?php
    require_once 'footer.php';
?>