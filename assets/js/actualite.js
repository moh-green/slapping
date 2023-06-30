"use strict";

// Sélectionner tous les éléments titre-text
let titres = document.querySelectorAll(".actu-text");
let blurBackground = document.getElementById("hide-background");
let closes = document.querySelectorAll(".close");

// Parcourir chaque élément titre-text et ajouter un événement de clic
titres.forEach(function (titre, index) {
  titre.addEventListener("click", function () {
    // Récupérer l'élément du contenu-text correspondant
    let contenu = document.querySelectorAll(".article")[index];
    blurBackground.classList.remove("display-none");

    window.scrollTo({
      top: 110,
      behavior: "smooth",
    });

    // Vérifier si le contenu est déjà visible
    if (contenu.classList.contains("display-none")) {
      // Afficher le contenu
      contenu.classList.remove("display-none");
    } else {
      // Masquer le contenu
      contenu.classList.add("display-none");
    }
  });
});

closes.forEach(function (close, index) {
  close.addEventListener("click", function () {
    let contenu = document.querySelectorAll(".article")[index];
    blurBackground.classList.add("display-none");
    contenu.classList.add("display-none");
  });
});

// "use strict";
// // Sélectionner tous les éléments titre-text
// let titres = document.querySelectorAll(".actu-text");
// let blurBackground = document.getElementById("hide-background");
// let closes = document.querySelectorAll(".close");

// // Parcourir chaque élément titre-text et ajouter un événement de clic
// titres.forEach(function (titre, index) {
//   titre.addEventListener("click", function () {
//     // Récupérer l'élément du contenu-text correspondant
//     let contenu = document.querySelectorAll(".contenu-article")[index];

//     window.scrollTo({
//       top: 0,
//       behavior: "smooth",
//     });
//     // Vérifier si le contenu est déjà visible
//     if (contenu.classList.contains("display-none")) {
//       // Afficher le contenu
//       contenu.classList.remove("display-none");
//     } else {
//       // Masquer le contenu
//       contenu.classList.add("display-none");
//     }
//     if (blurBackground.classList.contains("display-none")) {
//       // Afficher le contenu
//       blurBackground.classList.remove("display-none");
//     } else {
//       // Masquer le contenu
//       blurBackground.classList.add("display-none");
//     }
//   });
// });
// closes.forEach(function (close, index) {
//   close.addEventListener("click", function () {
//     let contenu = document.querySelectorAll(".contenu-article")[index];
//     blurBackground.classList.add("display-none");
//     contenu.classList.add("display-none");
//   });
// });

function copy_to_clipboard() {
  //copy to clipboard and send an alert "Copied to clipboard"
  let url = window.location.href;
  navigator.clipboard.writeText(url);
  alert("Url copié");
}
