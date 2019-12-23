// Ecrivez un programme qui affiche la somme des nombres inférieurs à N.

var n = parseInt(prompt("saisir un nombre"));
somme=0;

for(var i=1; i<n; i++)
{
    somme+=i;
}
console.log("la somme des nombres inférieur à "+n+" est : "+somme);
