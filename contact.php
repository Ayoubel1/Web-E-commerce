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

                             if(isset($_POST['envoyer'])){
                                if(!empty($_POST['email']) && !empty($_POST['msg']) ){

                                    $header[] = 'MIME-VERSION: 1.0 ';
                                    $header[]='Content-Type:text/html;  charset="utf-8" ';

                                    $header[]='FROM: Ayoub <ayoubandaloussi99@gmail.com> ';                                   
                                    $header[]='Content-Transfer-Encoding: 8bit'; 

                                    $subject = 'CONTACTEZ NOUS !!'; 

                                    $msg='
                                          <html>
                                              <body>
                                                <div class="container">                                            
                                                  <u>E-mail de l\'expéditeur : </u> '.$_POST['email'].' <br> <br>
                                                  '.nl2br($_POST['msg']).'      
                                                </div> 
                                              </body>
                                          </html>     
                                         ';
                                   //la fonction permet d'envoi du mail. 
                                    mail("ayoubandaloussi99@gmail.com",$subject, $msg, implode("\r\n",$header));
                                    $msg= '<p>Bien envoyer !</p>';

                                }else{
                                  $msg = 'Please! Veuillez saisir toutes les champes. ';
                                 } 
                               }  

                        ?>  

                                <div class="mx-5 my-5">
                                  <div class="card mt-3 mb-3">
                                    <div class="card mt-4 mb-4 ml-3 mr-3">
                                    
                                       <h6 class="card-header bg-dark text-white text-center"><i class="fa fa-envelope"></i> CONTACTEZ NOUS</h6>
                                            <form method="POST" action="contact.php" class="mt-3 mb-auto ml-5 mr-5" >
                                                  <div class="form-group">
                                                      <h6> E-mail*</h6>
                                                      <input type="text" name="email" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];} ?>" placeholder="Saisir votre E-mail" class="form-control">
                                                  </div>
                                                  <div class="form-group">
                                                      <h6> Message*</h6>
                                                      <textarea name="msg" class="form-control" placeholder="Message" cols="20" rows="10"><?php if(isset($_POST['msg'])){ echo $_POST['msg']; } ?></textarea>
                                                  </div>                                                
                                                  <div class="form-group">
                                                      <button type="submit" class="btn btn-success " name="envoyer">Valider</button>
                                                  </div>
                                            </form>
                                              
                                               <?php
                                                   if(isset($msg)){
                                               ?>                       
                                                   <div class="alert alert-info mx-5 ">
                                               <?php         
                                                   echo $msg;
                                               ?>      
                                                   </div>
                                               <?php       
                                                      }
                                               ?>                                            
                                   </div>
                                </div>
                             </div>
      </div>
   </div>


<?php
  include('includes/footer.php');
?>