<?php

include "./model/eCommerce.php";


function liste_produits($db) {

	$produits = getProducts($db);
	include "./view/produits.php";

}

function detail_produit($db,$idProduit) {

	$produit = getProduct($db,$idProduit);
	include "./view/produitdetail.php";
}
function afficher_login($db) {
	include "./view/login.php";
	if(
		!empty($_POST ['username']) &&
		!empty($_POST ['password']) 
	)
{
		$mail =htmlspecialchars($_POST ['username']);
		$mdp = htmlspecialchars($_POST ['password']) ;
}
	$sid = login($db,$mail, $mdp);
	if ($sid) {
			echo "Connecté";
			setcookie("sid", $sid, time() + (86400));
	
		}
		else
		{
			echo "erreur";
}
function afficher_register($db) {
	if($_POST) {
		if(
		!empty($_POST ['email']) &&
		!empty($_POST ['surname']) &&
		!empty($_POST ['name']) && 
		!empty($_POST ['pwd'])&&
		!empty($_POST ['adress']) &&
		!empty($_POST ['city']) &&
		!empty($_POST ['stat']) &&
		!empty($_POST ['zip']) &&
		!empty($_POST ['status'])
	)

	
		//egister($db,$mail,$nom,$prenom,$mdp,$adresse,$ville,$codePostal,$pays,$statut="user") {
		$mail =htmlspecialchars($_POST ['email']);
		$nom = htmlspecialchars($_POST ['surname']) ;
		$prenom = htmlspecialchars($_POST ['name']) ;
		$mdp = htmlspecialchars($_POST ['pwd']);
		$adresse =  htmlspecialchars($_POST ['adress']);
		$ville =  htmlspecialchars($_POST ['city']); 
		$pays = htmlspecialchars($_POST ['stat']);
		$codePostal = htmlspecialchars($_POST ['zip']); 
		//$ htmlspecialchars($_POST ['status']
			if(register($db,$mail,$nom,$prenom,$mdp,$adresse,$ville,$codePostal,$pays)) {
				echo "Inscription réussite";
			}
			else
			{
				echo "echec";
			}
	}
			else
			{
				echo "il manque des champs";
			}	
			include "./view/register.php";
		}
}

  function afficher_facture($db,$idPanier){ 
   $prix = getFacture($db,$idPanier);
    if($prix) {
  $products = getProductsFromPanier($db,$idPanier);
 foreach ($products as $product) {
 	echo $product['nom'].' '.$product['quantite'].'<br/>';
 }
      //  include "./view/";
      }
      echo $prix." ".$idPanier;


  }
