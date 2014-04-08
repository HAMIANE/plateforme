<?php

function connect(){
	$host = "localhost";
	$database = "plate";
	$user = "root";
	$pass = "";

	$connection = mysql_connect($host,$user,$pass);
	mysql_select_db($database);
	return $connection;
}

function requete_ligne($req){
	$con = connect();
	$query = mysql_query($req); 
	$res = mysql_fetch_array($query);
	mysql_close($con);
	return $res;
}

function requete_colonne($req){
	$con = connect();
	$query = mysql_query($req); 
	$res = array();
	$i = 0;
	while($tab = mysql_fetch_array($query))
		$res[$i++] = $tab[0];	
	mysql_close($con);
	return $res;
}

function requete_retour($req){
	$con = connect();
	$query = mysql_query($req); 
	$res = array();
	$i = 0;
	while($tab = mysql_fetch_array($query))
		$res[$i++] = $tab;	
	mysql_close($con);
	return $res;
}

function requete_execute($req,&$id=0){
	$con = connect();
	$res = mysql_query($req);
	$id = mysql_insert_id($con);
	mysql_close($con);
	if ($res)
		return true;
	else
		return false;
}

?>