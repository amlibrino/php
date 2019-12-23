<?php

/*
 *
 *  Contient les fonctions de récupération d'un fichier depuis un formulaire
 * 
 */
/*
  strrchr recherche dans la chaine param1 la dernière occurence du caractère param2
  renvoie la sous-chaîne commençant à la dernière occurence de param2
  si param2 n'est pas trouvé, strrchr renvoie false.
  Pour commencer de la première occurence de param2, on utiliserait strstr
 */

function readFileInfo($fic, $pro_id) {                                            // $fic, raccourci vers le sous-tableau de $_files contenant les infos du fichier
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $fTab = array('name' => $pro_id, // Le nom du fichier à enregistrer
        'ext' => strrchr($fic['name'], '.'), // l'extension (le point et tout ce qui le suit)
        'tmp' => $fic['tmp_name'], // Le fichier temporaire reçu
        'mimeType' => finfo_file($finfo, $fic['tmp_name']));    // le type mime du fichier temporaire
    finfo_close($finfo);
    return $fTab;
}

function moveTmpFile($fic) { // retourne un booléen
    if (preg_match('/^image/', $fic['mimeType'])) {                             // Si le fichier est une image
        move_uploaded_file($fic['tmp'], '../assets/images/jarditou_photos/' . $fic['name'] . $fic['ext']);  // On déplace le fichier temporaire en le renommant
        return true;
    } else {
        return false;
    }
}

/*
if (isset($_FILES['photo']['tmp_name'])) {
$photo= "new".$_FILES["photo"]["name"];
$photoPath = '../assets/images/jarditou_photos/'.$pro_id.'.'.$photo;


$photo= "new".$_FILES["photo"]["name"];
$photoPath = '../assets/images/jarditou_photos/'.$photo;
var_dump($_FILES);
echo $photoPath;
move_uploaded_file($_FILES["photo"]["tmp_name"], "$photoPath");



$dossier='../assets/images/jarditou_photos';
$aMimeType=array("image/gif", "image/jpeg", "image/pjpeg", "image/png", "image/x-png", "image/tiff");
$finfo=finfo_open(FILEINFO_MIME_TYPE);
$mimeType=finfo_file($finfo,$_FILES["photo"]["tmp_name"]);
var_dump($_FILES['photo']['name']);
if(in_array($mimeType,$aMimeType)){
    $extension= substr(strrchr($_FILES["photo"]["name"], "."), 1);
    $photo=$extension;
    var_dump($extension);
    move_uploaded_file($_FILES["photo"]["tmp_name"], $dossier.'/'.$id.'.'.$extension); 

}else{
  echo"extension du fichie incorrect";
}

*/

?>
