<?php

require_once('.\libs\conn.php');
require_once('.\conf\db.conf.php');

require_once('.\libs\users.dao.php');
include('.\forms\form_reg.php');

echo "<pre>";
print_r($_POST);
echo "</pre>";

require_once('.\libs\users.data.php');

$nombre = validar($_POST,'nombre');
$apellidos = validar($_POST, 'apellidos');
$email = validar($_POST, 'email');
$dni = validar($_POST, 'dni');
$contrasenya = validar($_POST, 'contrasenya');
$validacion = validar($_POST, 'validacion');



echo '<B>Datos a incluir: Nombre = </B>'."$nombre".'<B>, Apellidos = </B>'."$apellidos".'<B>, email = </B>'."$email".'<B>, DNI = </B>'."$dni".'<B>, Password =</B>'."$contrasenya".'<B>, Validación =</B>'."$validacion".'<B>--- EOL';

echo $errors;