"use strict";
// Sélectionner tous les éléments titre-text
let titres = document.querySelectorAll('.titre-article');
let blurBackground = document.getElementById('blur-background');
let closes = document.querySelectorAll('.close');

// Parcourir chaque élément titre-text et ajouter un événement de clic
titres.forEach(function(titre, index) {
  titre.addEventListener('click', function() {
    // Récupérer l'élément du contenu-text correspondant
    let contenu = document.querySelectorAll('.contenu-article')[index];
    blurBackground.classList.remove('display-none');
    
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
    // Vérifier si le contenu est déjà visible
    if (contenu.classList.contains('display-none')) {
      // Afficher le contenu
      contenu.classList.remove('display-none');
    } else {
      // Masquer le contenu
      contenu.classList.add('display-none');
    }
  });
});
closes.forEach(function(close, index){
    close.addEventListener('click', function(){
        let contenu = document.querySelectorAll('.contenu-article')[index];
        blurBackground.classList.add('display-none');
        contenu.classList.add('display-none');
    })
})