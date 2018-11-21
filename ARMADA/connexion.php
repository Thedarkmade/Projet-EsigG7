   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p2="select";
		  $onglet="Connexion";
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");?>
		<div class="col-sm-5">
        <form action="gestconnexion.php" method="post"> 
       					<div id="intertitre">
                          	<br/><br/>Connexion
                        </div>
    		  <div>	
                    <br/>
 				    <input type="text" id="Login" name="login" placeholder="Entrez votre login" required>
                    <span class="validity"></span>
 			</div>
                		  <div>
    				<br/>
 				    <input type="password" id="psw" name="psw" placeholder="Entrez votre mot de passe" required>
                    <span class="validity"></span>
 			</div>
 			 <div>
             <br/>
   				 <button type="submit">Connexion</button>
 			</div>
    		</form>
            <br/><input type="button" value="Inscription" onClick="javascript:document.location.href='Inscription.php'"/>
</div>
    <?php include("inc/Footer.inc.php");?>