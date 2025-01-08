<?php
session_start();
if(!empty($_SESSION['utilisateur'])){
    $utilisateurs = unserialize($_SESSION['utilisateur']);
    
}
else
{
    $utilisateurs = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tirage au sort</title>
    <link rel="stylesheet" href="tirage.css">
</head>
<body>
    <div id="resultat"></div>
    <div id="kenza"></div>
    <form name="tirage" id="tirage" method="POST" action="resultat.php">
        <div>
            <input type="checkbox" name="apprennant[]" value="Imane" <?php if(in_array('Imane',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Imane</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Stéphane" <?php if(in_array('Stéphane',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Stéphane</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Imran" <?php if(in_array('Imran',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Imran</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Tristan" <?php if(in_array('Tristan',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Tristan</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Hugo" <?php if(in_array('Hugo',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Hugo</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Romain" <?php if(in_array('Romain',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Romain</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Ilan" <?php if(in_array('Ilan',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Ilan</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Tanguy" <?php if(in_array('Tanguy',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Tanguy</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Jimmy" <?php if(in_array('Jimmy',$utilisateurs)) echo 'disabled="disabled"';else echo 'checked="checked"'; ?>><label>Jimmy</label>
        </div>
        <div>
            <input type="checkbox" name="apprennant[]" value="Nicolas" <?php if(in_array('Nicolas',$utilisateurs)) echo 'disabled="disabled"'; else echo 'checked="checked"'; ?>><label>Nicolas</label>
        </div>
        <div>
            <button type="submit" id="tirer" name="tirer">Tirer au sort</button>
</div>
        </form>
        <script src="tirage.js"></script>
</body>
</html>