   	<?php $p1=$p2=$p3=$p4=$p5=$p6=" ";?>
    <?php $p2="select";
		  $onglet="Deconnexion";
	?>
	<?php include("/inc/Header.inc.php");?>
	<?php include("/inc/Sider.inc.php");?>
    	<div class="col-sm-4">
		<?php

		session_start ();
		session_unset ();
		session_destroy ();
		?>
			<div id="intertitre"> 
               <br/><br/><br/> Deconnexion terminé 
            </div>
		
    <?php include("/inc/Footer.inc.php");?>