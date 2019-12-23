//solution1: ici on prend en compte si on saisi un prenom qui n'est pas present dans la liste 

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
