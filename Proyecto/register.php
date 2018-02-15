<?php 
    require_once 'header.php';
    require_once 'db.php';
?>

<div class='row'>
<div class='col-md-4'>
</div>
<div style='margin-top:50px; margin-bottom:150px;' class='col-md-4'>

<h3 style='text-align: center; margin-bottom: 50px; ' >Llena los Blancos para registrarte</h3>
    <form method='post' enctype='multipart/form-data'>
    
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name='email' aria-describedby="emailHelp" placeholder="Enter email">        
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">First Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name='firstname' aria-describedby="emailHelp" placeholder="Enter First Name">        
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Last Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name='lastname' aria-describedby="emailHelp" placeholder="Enter Last Name">        
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name='username' aria-describedby="emailHelp" placeholder="Enter Username">        
      </div>
      
       <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name='password' placeholder="Enter Password">
      </div>
      
      <div class="form-group">
        <label for="exampleInputEmail1">Pueblo</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name='address' aria-describedby="emailHelp" placeholder="Pueblo">        
      </div>
      
     
      
            
      <button type="submit" class="btn btn-primary">Submit</button>
    </form><br>
    
    
    
    
<?php 
global $db;

if(isset($_POST['username'])){
   $user = $_POST['username'];
    $pass = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    
    
    if ($user == "" || $pass == "" || $firstname == "" ||
     $lastname == "" || $email == "" || $address == "" ){
      echo "<p style='text-align: center; margin-bottom: 20px;' >Not all fields were entered</p>"; 
      } elseif (($loggedUser = User::loadFromUsername($user)) != null ){
            echo "<p style='text-align: center; margin-bottom: 20px;' >Usuario ya existe</p>";
            }else
        {
        insertUser("INSERT INTO members(firstname, lastname, username, password, email, address) 
        VALUES('$firstname', '$lastname', '$user', '$pass', '$email',  '$address')");
        echo "<script>window.location='login.php'</script>";
        
        
        
        }
}
    
?>
<p style='text-align: center; margin-bottom: 90px;' ><a href='login.php'><b>Ya tienes Cuenta? Accede aqui</b></a></p>
    
    
    
</div>
<div class='col-md-4'>
</div>

</div>

<?php
    require_once 'footer.php';
?>