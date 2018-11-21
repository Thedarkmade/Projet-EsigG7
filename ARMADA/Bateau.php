   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
    <?php $p4="select";
			$imat=$_GET['imat'];	
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'SELECT * FROM `bateau` WHERE `matricule` =?');
				mysqli_stmt_bind_param($req_pre, "s", $imat);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$matricule,$Nom_bateau,$proprietaire,$longeur,$largeur,$hauteur,$pquille,$vitesse,$deplacement,$nationalité,$nbequipage,$date_arr,$date_dep,$description,$id_image,$id_pdf);
				mysqli_stmt_fetch($req_pre);
				include ("inc/UconnectBdd.inc.php");
				$onglet=$Nom_bateau;
					 include("inc/Header.inc.php");
					include("inc/Sider.inc.php");?>		
        <div class="col-sm-5">
        				<?php if ($Nom_bateau != ""){ ?>
        <br/>
        <div id="intertitre"><?php echo $Nom_bateau ?></div>
        <br/>
        <div><img src="photos/<?php echo $id_image ?>" width="600" height="337"></div>
        <br/>
        </div>
        </div>
        <div class="row">

	        <div class="col-sm-6">
            <div id="contenu_centre_alt">
        Imatriculation: <?php echo $matricule ?><br/><br/>
		Proprietaire: <?php echo $proprietaire ?><br/><br/>
        Pavillon:<?php echo $nationalité ?><br/><br/>
        Nombre de personne à bord:<?php echo $nbequipage ?> personnes <br/><br/>
        Date d'arrivé à Rouen:<?php echo $date_arr ?><br/><br/>
        Date de départ:<?php echo $date_dep ?>
        </div>
		</div>
        <div class="col-sm-6">
        <div id="contenu_centre_alt">
        Longeur:<?php echo $longeur ?> mètres<br/><br/>
        Maître-bau:<?php echo $largeur ?> mètres<br/><br/>
        Hauteur:<?php echo $hauteur ?> mètres<br/><br/>
        Tirant d'eau:<?php echo $pquille ?> mètres<br/><br/>
        Vitesse maximum:<?php echo $vitesse ?> noeuds<br/><br/>
        Deplacement:<?php echo $deplacement ?> tonnes
        </div>
</div>
</div>
<div class="row">
<div class="col-md-4">               </div>
  <div class="col-md-4">
 			<br/><div id="contenu_centre_alt"><?php echo $description ?></div><br/><br/>
        	<?php if ($id_pdf !=''){ ?>
			<?php if (isset($_SESSION['login'])){ ?>
            <br/><input type='button' onclick="window.open('PDF/<?php echo $id_pdf ?>');" value="Telecharger le PDF" />
            <?php }else{?>
            <br/><input type="button" value="Telecharger le PDF(verouillé)" onClick="javascript:window.location.href='Unloged.php'"/>
            <?php }
			}else{?>
			<br/> <div id="contenu_centre_alt">Dobby n'a trouvé aucun PDF pour ce batiment</div>	
			<?php }
			}else{?>
                <br/>
<div id="intertitre">NE MODIFIEZ PAS L'URL !!! </div>
<?php }?>            
        <br/><br/><input type="button" value="retour" onClick="javascript:document.location.href='recherche.php'"/>
        </div>
        </div>
    <?php include("inc/Footer.inc.php");?>