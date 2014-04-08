<?php
function affiche_date($d){
	$t = split('-',$d);
	if(count($t)==3)
		return $t[2].'/'.$t[1].'/'.$t[0];
	else
		return '';
}

function convert_date($d){
	$t = split('/',$d);
	if(count($t)==3)
		return $t[2].'-'.$t[1].'-'.$t[0];
	else
		return '';
}

?>