   	<?php $p1=$p2=$p3=$p4=$p5=$p6=" ";?>
    <?php $p2="select";
		  $onglet="Connexion";
		  $login = htmlspecialchars($_POST['login']);
		  $psw = htmlspecialchars ( $_POST['psw']);
		  $qid = true; 
		  ?>
	<?php include("inc/Header.inc.php");?>
    
	 
	<?php if  ($login == "Link"){?>
			<div id="intertitre"> 
                           <br/><br/><br/>Il est écrit "seul Link peux vaincre Gannon"
            </div>
	<?php } elseif ($qid == true){ ?>
    <?php session_start() ?>
        	<?php $_SESSION['login'] = $_POST['login']; ?>
            <?php include("/inc/Sider.inc.php");?>
            <div class="col-sm-4">
			<div id="intertitre"> 
              <br/><br/><br/> Bonjours <?php echo $login ?>
            </div>
		<?php } else{ ?>
     		<?php include("/inc/Sider.inc.php");?>
			<div id="intertitre"> 
               <br/><br/><br/> Etez-vous certain que nous nous somme déjà rencontré ?
            </div>    
		<?php } ?>
    
    <?php include("inc/Footer.inc.php");?>