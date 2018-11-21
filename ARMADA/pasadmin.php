   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
    <?php $p7="select";
		  $onglet='administration';
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");?>
	<?php $log=$_GET['log'];
	if (isset($_SESSION['lvl']) && $_SESSION['lvl']==2){  
			include ("inc/ConnectBdd.inc.php");
			$req_pre = mysqli_prepare($mysqli, 'SELECT `nom` FROM `personne` WHERE `login` =?');
			mysqli_stmt_bind_param($req_pre, "s",$log);
			mysqli_stmt_execute($req_pre);
			mysqli_stmt_bind_result($req_pre,$nom);
			mysqli_stmt_fetch($req_pre);
			include ("inc/UconnectBdd.inc.php");
        if ($nom !=""){
        ?>
        <div class="col-sm-5">
        <?php
				include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'UPDATE `personne` SET `plvl`=2 WHERE `login` =?');
				mysqli_stmt_bind_param($req_pre, "s",$log);
				mysqli_stmt_execute($req_pre);
				include ("inc/UconnectBdd.inc.php");
				?>
                 <br/><br/><br/>
                    <div id="intertitre"> 
                   <?php echo htmlspecialchars($log)?> à bien était passé administrateur.
                    </div>
                 <?php }else{?>   
                   <div id="intertitre">NE MODIFIEZ PAS L'URL !!! </div>
                   </div>
                   <?php }?>
                <?php }else{ ?>
        <br/><br/><br/>
        <div id="intertitre"> 
        Vous n'etez pas autorisé à acceder à cette page.<br/>Authentifiez-vous en tant que administrateur pour déverouiller cette page.
        </div>
        <?php } ?>
        <br/><br/><br/>
         <input type="button" value="retour" onClick="javascript:document.location.href='administration.php'"/>
        </div>
    <?php include("inc/Footer.inc.php");?>