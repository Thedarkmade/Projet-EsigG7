        <div class="text-left">
    		 <div class="row">
                    <div class="col-sm-4">  
                        <ul id="leftside">
                            <li id=<?php echo $p1 ?>><a href="/ARMADA/Acceuil.php" title="">Accueil</a></li><br/>
                            <?php if (isset($_SESSION['login'])) { ?>
                            <li id=<?php echo $p2?>><a href="/ARMADA/Deconnexion.php" title="">Deconnecter <?php echo $_SESSION['login'] ?></a></li> <br/>
                            <?php }else {?>
                            <li id=<?php echo $p2?>><a href="/ARMADA/Connexion.php" title="">Connexion</a></li> <br/>
                           	 <?php } ?>
                             <?php if (isset($_SESSION['login'])== false) { ?>
                            <li id=<?php echo $p3?>><a href="/ARMADA/Inscription.php" title="">Inscription</a></li> <br/>
                            <?php } ?>
                            <li id=<?php echo $p4?>><a href="/ARMADA/Recherche.php" title="">Recherche</a></li> <br/>
                            <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl']==2){ ?>
                            <li id=<?php echo $p5?>><a href="/ARMADA/MesBateaux.php" title="">Mes Bateaux</a></li> <br/>
                            <?php } ?>
                            <li id=<?php echo $p6?>><a href="/ARMADA/Contact.php" title="">Contact</a></li> <br/>
                        </ul>
                     </div>