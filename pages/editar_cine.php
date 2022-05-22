<?php

require "conn.php";

$id = $_GET['id'];
$sql = "SELECT C.*, M.municipio FROM cine C INNER JOIN municipio M on C.id_municipio = M.id_municipio WHERE id_cine=" . $id;
$result = $conn->query($sql);
$rows = $result->fetchAll();

$sql_municipio = "SELECT * FROM municipio";
$result_municipio = $conn->query($sql_municipio);
$rows_municipios = $result_municipio->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/validar_cines.js"></script>
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
                <h1>Cines</h1>
            </div>
            <form action="actualizar_cine.php" method="post" class="form-guar" onsubmit="return validarCine()">
                <?php
                foreach ($rows as $row) {
                ?>
                    <div class="input-form">
                        <label for="login">Id</label>
                        <input type="text" name="id_cine" id="id_cine" value="<?php echo $id ?>" disabled>
                        <input type="hidden" name="id_cinereal" id="id_cinereal" value="<?php echo $id ?>">
                    </div>
                    <div class="input-form">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" value="<?php echo $row['nombre_cine'] ?>">
                    </div>
                    <div class="input-form">
                        <label for="municipio">Municipios</label>
                        <select name="municipio" id="municipio">
                            <option value="0">Selecciona un municipio...</option>
                            <?php foreach ($rows_municipios as $row_municipio) { ?>
                                <option value="<?php echo $row_municipio['id_municipio'] ?>"><?php echo $row_municipio['municipio'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input-form">
                        <label for="salas">Salas</label>
                        <input type="text" name="salas" id="salas" value="<?php echo $row['no_salas'] ?>">
                    </div>
                    <div class="input-form">
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" maxlength="10" value="<?php echo $row['telefono_cine'] ?>">
                    </div>
                    <div class="input-form">
                        <label for="domicilio">Domicilio</label>
                        <input type="text" name="domicilio" id="domicilio" maxlength="10" value="<?php echo $row['domicilio_cine'] ?>">
                    </div>
                    <div class="input-form">
                        <label for="correo">Correo</label>
                        <input type="email" name="correo" id="correo" value="<?php echo $row['correo_cine'] ?> ">
                    </div>
                <?php } ?>
                <input type="submit" value="Guardar" class="boton boton-save">
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