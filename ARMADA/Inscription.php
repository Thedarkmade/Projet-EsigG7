   	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p3="select";
		  $onglet="Inscrition";
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");?>
                        <div class="col-sm-5">
                          <form action="gestinsc.php" method="post"> 
    						<div id="intertitre">
                          		<br/><br/>Inscription
                       		</div>
                <div>
                    <br/>
 				    <input type="text" id="Login" name="login" placeholder="login" size="25" maxlength="20" required/>
                    <span class="validity"></span>
 				</div>
                <div>
                    <br/>
 				    <input type="text" id="nom" name="nom" placeholder="nom" size="25"  maxlength="50" required/>
                    <span class="validity"></span>
 				</div>
                <div>
                    <br/>
 				    <input type="text"id="prenom" name="prenom" placeholder="prénom" size="25"  maxlength="50" required/>
                    <span class="validity"></span>
 				</div>
           		<div>
                    <br/>
 				    <input type="email" id="Mail" name="mail" placeholder="Entrez votre adresse mail" size="25"  maxlength="100" required/>
                    <span class="validity"></span>
 				</div>
                <div>
                 <br/>
<input type="date" id="date_de_naissance" name="date_de_naissance" min="1908-01-01" max="2011-01-01">
       </div>
                <div>
    				<br/>
 				    <input type="password" id="psw" name="psw" placeholder="Entrez un mot de passe" size="25" required/>
                    <span class="validity"></span>
 			    </div>
                <div>
    				<br/>
 				    <input type="password" id="pswc" name="pswc" placeholder="Confirmé votre mot de passe" size="25" required/>
                    <span class="validity"></span>
 				</div>
 			 <div>
             <br/>
   				 <button type="submit">Enregistrement</button>
 			</div>
               </form> 
               <br/><input type="button" value="Connection" onClick="javascript:document.location.href='connexion.php'"/>
</div>
<?php include("inc/Footer.inc.php");?>