   	<?php $p1=$p2=$p3=$p4=$p5=$p6=" ";?>
    <?php $p3="select";
		  $onglet="Inscrition";
	?>
	<?php include("/inc/Header.inc.php");?>
	<?php include("/inc/Sider.inc.php");?>
                        <div class="col-sm-5">
                          <form action="gestinsc.php" method="post"> 
    						<div id="intertitre">
                          		<br/><br/>Inscription
                       		</div>
                <div>
                    <br/>
 				    <input type="text" id="Login" name="login" placeholder="Entrez votre login" size="25" required>
                    <span class="validity"></span>
 				</div>
           		<div>
                    <br/>
 				    <input type="email" id="Mail" name="mail" placeholder="Entrez votre adresse mail" size="25" required>
                    <span class="validity"></span>
 				</div>
                <div>
               		 <br/>
                     <input type="date" name="daten" required>
            	</div>
                <div>
    				<br/>
 				    <input type="password" id="psw" name="psw" placeholder="Entrez votre mot de passe" size="25" required>
                    <span class="validity"></span>
 			    </div>
                <div>
    				<br/>
 				    <input type="password" id="pswc" name="pswc" placeholder="Confirmé votre mot de passe" size="25" required>
                    <span class="validity"></span>
 				</div>
 			 <div>
             <br/>
   				 <button type="submit">Enregistrement</button>
 			</div>
               </form> 

<?php include("/inc/Footer.inc.php");?>