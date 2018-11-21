   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p4="select";
		  $onglet='Recherche';
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");?>
		<div class="col-sm-5">
        <form action="gestrecherche.php" method="post"> 
    		  <div>
    				<br/><br/><br/><br/>
                    <label for="bateau"></label>
 				    <input type="text" id="req" name="req" placeholder="Entrez le nom d'un bateau" size="50" required>
                  <span class="validity"></span>  
 			</div>
 			 <div>
             <br/>
   				 <button type="submit">Rechercher</button>
 			</div>
    	</form>
        
         <br/><br/> <div id="intertitre">
        Voici les bateaux actuelement enregistré:
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-sm-5">   </div>
        <div class="col-sm-2">
       
        
                <?php
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'SELECT `matricule`,`Nom_bateau` FROM `bateau`');
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$matricule,$Nom_bateau);
				while (mysqli_stmt_fetch($req_pre)){?>
                <br/>
                 <a href='Bateau.php?imat=<?php echo $matricule?>' title=""><div id="contenu_centre"><?php echo $Nom_bateau?></div></a>
				<?php
				}
				include ("inc/UconnectBdd.inc.php");
				?>
                </div>
                </div>
                </div>
    <?php include("inc/Footer.inc.php");?>