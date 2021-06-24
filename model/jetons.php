<?php
include_once('bd.php');
include_once('membre.php');

function getJetons($db,$sid) {
	$results = $db->query("SELECT jetons FROM user WHERE sid='$sid'");
	$line = $results->fetch();
	return $line['jetons'];
}

function creditJetons($db,$sid,$prix) {
	$results = $db->query("UPDATE user SET jetons = ". (getJetons($db,$sid) + $prix*10) ." WHERE sid = '$sid'");
	return $results;
}



// UPDATE user SET jetons = 10 WHERE idUser = 1;

// function soutenirProjet($db,$sid,$prix) {
// 	$results = $db->query("UPDATE user SET jetons =".getJetons($db,$sid)."- $prix WHERE sid = $sid");
// 	return $results;
// }


function soutenirProjet($db,$sid,$prix,$idCagnotte) {
	$idUser = getIdBySid($db,$sid);
	// requet epour déduire le jeton
	$results = $db->query("UPDATE `user` SET `jetons` = (Select jetons-'$prix')\n"."\n"."WHERE `user`.`idUser` =$idUser");
	// requete pour enregistrer la transaction dans cagnotteuser
	$sql = "INSERT INTO cagnotteuser (idCagnotte, idUser, jetons) VALUES (:idCagnotte, :idUser, :jetons)";
	try {
		$stmt= $db->prepare($sql);
	return $stmt->execute(["idCagnotte" => $idCagnotte,
		"idUser" => $idUser,
		"jetons" => $prix]);
}catch(PDOException $e){
	var_dump($e);
	return false;
}
}
// function getIdBySid($sid) : renvoie le bon id user pour ce sid là
// test
echo "<b> JETONS </b> <br/>";

$gj = getJetons($db,"op9Y4jhCHz");
echo "Nombre de jetons avant credit : ".$gj."<br />";

soutenirProjet($db,"op9Y4jhCHz",99,1);
//creditJetons($db,"op9Y4jhCHz",999);
$gj = getJetons($db,"op9Y4jhCHz");
echo "Nombre de jetons après credit : ".$gj."<br />";

// soutenirProjet($db,"I4nHU6QvtP",10);
