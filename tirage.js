
const backgrounds = [
    "url('background1.jpg')",
    "url('background2.jpeg')",
    "url('background3.jpeg')",
    "url('background4.jpeg')",
    "url('background5.jpeg')",
    "url('background6.jpg')",
  
   
    
];

let index = 0;

// Fonction pour changer le fond
function changeBackground() {
    document.body.style.background = backgrounds[index];
    document.body.style.backgroundSize = "cover"; // Optionnel pour les images
    document.body.style.backgroundPosition = "center";
    index = (index + 1) % backgrounds.length;
}

// Lancer le changement toutes les 2 secondes
setInterval(changeBackground, 2000);

