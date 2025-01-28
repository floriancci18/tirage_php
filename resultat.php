<?php
session_start();
    // On vérifie si des apprenants sont coché
    if(!empty($_POST['apprennant']) && count($_POST['apprennant']) >= 1)
    {
        // Je compte le nombre d'élément dans mon tableau
        $taille = count($_POST['apprennant']); 
        $rand = rand(0,$taille-1);
        $utilisateur = $_POST['apprennant'][$rand];
        if(!empty($_SESSION['utilisateur']))
        {
            $utilisateurs = unserialize($_SESSION['utilisateur']);
            array_push($utilisateurs,$_POST['apprennant'][$rand]);
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
            $utilisateurs = [$_POST['apprennant'][$rand]];
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
</head>
<body id="resultat">
<div class="video-background" >
<video loop playsinline id="video">
      <source src="background.mp4" type="video/mp4">
      Votre navigateur ne supporte pas les vidéos HTML5.
    </video>
</div>
    <div id="son">
        <?=$utilisateur; ?>
    </div>
    <a href="tirage.php" class="link">Retour</a>
    -
    <a href="initialise.php" class="link2">Réinitialiser</a>
<script>
let div = document.getElementById('son');
let video = document.getElementById('video');
div.addEventListener('click',() =>
{
    video.play();
    alert('Lancement vidéo');
});

</script>    
</body>
</html>
