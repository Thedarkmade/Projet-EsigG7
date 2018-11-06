   	<?php $p1=$p2=$p3=$p4=$p5=$p6=" ";?>
    <?php $p2="select";
		  $onglet="Connexion";
		  $login = htmlspecialchars($_POST['login']);
		  $psw = htmlspecialchars ( $_POST['psw']);
		  $pswc = htmlspecialchars ( $_POST['pswc']);
		  $daten = htmlspecialchars ( $_POST['daten']);
		  $mail = htmlspecialchars ( $_POST['mail']);
		  $qid = false; 
		  ?>
	<?php include("inc/Header.inc.php");?>
	<?php if ($psw == $pswc){ ?>
    <?php session_start() ?>
        	<?php $_SESSION['login'] = $login; ?>
            <?php
 
			  define('PREFIX_SALT', 'amettre');
			  define('SUFFIX_SALT', 'dansBDD');
			 
			  $hashSecure = md5(PREFIX_SALT.$psw.SUFFIX_SALT);
			?>
            <?php include("/inc/Sider.inc.php");?>
            <div class="col-sm-4">
			<div id="intertitre"> 
              <br/><br/><br/> Bonjours <?php echo $login ?>
            </div>
		<?php } else { ?>
        	<div id="intertitre"> 
              <br/><br/><br/> Les mots de passe ne correspondent pas veuillez re-essayer.
            </div
        <?php }?>
    <?php include("inc/Footer.inc.php");?>