<?php
session_start();
if(empty($_POST['apprennant']))
{
    header('location:tirage.php');
    exit;
}
else
{
    $_SESSION['appprennant'] = serialize($_POST['apprennant']);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vidéo en arrière-plan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            overflow: hidden;
        }

        /* Conteneur de la vidéo */
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        /* La vidéo */
        .video-container video {
            position: absolute;
            top: 50%;
            left: 50%;
            min-width: 100%;
            min-height: 100%;
            width: auto;
            height: auto;
            transform: translate(-50%, -50%);
            object-fit: cover;
        }

        /* Contenu au-dessus de la vidéo */
        .content {
            position: relative;
            z-index: 1;
            color: white;
            text-align: center;
            font-size: 2rem;
            font-family: Arial, sans-serif;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
            padding: 20px;
        }

        /* Bouton pour contrôler le son */
        .mute-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1rem;
            border-radius: 5px;
        }

        .mute-button:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        #compteur{
            text-align: center;
            color:aquamarine;
            font-size: 150px;
            line-height: 100vh;
        }
    </style>
</head>
<body>

    <div class="video-container">
        <video id="background-video" autoplay loop muted playsinline>
            <source src="pascal.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
    </div>
    <div id="compteur">

    </div>

   

    <button class="mute-button" id="mute-button">🔇 Activer le son</button>

    <script>
        const video = document.getElementById('background-video');
        const muteButton = document.getElementById('mute-button');
        let resultat = document.getElementById('compteur');
        let compteur = 115;
        // Vérifier si la vidéo est bloquée par le navigateur et essayer de la relancer
        document.addEventListener('click', () => {
            if (video.paused) {
                video.play().catch(error => console.log("Lecture bloquée :", error));
            }
        });
        const compte = () =>{
        //musique.play();
        const interval = setInterval(() =>{
            resultat.innerText = compteur;
            if(compteur==0){
               document.location.href="resultat.php";
            }
            else{
                compteur--;
            }
        },1000);
    }
    compte();
        // Activer ou désactiver le son
        muteButton.addEventListener('click', () => {
            video.muted = !video.muted;
            muteButton.textContent = video.muted ? '🔇 Activer le son' : '🔊 Couper le son';
            
        });
        resultat.addEventListener('click',() =>{
            document.location.href="resultat.php";
        });
        
    
    
   
    
    </script>

</body>
</html>