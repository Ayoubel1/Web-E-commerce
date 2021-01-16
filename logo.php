<div class="row">
            <div class="col-md-5">
              <a href="index.php" class="btn btn-link " style="font-family:  arial verdana;"><span class="text-info display-4">E-Commerce</span></a>            
            </div>
                      <div class="col-md-7 mt-4">
                                <div class="float-right">
                                  <div class="dropdown">
                                        <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="btn btn-outline-info">Compte</span></a>
                        <?php

                                if(isset($_SESSION['logged']) && isset($_SESSION['logged']) == true){
                            
                        ?>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                           <a class="dropdown-item"><i class="fa fa-user"></i><?php echo '&nbsp;'.$_SESSION['nom']; ?></a>
                                           <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i> Déconnexion</a>
                                        </div>
                       <?php
                             }else{
                       ?>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                           <a class="dropdown-item" href="inscription.php"><i class="fa fa-user-plus"></i> Inscription</a>
                                           <a class="dropdown-item" href="login.php"><i class="fas fa-sign-in-alt"></i> Connexion</a>
                                        </div>
                       <?php
                             }
                       ?>
                                  </div>
                                </div> 

                                    <div class="float-right">
                                      <div class="dropdown">
                                           <a class="btn btn-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="btn btn-outline-info"><i class="fas fa-cart-plus"></i> Panier</span></a>
                                       <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                          <a class="dropdown-item" href="panier.php"><?php echo !empty($_SESSION['count']) ? $_SESSION['count'] : "" ?> Produits</a>
                                       </div>
                                      </div>
                                    </div>            
            </div>          
    </div>
