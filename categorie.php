<?php
  include('includes/header.php');
?>


    <div class="container">
       <div class="card main ">
          
                 <?php
                      include('includes/logo.php');
                      include('includes/menu.php');
                 ?>

                                <div class="mx-5">
                                 <div class="card mt-4 mb-4">                                    
                                    <h4 class="card-header bg-secondary text-warning"><i class="fa fa-list-alt"></i> Boutique</h4>

                                    <?php
                                          $id = escape_string($_GET['id']); 

                                          $sql = "SELECT * FROM produits WHERE id_pro_cat = '$id' ";
                                          $res = query($sql);
                                          $produit = fetch_array($res);
                                              do{ 
                                                 if($produit != null){                                      
                                  ?>
                                                                      
                                    <div class="card-deck">
                                      <div class="card">
                                        <div class="card-body">
                                          <div class="card-img-top">
                                            <img src="images/<?php echo $produit['image_pro']; ?>" class="img-fluid" alt="">
                                          </div>
                                            <h3 class="card-title "><?php echo $produit['titre_pro']; ?></h3>
                                            <p><span class="badge badge-success"><?php echo $produit['prix_pro'].' Dh'; ?> </span></p>
                                            <p class="lead card-text"><?php echo $produit['desc']; ?></p>
                                            <p><a href="produit.php?id=<?php echo $produit['id_pro']; ?>" class="btn btn-info">Voir</a></p>                                           
                                        </div>
                                      </div>                                         
                                    </div>                                     
                                   
                                        <?php                                              
                                            } else{
                                         ?>

                                           <div class="alert alert-success my-4 mx-auto ">Aucun produit trouvée.</div>
                                        
                                        <?php
                                               } 
                                            }while ($produit = fetch_array($res)); 
                                        ?>
                             </div>
      </div>
   </div>


<?php
  include('includes/footer.php');
?>