<?php
require('includes/functions.php');

if(isset($_POST['qte']) && isset($_POST['id'])){

$id = escape_string($_POST['id']);
$qte = escape_string($_POST['qte']);

$sql = "SELECT * FROM produits WHERE id_pro = '$id'";
$res = query($sql);
$produit = fetch_array($res);

$_SESSION['produits_'.$produit['id_pro']] = array(
												'id'=>$produit['id_pro'], 	
												'title'=>$produit['titre_pro'],
												'prix'=>$produit['prix_pro'], 
												'qte'=>$qte, 
												'total'=>$produit['prix_pro']*$qte
												 );

$_SESSION['totaux'] +=  $_SESSION['produits_'.$produit['id_pro']]['total'];
$_SESSION['count'] += 1;
redirect('panier.php');
}

?>