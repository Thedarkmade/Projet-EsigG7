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
				$req_pre = mysqli_prepare($mysqli, 'SELECT `proprietaire`,`id_pdf` FROM `bateau` WHERE `matricule` =?');
				mysqli_stmt_bind_param($req_pre, "s", $imat);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$proprietaire,$id_pdf);
				mysqli_stmt_fetch($req_pre);
				include ("inc/UconnectBdd.inc.php");
				if ($_SESSION['login']==$proprietaire){
					unlink('PDF/'.$id_pdf);
					$pdf='';
					include ("inc/ConnectBdd.inc.php");	
				$req_pre = mysqli_prepare($mysqli, 'UPDATE `bateau` SET `id_pdf`=? WHERE `matricule` =?');
				mysqli_stmt_bind_param($req_pre, "ss",$pdf,$imat);
				mysqli_stmt_execute($req_pre);
				include ("inc/UconnectBdd.inc.php");
				?>
                 <br/><br/><br/>
                    <div id="intertitre"> 
                    Le PDF à bien était supprimé.
                    </div>
                    
                <?php
				}else{ ?>
                    <br/><br/><br/>
                    <div id="intertitre"> 
                    Vous n'etez pas autorisé à modifier ce bateau.
                    </div>
				<?php }	?>
    	
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