<?php 
require_once 'header.php';
?>
  
  <div class="py-5">
    <div class="container">
      <h4 style="background-color: #202d42; color: white; height: 40px; " class=""> Switch </h4>
      <div class="row" style="margin-bottom: 10px; background-color:white; padding-bottom: 20px;">
                
        <?php 
            showGame(19);
            showGame(20);
            showGame(21);
            showGame(22);
        ?>
        
        </div>
      <div class="row" style="margin-bottom: 10px; background-color:white; padding-bottom: 25px;">
      
      <?php 
            showGame(23);
            showGame(4);
            
            
        ?>
        
      </div>
    </div>
  </div>
  



<?php 
    require_once 'footer.php';
?>