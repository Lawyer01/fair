<?php
include_once('bd.php');
include_once('membre.php');

function getUsers($db) {
	$results = $db->query("SELECT * from user");	
	return $results;
}

function getEntrepots($db) {
	$results = $db->query("SELECT * from entrepot");
	return $results;
}
 
function getDemandeAsso($db) {
	$results = $db->query("SELECT * from association WHERE etat = 'attente' " );
	return $results;
}

function getProjetAsso($db) {
	$results = $db->query("SELECT * from cagnotte WHERE etat = 'attente' ");
	return $results;
}

function createEntrepot($db,$nom,$adresse,$ville,$codepostal,$pays) {
 	$sql = "INSERT INTO entrepot (nom, adresse, ville, codepostal,  pays) VALUES (:nom, :adresse, :ville, :codepostal, :pays)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["nom" => $nom,
		"adresse" => $adresse,
		"ville" => $ville,
		"codepostal" => $codepostal,
		"pays" => $pays]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}
}

function ban($db,$sid) {
	$idUser = getIdBySid($db,$sid);
	$results = $db->query("UPDATE user SET ban = 1 WHERE idUser = $idUser");
	return $results;
}

function unban($db,$sid) {
	$idUser = getIdBySid($db,$sid);
	$results = $db->query("UPDATE user SET ban = 0 WHERE idUser = $idUser");
	return $results;
}

function makeAdmin($db,$sid) {
	$idUser = getIdBySid($db,$sid);
	$results = $db->query("UPDATE user SET statut = 'admin' WHERE idUser = $idUser");
	return $results;
}

function makeTech($db,$sid) {
	$idUser = getIdBySid($db,$sid);
	$results = $db->query("UPDATE user SET statut = 'tech' WHERE idUser = $idUser");
	return $results;
}

function makeUser($db,$sid) {
	$idUser = getIdBySid($db,$sid);
	$results = $db->query("UPDATE user SET statut = 'user' WHERE idUser = $idUser");
	return $results;
}

function delEntrepot($db,$idEntrepot){
	$results = $db->query("DELETE FROM entrepot WHERE idEntrepot = $idEntrepot ");
	//return $results;
}

// Mettre des guillemets autour des variables ex : '$nom'
function modifyEntrepot($db,$idEntrepot,$nom,$adresse,$ville,$codepostal,$pays){
	$results = $db->query("UPDATE entrepot SET codepostal = '$codepostal', nom = '$nom' , adresse = '$adresse', ville = '$ville', codepostal = '$codepostal', pays = '$pays'WHERE idEntrepot = $idEntrepot");
	return $results;
}

function acceptProject($db,$idCagnotte) {
	$results = $db->query("UPDATE cagnotte SET etat = 'valide' WHERE idCagnotte = $idCagnotte");
	return $results;
}

function declineProject($db,$idCagnotte) {
	$results = $db->query("UPDATE cagnotte SET etat = 'refuse' WHERE idCagnotte = $idCagnotte");
	return $results;
}

function getUserAsso($db) {
	$results = $db->query("SELECT * from user WHERE statut = 'association' ");	
	return $results;
}

function getDemandeCtpAsso($db) {
	$results = $db->query("SELECT * FROM cagnotte WHERE etat = 'attente' ");	
	return $results;
}

function acceptCptAsso($db,$idAsso) {
	$results = $db->query("UPDATE association SET etat = 'valide' WHERE idAsso = '$idAsso' ");
	return $results;
}

function declinCptAsso($db,$idAsso) {
	$results = $db->query("UPDATE association SET etat = 'refuse' WHERE idAsso = '$idAsso' ");
	return $results;
}

// declinCptAsso($db,1);
// test
:
// modifyEntrepot($db,4,"test2","test2","ville","92340","France");


echo "<b> Liste demande cpt associations <br/> </b>";
getDemandeCtpAsso($db);

echo "<b> Liste associations <br/> </b>";
$gua = getUserAsso($db);
foreach ($gua as $ga) {
	echo $ga['nom'].'<br/>';
 }

echo "<b> Les utilisateurs <br/> </b>";
$gus = getUsers($db);
foreach ($gus as $gu) {
	echo $gu['nom'].'<br/>';
 }

echo "<b> Les entrepots <br/> </b>";
$ets = getEntrepots($db);
foreach ($ets as $et) {
	echo $et['nom'].'<br/>';
 }

echo "<b> Les associations en attente <br/> </b>";
$gda = getDemandeAsso($db);
foreach ($gda as $gd) {
	echo $gd['nomAsso'].'<br/>';
 }

echo "<b> Les projets en attente <br/> </b>";
$gpa = getProjetAsso($db);
foreach ($gpa as $gp) {
	echo $gp['nom'].'<br/>';
 }

// echo "<pre>";
// var_dump(createEntrepot($db,'ent3','Faubourg Saint Antoine','Paris',75001,'France'));
// echo "</pre>";