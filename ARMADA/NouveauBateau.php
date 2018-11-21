<?php session_start() ?>
<?php $p1=$p2=$p3=$p4=$p5=$p6=$p7="";?>
<?php $p5="select";
        $onglet='Mes bateaux';
  ?>
<?php include("inc/Header.inc.php");?>
<?php include("inc/Sider.inc.php");?>
    <?php if (isset($_SESSION['lvl']) && $_SESSION['lvl']>=1){ ?>
    <div class="col-sm-5">
      <form action="SaveNew.php" method="post" enctype="multipart/form-data">
        <div id="intertitre"><br/>
          <br/>
          Enregistrement</div>
        <div><br/>
          Imatriculation:
          <input type="text" id="imat" name="imat"  size="25"  maxlength="30" required/>
        </div>
        <div><br/>
          Nom:
          <input type="text" id="nom" name="nom"  size="25"  maxlength="30" required/>
        </div>
        <div><br/>
          Longeur:
          <input type="number" id="longeur" name="longeur"  size="25"  maxlength="1000" required/>
          m                              étres</div>
        <div><br/>
          Maître-bau:
          <input type="number" id="largeur" name="largeur" size="25"  maxlength="1000" required/>
          m                              étres</div>
        <div><br/>
          Hauteur:
          <input type="number" id="hauteur" name="hauteur"  size="25"  maxlength="1000" required/>
          m                              étres</div>
        <div><br/>
          Tirant d'eau:
          <input type="number" id="pquille" name="pquille"  size="25"  maxlength="1000" required/>
          m                              étres</div>
        <div><br/>
          Vitesse:
          <input type="number" id="vitesse" name="vitesse"  size="25"  maxlength="100" required/>
          noeuds</div>
        <div><br/>
          deplacement:
          <input type="number" id="dep" name="dep"  size="25"  maxlength="1000" required/>
          Tonnes</div>
        <div><br/>
          Nationalité:
          <input type="text"id="pays" name="pays"  size="25"  maxlength="100" required/>
        </div>
        <div><br/>
          Equipage:
          <input type="number" id="nbequipage" name="nbequipage"  size="15"  maxlength="1000" required/>
          personnes</div>
        <div><br/>
          Date d'arrivée:<br/>
          <input type="date" id="date_arrivee" name="date_arrivee" min="2019-01-01" max="2019-06-06" >
        </div>
        <div><br/>
          Date de départ:<br/>
          <input type="date" id="date_depart" name="date_depart" min="2019-06-07" >
        </div>
        <div><br/>
          Description:<br/>
          <TEXTAREA name="desc" rows=20 cols=50 wrap="virtual" ></TEXTAREA>
        </div>
        <div><br/>
          Fichier PDF:<br/>
          <input type="hidden" name="MAX_FILE_SIZE" value="99999999">
          <input type="file" id="pdf" name="pdf" >
        </div>
        <div><br/>
          Photo:<br/>
          <input type="hidden" name="MAX_FILE_SIZE_ph" value="999999999">
          <input type="file" id="photo" name="photo" >
        </div>
        <div><br/>
          <button type="submit">Enregistrer</button>
        </div>
      </form>
      <br/>
      <input type="button" value="Annuler" onClick="javascript:document.location.href='mesBateaux.php'"/>
      <?php }else{ ?>
      <br/>
      <br/>
      <br/>
      <div id="intertitre">Vous n'etez pas autorisé à acceder à cette page.<br/>
        Authentifiez-vous en tant que proprietaire pour déverouiller cette page.
        <?php } ?>
      </div>
      <?php include("inc/Footer.inc.php");?>
