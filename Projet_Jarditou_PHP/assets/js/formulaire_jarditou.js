//declaration de varibale pour les id des input
var formValid = document.getElementById("envoyer");// declation de variable pour la validation du formulaire appel de id"envoyer", 
var nom = document.getElementById("nom");
var prenom = document.getElementById("prenom");
var sexe = document.getElementById("sexe");
var ddn = document.getElementById("ddn");
var cp = document.getElementById("cp");
var adresse = document.getElementById("adresse");
var ville = document.getElementById("ville");
var mail = document.getElementById("mail");
var tel = document.getElementById("tel");
var check = document.getElementById("check");
var area = document.getElementById("area");

//declaration des variable pour afficher un msg dans span si valeur non saisi(champs vide )
var missNom = document.getElementById("missNom");// variable missSoc pour recuperer id dans le span et pourvoir afficher un message d'erreur si champ mal saisi
var missPrenom = document.getElementById("missPrenom"); // miss (missing) si on oublie de rensigner le champ
var missSexe = document.getElementById("missSexe"); // miss (missing) si on oublie de rensigner le champ
var missDdn = document.getElementById("missDdn"); // miss (missing) si on oublie de rensigner le champ
var missCp = document.getElementById("missCp");
var missAdr = document.getElementById("missAdr");
var missVille = document.getElementById("missVille");
var missMail = document.getElementById("missMail");
var missTel = document.getElementById("missTel");
var missArea = document.getElementById("missArea");

