<?php
session_start();
$apprennants = unserialize($_SESSION['appprennant']);
    // On vérifie si des apprenants sont coché
    if(!empty($apprennants) && count($apprennants) >= 1)
    {
        // Je compte le nombre d'élément dans mon tableau
        $taille = count($apprennants); 
        $rand = rand(0,$taille-1);
        $utilisateur = $apprennants[$rand];
        if(!empty($_SESSION['utilisateur']))
        {
            $utilisateurs = unserialize($_SESSION['utilisateur']);
            array_push($utilisateurs,$apprennants[$rand]);
            if(count($utilisateurs) == 10){
                session_destroy();
            }
            else
            {
                $_SESSION['utilisateur'] = serialize($utilisateurs);
            }
        }
        else
        {
            $utilisateurs = [$apprennants[$rand]];
            $_SESSION['utilisateur'] = serialize($utilisateurs);

        }
    }
    else
    {
        $utilisateur = 'Veuillez sélectionner au moins 1 apprennant';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat</title>
    <link rel="stylesheet" href="tirage.css">
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
        #son{
            display:none;
        }
    </style>
</head>
<body id="resultat">
    <div class="video-container">
        <video id="background-video" muted playsinline>
            <source src="intro.mp4" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo.
        </video>
    </div>

    <div id="son">
        <?=$utilisateur; ?>
    </div>
    <a href="tirage.php" class="link">Retour</a>
    -
    <a href="initialise.php" class="link2">Réinitialiser</a>
   <script>
        const video = document.getElementById('background-video');
        const muteButton = document.getElementById('mute-button');
        const gagnant = document.getElementById('son');

        // Vérifier si la vidéo est bloquée par le navigateur et essayer de la relancer
        document.addEventListener('click', () => {
            if (video.paused) {
                video.play().catch(error => console.log("Lecture bloquée :", error));
                video.muted = !video.muted;
                son.style.display = 'block';
                
            }
        });
    </script>    
</body>
</html>
