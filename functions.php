<?php
  ob_start();  //Enclenche la temporisation de sortie
  session_start();

require('process.php');

// pour faire la redirection vers une autre page. 
function redirect($location){
	header('location:'.$location);
}

// permet d'exécuter la requete sql.
function query($sql){
	global $connect;
	return mysqli_query($connect,$sql);
}

// permet d'avoir la protection de nos champs.
function escape_string($string){
	global $connect;
	return mysqli_real_escape_string($connect,$string); 
}

// retourne la résultat d'un tableau contenant tous les lignes.
function fetch_array($res){
	return mysqli_fetch_array($res);
}

// pour la liberation de session.
function logout(){
	$_SESSION['logged']=false;
	session_destroy();
	redirect('index.php');
}

// la fonction qui libere notre panier.
function empty_cart($id,$prix){
	unset($_SESSION['produits_'.$id]);
	$_SESSION['count'] -= 1;
	$_SESSION['totaux'] -= $prix;
	redirect('panier.php');
}

?>