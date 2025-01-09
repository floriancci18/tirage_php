let submit = document.getElementById('tirage');
submit.addEventListener('submit',function(event){
    event.preventDefault();
    const form = event.currentTarget;
  
    let resultat = document.getElementById('resultat');
    this.style.display = 'none';
    let compteur = 10;
    let peter = new Audio('peter.mp3');
    let peter2 = new Audio('peter2.mp3');
    const compte = () =>{
        moveImage();
        const interval = setInterval(() =>{
            resultat.innerText = compteur;
            if(compteur==0){
               form.submit();
            }
            else{
                if(compteur == 9)
                {
                    peter.play();
                }
                else if(compteur == 7)
                {
                    peter2.play();
                }
                compteur--;
            }
        },1000);
    }
    compte();
});
function moveImage()
{
    const movingImage = document.getElementById('kenza');

    let positionX = 0; // Position de départ (en pourcentage, centré horizontalement)
    let positionY = 0; // Position de départ (en pourcentage, centré verticalement)

    let intervalId;
    // Affiche l'image
      movingImage.style.display = 'block';

      // Déplace l'image toutes les 50ms
      intervalId = setInterval(() => {
        positionX += 1; // Change la position horizontale
        positionY += 1; // Change la position verticale

        // Applique les nouvelles positions
        movingImage.style.left = `${positionX}%`;
        movingImage.style.top = `${positionY}%`;

        // Arrête le mouvement si l'image sort de l'écran
        if (positionX > 50 || positionY > 50) {
          movingImage.style.backgroundImage = "url('9.jpg')";
        }
        if(positionX > 99 || positionY > 99){
            movingImage.style.backgroundImage = "url('tonio.jpg')";
            positionX=1;
            positionY=1;
        }
        
      }, 20);
    
}
const backgrounds = [
    "url('background1.jpg')",
    "url('background2.jpg')",
    "url('background3.png')"
];

let index = 0;

// Fonction pour changer le fond
function changeBackground() {
    document.body.style.background = backgrounds[index];
    document.body.style.backgroundSize = "cover"; // Optionnel pour les images
    index = (index + 1) % backgrounds.length;
}

// Lancer le changement toutes les 2 secondes
setInterval(changeBackground, 2000);