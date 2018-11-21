   	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p2="select";
		  $onglet="Connexion";
		  $nlogin = htmlspecialchars($_POST['login']);
		  $psw = htmlspecialchars ( $_POST['psw']);
		  $pswc = htmlspecialchars ( $_POST['pswc']);
		  $mail = htmlspecialchars ( $_POST['mail']);
		  $nom = htmlspecialchars ( $_POST['nom']);
		  $pnom = htmlspecialchars ( $_POST['prenom']);
		  $daten = htmlspecialchars ( $_POST['date_de_naissance']);
		  $lvl = 0;
		  ?>
	<?php include("inc/Header.inc.php");
	
		include ("inc/ConnectBdd.inc.php");
		
		$req_pre = mysqli_prepare($mysqli, 'SELECT `login` FROM `login` WHERE `login` =?');
    mysqli_stmt_bind_param($req_pre, "s", $nlogin);
    mysqli_stmt_execute($req_pre);
    mysqli_stmt_bind_result($req_pre, $login);
    mysqli_stmt_fetch($req_pre);
		include ("inc/UconnectBdd.inc.php");
		
	if (htmlspecialchars($psw) == htmlspecialchars($pswc)&&$login==""){ ?>
    <?php session_start() ?>
        	<?php $_SESSION['login'] = htmlspecialchars($nlogin);
           		  $_SESSION['lvl'] = 0;
	
	$hpw = md5('g7Psalt'.htmlspecialchars($psw).'g7Ssalt');
			  include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'INSERT INTO `personne`(`login`, `nom`, `prenom`, `date_naissance`, `mail`, `plvl`) VALUES(?,?,?,?,?,?)');
				mysqli_stmt_bind_param($req_pre, "sssssi", $nlogin, $nom, $pnom, $daten, $mail,$lvl);
				mysqli_stmt_execute($req_pre); 

				$req_pre = mysqli_prepare($mysqli, 'INSERT INTO `login`(`login`, `psw`) VALUES ( ? ,?)');
				mysqli_stmt_bind_param($req_pre,"ss", $nlogin, $hpw);
				mysqli_stmt_execute($req_pre); 
				
			  include ("inc/UconnectBdd.inc.php");
			?>
            <?php include("inc/Sider.inc.php");?>
            <div class="col-sm-4">
			<div id="intertitre"> 
              <br/><br/><br/> Bonjours <?php echo htmlspecialchars($nlogin) ?>
            </div>
		<?php } elseif ($login!="") { ?>
        	<div id="intertitre"> 
              <br/><br/><br/> Ce login est déjà utilisé veuillez réessayer.
            </div>
            <?php include("inc/Sider.inc.php");
        		} else { ?>
        	<div id="intertitre"> 
              <br/><br/><br/> Les mots de passe ne correspondent pas veuillez réessayer.
            </div>
            <?php include("inc/Sider.inc.php");
       			}?>
    <?php include("inc/Footer.inc.php");?>