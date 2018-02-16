<?php
require_once 'header.php';
if (isset($SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    
}


showChat();
if (isset($_SESSION['user_id'])){
    echo "
        <div class='row'>
<div class='col-md-4'></div>
<div style='margin-top: 25px;' class='col-md-4'>
    <form method='post' action='chat.php' >
  <b>Escribele a los demas:</b>  

<br>
<textarea maxlength='120' rows='4' cols='80' name='chat' >
</textarea>
<input type='submit' value='Comentar'>    
</form>
</div>
<div class='col-md-4'></div>
</div>
    ";
}
if (isset($_POST['chat'])){
    if ($_POST['chat'] == '') {
        echo 'Vacio';
    } else {
        $comment = $_POST['chat'];
        querySQL("INSERT INTO chat(user_id, message) VALUES($userId, '$comment')");
        echo "<script>window.location='chat.php'</script>";
    }
}
require_once 'footer.php';
?>