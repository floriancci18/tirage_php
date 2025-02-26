let submit = document.getElementById('tirage');
submit.addEventListener('submit',function(event){
    event.preventDefault();
    const form = event.currentTarget;
  
    let resultat = document.getElementById('resultat');
    this.style.display = 'none';
    let compteur = 30;
    //let musique = new Audio('jingle.mp3');
    
    const compte = () =>{
        //musique.play();
        const interval = setInterval(() =>{
            resultat.innerText = compteur;
            if(compteur==0){
               form.submit();
            }
            else{
                compteur--;
            }
        },1000);
    }
    compte();
});
const backgrounds = [
    "url('background1.jpg')",
    "url('background2.jpg')",
    "url('background3.jpg')",
    "url('background4.jpeg')",
    "url('background5.gif')",
  
   
    
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