// declaration des regex vérifier la validité d’une chaîne 
var textValid = new RegExp(/^[a-zA-Z\-\déèàçùëüïôäâêûîô#&]+$/); // pour les prenom et nom , peut contenir des chiffres et des lettres 
var adresseValid = new RegExp(/^[^@+=|><\]\[{}]+$/); //(/^((?:[013-9]\d)|(?:2[0-9ABab]))\d{3}$/);
var ddnValid = new RegExp(/^([0-2][0-9]|(3)[0-1])(\/)(((0)[0-9])|((1)[0-2]))(\/)\d{4}$/);
var cpValid = new RegExp(/^(?:(?:(?:(?:[013-8]\d)|(?:2[\dabAB])|(?:9[0-5]))\d{3})|(?:(?:97[1-5]\d{2})|(?:98[06-8]\d{2})))$/);// filtre du code postale il doit contenir 5 nombres sauf la corse qui contien des lettres
var mailValid = new RegExp(/^[-+.\w]{1,64}@[-.\w]{1,64}\.[-.\w]{2,6}$/i);// filtre email il divise le mail en 4 blocs le 1er accepte lettre, chiffre et caractere le 2nd @ obligatoire 3em pour la sone de texte et le 4em demande un .et des caractéres
var telValid = new RegExp(/^[0-9]{10}|[0-9\s.]{14}$/);
var areaValid=new RegExp(/^[^@+=|><\]\[{}]+$/);

formValid.addEventListener("click", validation);// evenement click qui contient la foction validation

function validation(event)// si le cham est vide
{
    // nom si le champ est vide
    if (nom.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missNom.textContent = 'Champ non renseigné';
        missNom.style.color = 'red';
    }
    // test de la validité du champs de saisie
     else if (textValid.test(nom.value) == false)             // si la saisie est correct ne respect pas la regex
     {
        event.preventDefault();
        missNom.textContent = 'Format incorrect';
        missNom.style.color = 'orange';
    } 
    else 
    {
        missNom.textContent = 'Ok';
        missNom.style.color = 'green';
    }
    // prenom si le champ est vide
    if (prenom.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missPrenom.textContent = 'Champ non renseigné';
        missPrenom.style.color = 'red';
    }
     else if (textValid.test(prenom.value) == false) 
     {
        event.preventDefault();
        missPrenom.textContent = 'Format incorrect';
        missPrenom.style.color = 'orange';
    } else 
    {
        missPrenom.textContent = 'Ok';
        missPrenom.style.color = 'green';
    }
    // sexe si le champ est vide
    if (sexe.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missSexe.textContent = 'Choisir votre sexe';
        missSexe.style.color = 'red';
    }
    // test de la validité du champs de saisie
    else 
    {
        missSexe.textContent = 'Ok';
        missSexe.style.color = 'green';
    }
    // date de naissance//////////////////
    if (ddn.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missDdn.textContent = 'Champ non renseigné';
        missDdn.style.color = 'red';
    } 
    else{
        missDdn.textContent="Ok";
        missDdn.style.color='green';
    }
    // code postale si le champ est vide
    if (cp.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missCp.textContent = 'Champ non renseigné';
        missCp.style.color = 'red';
    } 
    else if(cpValid.test(cp.value)== false)// si la valeur de societe est manquante
    {
        event.preventDefault(); //annuler la validation
        missCp.textContent = ' Le code postal n est pas valide '; // afficher ce text d'erreur a la palce de * au span(html)
        missCp.style.color = 'orange'; // le style de couleur a afficher est rouge
    }
    else{
        missCp.textContent="Ok";
        missCp.style.color='green';
    }
    // adresse si le champ est vide
    if (adresse.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missAdr.textContent = 'Champ non renseigné';
        missAdr.style.color = 'red';
    }
    // test de la validité du champs de saisie
     else if (adresseValid.test(adresse.value) == false)             // si la saisie est correct ne respect pas la regex
     {
        event.preventDefault();
        missAdr.textContent = 'saisissez une adresse correcte';
        missAdr.style.color = 'orange';
    } 
    else 
    {
        missAdr.textContent = 'Ok';
        missAdr.style.color = 'green';
    }
    
    // ville  si le champ est vide
    if (ville.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missVille.textContent = 'Champ non renseigné';
        missVille.style.color = 'red';
    } 
    else if(textValid.test(ville.value)==false)// si la valeur de societe est manquante
    {
        event.preventDefault(); //annuler la validation
        missVille.textContent = 'Saisir de nom de votre ville'; // afficher ce text d'erreur a la palce de * au span(html)
        missVille.style.color = 'orange'; // le style de couleur a afficher est rouge
    }else{
        missVille.textContent="Ok";
        missVille.style.color='green';
    }
    // email   si le champ est vide
    if (mail.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missMail.textContent = 'Champ non renseigné';
        missMail.style.color = 'red';
    } 
    else if(mailValid.test(mail.value)==false)// si la valeur de societe est manquante
    {
        event.preventDefault(); //annuler la validation
        missMail.textContent = 'Veuillez rensigner une adresse mail valide '; // afficher ce text d'erreur a la palce de * au span(html)
        missMail.style.color = 'orange'; // le style de couleur a afficher est rouge
    }
    else{
        missMail.textContent="Ok";
        missMail.style.color='green';
    }
    // telephone 
    if (tel.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missTel.textContent = 'Champ non renseigné';
        missTel.style.color = 'red';
    } 
    else if(telValid.test(tel.value)==false)// si la valeur de societe est manquante
    {
        event.preventDefault(); //annuler la validation
        missTel.textContent = 'Veuillez rensigner un numero valide '; // afficher ce text d'erreur a la palce de * au span(html)
        missTel.style.color = 'orange'; // le style de couleur a afficher est rouge
    }
    else{
        missTel.textContent="Ok";
        missTel.style.color='green';
    }  

    // area si le champ est vide
    if (area.validity.valueMissing) //si le champs n est pas renseiger
    {
        event.preventDefault()
        missArea.textContent = 'Champ non renseigné';
        missArea.style.color = 'red';
    } 
    else if(areaValid.test(area.value)==false)// si la valeur de societe est manquante
    {
        event.preventDefault(); //annuler la validation
        missArea.textContent = 'Veuillez saisir votre demande'; // afficher ce text d'erreur a la palce de * au span(html)
        missArea.style.color = 'orange'; // le style de couleur a afficher est rouge
    }
    else{
        missArea.textContent="Ok";
        missArea.style.color='green';
    }
    // missCheck
    if (check.validity.valueMissing) 
    {
        event.preventDefault()
        missCheck.textContent = 'Veillez accepter les conditions';
        missCheck.style.color = 'red';
    }
    else 
    {
        missCheck.textContent = 'Ok';
        missCheck.style.color = 'green';
    }      
    console.log(area.value);
    console.log(areaValid.test(area.value));
}


