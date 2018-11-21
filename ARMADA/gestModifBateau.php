   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
    <?php $p5="select";
		  $onglet='Mes bateaux';
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");?>
	<?php if (isset($_SESSION['lvl']) && $_SESSION['lvl']>=1){ ?> 
		<div class="col-sm-5">
       
        <?php
			$imat=$_GET['imat'];	
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'SELECT * FROM `bateau` WHERE `matricule` =?');
				mysqli_stmt_bind_param($req_pre, "s", $imat);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$matricule,$Nom_bateau,$proprietaire,$longeur,$largeur,$hauteur,$pquille,$vitesse,$deplacement,$nationalité,$nbequipage,$date_arr,$date_dep,$description,$id_image,$id_pdf);
				mysqli_stmt_fetch($req_pre);
				include ("inc/UconnectBdd.inc.php");
				if ($_SESSION['login']==$proprietaire){?>
                
                
					<form action="ModifSave.php?imat=<?php echo $matricule?>" method="post" enctype="multipart/form-data"> 
    						<div id="intertitre">
                          		<br/><br/>Modification
                       		</div>

                <div >
                    <br/>Nom:
 				    <input type="text" id="nom" name="nom" value="<?php echo $Nom_bateau?>" size="25"  maxlength="30" required/>
                    <span class="validity"></span>
 				</div>
           		<div >
                    <br/>Longeur:
 				    <input type="number" id="longeur" name="longeur" value="<?php echo $longeur ?>" size="25"  maxlength="1000" required/>
                    <span class="validity"></span>métres
 				</div>
                           		<div >
                    <br/>Maître-bau:
 				    <input type="number" id="largeur" name="largeur" value="<?php echo $largeur ?>" size="25"  maxlength="1000" required/>
                    <span class="validity"></span>métres
 				</div>
                           		<div >
                    <br/>Hauteur:
 				    <input type="number" id="hauteur" name="hauteur" value="<?php echo $hauteur ?>" size="25"  maxlength="1000" required/>
                    <span class="validity"></span>métres
 				</div>
                           		<div >
                    <br/>Tirant d'eau:
 				    <input type="number" id="pquille" name="pquille" value="<?php echo $pquille ?>" size="25"  maxlength="1000" required/>
                    <span class="validity"></span>métres
 				</div>
                        		<div >
                    <br/>Vitesse
 				    <input type="number" id="vitesse" name="vitesse" value="<?php echo $vitesse ?>" size="25"  maxlength="100" required/>
                    <span class="validity"></span>noeuds
 				</div>
                        		<div >
                    <br/>deplacement:
 				    <input type="number" id="dep" name="dep" value="<?php echo $deplacement ?>" size="25"  maxlength="1000" required/>
                    <span class="validity"></span>Tonnes
 				</div>
                <div >
                    <br/>Nationalité:
 				    <input type="text"id="pays" name="pays" value="<?php echo $nationalité ?>" size="25"  maxlength="100" required/>
                    <span class="validity"></span>
 				</div>
           		<div >
                    <br/>Equipage:
 				    <input type="number" id="nbequipage" name="nbequipage" value="<?php echo $nbequipage ?>" size="25"  maxlength="1000" required/>
                    <span class="validity"></span>personnes
 				</div>
                <div >
                     <br/>Date d'arrivée: <br/>
                    <input type="date" id="date_arrivee" name="date_arrivee" min="2019-01-01" max="2019-06-06" value="<?php echo $date_arr ?>">
                </div>
                 <div >
                 <br/>
                     Date de départ: <br/>
                    <input type="date" id="date_depart" name="date_depart" min="2019-01-01" value="<?php echo $date_dep ?>">
                </div>
                <div >
                    <br/>
                    <div id="contenu_centre"> Description: <br/></div>
                    <TEXTAREA name="desc" rows=20 cols=50 wrap="virtual" ><?php echo $description ?>  </TEXTAREA>
 				</div>
         		<div >
                <br/>
                     Fichier PDF: <br/>
                    <input type="file" id="pdf" name="pdf">
                </div>
                Supprimer le PDF: <div >
                <input type="button" value="supprimer" onClick="javascript:document.location.href='gestDel.php?imat=<?php echo $imat?>'" />
                </div>
                <div >
                <br/>
                     Photo: <br/>
                    <input type="file" id="photo" name="photo">
                </div>


 			 <div >
             <br/>
   				 <button type="submit">Sauvegarder</button>
 			</div>
               </form>  
               <br/> 
               <input type="button" value="Annuler" onClick="javascript:document.location.href='mesBateaux.php'"/>
               
                  
				<?php }else{ ?>
                    <br/><br/><br/>
                    <div id="intertitre"> 
                    Vous n'etez pas autorisé à modifier ce bateau.
                    </div>
				<?php }	?>
    	
              <?php }else{ ?>
        <br/><br/><br/>
        <div id="intertitre"> 
        Vous n'etez pas autorisé à acceder à cette page.<br/>Authentifiez-vous en tant que proprietaire pour déverouiller cette page.
        
        <?php } ?> <br/><br/>
        <input type="button" value="retour" onClick="javascript:document.location.href='mesBateaux.php'"/>
        </div>
    <?php include("inc/Footer.inc.php");?>