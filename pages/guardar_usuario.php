<?php

require "conn.php";

$login = $_POST["login"];
$nip = $_POST["nip"];
$tipo = $_POST["tipo"];
$nombre = $_POST["nombre"];

$sql_validar = "SELECT * FROM usuario WHERE id_usuario=" . $login;
$result = $conn->query($sql_validar);
$rows = $result->fetchAll();

if (empty($rows)) {
    $sql_add = "INSERT INTO usuario(id_usuario, nip, tipousuario, nombrecompleto) VALUES('$login', '$nip', '$tipo', '$nombre')";
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
        <aside class="menu">
            <a href="#">Menu</a>
            <a href="#">Municipios</a>
            <a href="#">Cines</a>
            <a href="#">Peliculas</a>
            <a href="usuarios.php">Usuarios</a>
        </aside>

        <div class="table-container">
            <div class="tabla-head">
                <h1>Usuarios</h1>
            </div>
            <form action="guardar_usuario.php" method="post" class="form-guar">
                <div class="input-form">
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" value="<?php echo $login ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="nip">Nip</label>
                    <input type="text" name="nip" id="nip" value="<?php echo $nip ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" id="tipo" value="<?php echo $tipo ?>" disabled>
                </div>
                <div class="input-form">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $nombre ?>" disabled>
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