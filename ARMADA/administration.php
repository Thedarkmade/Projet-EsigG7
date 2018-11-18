<?php session_start() ?>
    <?php include("inc/Header.inc.php");
        if(isset($_POST['s-admin']) OR isset($_POST['s-owner']) OR isset($_POST['s-standard']) OR isset($_POST['d-user']) ){
            
               $conn = new mysqli('localhost','root','','armada') ;

            if(isset($_POST['s-admin'])){
                
                $sql='UPDATE personne set nv_priv=1 WHERE login='.$_POST['login'];
                
            }
            else if(isset($_POST['s-owner'])){
                $sql='UPDATE personne set nv_priv=2 WHERE login='.$_POST['login'];
            }
            else if(isset($_POST['s-standard'])){
                $sql='UPDATE personne set nv_priv=3 WHERE login='.$_POST['login'];

            }
            else if(isset($_POST['d-user'])){
                $sql='DELETE FROM personne WHERE login='.$_POST['login'];

            }

            echo $sql;

            $conn->query($sql);
             echo $conn->error;
            mysqli_close($conn);
        }
    ?>
		<div class="col-sm-5">
            <!-- Example single danger button -->
        <div class="btn-group">
        </div>
                <!-- <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> -->
                <form method="post">
                    <ul>
                        <?php   $conn = new mysqli('localhost','root','','armada') ;
                            $sql='SELECT nom,prenom,login FROM personne';
                            $result=$conn->query($sql);
                                if ($result->num_rows>0)
                                    { while ($row=$result->fetch_assoc()) 
                                        {   ?>

                                            <li >

                                            <input type="hidden" name='login' value="<?php echo $row['login']?>">
                                            <span ><?php echo  $row['nom'] ." " .$row['prenom']?></span>
                                            <button  type='submit' name = 's-admin'>set admin</button>
                                            <button type='submit' name= ' s-owner'>set owner</button>
                                            <button  type='submit'name= ' s-standard'>set standard user</button>

                                            <button type='submit' name= ' d-user'>delete user</button>
                                            </li>
                                            <br>
                                    <?php    }

                                    } mysqli_close($conn); ?>
                                    
                    <!-- </div> -->
                    </ul>
                </form>
        </div>
    <?php include("inc/Footer.inc.php");?>