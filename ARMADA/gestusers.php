<?php session_start() ?>
<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
<?php $p7="select";
	$onglet=$Administration;
	include("inc/Header.inc.php");
	include("inc/Sider.inc.php");
if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2){
	$login=$_POST['login'];	
    include ("inc/ConnectBdd.inc.php");
	$req_pre = mysqli_prepare($mysqli, 'SELECT `nom`, `prenom`, `date_naissance`, `mail`, `plvl` FROM `personne` WHERE `login` =?');
	mysqli_stmt_bind_param($req_pre, "s", $login);
	mysqli_stmt_execute($req_pre);
	mysqli_stmt_bind_result($req_pre,$nom,$prenom,$date_naissance,$mail,$plvl);
	mysqli_stmt_fetch($req_pre);
	include ("inc/UconnectBdd.inc.php");
?>
  <div class="col-sm-5">
  <br/><br/><br/>
    <div id="contenu_centre_alt"> Login: <?php echo $login ?><br/>
      <br/>
      Nom: <?php echo $nom ?><br/>
      <br/>
      Date de naissance:<?php echo $date_naissance ?><br/>
      <br/>
       adresse mail:<?php echo $mail ?><br/>
        <br/>
        Prenom:<?php echo $prenom ?><br/>
        <br/>
        Niveau d'autorisation:
        <?php switch($plvl){
		  case 0:
      		echo "Visiteur";
			break;
		  case 1:
		    echo "Proprietaire";
		  	break;
		  case 2:
		  	echo"Administrateur";
			break;
      } ?>
        <br/>
        
      </div>
    </div>
    </div>
    <div class="row">
     <div class="col-md-4">      </div>
      <div class="col-md-4"> 
      <br/><br/>
       <input type="button" value="Supprimer" onClick="javascript:document.location.href='deluser.php?log=<?php echo $login?>'"/>
       <?php switch($plvl){
		  case 0:
		  ?>
		  	<input type="button" value="passer proprietaire" onClick="javascript:document.location.href='paspro.php?log=<?php echo $login?>'"/>	
      		<input type="button" value="passer administrateur" onClick="javascript:document.location.href='pasadmin.php?log=<?php echo $login?>'"/>
		  <?php break;
		  case 1:
		  ?>
		  	<input type="button" value="passer visiteur" onClick="javascript:document.location.href='pasvisit.php?log=<?php echo $login?>'"/>	
      		<input type="button" value="passer administrateur" onClick="javascript:document.location.href='pasadmin.php?log=<?php echo $login?>'"/>
		  <?php break;
		  case 2:
		  ?>
		  	<input type="button" value="passer visiteur" onClick="javascript:document.location.href='pasvisit.php?log=<?php echo $login?>'"/>	
      		<input type="button" value="passer proprietaire" onClick="javascript:document.location.href='paspro.php?log=<?php echo $login?>'"/>
		  <?php break;
      } ?>     
      
      </div>
<?php }else{?>
      <br/>
      <div id="intertitre">Vous devez etre administrateur pour acceder à cette page</div>
<?php }?>
</div>
      <br/>
      <br/>
      <input type="button" value="retour" onClick="javascript:document.location.href='administration.php'"/>
    </div>
  </div>
  <?php include("inc/Footer.inc.php");?>