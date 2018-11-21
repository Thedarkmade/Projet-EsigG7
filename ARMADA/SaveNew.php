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
		  $nimat=htmlspecialchars($_POST['imat']);
		  $proprietaire = htmlspecialchars($_SESSION['login']);
		  $nom = htmlspecialchars($_POST['nom']);
		  $longeur = htmlspecialchars ( $_POST['longeur']);
		  $largeur = htmlspecialchars ( $_POST['largeur']);
		  $hauteur = htmlspecialchars ( $_POST['hauteur']);
		  $pquille = htmlspecialchars ( $_POST['pquille']);
		  $vitesse=  $_POST['vitesse'];
		  $dep=  $_POST['dep'];
		  $pays = htmlspecialchars ( $_POST['pays']);
		  $nbequipage = htmlspecialchars ( $_POST['nbequipage']);
		  $datearr = htmlspecialchars ( $_POST['date_arrivee']);
		  $datedep = htmlspecialchars ( $_POST['date_depart']);
		  $desc = htmlspecialchars ( $_POST['desc']);
		  
		  $dossierpdf = 'PDF/';
		  $fichier = basename($_FILES['pdf']['name']);
		  $taille_maxi_pdf = 999999999999;
		  $taille = filesize($_FILES['pdf']['tmp_name']);
		  $extensionspdf = array('.pdf','');
		  $extension = strrchr($_FILES['pdf']['name'], '.'); 
		  
		  $dossierimg = 'photos/';
		  $photo = basename($_FILES['photo']['name']);
	  	  $taille_maxi_img = 999999999;
		  $taille_img = filesize($_FILES['photo']['tmp_name']);
		  $extensionsimg = array('.png', '.gif', '.jpg', '.jpeg','');
		  $extension_img = strrchr($_FILES['photo']['name'], '.'); 
		  $pdf="";
		  $pht="";
		  $tmp_img=$_FILES['photo']['tmp_name'];
		  $tmp_pdf=$_FILES['pdf']['tmp_name'];
		  
		  		include ("inc/ConnectBdd.inc.php");
		
		$req_pre = mysqli_prepare($mysqli, 'SELECT `Nom_bateau` FROM `bateau` WHERE `matricule` =?');
    mysqli_stmt_bind_param($req_pre, "s", $nimat);
    mysqli_stmt_execute($req_pre);
    mysqli_stmt_bind_result($req_pre, $Nom_bateau);
    mysqli_stmt_fetch($req_pre);
		include ("inc/UconnectBdd.inc.php");
		
	if ($Nom_bateau==""){		
						if(!in_array($extension, $extensionspdf)){
						 $erreur = 'Vous devez uploader un fichier de type PDF';
					}
					if($taille>$taille_maxi_pdf)
					{
						 $erreur = 'Le fichier PDF est trop gros...';
					}
					if(!isset($erreur))
					{
						 $fichier = strtr($fichier, 
							  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
							  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
						 $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
						 			
						 move_uploaded_file($tmp_pdf, $dossierpdf.$fichier);
						 $pdf=$fichier;
					}else{
					echo $erreur;
					}  
						if(!in_array($extension_img, $extensionsimg)){
							 $erreurph = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg';
						}
						if($taille_img>$taille_maxi_img)
						{
							 $erreurph = 'Le fichier est trop gros...';
						}
						if(!isset($erreurph))
						{
							 $photo = strtr($photo, 
								  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
								  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
							 $photo = preg_replace('/([^.a-z0-9]+)/i', '-', $photo);
							 move_uploaded_file($tmp_img, $dossierimg.$photo);
							 $pht=$photo;
						}else{
						echo $erreurph;
						}

				include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'INSERT INTO `bateau`(`matricule`, `Nom_bateau`, `proprietaire`, `longeur`, `largeur`, `hauteur`, `pquille`, `vitesse`, `deplacement`, `nationalité`, `nbequipage`, `date_arr`, `date_dep`, `description`,`id_image`, `id_pdf`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');
				mysqli_stmt_bind_param($req_pre, "sssiiiiiisisssss",$nimat,$nom,$proprietaire,$longeur,$largeur,$hauteur,$pquille,$vitesse,$dep,$pays,$nbequipage,$datearr,$datedep,$desc,$pht,$pdf);
				mysqli_stmt_execute($req_pre);
				include ("inc/UconnectBdd.inc.php");
				?>
                 <br/><br/><br/>
                    <div id="intertitre"> 
                    Le bateau immatruclé <?php echo $nimat?> à bien était créé.
                    </div>
    		
			<?php }else{ ?>
            <br/><br/><br/>
            <div id="intertitre"> 
            Cette imatriculation est déjà utilisé. <?php echo $nimat?>
            </div>
     			<?php }?>
              <?php }else{ ?>
        <br/><br/><br/>
        <div id="intertitre"> 
        Vous n'etez pas autorisé à acceder à cette page.<br/>Authentifiez-vous en tant que proprietaire pour déverouiller cette page.
        </div>
        <?php } ?>
                <br/><br/><br/>
         <input type="button" value="retour" onClick="javascript:document.location.href='mesBateaux.php'"/>
        </div>
    <?php include("inc/Footer.inc.php");?>