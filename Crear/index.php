<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="style.css" rel="stylesheet"/>
</head>
<body>
<?php
    function introduccion(){
      // En php todas las variables empiezan con simbolo de hola $
      $miVariable = "Enma";
      //Concatenamos con .
      echo "<h1>Holis</h1>";
      //Operaciones vasicas
      $val1 = 10;
      $val2 = 0;
      $suma =  $val1 + $val2;
      $resta =  $val1 - $val2;
      if ($suma > 10) {
          echo "la suma es mayor a 10". $suma;
      }
      else {
          echo "la suma es menor a 10". $suma; 
      }
      for($contador =1 ; $contador <10 ; $contador ++){
          echo "contador" .$contador . "<br/>";
         }    
    }
    //introduccion();

    $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
    $conexion = new PDO('mysql:host=localhost;dbname=Final_numero_carnet', 'root', '', $pdo_options);
    //Ejecutamos la consulta

    if (isset($_POST['action'])&&
    $_POST['action'] == "crear"){
        $insert = $conexion->prepare("INSERT INTO Producto (Codigo, Nombre, Precio, Existencia) VALUES (:Codigo,:Nombre,:Precio,:Existencia)");
        //Asignamos los valores a los parametros
        $insert->bindValue('Codigo', $_POST['Codigo']);
        $insert->bindValue('Nombre', $_POST['Nombre']);
        $insert->bindValue('Precio', $_POST['Precio']);
        $insert->bindValue('Existencia', $_POST['Existencia']);
        //Ejecutar la consulta.
        $insert->execute();
    }

    $select = $conexion->query("SELECT Codigo, Nombre, Precio, Existencia FROM Producto");

    ?>

    <a href="Crear.php">Crear nuevo</a>
    <table border="1">
        <thead>
            <tr>
              
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Existencia</th>
                <th>Acciones</th
</tr>
</thead>
<tbody>
    <?php foreach($select->fetchAll() as $registro) { ?>
        <tr> 
            <td> <?php echo $registro["Codigo"] ?> </td>
            <td> <?php echo $registro["Nombre"] ?> </td>
            <td> <?php echo $registro["Precio"] ?> </td>
            <td> <?php echo $registro["Existencia"] ?> </td>
            <td>
                <form action+"editar.php" method="POST">
                    <button type="submit">Editar</button>
                    <input type="hidden" name="Codigo"
                           value="<?php echo $registro["Codigo"] ?>">
    </form>
    </td>
    </tr>
    <?php } ?>
    </tbody>
</table>
                
    
</body>
</html>