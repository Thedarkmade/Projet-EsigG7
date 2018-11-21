        <div class="text-left">
    		 <div class="row">
                    <div class="col-sm-4">  
                        <ul id="leftside">
                            <li id=<?php echo $p1 ?>><a href="index.php" title="">Accueil</a></li><br/>
                            <?php if (isset($_SESSION['login'])) { ?>
                            <li id=<?php echo $p2?>><a href="Deconnexion.php" title="">Deconnecter <?php echo htmlspecialchars($_SESSION['login']) ?></a></li> <br/>
                            <?php }else {?>
                            <li id=<?php echo $p2?>><a href="connexion.php" title="">Connexion</a></li> <br/>
                           	 <?php } ?>
                             <?php if (isset($_SESSION['login'])== false) { ?>
                            <li id=<?php echo $p3?>><a href="Inscription.php" title="">Inscription</a></li> <br/>
                            <?php } ?>
                            <li id=<?php echo $p4?>><a href="recherche.php" title="">Recherche</a></li> <br/>
                            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl']>=1){ ?>
                            <li id=<?php echo $p5?>><a href="mesBateaux.php" title="">Mes Bateaux</a></li> <br/>
                            <?php } ?>
                            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl']==2){ ?>
                            <li id=<?php echo $p7?>><a href="administration.php" title="">Administration</a></li> <br/>
                            <?php } ?>
                            <li id=<?php echo $p6?>><a href="Contact.php" title="">Contact</a></li> <br/>
                        </ul>
                     </div>