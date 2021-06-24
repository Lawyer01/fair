<?php
  //   // On charge les modeles et les controleurs
  //require_once 'modele.php';
 // require_once 'controllers.php';
   //inclure top.php, bd.php, modèle membre.Php etc
include "model/bd.php";
include_once "controllers/controllers.php";
include_once("view/top.php");
include_once("view/template.php");

  // inclure fichier controllers.php

  // gestion des routes
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

  $sid = isset($_COOKIE['sid'])?htmlspecialchars($_COOKIE['sid']):false;

  echo $uri;
  $racine = "/fairrepack/index.php";
	if ($racine == $uri or "/fairrepack/" == $uri)
    {
    	liste_produits($db);
    }
  elseif ($racine.'/produit' == $uri && isset($_GET['id']))
    {
    	$idProduit = htmlspecialchars($_GET['id']);
      echo "<br />afficher detail de l id produit = ".$idProduit;
        detail_produit($db,$idProduit);

    }
    elseif($racine.'/panier' == $uri && $sid) {
    	afficher_panier();
    }
    elseif($racine.'/facture' == $uri && $sid) {
    	$idPanier = isset($_GET['idPanier'])?htmlspecialchars($_GET['idPanier']):false;
    	if($idPanier) {
    		afficher_facture($db,$idPanier);
        echo "afficher_facture";
    	}
    	else

    	{
    		afficher_liste_factures();
    	}
    }
    elseif($racine.'/proposition' == $uri && $sid) {
    
    	afficher_proposition();
	}
	elseif($racine.'/propositi[on/bonlivraison' == $uri && $sid) {
    
    	$idProposition = isset($_GET['idProposition'])?htmlspecialchars($_GET['idProposition']):false;
    	if($idProposition) {
    		afficher_bonLivraison($idProposition);
    	}
    	else
    	{
    		echo "Il faut proposer un produit pour générer son bon de livraison";
    	}


	}
    elseif($racine.'/moncompte' == $uri && $sid) {
    	afficher_memberSpace();
    
    }
    elseif($racine.'/register' == $uri && !$sid) { //2
    	afficher_register($db);
    }
    elseif($racine.'/login' == $uri && !$sid) { //1
    	afficher_login($db);
    }


 


    else
    {
        header('Status: 404 Not Found');
        echo '<html><body><h1>Page Not Found</h1></body></html>';
    }
  ?>