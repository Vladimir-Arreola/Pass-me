<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Cinépolis</title>
</head>

<body>
    <?php

    require "pages/conn.php";
    $sql = "SELECT * FROM municipio";
    $result = $conn->query($sql);
    $rows_municipios_ajax = $result->fetchAll();

    ?>
    <script language="javascript">
        function crear_objeto_XMLHttpRequest() {
            try {
                objeto = new XMLHttpRequest();
            } catch (err1) {
                try {
                    objeto = new ActiveXObject("Msxml2.XMLHTTP");
                } catch (err2) {
                    try {
                        objeto = new ActiveXObject("Microsoft.XMLHTTP");
                    } catch (err3) {
                        objeto = false;
                    }
                }
            }
            return objeto;
        }
        /* Aquí acaba la definición de la función que se usará para instaciar objetos XMLHttpRequest */
        var objeto_AJAX = crear_objeto_XMLHttpRequest();

        function pedirCines() {
            var URL = "pages/get_cines.php";
            objeto_AJAX.open("POST", URL, true);
            objeto_AJAX.onreadystatechange = muestraResultado;
            objeto_AJAX.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            objeto_AJAX.send("municipio_seleccionado=" + document.getElementById("municipio").value);
        }
        /* La siguiente función se ejecuta cuando se recibe una respuesta del servidor. */
        function muestraResultado() {
            if (objeto_AJAX.readyState == 4 && objeto_AJAX.status == 200) {
                document.getElementById("cine").innerHTML = objeto_AJAX.responseText;
            }
        }

        function validarCines() {
            var muni = document.getElementById("municipio").selectedIndex;
            var cine = document.getElementById("cine").selectedIndex;

            if (muni == null || muni == 00) {
                alert("No has elegido un municipio");
                document.getElementById("municipio").focus();
                return false;
            } else if (cine == null || cine == 00) {
                alert("No has elegido un cine");
                document.getElementById("cine").focus();
                return false;
            }
            return true;
        }
    </script>
    <header class="header">
        <nav class="navig">
            <img src="img/logo.png" alt="logo">
            <div>
                <form action="pages/cartelera.php" method="post" onsubmit="return validarCines();">
                    <select name="municipio" id="municipio" class="select-principal" onChange="javascript:pedirCines();">
                        <option value="0">Selecciona tu municipio</option>
                        <?php
                        foreach ($rows_municipios_ajax as $row_municipio_ajax) {
                        ?>
                            <option value="<?php echo $row_municipio_ajax['id_municipio'] ?>"><?php echo $row_municipio_ajax['municipio'] ?></option>
                        <?php } ?>
                    </select>
                    <select name="cine" id="cine" class="select-principal">
                    </select>
                    <input type="submit" value="VER CARTELERA" class="boton">
                </form>
            </div>
            <a href="../index.php" class="login">Logout</a>
        </nav>
    </header>
    <!-- Slideshow container -->
    <div class="slideshow-container">

        <!-- Full-width images with number and caption text -->
        <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img src="img/glass.jpg" style="width:100%; height:360px">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img src="img/mk.jpg" style="width:100%; height:360px">
        </div>

        <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img src="img/matrix.jpg" style="width:100%; height:360px">
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