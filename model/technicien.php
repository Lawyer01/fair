<?php
include_once('bd.php');
include_once('marchand.php');

function creatCategorie($db, $sid, $nom) {
 	$sql = "INSERT INTO categorie (nom) VALUES (:nom)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["nom" => $nom]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }


 function delCategorie($db, $sid, $idCategorie){
	$results = $db->query ("DELETE FROM categorie WHERE idCategorie = $idCategorie ");

 }

 function creatProduct($db, $sid, $idCategorie,$nom, $marque, $caracteristiques, $photo, $description, $prixBase) {
 	$sql = "INSERT INTO produit (idCategorie, nom, marque, caracteristiques, photo, description, prixBase) VALUES (:idCategorie, :nom, :marque, :caracteristiques, :photo, :description, :prixBase)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["idCategorie" => $idCategorie,
		"nom" => $nom,
		"marque" => $marque,
		"caracteristiques" => $caracteristiques,
		"photo" => $photo,
		"description" => $description,
		"prixBase" => $prixBase]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }

  function delProduct($db, $sid, $idProduit){
	$results = $db->query ("DELETE FROM produit WHERE idProduit = '$idProduit' ");

 }

  function contreProposition($db, $sid, $idProposition ,$prixRachat){
	$results = $db->query ("UPDATE propositionrachat SET prixRachat = $prixRachat, contreOffre=1, etatPropo = 'attente' WHERE idProposition = $idProposition");

 }

 function updatEntrepot($db,$sid,$quantite,$idEntrepot,$idProduit) {
	$results = $db->query("UPDATE entrepotproduit SET quantite = $quantite WHERE idEntrepot = $idEntrepot AND idProduit = $idProduit ");
	return $results?true:false;
}

 function addProductEntrepot($db,$idEntrepot, $idProduit, $quantite) {
 	$sql = "INSERT INTO entrepotproduit(idEntrepot, idProduit, quantite) VALUES (:idEntrepot, :idProduit, :quantite)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["idEntrepot" => $idEntrepot,
		"idProduit" => $idProduit,
		"quantite" => $quantite]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }

function creatProjectAsso($db, $idAsso, $sid, $nom, $type, $etat="attente") {
 	$sql = "INSERT INTO cagnotte (idAsso, nom, type, etat) VALUES (:idAsso, :nom, :type , :etat )";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["idAsso" => $idAsso,
"nom" => $nom,
"type" => $type,
"etat" => $etat]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }

//CreatEntrepot($db, 1, 99);

// test
creatProjectAsso($db, 1, "I4nHU6QvtP", "MonProjetAsso", "ecologique");
// echo updatEntrepot($db,"op9Y4jhCHz",888,2,1);
// addProductEntrepot($db,2,1,99);
// contreProposition($db, "op9Y4jhCHz", 8 ,15000);
// delProduct($db,"op9Y4jhCHz", 5);

// delCategorie($db,"op9Y4jhCHz",3);
// Ajouter categorie
// echo "<pre>";
// var_dump(creatCategorie($db,"op9Y4jhCHz","Ecouteur"));
// echo "</pre>";

//Ajouter categorie
// echo "<pre>";
// var_dump(creatProduct($db, "op9Y4jhCHz", 1, "iPhone 12", "Apple", "512 GO", 1, "description", 1500));
// echo "</pre>";