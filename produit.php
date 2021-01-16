 <?php
  include('includes/header.php');
?>

    <div class="container">
       <div class="card main ">
          
                 <?php
                      include('includes/logo.php');
                      include('includes/menu.php');
                 ?>
                        <div class="row">
                             <div class="col-md-7">
                  <?php  
                              $id = $_GET['id'];
                              $sql = "SELECT * FROM produits WHERE id_pro = '$id' ";
                              $res = query($sql);
                              $row = fetch_array($res); 
                                                
                   ?>
                                <div class="card mt-4 p-1 ml-3 mb-3">
                                   <div class="card-body ">
                                    
                                      <h4 class="card-header bg-secondary text-warning"><i class="fa fa-list-alt"></i> Boutique</h4>
                                      
                                         <div class="card-deck ">
                                            <div class="card ">
                                               <div class="card-body ">
                                                  <div class="card-img-top">
                                                    <img src="images/<?php echo $row['image_pro']; ?>" class="img-fluid w-100">
                                                  </div>
                                                      <h3 class="card-title "><?php echo $row['titre_pro']; ?></h3>
                                                     <p><span class="badge badge-success"><?php echo $row['prix_pro'].' Dh'; ?></span></p>
                                                     <p class="lead card-text"><?php echo $row['desc']; ?></p>
                                               </div>
                                            </div> 
                                         </div>
                                    </div>
                                </div>
                             </div>                                       
                                   <div class="col md-4">
                                          <form action="checkout.php" method="POST">
                                                  <div class="form-group mt-5 p-2 ml-3">
                                                       <label>Quantité&nbsp;</label> 
                                                       <input type="number" name="qte" value="1" style="width: 10%">
                                                       <input type="hidden" name="produit" value="<?php echo $row['titre_pro']; ?>">
                                                       <input type="hidden" name="id" value="<?php echo $row['id_pro']; ?>">
                                                  </div>
                                                       <button type="submit" class="btn btn-info ml-4"><i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Ajouter au panier</button>
                                         </form>                                    
                                   </div>        
       </div>
    </div>



<?php
  include('includes/footer.php');
?>