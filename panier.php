<?php
	  include('includes/header.php');

// session_destroy();
// print_r($_SESSION);

?>

    <div class="container">
       <div class="card main ">
          
                 <?php
                      include('includes/logo.php');
                      include('includes/menu.php');
				 ?>

				 	<div class="row">
				 		<div class="col-md-12">
				 			<?php
				 					$nom_article = 1;
				 					$id_article = 1;
				 					$mountant = 1;
				 					$quantite = 1;
				 			?>
				 			<div class="card mt-4 mx-4 mb-4">
				 				<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="POST">
				 					<input type="hidden" name="cmd" value="_cart">
				 					<input type="hidden" name="business" value="ayoub.elandaloussi2@etu.uae.ac.ma">
				 					
				 				<table class="table table-hover">				 				
				 					<thead>
				 						<th>Produit</th>
				 						<th>Prix</th>
				 						<th>Quantité</th>
				 						<th>Total</th>
				 						<th>Action</th>				 						
				 					</thead>
				 		<?php
				 				foreach ($_SESSION as $nom => $produit) {
				 					// substr permet de retourner un segment de chaîne.
				 				      if(substr($nom,0,9) == 'produits_'){
				 		?>
				 		     		<tbody>
				 						<td><?php echo !empty($produit['title']) ? $produit['title'] : "" ?></td>
				 						<td><?php echo !empty($produit['prix']) ? $produit['prix'] : "" ?></td>
				 						<td><?php echo !empty($produit['qte']) ? $produit['qte'] : "" ?></td>
				 						<td><?php echo !empty($produit['total']) ? $produit['total'] : "" ?></td>
				 						<td><a href="cancelCart.php?id=<?php echo !empty($produit['id']) ? $produit['id'] :"" ?>&prix=<?php echo  !empty($produit['total']) ? $produit['total'] :"" ?>" class="btn btn-danger"><i class="fas fa-trash-alt"></i></td>
				 					</tbody>
				 					<input type="hidden" name="nom_article <?php echo $nom_article; ?>" value="<?php echo !empty($produit['title']) ? $produit['title'] : "" ?>">
				 					<input type="hidden" name="id_article <?php echo $id_article; ?>" value="<?php echo !empty($produit['id']) ? $produit['id'] : "" ?>">
				 					<input type="hidden" name="mountant <?php echo $mountant; ?>" value="<?php echo !empty($produit['totaux']) ? $produit['totaux'] : "" ?>">
				 					<input type="hidden" name="quantite <?php echo $quantite; ?>" value="<?php echo !empty($produit['qte']) ? $produit['qte'] : "" ?>">
				 			<?php
				 					$nom_article++;
				 					$id_article++;
				 					$mountant++;
				 					$quantite++;
				 			?>
							<?php
				 						}
				 					}
		 					?>
				 				</table>
				 			<?php
				 		     			if(isset($_SESSION['totaux']) && $_SESSION['totaux']>0){
				 			 ?>
				 						 <button type="submit" name="upload" class="btn btn-success "><i class="fas fa-money-check-alt"></i> Valider vos achats</button>
				 			<?php
				 					}
				 			?>

				 				</form>				 				
				 			</div>

				 			<div class="card mt-4 mx-4 mb-4">
				 				<table class="table table-hover">				 				
				 					<thead>
				 						<th>Totaux</th>
				 						<th>Produits</th>
				 					</thead>				 					
				 					<tbody>
				 						<td><?php echo !empty($_SESSION['totaux']) ? $_SESSION['totaux'] : "" ?></td>
				 						<td><?php echo !empty($_SESSION['count']) ? $_SESSION['count'] : "" ?></td>
				 					</tbody>
				 				</table>				 				
				 			</div>					 			
				 		</div>
				 	</div>
       </div>
    </div>

<?php
  include('includes/footer.php');
?>