// On va chercher les différents éléments de notre page
const pages = document.querySelectorAll(".page");
const header = document.querySelector("header");
const nbPages = pages.length // Nombre de pages du formulaire
let pageActive = 1;
// On attends le chargement de la page 
console.log(nbPages)
window.onload = () => {
    // On affiche la premiere page du formulaire
    document.querySelector(".page").style.display = "initial";

    // On affiche les numéros des pages dans l'entete
    // On parcourt la liste des pages
    // For in permet de boucler sur un element et de recuperer un index 
    pages.forEach((page, index) => {
        // On crée l'element "numéro de page" 
        let element = document.createElement("div");
        element.classList.add("page-num");
        element.id= "num" + (index + 1);
        if (pageActive === index + 1) {
            element.classList.add("active");
        }
        element.innerHTML = index + 1;
        header.appendChild(element)
    });

    // On gère les boutons "suivant"
    let boutons = document.querySelectorAll(".next");

    // Je vais avoir un objet bouton parmis tous les objets boutons 
    for (let bouton of boutons) {
        bouton.addEventListener("click", pageSuivante);

    }

       // On gère les boutons "precedent"
     boutons = document.querySelectorAll(".prev");

       // Je vais avoir un objet bouton parmis tous les objets boutons 
       for (let bouton of boutons) {
           bouton.addEventListener("click", pagePrecedente);
   
       }
}


// Cette fonction fait avancer le formulaire d'une page
function pageSuivante() {
  

    // On masque toutes les pages
    for (let page of pages) {
        page.style.display = "none";
    }

    //On affiche la page suivante
    // this c'est le bouton sur lequel j'ai cliquer je vais chercher parentElement qui es la div parent et je vais chercher la prochaine balise et je l'affiche
    this.parentElement.nextElementSibling.style.display = "initial";
    // On "desactive" la page active
    document.querySelector(".active").classList.remove("active");
    // On incrémente page active pour dire qu'on passe à la page suivante
    pageActive++;

    // On "active" le nouveau numéro
    document.querySelector("#num" + pageActive).classList.add("active");
}


// Cette fonction fait reculer le formulaire d'une page
function pagePrecedente() {
  

    // On masque toutes les pages
    for (let page of pages) {
        page.style.display = "none";
    }

    //On affiche la page précédente
    // this c'est le bouton sur lequel j'ai cliquer je vais chercher parentElement qui es la div parent et je vais chercher la prochaine balise et je l'affiche
    this.parentElement.previousElementSibling.style.display = "initial";
    // On "desactive" la page active
    document.querySelector(".active").classList.remove("active");
    // On incrémente page active pour dire qu'on passe à la page suivante
    pageActive--;

    // On "active" le nouveau numéro
    document.querySelector("#num" + pageActive).classList.add("active");
}
