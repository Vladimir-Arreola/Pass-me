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
    <?php require "conn.php";

    $sql = "SELECT P.*, C.nombre_cine FROM pelicula P INNER JOIN cine C on P.id_cine = C.id_cine";
    $result = $conn->query($sql);
    $rows = $result->fetchAll();
    ?>
    <?php require 'header.php'?>

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
        <?php require "aside_menu.php" ?>
        
        <div class="table-container">
            <div class="tabla-head">
                <h1>Películas</h1>
                <a href="agregar_pelis.php">Agregar película</a>
            </div>
            <table class="tabla">
                <thead>
                    <th>ID</th>
                    <th>Cine</th>
                    <th>Pelicula</th>
                    <th>Clasificación</th>
                    <th>Director</th>
                    <th>Genero</th>
                    <th>Duración</th>
                    <th>Idioma</th>
                    <th>Horario</th>
                    <th>Poster</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row['id_pelicula'] ?></td>
                            <td><?php echo $row['nombre_cine']?></td>
                            <td><?php echo $row['pelicula'] ?></td>
                            <td><?php echo $row['clasificacion']?></td>
                            <td><?php echo $row['director']?></td>
                            <td><?php echo $row['genero']?></td>
                            <td><?php echo $row['duracion']?></td>
                            <td><?php echo $row['idioma']?></td>
                            <td><?php echo $row['horario']?></td>
                            <td>
                                <img src="data:image/png;base64, <?php echo base64_encode($row['foto_poster'])?>" alt="poster" class="poster-peli">
                            </td>
                            <td><a href="editar_pelicula.php?id=<?php echo $row['id_pelicula'] ?>">Editar</a></td>
                            <td><a href="borrar_pelicula.php?id=<?php echo $row['id_pelicula'] ?>" onclick="return confirm('Estás seguro de querer borrar?');">Borrar</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
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