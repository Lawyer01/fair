<?php
include_once('bd.php');
include_once('membre.php');

function GenerateDelivery($db) { // il faut renvoyer un array d'entrepots. Voir exemple getProducts de eCommerce
	$results = $db->query("SELECT adresse, codepostal, ville, pays FROM entrepot");
	$line = $results->fetch();
	return $line['adresse'].' '.$line['codepostal'].' '.$line['ville'].' '.$line['pays'];
}

function getPropositions($db,$idUser) {
	$results = $db->query("SELECT * FROM propositionrachat WHERE idUser=$idUser ORDER BY etatPropo limit 1"); //limit 1 ?
	return $results;
}

function getAllPropositions($db,$idUser) {
$results = $db->query("SELECT * FROM propositionrachat WHERE 1");
	return $results;
}

// function EntrepotPossessProduct($db) {
// $results = $db->query("SELECT adresse, codepostal, ville, pays FROM entrepot, entrepotproduit WHERE idEntrepot = $idEntrepot AND quantite > 0 AND idProduit = $idProduit LIMIT 1");
// 	return $results;
// }
function prixRachat($prixBase,$etat){
switch ($etat) {
    case "hs":
        $etat = 0;
        break;
    case "etat correct":
        $etat = 0.2;
        break;
    case "bon etat":
        $etat = 0.4;
        break;
    case "Très bon etat":
        $etat = 0.6;
        break;
    case "Comme neuf":
        $etat = 0.8;
        break;
}

	$prixRachat = $prixBase * $etat - (($prixBase*30)/100);

	return $prixRachat;
}

function creatProposition($db, $sid, $idProduit, $photo, $description, $etatEsthetique, $prix) {
	$prixRachat = prixRachat(1200,"hs");
	$idUser = getIdBySid($db,$sid);
	$sql = "INSERT INTO propositionrachat (idUser, idProduit, etatPropo, photo, description, etatEsthetique, prixRachat, contreOffre, prixContreOffre) VALUES (:idUser, :idProduit, 'attente', :photo, :description, :etatEsthetique, :prixRachat, 0, 0)";

	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["idUser" => $idUser,
		"idProduit" => $idProduit,
		"photo" => $photo,
		"prixRachat" => $prixRachat,
		"description" => $description,
		"etatEsthetique" => $etatEsthetique]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}
}

function AcceptOffer($db,$sid,$idProposition){
	$results = $db->query("UPDATE propositionrachat SET etatPropo = 'valide' WHERE idProposition = $idProposition");
	return $results;
}

function DeclinOffer($db,$sid,$idProposition){
	$results = $db->query("UPDATE propositionrachat SET etatPropo = 'refuse' WHERE idProposition = $idProposition");
	return $results;
}

// aucun affichage
 function getIdProductByEntrepot($db,$idProduit){
	$results = $db->query("SELECT idEntrepot FROM entrepotproduit WHERE idProduit = $idProduit");
	return $results;
}

// $pie = getIdProductByEntrepot($db,1);
// echo $pie;


// DeclinOffer($db,"op9Y4jhCHz",8);
// AcceptOffer($db,"op9Y4jhCHz",8);
// creatProposition($db,"op9Y4jhCHz",1,1,"description","hs",1999);

// test
// $sid = login($db,"toto@gmail.com","mdp");
// echo $sid;

// 	$sql = "INSERT INTO propositionrachat (idProposition,idUser,idProduit,etatPropo,photo,description,etatEsthetique,prixRachat,contreOffre,prixContreOffre) VALUES (:idProposition,:idUser,:idProduit,:etatPropo,:photo,:description,:etatEsthetique,:prixRachat,:contreOffre,:prixContreOffre");
// 	$stmt= $db->prepare($sql);
// 	$stmt->execute(["idProposition" => "1",
// 		"idUser" => 1,
// 		"etatPropo" => 1264,
// 		"idProduit" => 1,
// 		"etatPropo" => "prixContreOffre",
// 		"photo" => 1,
// 		"description" => "128 GO",
// 		"etatEsthetique" => "hs",
// 		"prixRachat" => 0,
// 		"contreOffre" => "attente",
// 		"prixContreOffre" => "attente",]);

// echo "Adresse de l'entrepot : ";
// $epp = EntrepotPossessProduct($db);
// echo $epp;
// echo "</br>";
 
// $gp = getPropositions($db,1);
//  foreach ($gp as $g) {
//  	echo "Proposition N° 1 -> ".$g["idProposition"]."<br/>";};

//  $gap = getAllPropositions($db,1);
//  foreach ($gap as $ga) {
// 	echo "Proposition N° ".$ga['idProposition']."<br/>";}
