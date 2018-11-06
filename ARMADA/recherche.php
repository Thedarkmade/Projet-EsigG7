   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=" ";?>
    <?php $p4="select";
		  $onglet='Recherche';
	?>
	<?php include("/inc/Header.inc.php");?>
	<?php include("/inc/Sider.inc.php");?>
		<div class="col-sm-5">
        <form action="/traitement/gestrecherche.php" method="post"> 
    		  <div>
    				<br/><br/><br/><br/><br/><br/><br/><br/>
                    <label for="bateau"></label>
 				    <input type="text" id="bateau" name="req" placeholder="Entrez le nom d'un bateau" size="50" required>
                  <span class="validity"></span>  
 			</div>
 			 <div>
             <br/>
   				 <button type="submit">Rechercher</button>
 			</div>
    	</form>
    <?php include("/inc/Footer.inc.php");?>