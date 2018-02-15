<?php 
require_once 'header.php';
$userId = $_GET['user'];
$Uid = $_SESSION['user_id'];

showUserPage($userId);
?>






<?php

 

if (isset($_SESSION['user_id'])){
    echo "
        <div class='row'>
<div class='col-md-4'></div>
<div style='margin-top: 25px;' class='col-md-4'>
    <form method='post' action='userpage.php?user=$userId' >
  <b>Deja un Comentario:</b>  

<br>
<textarea maxlength='250' rows='4' cols='80' name='comment' >
</textarea>
<input type='submit' value='Comentar'>    
</form>
</div>
<div class='col-md-4'></div>
</div>
    ";
}

if (isset($_POST['comment'])){
    if ($_POST['comment'] == '') {
        echo 'Vacio';
    } else {
        $comment = $_POST['comment'];
        querySQL("INSERT INTO comments(from_id, to_id, comment) VALUES($Uid, $userId, '$comment')");
        echo "<script>window.location='userpage.php?user=$userId'</script>";
    }
}

require_once 'footer.php';
?>

    