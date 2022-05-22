<?php

require "conn.php";

$id = $_POST["id_real"];
$id_cine = $_POST["cine"];
$nombre = $_POST["nombre"];
$clasificacion = $_POST["clasificacion"];
$director = $_POST["director"];
$genero = $_POST["genero"];
$duracion = $_POST["duracion"];
$idioma = $_POST["idioma"];
$horario = $_POST["horario"];
$poster = addslashes(file_get_contents($_FILES['poster']['tmp_name']));

$sql_actualizar = "UPDATE pelicula SET id_cine = $id_cine, pelicula = '$nombre', clasificacion = '$clasificacion', director = '$director', genero = '$genero', duracion = '$duracion', idioma = '$idioma', horario = '$horario', foto_poster = '$poster' WHERE id_pelicula=" . $id;
$conn->query($sql_actualizar);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Cinépolis</title>
</head>

<body>
    <header class="header">
        <nav class="navig">
            <a href="#" class="logo">Cinépolis</a>
            <div>
                <select name="" id="">
                    <option value="0">Selecciona tu municipio</option>
                </select>
                <select name="" id="">
                    <option value="0">Selecciona el cine...</option>
                </select>
            </div>
            <a href="#" class="boton">VER CARTELERA</a>
            <a href="../index.php" class="login">Logout</a>
        </nav>
    </header>

    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="../img/glass.jpg" style="width:100%; height:300px">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="../img/mk.jpg" style="width:100%; height:300px">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="../img/matrix.jpg" style="width:100%; height:300px">
        </div>

        <!-- Next and previous buttons -->
        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
        <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>
    <br>
    <!-- The dots/circles -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
        <span class="dot" onclick="currentSlide(3)"></span>
    </div>

    <div class="container">
        <?php require 'aside_menu.php' ?>

        <div class="table-container">
            <div class="tabla-head">
                <h1>Películas</h1>
            </div>
            <form action="guardar_pelicula.php" method="post" class="form-guar">
                <div class="input-form">
                    <label for="id_peliculas">Id</label>
                    <input type="text" name="id_peliculas" id="id_peliculas" value="<?php echo $id?>" disabled>
                </div>
                <div class="input-form">
                    <label for="cine">Cine</label>
                    
                </div>
                <div class="input-form">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre?>" disabled>
                </div>
                <div class="input-form">
                    <label for="clasificación">Clasificación</label>
                    <input type="text" name="clasificación" id="clasificación" value="<?php echo $clasificacion?>" disabled>
                </div>
                <div class="input-form">
                    <label for="director">Director</label>
                    <input type="text" name="director" id="director" value="<?php echo $director?>" disabled>
                </div>
                <div class="input-form">
                    <label for="genero">Genero</label>
                    <input type="text" name="genero" id="genero" value="<?php echo $genero?>" disabled>
                </div>
                <div class="input-form">
                    <label for="duracion">Duracion</label>
                    <input type="time" name="duracion" id="duracion" value="<?php echo $duracion?>" disabled>
                </div>
                <div class="input-form">
                    <label for="idioma">Idioma</label>
                    <input type="text" name="idioma" id="idioma" value="<?php echo $idioma?>" disabled>
                </div>
                <div class="input-form">
                    <label for="horario">Horario</label>
                    <input type="datetime-local" name="horario" id="horario" value="<?php echo $horario?>" disabled>
                </div>
               
            </form>
        </div>
    </div>
    <section class="info">

    </section>
</body>

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    // Next/previous controls
    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    // Thumbnail image controls
    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        if (n > slides.length) {
            slideIndex = 1
        }
        if (n < 1) {
            slideIndex = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
    }
</script>

</html>