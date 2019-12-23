
var modif = document.getElementById("modif");
var supp = document.getElementById("supp");
var retour = document.getElementById("retour");

retour.addEventListener("click", function(){ // si on clic sur le boutton retour 
    history.go(-1);// retourner a la page précedente (-1)
});

supp.addEventListener("click", function(){
    let get = location.search; // recupere le get(pro_id) dans url
    let confirmation = confirm("Voulez vous vraiment supprimer cet enregistrement ?");// comfirmation de suppression 
    if (confirmation) { //si ok
        location= "../controllers/suppression.php"+get; //envoi vers le script php
    }else{ //si annuler
        location="../views/liste.php";//redirection vers la liste
    }
});

modif.addEventListener("click", function(modif){
    let get = location.search; // recupere le get(pro_id) dans url
   location="../views/formulaire_modif.php"+get;
});