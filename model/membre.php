<?php
include_once('bd.php');


# login renvoie : String sid 
// on attend une seule ligne
function login($db,$mail, $mdp) {
	$results = $db->query("SELECT sid FROM user u WHERE mail=\"$mail\" AND mdp=\"$mdp\" LIMIT 1");
	$line = $results->fetch();
	return $line['sid'];
}

function register($db,$mail,$nom,$prenom,$mdp,$adresse,$ville,$codePostal,$pays,$statut="user") {
 	if($statut !="user" AND $statut !="tech" AND $statut !="admin" AND $statut !="association" ) {
 		echo "Type de statut $statut non reconnu";
 		return false;
	}
 	$sql = "INSERT INTO user ( prenom, nom, mail, mdp, sid, adresse, ville, codepostal, pays, statut, jetons, ban) VALUES (:prenom,:nom,:mail,:mdp,:sid,:adresse,:ville,:codepostal,:pays,:statut,0,0)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["prenom" => $prenom,
		"nom" => $nom,
		"mail" => $mail,
		"mdp" => $mdp,
		"sid" => '',
		"adresse" => $adresse,
		"ville" => $ville,
		"codepostal" =>$codePostal,
		"pays" => $pays,
		"statut" =>$statut]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }

function registerAsso($db,$nomAsso,$numAsso,$idUser,$etat) {
 	$sql = "INSERT INTO association ( nomAsso, numAsso, idUser, etat) VALUES (:nomAsso, :numAsso, :idUser, :etat)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["nomAsso" => $nomAsso,
		"numAsso" => $numAsso,
		"idUser" => $idUser,
		"etat" => $etat]);

}catch(PDOException $e){
	var_dump($e);
	return false;
}

 }
// function getIdBySid($sid) : renvoie le bon id user pour ce sid là
function getIdBySid($db,$sid) {
	$results = $db->query("SELECT idUser FROM user u WHERE sid='$sid' ");
	$line = $results->fetch();
	return $line['idUser']?$line['idUser']:-1;
}

//getKeyByMail(mail):String key
// Ajouter parenthèse => '$mail' sinon erreur
function getKeyByMail($db,$mail) {
	$results = $db->query("SELECT sid FROM user WHERE mail='$mail' ");
	$line = $results->fetch();
	return $line['sid'];
}

function generateKey($db,$idUser) {
	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$str = str_shuffle($str);
	$results = $db->query("UPDATE user SET sid = '".substr($str, 0, 10)."' WHERE idUser=$idUser");
}

function checkTechnicien($db,$sid) {
	$results = $db->query("SELECT statut FROM user WHERE sid='$sid' ");
	$line = $results->fetch();
	return $line['statut'] == "tech";
}

function checkAdmin($db,$sid) {
	$results = $db->query("SELECT statut FROM user WHERE sid='$sid' ");
	$line = $results->fetch();
	return $line['statut'] == "admin";
}

function checkAssociation($db,$sid) {
	$results = $db->query("SELECT statut FROM user WHERE sid='$sid' ");
	$line = $results->fetch();
	return $line['statut'] == "association";
}

function logout($db,$sid) {
	generateKey($db,getIdBySid($db,$sid));
}

// test
// echo 'Mon sid : ';
// $sid = login($db,"toto@gmail.com","mdp");
// echo $sid;
// echo '<br/>';

// echo 'Mon id : ';
// $id = getIdBySid($db,"I4nHU6QvtP");
// echo $id;
// echo '<br/>';

// echo "Mon sid : ";
// $cle = getKeyByMail($db,"titdddddi@gmail.com");
// echo $cle;
// echo '<br/>';

// $myuser = generateKey($db,6);

// echo "Technicien : ";
// $checkt = checkTechnicien($db,"4502681937");
// echo $checkt;
// echo '<br/>';

// echo "Technicien : ";
// $checkad = checkAdmin($db,"0");
// echo $checkad;
// echo '<br/>';

// echo "Technicien : ";
// $checkas = checkAssociation($db,"0");
// echo $checkas;
// echo '<br/>';


// $deco = logout($db,"8588585");
// echo $deco;
// echo '<br/>';

// Ajouter user
// echo "<pre>";
// var_dump(register($db,"lawyer1@gmail.com","toto","toto","toto","fr","paris",75002,"france","user"));
// echo "</pre>";

// Ajouter Assoc'
// echo "<pre>";
// var_dump(registerAsso($db,"MonAsso",100,1,"refuse"));
// echo "</pre>";


