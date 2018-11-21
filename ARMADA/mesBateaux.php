   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
    <?php $p5="select";
		  $onglet='Mes bateaux';
	?>
	<?php include("inc/Header.inc.php");
			include("inc/Sider.inc.php");
			if (isset($_SESSION['lvl']) && $_SESSION['lvl']>=1){ ?> 
		<div class="col-sm-5">
        <br/><br/><br/><br/>
       <input type="button" value="Créer un Bateau" onClick="javascript:document.location.href='NouveauBateau.php'" />
       <br/><br/><br/>
       <input type="button" value="Modifier un Bateau" onClick="javascript:document.location.href='ModifBateau.php'" />
       <br/><br/><br/>
       <input type="button" value="Supprimer un Bateau" onClick="javascript:document.location.href='DelBateau.php'" />
    	</div>
        <?php }else{ ?>
        <br/><br/><br/>
        <div id="intertitre"> 
        Vous n'etez pas autorisé à acceder à cette page.<br/>Authentifiez-vous en tant que proprietaire pour déverouiller cette page.
        </div>
        <?php } ?>
    <?php include("inc/Footer.inc.php");?>