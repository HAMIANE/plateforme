<?php
session_start();

function connectUser($login, $password){
	if(strpos($login, " ")!==false or strpos($password, " ")!==false){
		return false;
	}
	$req = "SELECT * FROM  `utilisateur`  where upper(login) = upper('" . $login . "') and password = '" . ($password) . "'";
	$r = requete_retour($req);
	
	
	if ( count($r)==1){
		$_SESSION['UserLog'] = strtoupper($login);
		return true;
	}	
	return false;
}

function userExist($username){
	$req = "select * from  utilisateur where upper(login) = upper('" . $login . "')";
	$r = requete_retour($req);
	if ( count($r)==1)	
		return true;
	return false;
}

function isConnected(){
	return isset($_SESSION['UserLog']);
}

function IdUser(){
	$req = "select ID_utilisateur from utilisateur where upper(login) = upper('" . $_SESSION['UserLog'] . "')";
	$r = requete_ligne($req);
	return $r[0];
}
function userName(){
	$req = "select Concat(Nom_utilisateur, '&nbsp;', prenom_utilisateur) from utilisateur where upper(login) = upper('" . $_SESSION['UserLog'] . "')";
	$r = requete_ligne($req);
	return $r[0];
}

function NomRole(){
	$req = "select nom_role from role r inner join utilisateur u on u.ID_role=r.ID_role where upper(login) = upper('" . $_SESSION['UserLog'] . "')";
	$r = requete_ligne($req);
	return $r[0];
}

function IdRole(){
	$req = "select ID_role from utilisateur where upper(login) = upper('" . $_SESSION['UserLog'] . "')";
	$r = requete_ligne($req);
	return $r[0];
}

function haveIdRole($ID_role){
	if(IdRole()==$ID_role)
		return true;
	return false;
}

function isAdmin(){
	return haveIdRole("1");
}

function userHaveDroit($user,$IdDroit){
	$req = "select d.ID_role 
			from role_x_droit d 
			inner join role r on d.ID_role=r.ID_role 
			inner join utilisateur u on u.ID_role=r.ID_role 
			where upper(login) = upper('" . $user . "')
			and d.ID_droit = ". $IdDroit;
	$r = requete_retour($req);
	if ( count($r)==1)
		return true;
	return false;
}

function haveDroit($ID_droit){
	return userHaveDroit($_SESSION['UserLog'],  $ID_droit);
}

?>