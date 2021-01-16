<?php
  include('includes/header.php');
?>


    <div class="container">
       <div class="card main ">
          
                 <?php
                      include('includes/logo.php');
                      include('includes/menu.php');
                 ?>

                                <div class="mx-5 my-5">
                                  <div class="card mt-3 mb-3">
                                  <div class="card mt-4 mb-4 ml-3 mr-3">
                                    
                                      <h6 class="card-header bg-secondary text-white text-center"><i class="fa fa-user-plus"></i>  Inscription</h6>

                                        <?php

                                         if(isset($_POST['envoyer'])){
                                            $username = escape_string($_POST['nom']. ' ' .$_POST['prenom']);
                                            $email = escape_string($_POST['email']);
                                             //sha1 permet de crypter notre password
                                            $mdp = escape_string(sha1($_POST['mdp'])); 

                                            $sql = "INSERT INTO users VALUES('','$username','$email','$mdp')";

                                            if(query($sql)){
                                                echo '<div class="alert alert-primary mt-2">Le compte est bien créé.</div>';
                                            }else{
                                                 echo '<div class="alert alert-danger mt-2">Erreur ! Réessayer à nouveau.</div>';
                                            }
                                         }



                                         ?>
                                            <form method="POST" action="inscription.php" class="mt-3 mb-auto">
                                                 <div class="form-group ml-5 mr-5">
                                                    <input type="text" name="nom" placeholder="Nom" class="form-control"> 
                                                 </div>
                                                 <div class="form-group ml-5 mr-5">
                                                    <input type="text" name="prenom" placeholder="Prénom" class="form-control">
                                                 </div>
                                                 <div class="form-group ml-5 mr-5">
                                                    <input type="text" name="email" placeholder="E-mail" class="form-control" required>
                                                 </div>
                                                 <div class="form-group ml-5 mr-5">
                                                    <input type="password" name="mdp" placeholder="Mot de passe" class="form-control" required>
                                                 </div>                                                  
                                                 <div class="form-group ml-5 mr-5">
                                                   <button type="submit" class="btn btn-success" name="envoyer">Valider</button>
                                                 </div>
                                            </form>
                                   </div>
                                   </div>
                              </div>
    </div>
   </div>


<?php
  include('includes/footer.php');
?>