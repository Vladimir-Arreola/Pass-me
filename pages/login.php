<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles_login.css">
    <script src="../js/validate_login.js"></script>
    <title>Cinépolis</title>
</head>

<body>
    <?php
    session_start();

    $_SESSION['yes'] = '';
    session_unset();

    session_destroy();
    ?>
    <div class="login">
        <h3>Iniciar sesión</h3>

        <form action="validar.php" method="post" onsubmit="return validar()">
            <div class="div-login">
                <div class="labelogin">
                    <label for="user">Usuario</label>
                    <input type="text" name="user" id="usuario">
                </div>

                <div class="labelogin">
                    <label for="pass">Contraseña</label>
                    <input type="text" name="pass" id="pass">
                </div>
                <input type="submit" value="Iniciar Sesión" class="boton bt-login">
            </div>
        </form>

    </div>
</body>

</html>