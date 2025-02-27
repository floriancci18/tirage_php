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
    <img src="pascal1.jpeg" class="image" id="img1">
    <img src="pascal2.jpg" class="image" id="img2">
    <img src="pascal3.jpg" class="image" id="img3">
    <img src="pascal1.jpeg" class="image" id="img4">
    <img src="pascal2.jpg" class="image" id="img5">
    <img src="pascal3.jpg" class="image" id="img6">
    <img src="pascal1.jpeg" class="image" id="img7">
    <img src="pascal2.jpg" class="image" id="img8">
    <img src="pascal3.jpg" class="image" id="img9">
    <img src="pascal1.jpeg" class="image" id="img10">
    <img src="pascal2.jpg" class="image" id="img11">
    <img src="pascal3.jpg" class="image" id="img12">
    

    
    <div id="resultat"></div>
    <form name="tirage" id="tirage" method="POST" action="video.php">
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
<script>
        class MovingImage {
            constructor(element) {
                this.element = element;
                this.x = Math.random() * (window.innerWidth - 100);
                this.y = Math.random() * (window.innerHeight - 100);
                this.dx = (Math.random() - 0.5) * 4;
                this.dy = (Math.random() - 0.5) * 4;

                this.updatePosition();
            }

            updatePosition() {
                this.element.style.left = this.x + 'px';
                this.element.style.top = this.y + 'px';
            }

            move() {
                this.x += this.dx;
                this.y += this.dy;

                if (this.x <= 0 || this.x + this.element.width >= window.innerWidth) {
                    this.dx *= -1;
                }
                if (this.y <= 0 || this.y + this.element.height >= window.innerHeight) {
                    this.dy *= -1;
                }

                this.updatePosition();
            }
        }

        const images = [...document.querySelectorAll('.image')].map(img => new MovingImage(img));

        function animate() {
            images.forEach(img => img.move());
            requestAnimationFrame(animate);
        }

        animate();
    </script>
</html>