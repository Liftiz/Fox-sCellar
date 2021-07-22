window.onload =function miseEnAttente()
{
 //Traitement
 setTimeout(fonctionAExecuter, 5000); //On attend 5 secondes avant d'exécuter la fonction
}
function fonctionAExecuter()
{
    window.location.href = "accueil.html";
}
console.log(document.location);