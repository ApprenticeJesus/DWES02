<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilo2.css" rel="stylesheet" type="text/css">
    <title>Añadir usuario</title>
</head>

<body>

    <h1>Autor: Jesús Rivera.</h1><br/>
    <h1>Formulario de registro en el servicio.</h1>

    <form action="./ejercicio2.php" method="post">


        <div><p><label>Nombre:<input type="text" name="nombre" id="nombre" placeholder="abc" ></label></p><p class="error"></p></div><br/>

        <div><p><label>Apellidos:<input type="text" name="apellidos" id="apellidos" placeholder="abc" ></label><p class="error"></p></div><br/>

        <div><p><label>Email:<input type="email" name="email" id="email" placeholder="?????????@???????.???" ></label><p class="error"></p></div><br/>

        <div><p><label>DNI/NIE:<input type="text" name="dni" id="dni" ></label></p><p class="error"></p></div><br/>

        <div><p><label>Contraseña:<input type="password" name="contrasenya" id="contrasenya" ></label></p><p class="error"></p></div><br/>

        <div><p><label>Repite la contraseña:<input type="password" name="validacion" id="validacion" ></label></p><p class="error"></p></div><br/>

        <input type="submit" name="enviar" value="Enviar">

    </form>
</body>

</html>