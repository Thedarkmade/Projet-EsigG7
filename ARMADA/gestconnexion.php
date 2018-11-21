   	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p2="select";
		  $onglet="Connexion";
		  $nlogin = htmlspecialchars($_POST['login']);
		  $npsw = htmlspecialchars ( $_POST['psw']);
		  ?>
          
	<?php include("inc/Header.inc.php");
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'SELECT * FROM `login` WHERE `login` =?');
				mysqli_stmt_bind_param($req_pre, "s", $nlogin);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre, $login,$psw);
				mysqli_stmt_fetch($req_pre);
				
				include ("inc/UconnectBdd.inc.php");
				
					if ($npsw !="ganon" && $nlogin !="Link"){
						$npsw = md5('g7Psalt'.htmlspecialchars($npsw).'g7Ssalt');
					}
	 ?>
	<?php if  ($nlogin == "Link"&& $npsw == "ganon"){?>
			<div id="intertitre"> 
                           <br/><br/><br/>Il est écrit "seul Link peut vaincre Ganon"
            </div>
	<?php } elseif ($login !="" && $login==$nlogin && $psw==$npsw){ ?>
    <?php session_start() ?>
    <?php
	
				include ("inc/ConnectBdd.inc.php");
    			$req_pre = mysqli_prepare($mysqli, 'SELECT `plvl` FROM `personne` WHERE `login`=?');
				mysqli_stmt_bind_param($req_pre, "s", $login);
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre, $plvl);
				mysqli_stmt_fetch($req_pre);
				include ("inc/UconnectBdd.inc.php");
        
				$_SESSION['login'] = htmlspecialchars($nlogin);
				$_SESSION['lvl'] = $plvl;
				include("inc/Sider.inc.php");
			?>
            <div class="col-sm-4">
			<div id="intertitre"> 
              <br/><br/><br/> Bonjours <?php echo $login ?>
            </div>
		<?php } else{ ?>
     		<?php include("inc/Sider.inc.php");?>
			<div id="intertitre"> 
               <br/><br/><br/> Etez-vous certain que nous nous somme déjà rencontré ?
            </div>    
		<?php } ?>
    
    <?php include("inc/Footer.inc.php");?>