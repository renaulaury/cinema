// Sélectionne le conteneur des images du carrousel
const carrouselImages = document.querySelector('.carrousel-images');

// Sélectionne toutes les images dans le carrousel
const images = document.querySelectorAll('.carrousel-images img');

// Sélectionne le bouton précédent
const prevButton = document.querySelector('.prev');

// Sélectionne le bouton suivant
const nextButton = document.querySelector('.next');

// Initialise l'index de l'image actuellement affichée à 0
let index = 0;

// Fonction pour afficher l'image en fonction de l'index actuel
function showImage() {
  // Récupère la largeur d'une seule image
  const width = images[0].clientWidth;

  // Translate le conteneur des images pour afficher l'image correspondante
  carrouselImages.style.transform = `translateX(${-index * width}px)`;
}

// Écouteur d'événement pour le bouton suivant
nextButton.addEventListener('click', () => {
  // Augmente l'index pour passer à l'image suivante, et revient au début si on dépasse le nombre total d'images
  index = (index + 1) % images.length;

  // Met à jour l'affichage
  showImage();
});

// Écouteur d'événement pour le bouton précédent
prevButton.addEventListener('click', () => {
  // Diminue l'index pour revenir à l'image précédente
  index = (index - 1 + images.length) % images.length;

  // Met à jour l'affichage
  showImage();
});

// Ajuste le carrousel lorsque la fenêtre est redimensionnée
window.addEventListener('resize', showImage);
