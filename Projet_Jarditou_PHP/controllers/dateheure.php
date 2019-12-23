<?php
// define('UTC_TO_LOCAL', true); // Si la base de données est sur le fuseau UTC
// define('UTC_TO_LOCAL', false); // Si la base de données est à l'heure locale
date_default_timezone_set('Europe/Paris');
$mois=array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
function dateFr($str){ // Convertit une chaîne date MySQL en date au format fr avec les mois traduits
    global $mois;
    if(UTC_TO_LOCAL === true){// UTC_TO_LOCAL définie dans mon globals.php, true si le serveur est en UTC
        $str.=' UTC';
    }
    $timestamp=strtotime($str);
    $result=date('j', $timestamp);
    $result.=' '.$mois[date('n', $timestamp)-1];
    $result.=' '.date('Y', $timestamp);
    return $result;
}

function dateHeureFr($str){
    $result=dateFr($str); // D'abord, on écrit la date
    if(UTC_TO_LOCAL === true){ // UTC_TO_LOCAL définie dans mon globals.php, true si le serveur est en UTC
        $str.=' UTC';
    }
    $timestamp=strtotime($str);    
    $result.=date(' à G\hi', $timestamp);// Et on ajoute l'heure
    return $result;
}