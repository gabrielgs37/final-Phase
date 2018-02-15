<?php
require_once 'header.php';
$search = $_GET['search'];
$result = getResultFromSQL("SELECT * FROM members WHERE username LIKE ? OR firstname LIKE ? OR lastname LIKE ? Or address LIKE ?", ["%$search%", "%$search%", "%$search%", "%$search%"]);
$num = count($result);

if ($num == 0){
    echo "<h1 style='text-align: center; margin-top: 250px; margin-bottom: 350px;'>No hay Resultados</h1>";
} else {
    echo "
<div class='row'>
<div class='col-md-4'></div>
<div class='col-md-4'><br>
    <h1 style='text-align: center'>Resultados de la busqueda:</h1>    
</div>
<div class='col-md-4'></div>     
</div><br><br>";
    
for ($i=0; $i < $num; $i++){
    $username = $result[$i]['username'];
    $firstname = ucfirst($result[$i]['firstname']);
    $lastname = ucfirst($result[$i]['lastname']);
    $pueblo = ucfirst($result[$i]['address']);
    $id = $result[$i]['id'];
    $letra = strtoupper($username[0]);
    
    echo "

<div class='row'>
<div class='col-md-4'></div>
<div style='background-color: gray; margin: 1px;' class='col-md-4'>
    <div class='row'></div>
    <a class='linkSearch' style='text-decoration: none; color: black;' href='userpage.php?user=$id'><div class='col-md-4'>
        <p style='color: white; margin: 20px;  float: left; background-color: black; width: 80px; height: 80px; font-size: 50px; text-align: center; border-radius: 50%'>$letra</p> 
    </div>
    <div class='col-md-8'>
    
   
    <h3><b>$username</b></h3>
    <h5><b>Nombre: $firstname $lastname</b></h4>
    <h5><b>Pueblo: $pueblo</b></h4>
    </div>
</div></a>
<div class='col-md-4'></div> 
    
</div>";
    
    
    
}
}
require_once 'footer.php';
?>
