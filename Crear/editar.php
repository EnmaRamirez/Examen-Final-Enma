<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
     $pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
     $conexion = new PDO('mysql:host=localhost;dbname=Final_numero_carnet', 'root', '', $pdo_options);
     
     ?>
    <form action="index.php" method="POST">
        <input type="text"name="Codigo" placeholder="Ingrese el Codigo">
        <br/>
        <input type="text"name="Nombre" placeholder="Ingrese el Nombre">
        <br/>
        <input type="text"name="Precio" placeholder="Ingrese el Precio">
        <br/>
        <input type="text"name="Existencia" placeholder="Ingrese la Existencia">
        <br/>
        <input type="hildden" name="action" value="crear">
        <button type="submit" >Guardar</button>
</form>
</body>
</html>