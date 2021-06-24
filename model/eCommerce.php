<?php
//include_once('bd.php');
include_once("membre.php");
/*¨deux cas : 
- requete sql où on attend un seul résultat
- les requetes ou on attend plusieurs lignes
*/

// on attend plusieurs lignes
# getProdutcs renvoie : Produit[]
function getProducts($db) {
	$results = $db->query("SELECT * from Produit");	
	return $results;
}

// function creatPanier($db,$sid) // renvoyer l'id du panier crée(valide à 0)
// {
// 	return 99;
// }

function creatPanier($db, $sid) {
	$idUser = getIdBySid($db,$sid);
 	$sql = "INSERT INTO panier (idUser, valide) VALUES ('$idUser', 0)";
	try {
		$stmt= $db->prepare($sql);
	$stmt->execute();
	 $results = $db->query("SELECT idPanier FROM panier WHERE valide=0 and idUser=$idUser ORDER BY idPanier DESC");
	$line = $results->fetch();
return $line['idPanier'];


}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }

function getLastPanier($db,$sid) {
	$idUser = getIdBySid($db,$sid);
 $results = $db->query("SELECT idPanier FROM panier WHERE valide=0 and idUser=$idUser ORDER BY idPanier DESC");
	$line = $results->fetch();
	return $line['idPanier'] ? $line['idPanier'] : creatPanier($db,$sid);
}


function getProductsFromPanier($db,$idPanier) {
	$results = $db->query("SELECT * From produit pr, PanierProduit pp WHERE pr.idProduit = pp.idProduit AND pp.idPanier=".$idPanier);	
	return $results;
}

function getProductsFromLastPanier($db,$sid) {
	return getProductsFromPanier($db,getLastPanier($db,$sid));
}

 function addProduct2Panier($db,$sid,$idProduit,$quantite) {
 	$idPanier = getLastPanier($db,$sid);
 	$sql = "INSERT INTO panierproduit (idPanier, idProduit, quantite) VALUES (:idPanier, :idProduit, :quantite)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["idPanier" => $idPanier,
		"idProduit" => $idProduit,
		"quantite" => $quantite]);
}catch(PDOException $e){
	var_dump($e);
	return false;
}

}

function removeProductFromPanier($db,$sid,$idProduct) {
	$idPanier = getLastPanier($db,$sid);
	$results = $db->query("DELETE FROM panierproduit WHERE idPanier = $idPanier AND idProduit=$idProduct");	
	return $results;
}

//Permet de vider la panier en cours -> utiliser getLastPanier($db,$sid) ?
function removeAllProductFromPanier($db,$sid) {
	$idPanier = getLastPanier($db,$sid);
	echo "Supprimer id panier".$idPanier;
	$results = $db->query("DELETE FROM panierproduit WHERE idPanier = $idPanier");
	// $results = $db->query("DELETE FROM panierproduit WHERE idPanier = $idPanier");
	echo "<pre>";
	var_dump($results);
	return $results;
}

function decreaseProductFromPanier($db,$sid,$idProduct) {
	$idPanier = getLastPanier($db,$sid);
	echo "idpanier ".$idPanier;
	$results = $db->query("UPDATE panierproduit SET quantite = quantite-1 WHERE idPanier = $idPanier AND idProduit = $idProduct");
	
	$result = $db->query("SELECT quantite FROM panierproduit  WHERE idPanier = $idPanier AND idProduit = $idProduct ");
	$line = $result->fetch();
	$newQuantite = $line['quantite'];
	if ($newQuantite <= 0) {
	 	removeProductFromPanier($db,$sid,$idProduct);
	 }

	return $results;
}


// Un panier validé = une commande payée
function validePanier($db,$sid) {
	$idUser = getIdBySid($db,$sid);

	$result = $db->query("Select idPanier from panier WHERE idUser=$idUser ORDER BY  idPanier DESC LIMIT 1");
	$line = $result->fetch();
	$idPanier = $line['idPanier'];

	$results = $db->query("UPDATE panier SET valide = 1 WHERE idPanier = $idPanier");	
	return $results;
}

function getFacture($db,$idPanier) {
	$result = $db->query("SELECT SUM(p.prixBase * pp.quantite) as total FROM produit p, panierproduit pp, panier pa WHERE pa.idPanier = $idPanier AND p.idProduit = pp.idProduit GROUP BY pp.idPanier");
	$line = $result->fetch();
	$prix = $line['total'];

	return $prix;
}
						
//removeAllProductFromPanier($db,"op9Y4jhCHz");

//echo getFacture($db,1);
/*
//test


 

echo "<b> Les produits <br/> </b>";
$products = getProducts($db);
foreach ($products as $product) {
	echo $product['nom'].'<br/>';
}

echo "Le dernier panier dispo : ";
$pani = getLastPanier($db,"I4nHU6QvtP");
echo $pani;
echo '<br/>';

echo "<b> Liste des produits de ce panier <br/> </b>";
 $products = getProductsFromPanier($db,"I4nHU6QvtP");
 foreach ($products as $product) {
 	echo $product['nom'].' '.$product['quantite'].'<br/>';
 }*/


// removeProductFromPanier($db,1,2);
// decreaseProductFromPanier($db,"I4nHU6QvtP",2);
 // validePanier($db,"I4nHU6QvtP");

// Ajouter le produit 3 dans le panier 2 Qte 8
// echo "<pre>";
// var_dump(addProduct2Panier($db,2,3,8));
// echo "</pre>";

// Créer panier
// echo "<pre>";
// var_dump(creatPanier($db,4,4,0));
// echo "</pre>";

// Créer panier
// echo "<pre>";
// var_dump(creatCommand($db,1,4,0));
// echo "</pre>";