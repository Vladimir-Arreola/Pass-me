<?php

require "conn.php";
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
        var URL = "get_cines.php";
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
        <img src="../img/logo.png" alt="logo">
        <div>
            <form action="cartelera.php" method="post" onsubmit="return validarCines();">
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