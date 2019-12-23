
var PU, QTECOM, TOT, PAP, PORT, REM; // déclaration des variables 
PU=parseInt(prompt("saisisez le prix de l'article"));// saisie du prix
QTECOM=parseInt(prompt("saisissez la quantité commandée"));// nombre d'article 

TOT=(PU*QTECOM);// calcule de la somme 
if(TOT>500) 
    { 
        PORT=0;
    } // frais de port
    else if(TOT<=500)
    {
        PORT=Math.max(6,TOT*(2/100));
    }

if(TOT>200)
    {
        REM=TOT*(10/100);
    } // totale remise 
    else if(TOT<=200 && TOT>=100)
    {
        REM=TOT*(5/100);
    }
    else 
    {
        REM=0;
    }
PAP=((TOT+PORT)-REM); // calcule de prix a payer 
console.log("somme "+TOT);
console.log("frais de port "+ PORT);
console.log("remise sur achat " +REM);
console.log("le prix à payer est "+PAP);
