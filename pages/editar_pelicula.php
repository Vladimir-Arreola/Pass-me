<?php require "conn.php";

$sql = "SELECT * FROM cine";
$result = $conn->query($sql);
$rows = $result->fetchAll();

$id = $_GET["id"];

$sql_pelis = "SELECT P.*, C.nombre_cine FROM pelicula P INNER JOIN cine C on P.id_cine = C.id_cine WHERE id_pelicula = '$id'";
$result_peli = $conn->query($sql_pelis);
$rows_pelis = $result_peli->fetchAll();
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
    <?php require 'header.php' ?>

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
            <?php foreach ($rows_pelis as $row_peli) { ?>
                <form action="actualizar_pelicula.php" method="post" enctype='multipart/form-data' class="form-guar">
                    <div class="input-form">
                        <label for="id_pelicula">Id</label>
                        <input type="text" name="id_pelicula" id="id_pelicula" value="<?php echo $id ?>" disabled>
                        <input type="hidden" name="id_real" value="<?php echo $row_peli["id_pelicula"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="cine">Cine</label>
                        <select name="cine" id="cine">
                            <?php foreach ($rows as $row) { ?>
                                <option value="<?php echo $row['id_cine'] ?>"><?php echo $row['nombre_cine'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-form">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $row_peli["pelicula"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="clasificacion">Clasificación</label>
                        <input type="text" name="clasificacion" id="clasificacion" value="<?php echo $row_peli["clasificacion"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="director">Director</label>
                        <input type="text" name="director" id="director" value="<?php echo $row_peli["director"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="genero">Genero</label>
                        <input type="text" name="genero" id="genero" value="<?php echo $row_peli["genero"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="duracion">Duracion</label>
                        <input type="number" name="duracion" id="duracion" value="<?php echo $row_peli["duracion"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="idioma">Idioma</label>
                        <input type="text" name="idioma" id="idioma" value="<?php echo $row_peli["idioma"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="horario">Horario</label>
                        <input type="datetime-local" name="horario" id="horario" value="<?php echo $row_peli["horario"] ?>">
                    </div>
                    <div class="input-form">
                        <label for="poster">Poster</label>
                        <input type="file" name="poster" id="poster">
                    </div>
                    <input type="submit" value="Guardar" class="boton boton-save">
                </form>
            <?php } ?>
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