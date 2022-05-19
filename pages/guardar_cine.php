<?php

require "conn.php";

$id = $_POST["id_cine"];
$nombre = $_POST["nombre"];
$municipio = $_POST["municipio"];
$salas = $_POST["salas"];
$domicilio = $_POST["domicilio"];
$telefono = $_POST["telefono"];
$correo = $_POST["correo"];

$sql_municipio = "SELECT * FROM municipio WHERE id_municipio=" .$municipio;
$result_municipio = $conn->query($sql_municipio);
$rows_municipios = $result_municipio->fetchAll();

foreach ($rows_municipios as $row_municipio) {
    $nombreMunicipio = $row_municipio['municipio'];
}


$sql_validar = "SELECT * FROM cine WHERE id_cine=" . $id;
$result = $conn->query($sql_validar);
$rows = $result->fetchAll();

if (empty($rows)) {
    $sql_add = "INSERT INTO cine(id_cine, id_municipio, nombre_cine, no_salas, domicilio_cine, telefono_cine, correo_cine) VALUES('$id', '$municipio', '$nombre', '$salas', '$domicilio', '$telefono', '$correo')";
    $conn->query($sql_add);
} else {
    echo "Error";
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
                <h1>Cines</h1>
            </div>
            <form action="guardar_usuario.php" method="post" class="form-guar">
                <div class="input-form">
                    <label for="id">Id</label>
                    <input type="text" name="id" id="id" value="<?php echo $id ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="id">Municipio</label>
                    <input type="text" name="id" id="id" value="<?php echo $nombreMunicipio ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="salas">Salas</label>
                    <input type="text" name="salas" id="salas" value="<?php echo $salas?>" disabled>
                </div>
                <div class="input-form">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" maxlength="10" value="<?php echo $telefono?>" disabled>
                </div>
                <div class="input-form">
                    <label for="domicilio">Domicilio</label>
                    <input type="text" name="domicilio" id="domicilio" maxlength="10" value="<?php echo $domicilio?>" disabled>
                </div>
                <div class="input-form">
                    <label for="correo">Correo</label>
                    <input type="text" name="correo" id="correo" value="<?php echo $correo?>" disabled>
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