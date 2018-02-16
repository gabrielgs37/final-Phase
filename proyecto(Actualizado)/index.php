<?php 
require_once 'header.php';
?>
  <div class="">
    <div class="container">
      <div class="row" style="height:300px; margin: 25px 0 65px 0">
        <div class="col-md-4 h-50 consola" style="height:300px">
          <a style ='text-decoration: none;' class='consola' href='ps4.php'><img src="https://s.aolcdn.com/hss/storage/midas/9750d914c6bd7f7c99ca0a962fd0336a/204374529/anniversary-29-ed.jpg" height="300px" width="100%">
          <h3 class="consoleLabel"> PS4 </h3></a>
        </div>
        <div class="col-md-4 h-50 consola" style="height:300px">
          <a style ='text-decoration: none;' class='consola' href='xone.php'><img src="https://news.xbox.com/en-us/wp-content/uploads/Xbox-One-X_CnslCntlr_Hrz_ANRTlt_GrdBG_96PPI_V2_RGB.jpg" height="300px" width="100%">
          <h3 class="consoleLabel"> Xbox One </h3></a>
        </div>
        <div class="col-md-4 h-50 consola" style="height:300px">
          <a style ='text-decoration: none;' class='consola' href='switch.php'><img src="https://cdn.vox-cdn.com/thumbor/IVK5IRRZsFp9KWOr5SYFlctosVM=/0x0:2040x1360/1200x800/filters:focal(857x517:1183x843)/cdn.vox-cdn.com/uploads/chorus_image/image/57533307/jbareham_1492_170228_0024.0.0.jpg" height="300px" width="100%">
          <h3 class="consoleLabel"> Switch </h3></a>
        </div>
      </div>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <h4 style="background-color: #202d42; color: white; height: 40px; " class=""> Juegos Recientes </h4>
      <div class="row" style="margin-bottom: 10px; background-color:white; padding-bottom: 20px;">
                
        <?php 
            showGame(1);
            showGame(2);
            showGame(3);
            showGame(4);
        ?>
        
        </div>
      <div class="row" style="margin-bottom: 10px; background-color:white; padding-bottom: 25px;">
      
      <?php 
            showGame(21);
            showGame(6);
            showGame(7);
            showGame(8);
            
        ?>
        
      </div>
    </div>
  </div>
  



<?php 
    require_once 'footer.php';
?>