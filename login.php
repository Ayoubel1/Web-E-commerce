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
                                      <div class="card mt-4 mb-4 ml-5 mr-5">
                                    
                                        <h6 class="card-header bg-secondary text-white text-center"><i class="fa fa-sign-in-alt"></i> Login</h6>
                              <?php

                                         if(isset($_POST['envoyer'])){
                                            
                                            $email = escape_string($_POST['email']);
                                            $mdp = escape_string(sha1($_POST['mdp']));  //sha1 permet de crypter le password

                                            $sql = "SELECT * FROM users WHERE email = '$email' AND mdp = '$mdp' ";
                                            $res = query($sql);
                                            $user = fetch_array($res);

                                            if($user != null){
                                              $_SESSION['logged'] = true;
                                              $_SESSION['nom'] = $user['username'];
                                              $_SESSION['id'] = $user['id_user'];

                                              header("location:admin.php");
                                            }else{

                                                  echo '<div class="alert alert-warning mt-2">E-mail ou mot de passe est incorrect !</div>';
                                            }
                                          }

                              ?> 
                                            <form method="POST" action="login.php" class="mt-3 mb-auto">
                                                  <div class="form-group ml-5 mr-5">
                                                    <input type="text" name="email" placeholder="E-mail" class="form-control" required>
                                                  </div>
                                                  <div class="form-group ml-5 mr-5">
                                                    <input type="password" name="mdp" placeholder="Mot de passe" class="form-control" required>
                                                  </div>
                                                  <div class="form-group ml-5 mr-5">
                                                   <button type="submit" name="envoyer" class="btn btn-success ">Connexion</button>  
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