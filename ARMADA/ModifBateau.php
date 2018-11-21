   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
    <?php $p5="select";
		  $onglet='Mes bateaux';
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");
	if (isset($_SESSION['lvl']) && $_SESSION['lvl']>=1){ ?> 
		<div class="col-sm-5">
        
        <?php
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'SELECT `matricule`,`Nom_bateau` FROM `bateau` WHERE `proprietaire` =?');
				mysqli_stmt_bind_param($req_pre, "s", $_SESSION['login']);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$matricule,$Nom_bateau);
				while (mysqli_stmt_fetch($req_pre)){?>
                <br/><br/><br/>
                <input type="button" value="<?php echo $Nom_bateau?>" onClick="javascript:document.location.href='gestModifBateau.php?imat=<?php echo $matricule?>'"/>
				<?php
				}
				include ("inc/UconnectBdd.inc.php");
				?>
    	
        <br/><br/>
         <input type="button" value="retour" onClick="javascript:document.location.href='mesBateaux.php'"/>
        </div>
              <?php }else{ ?>
        <br/><br/><br/>
        <div id="intertitre"> 
        Vous n'etez pas autorisé à acceder à cette page.<br/>Authentifiez-vous en tant que proprietaire pour déverouiller cette page.
        </div>
        <?php } ?>
    <?php include("inc/Footer.inc.php");?>