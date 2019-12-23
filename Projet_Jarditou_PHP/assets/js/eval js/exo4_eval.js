
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


// on peut utiliser un switch , mais aussi les tableau(rentrer l age dans un tableau )
