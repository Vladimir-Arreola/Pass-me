<?php
    //Declaramos las 4 variables para la conexión a la Base de Datos
    $servername = "localhost";  // ------ Servidor donde está la BD
    $username = "root";         // ------ Usuario para entrar a la BD
    $password = "1234";      // ------ Password para entrar a la BD
	$BasedeDatos = "cinepolis"; // ------ Nombre de tu base de datos
	
  
try {
	
    $conn = new PDO("mysql:host=$servername;dbname=$BasedeDatos", $username, $password);
	

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "<div align='center'><h1></h1></div>";
    }
	
catch(PDOException $e)
    {
		

    echo "<div align='center'><h1>: </h1></div> " . $e->getMessage();
    }
	//http://localhost/prograweb2021a/paginas/tarea_sesion6.php
?>