
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

