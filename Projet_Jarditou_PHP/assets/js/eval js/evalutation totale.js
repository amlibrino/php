//exo1===================================================================

var PU, QTECOM, TOT, PAP, PORT, REM; // déclaration des variables 
PU=parseInt(prompt("saisisez le prix de l'article"));// saisie du prix
QTECOM=parseInt(prompt("saisissez la quantité commandée"));// nombre d'article 

TOT=(PU*QTECOM);// calcule de la somme 
if(TOT>500) { PORT=0;} // frais de port
else if(TOT<=500){PORT=Math.max(6,TOT*(2/100));}

if(TOT>200){REM=TOT*(10/100);} // totale remise 
else if(TOT<=200 && TOT>=100){REM=TOT*(5/100);}
else {REM=0;}
PAP=((TOT+PORT)-REM); // calcule de prix a payer 
console.log("somme "+TOT);
console.log("frais de port "+ PORT);
console.log("remise sur achat " +REM);
console.log("le prix à payer est "+PAP);

//exo2====================================================================

// Ecrivez un programme qui affiche la somme des nombres inférieurs à N.

var n = parseInt(prompt("saisir un nombre"));
somme=0;

for(var i=1; i<n; i++)
{
    somme+=i;
}
console.log("la somme des nombres inférieur à "+n+" est : "+somme);

//exo3=========================================================================

var n=parseInt(prompt("saisissez un nombre"));// on demande de saisir un nombre avant meme de rentrer dans la boucle 
var max=n;// max prendra la valeur max saisie
var min=n;// min prendra la valeur min saisie
var i=0;//initialisation 
while(n!=0) // tantque n est ! de 0 on continue a saisir des nombre
 {
    n = parseInt(prompt("saisissez d'autres nombres"));
    if(n==0){break;} // on arrete la boucle sans compté de 0
  if(min > n) // si min est sup a n min prend la valeur de n
    { min = n;} 
  if(max < n ) // si max est < n donc max prendra la valeur de n
    { max = n;}
i++;
}
console.log("le nombre maximun est :"+max);// affichage de min et max dans la console
console.log("le nombre minumum est :"+min);

//exo4================================================================================

var age;
var i=0;
var jeunes=0;
var adultes=0;
var autres=0;
do
{
    age = parseInt(prompt("entrez les ages "));
    i++;
    if(age<20){ jeunes++;}
    else if(age>40){autres++;}
    else{adultes++;}
}while(age<100)
console.log("le nombre de personnes de moins de 20 ans est : "+jeunes);
console.log("le nombre de personnes  de 20 à 40 ans est : "+adultes);
console.log("le nombre de personnes de plus de 40 ans est : "+autres);

//exo5==================================================================================

function TableMultiplication(n)//declaration de la fonction
{
    for (i=1; i<=10; i++)// pour i de 1 a 10
{
       resultat = n * i;// calcule de n x i
 
       console.log(n +" x "+i+" = "+resultat);// affichage du resultat dans la console
}
}
TableMultiplication(7);// n ici vaux  7  appel de la fonction

//exo6============================================================================================

var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
var prenom = prompt("entré un des prenom ");
var saisie = tab.indexOf(prenom);// on cree une variable qui prends en compte le prenom la presence du prenom via l'indexof

if(saisie==-1)//si l'indexof ne trouve pas le prenom dans tab
{
    alert("le nom saisi ne fugure pas dans liste");
}
else{
    tab.splice(tab.indexOf(prenom),1);// splice pour supprimer indexof indique quel prenom et le 1 c'est pour supprimer 1seul prenom
    tab.push(" ");// rajouter une case vide a la fin
}
console.log(tab);

//solution2: sans alerte si le nom saisi non present dans le tableau

var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];
var prenom= prompt("saisir le prenom recherché");
console.log(tab);

for(var i=0; i<=tab.length; i++)//parcourir la longueur du tableau 
{
    if(prenom==tab[i])
    {
        tab.splice(tab.indexOf(prenom),1);// supprimer le prenom par son index prenom saisi et le 1 veut dire on supp un seul a partir de cette position
    }
}
tab.push(" ");//supprimer le dernnier element du tableau 
console.log(tab);
