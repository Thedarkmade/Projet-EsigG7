   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p4="select";
		  $onglet='Recherche';
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");
	$req=$_POST['req'];
	?>
		<div class="col-sm-5">
        <form action="gestrecherche.php" method="post"> 
    		  <div>
    				<br/><br/><br/><br/>
                    <label for="bateau"></label>
 				    <input type="text" id="req" name="req" value="<?php echo $req ?>" size="50">
                  <span class="validity"></span>  
 			</div>
 			 <div>
             <br/>
   				 <button type="submit">Rechercher</button>
 			</div>
    	</form>
        
                 <?php
				if ($req=='Chuck Norris'){?>
                <div id="intertitre">Vous ne pouvez pas checher Chuck Norris c'est Chuck Norris qui vous trouve.<br/>Fuyer avant qu'il ne vous trouve ou essayez une autre recherche.</div>
				<?php
				 }else {	
					 $req='%'.$req.'%';
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, "SELECT `matricule`,`Nom_bateau` FROM `bateau` WHERE `Nom_bateau` LIKE ? ");
				mysqli_stmt_bind_param($req_pre,"s",$req);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$matricule,$Nom_bateau);
				if (mysqli_stmt_fetch($req_pre)){?>
				<div id="intertitre">Voici ce que les Veilleurs ont trouvé</div>
				<?php
				do {?>
					<a href='Bateau.php?imat=<?php echo $matricule?>' title=""><div id="contenu_centre"><?php echo $Nom_bateau?></div></a>
                    <br/>
				<?php } while (mysqli_stmt_fetch($req_pre))?>
                
                 
				<?php
				include ("inc/UconnectBdd.inc.php");
                 }else {?>
				<div id="intertitre"> Aucun bateau ne correspond à votre recherche</div> <br/>
                	<img src="easter_eggs/img/pf.gif">
				<?php }}
                ?>
                </div>
    <?php include("inc/Footer.inc.php");?>