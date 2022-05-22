<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conn.php";
    $result;
	$resultado = "<option value='0'>Elija su cine</option>";
	$resultado2 = "<option value='0'>No se encontraron cines en ese municipio !!</option>";
	
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$municipio_elegido = $_POST["municipio_seleccionado"];
	
    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
    $sql2 = "SELECT * FROM cine WHERE id_municipio='$municipio_elegido'";


    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql2);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
    
	// Verificamos si está vacia la variable $smtp, si es positivo imprimimos en pantalla que no trae
    if (empty($rows)) {
        echo $resultado2;
		die();
    } else {
        echo $resultado;
        foreach ($rows as $row) 
	    {
           echo '<option value="'.$row['id_cine'].'">'.$row['nombre_cine'].'</option>';
        }
	}
?>