   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
    <?php $p4="select";
		$onglet='ORDER 66';
		include("inc/Header.inc.php");
		include("inc/Sider.inc.php");?>		
        <div class="col-sm-5">
        <br/>
        <div id="intertitre">Vous ne pouvez pas télécharger ce PDF actuélement veuillez vous connecter pour deverouiller cette fonction.</div>
        <br/><input type="button" value="Connection" onClick="javascript:document.location.href='connexion.php'"/>
       <br/><br/><input type="button" value="retour" onClick="javascript:document.location.href='recherche.php'"/>
        </div>
    <?php include("inc/Footer.inc.php");?>