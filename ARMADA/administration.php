   	<?php session_start() ?>
	<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7=" ";?>
    <?php $p7="select";
		  $onglet='Administration';
	?>
	<?php include("inc/Header.inc.php");?>
	<?php include("inc/Sider.inc.php");?>
		<div class="col-sm-5"> 
        <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl'] == 2){ ?>
         <br/><br/> <div id="intertitre">
        Selectionné un utilisateur:<br/><br/>
		</div>       
        <form action="gestusers.php" method="post">
        <select name="login">
                <?php
    		include ("inc/ConnectBdd.inc.php");
				$req_pre = mysqli_prepare($mysqli, 'SELECT `login` FROM `personne`');
				mysqli_stmt_execute($req_pre);
				mysqli_stmt_bind_result($req_pre,$login);
				while (mysqli_stmt_fetch($req_pre)){?>
                <option value="<?php echo $login ?>"><?php echo $login ?></option>
                 
				<?php
				}
				include ("inc/UconnectBdd.inc.php");
				?>
                </select>
                <button  type="submit" />Voir </button>
                </form>
                </div>
                </div>
                <?php } else { ?>
                <div id="intertitre">Vous devez etre administrateur pour acceder à cette page</div>
                <?php } ?>
                </div>
    <?php include("inc/Footer.inc.php");?>