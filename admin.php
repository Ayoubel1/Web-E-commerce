<?php
 
  include('includes/header.php');
?>


    <div class="container">
       <div class="card main ">
          
                 <?php
                      include('includes/logo.php');
                      include('includes/menu.php');
                 ?>

                        
                    <?php
                         //on test d'abord si l'admin est bien connecté ? 
                          if(isset($_SESSION['logged'])){
                    ?>
                            <h3><br>&nbsp;Bienvenue <?php echo $_SESSION['nom'].','; ?></h3><br>

                    <ul class="nav nav-pills justify-content-center mb-3 mt-4" id="pills-tab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <a class="nav-link " id="pills-ajout-tab"  href="?action=add" role="tab" aria-controls="pills-ajout" aria-selected="true">Ajouter un produit</a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-modify-tab"  href="?action=modify" role="tab" aria-controls="pills-modify" aria-selected="false"></a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-delete-tab" href="?action=delete" role="tab" aria-controls="pills-delete" aria-selected="false"></a>
                      </li>
                      <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-delete-tab" href="?action=modifyanddelete" role="tab" aria-controls="pills-delete" aria-selected="false">Modifier ou supprimer un produit</a>
                      </li>
                   </ul>

                 <?php
                    }else{
                  ?>
                    <img src="images/ESPACE-PRIVE.jpg">
                  <?php   
                    } 
                  ?>                                       
                         <?php

                             if(isset($_GET['action'])){
                                if($_GET['action']=='add'){
                                   if(isset($_POST['valider'])){
                                      $titre_pro=escape_string($_POST['titre_pro']);
                                      $prix_pro=escape_string($_POST['prix_pro']);
                                      $qte=escape_string($_POST['qte']);
                                      $desc=escape_string($_POST['desc']);
                                      $image_pro=escape_string($_POST['image_pro']);
                                      $id_pro_cat=escape_string($_POST['id_pro_cat']);

                                       
                                           $sql = "INSERT INTO produits VALUES('','$titre_pro','$prix_pro','$image_pro','$id_pro_cat','$qte','$desc')";

                                            if(query($sql)){
                                                echo '<div class="alert alert-primary mx-auto">Le produit est bien ajoutée.</div>';
                                            }else{
                                                 echo '<div class="alert alert-danger mx-auto">Erreur ! Réessayer à nouveau.</div>';
                                            }                        
                                }
                        ?>
                               
                              <div class="container">     
                                <form action="#" method="POST">
                                  <div class="form-group">
                                  <input type="text" name="id_pro_cat" placeholder="ID_produit_catégorie" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="text" name="titre_pro" placeholder="Saisir le nom de produit" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="text" name="prix_pro" placeholder="Prix" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="text" name="qte" placeholder="La quantité ?" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="text" name="desc" placeholder="Ajouter une description.." class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="file" name="image_pro" placeholder="" class="" ><br>
                                  </div>
                                  <div class="form-group">
                                  <button type="submit" name="valider" class="btn btn-success mt-4">Ajouter</button>
                                  </div>                                  
                                </form>
                              </div>

                         
                        <?php
                              }elseif ($_GET['action']=='modifyanddelete') {
                                      
                                      $sql = "SELECT * FROM produits";
                                      $res = query($sql);
                                      while ($row = fetch_array($res)) {
                        ?>       

                          <div class="card-deck ">
                              <div class="card my-2 mx-4">
                                <div class="card-body ">
                                  <div class="card-img-top ">
                                    <img src="images/<?php echo $row['image_pro']; ?>" class="img-fluid" alt="">
                                  </div>
                                    <h3 class="card-title "><?php echo $row['titre_pro'] ; ?></h3>
                                      <p><span class="badge badge-success"><?php echo $row['prix_pro'].' Dh'; ?></span></p>
                                        <p class="lead card-text"><?php echo $row['desc']; ?></p>
                                        <p><a href="?action=modify&amp;id=<?php echo $row['id_pro']; ?>" class="btn btn-warning">Modifier</a>
                                        <a href="?action=delete&amp;id=<?php echo $row['id_pro']; ?>" class="btn btn-warning">Supprimer</a></p>
                               </div>                                            
                             </div>   
                          </div>

                        <?php
                              }
                              }elseif ($_GET['action']=='modify') {
                                                                       
                        ?>

                              <div class="container">     
                                <form action="#" method="POST">
                                  <div class="form-group">
                                  <input type="text" name="titre_pro" placeholder="Saisir le nom de produit" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="text" name="prix_pro" placeholder="Prix" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="text" name="qte" placeholder="La quantité ?" class="form-control">
                                  </div>
                                  <div class="form-group">
                                  <input type="file" name="image_pro" placeholder="" class="" ><br>
                                  </div>
                                  <div class="form-group">
                                  <button type="submit" name="valider" class="btn btn-success mt-4">Valider</button>
                                  </div>                                  
                                </form>
                              </div>

                          <?php
                                  if(isset($_POST['valider'])){

                                      $titre_pro=escape_string($_POST['titre_pro']);
                                      $prix_pro=escape_string($_POST['prix_pro']);
                                      $qte=escape_string($_POST['qte']);
                                      $image_pro=escape_string($_POST['image_pro']);
                                      $id = $_GET['id'];

                                      $sql = "UPDATE produits SET titre_pro='$titre_pro', prix_pro='$prix_pro', qte='$qte', image_pro='$image_pro'  WHERE id_pro = '$id' ";
                                      $res = query($sql);  

                                      if(query($sql)){
                                        echo '<div class="alert alert-primary mx-auto">Le produit est bien modifiée.</div>';
                                      }else{
                                        echo '<div class="alert alert-danger mx-auto ">Erreur ! Réessayer à nouveau.</div>';
                                      }  
                                  }    
                          ?>                                                                  
                       
                               
                        <?php  
                                }elseif ($_GET['action']=='delete') {
                                                                      
                                        $id = $_GET['id'];
                                        $sql = "DELETE FROM produits WHERE id_pro = '$id' ";
                                        $res = query($sql);

                               if(query($sql)){
                                        echo '<div class="alert alert-primary mx-auto">Le produit est bien supprimée.</div>';
                              }else{
                                       echo '<div class="alert alert-danger mx-auto   ">Erreur ! Réessayer à nouveau.</div>';
                             }       
                         ?>
                          
                        <?php       
                                  }else{
                                    echo 'Erreur s\'est produite !';
                                 }
                                 }
                       ?>
               
    </div>
   </div>

<?php
  include('includes/footer.php');
?>