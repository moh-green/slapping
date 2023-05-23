"use strict";

let connect = document.querySelectorAll('.connexionPopup'),
    create = document.querySelectorAll('.inscriptionPopup');
    
let activePopup = null;

function openPopup(popup) {
  if (activePopup !== null) {
    activePopup.style.display = 'none';
  }
  popup.style.display = 'block';
  activePopup = popup;
}

connect.forEach(function(project) {
  project.addEventListener('click', function() {
    let popup = document.querySelector(this.getAttribute('data-popup'));
    openPopup(popup);
  });
});

create.forEach(function(project) {
  project.addEventListener('click', function() {
    let popup = document.querySelector(this.getAttribute('data-popup'));
    openPopup(popup);
  });
});

let closeButtons = document.querySelectorAll('.popup .close');
closeButtons.forEach(function(closeButton) {
  closeButton.addEventListener('click', function() {
    this.closest('.popup').style.display = 'none';
    activePopup = null;
  });
});