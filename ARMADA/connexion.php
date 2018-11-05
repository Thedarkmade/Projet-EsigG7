   	<?php $p1=$p2=$p3=$p4=$p5=$p6=" ";?>
    <?php $p2="select";
		  $onglet="Connexion";
	?>
	<?php include("/inc/Header.inc.php");?>
	<?php include("/inc/Sider.inc.php");?>
		<div class="col-sm-6">
    		  <div>
    				<br/><br/><br/><br/><br/><br/>
                    <label for="Login"></label>
 				    <input type="text" id="Login" name="name" placeholder="Entrez votre login" size="25" required>
                    <span class="validity"></span>
 			</div>
                		  <div>
    				<br/>
                    <label for="psw"></label>
 				    <input type="password" id="psw" name="name" placeholder="Entrez votre mot de passe" size="25" required>
                    <span class="validity"></span>
 			</div>
 			 <div>
             <br/>
   				 <button>Connexion</button>
 			</div>
    
    <?php include("/inc/Footer.inc.php");?>