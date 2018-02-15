<?php 
require_once 'header.php';
?>
  
  <div class="py-5">
    <div class="container">
      <h4 style="background-color: #202d42; color: white; height: 40px; " class=""> PS4 </h4>
      <div class="row" style="margin-bottom: 10px; background-color:white; padding-bottom: 20px;">
                
        <?php 
            showGame(9);
            showGame(10);
            showGame(11);
            showGame(12);
        ?>
        
        </div>
      <div class="row" style="margin-bottom: 10px; background-color:white; padding-bottom: 25px;">
      
      <?php 
            showGame(13);
            showGame(1);
            showGame(8);
            showGame(6);
            
        ?>
        
      </div>
    </div>
  </div>
  



<?php 
    require_once 'footer.php';
?>