<?php
    session_start();

    $vClave = trim($_POST['pass']);
    $vUsuario = trim($_POST['user']);

    require 'conn.php';

    $sql = "SELECT * FROM usuario WHERE nombrecompleto='$vUsuario' AND nip = '$vClave'";

    $result = $conn->query($sql);
    $rows = $result->fetchAll();

    $resultados = (int)$rows;

    if($resultados>0){
        $_SESSION['yes'] = 'true';
        $conn = null;
        header("Location:menu.php");
    }else{
        $conn = null;
        header("Location:login.php");
        exit;
    }
?>