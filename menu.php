<?php

  $sql = "SELECT * FROM categories";
  $res = query($sql);

?>

 <nav class="navbar navbar-expand-lg mt-4 navbar-dark bg-dark">

               <a class="navbar-brand" href="index.php"><i class="fas fa-home"></i> Accueil</a>

                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>

                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                             <li class="nav-item active">
                                   <a class="nav-link" href="admin.php"><i class="fas fa-user-cog"></i> Administraion</a>
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>

                                   <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                               while ($cat = fetch_array($res)) {
                        ?>                                    
                                              <a class="dropdown-item bg-light" href="categorie.php?id=<?php echo $cat['id_cat'];?>" ><?php echo $cat['titre_cat']; ?></a>
                        <?php
                               }
                       ?>
                                  </div>
                              </li>
                              <li class="nav-item active">
                                   <a class="nav-link" href="produits.php" >Produits</a>
                             </li>
                             
                             <li class="nav-item active">
                                   <a class="nav-link" href="contact.php">Contactez-Nous!</a>
                             </li>
                             </li>
                          
                         </ul>

                               <form method="POST" action="search.php"  class="form-inline my-2 my-lg-0">
                                  <input class="form-control mr-sm-2" type="search" name="search" placeholder="Recherche" aria-label="Search">
                                  <button class="btn btn-warning  my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                              </form>
                    </div>
 </nav>