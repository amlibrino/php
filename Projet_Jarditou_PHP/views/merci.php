<?php
if(!isset($_SESSION['nom'])){
session_start();
}
?>

<h1 class="mx-auto" >Bienvenue <?= $_SESSION['nom'].'  '.$_SESSION['prenom'].'merci de votre demande' ?></h1>


