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

    $sql = "SELECT C.*, M.municipio FROM cine C INNER JOIN municipio M on C.id_municipio = M.id_municipio";
    $result = $conn->query($sql);
    $rows = $result->fetchAll();
    ?>
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
        <?php require "aside_menu.php" ?>
        
        <div class="table-container">
            <div class="tabla-head">
                <h1>Cines</h1>
                <a href="agregar_cine.php">Agregar cine</a>
            </div>
            <table class="tabla">
                <thead>
                    <th>ID</th>
                    <th>Cine</th>
                    <th>Municipio</th>
                    <th>No.Salas</th>
                    <th>Domicilio</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Editar</th>
                    <th>Borrar</th>
                </thead>
                <tbody>
                    <?php foreach ($rows as $row) { ?>
                        <tr>
                            <td><?php echo $row['id_cine'] ?></td>
                            <td><?php echo $row['nombre_cine']?></td>
                            <td><?php echo $row['municipio'] ?></td>
                            <td><?php echo $row['no_salas']?></td>
                            <td><?php echo $row['domicilio_cine']?></td>
                            <td><?php echo $row['telefono_cine']?></td>
                            <td><?php echo $row['correo_cine']?></td>
                            <td><a href="editar_cine.php?id=<?php echo $row['id_cine'] ?>">Editar</a></td>
                            <td><a href="borrar_cine.php?id=<?php echo $row['id_cine'] ?>" onclick="return confirm('Estás seguro de querer borrar?');">Borrar</a></td>
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