<?php
require "conn.php";

$id = $_GET["id"];


$sql = "SELECT P.*, C.nombre_cine FROM pelicula P INNER JOIN cine C on P.id_cine = C.id_cine WHERE id_pelicula = '$id'";
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (empty($rows)) {
    $result = "No existe el registro o ya fue borrado";
    $datos = array();
    for ($i = 0; $i < 11; $i++) {
        $datos[$i] = 'No existe dato';
    }
} else {
    $result = "Se borró exitosamente";
    foreach ($rows as $row) {
        $datos = array($row['id_pelicula'], $row['nombre_cine'], $row['pelicula'], $row['clasificacion'], $row['director'], $row['genero'], $row['duracion'], $row['idioma'], $row['horario'], $row['foto_poster']);
    }
    $sql_borrar = "DELETE FROM pelicula WHERE id_pelicula=" . $id;
    $conn->query($sql_borrar);
}
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
                <?php echo $result?>
            </div>
            <form action="guardar_pelicula.php" method="post" class="form-guar">
                <div class="input-form">
                    <label for="id_peliculas">Id</label>
                    <input type="text" name="id_peliculas" id="id_peliculas" value="<?php echo $datos[0] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="cine">Cine</label>
                    <input type="text" name="cine" id="cine" value="<?php echo $datos[1]?>" disabled>
                </div>
                <div class="input-form">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $datos[2] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="clasificación">Clasificación</label>
                    <input type="text" name="clasificación" id="clasificación" value="<?php echo $datos[3] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="director">Director</label>
                    <input type="text" name="director" id="director" value="<?php echo $datos[4] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="genero">Genero</label>
                    <input type="text" name="genero" id="genero" value="<?php echo $datos[5] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="duracion">Duracion</label>
                    <input type="time" name="duracion" id="duracion" value="<?php echo $datos[6] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="idioma">Idioma</label>
                    <input type="text" name="idioma" id="idioma" value="<?php echo $datos[7] ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="horario">Horario</label>
                    <input type="datetime-local" name="horario" id="horario" value="<?php echo $datos[8] ?>" disabled>
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