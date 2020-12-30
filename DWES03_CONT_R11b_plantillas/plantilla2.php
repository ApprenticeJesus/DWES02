<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 3 : Trabajar con bases de datos en PHP -->
<!-- Ejemplo: Conjuntos de datos con MySQLi -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejercicios Tema 3: Conjuntos de resultados en MySQLi</title>
  <link href="dwes.css" rel="stylesheet" type="text/css">
</head>

<body>

<div id="encabezado">
	<h1>Ejercicio: Conjunto de resultados en MySQLi</h1>
	<form id="form_seleccion" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
	


	</form>
</div>

<div id="contenido">
	<h2>Contenido</h2>
	<form id="selectProd">
		<label for="producto">Producto:</label>
		<select multiple id="producto" name="producto">
			<option value="3DSNG">Nintendo 3DS negro</option>
			<option value="ACERAX3950">Acer AX3950 I5-650 4GB 1TB W7HP</option>
			<option value="ARCLPMP32GBN">Archos Clipper MP3 2GB negro</option>
			<option value="BRAVIA2BX400">Sony Bravia 32IN FULLHD KDL-32BX400</option>
			<option value="EEEPC1005PXD">Asus EEEPC 1005PXD N455 1 250 BL</option>
			<option value="HPMIN1103120">HP Mini 110-3120 10.1LED N455 1GB 250GB W7S negro</option>
			<option value="IXUS115HSAZ">Canon Ixus 115HS azul</option>
			<option value="KSTDT101G2">Kingston DataTraveler 16GB DT101G2 USB2.0 negro</option>
			<option value="KSTDTG332GBR">Kingston DataTraveler G3 32GB rojo</option>
			<option value="KSTMSDHC8GB">Kingston MicroSDHC 8GB</option>
			<option value="LEGRIAFS306">Canon Legria FS306 plata</option>
			<option value="LGM237WDP">LG TDT HD 23 M237WDP-PC FULL HD</option>
			<option value="LJPROP1102W">HP Laserjet Pro Wifi P1102W</option>
			<option value="OPTIOLS1100">Pentax Optio LS1100</option>
			<option value="PAPYRE62GB">Lector ebooks Papyre6 con SD2GB + 500 ebooks</option>
			<option value="PBELLI810323">Packard Bell I8103 23 I3-550 4G 640GB NVIDIAG210</option>
			<option value="PIXMAIP4850">Canon Pixma IP4850</option>
			<option value="PIXMAMP252">Canon Pixma MP252</option>
			<option value="PS3320GB">PS3 con disco duro de 320GB</option>
			<option value="PWSHTA3100PT">Canon Powershot A3100 plata</option>
			<option value="SMSGCLX3175">Samsung CLX3175</option>
			<option value="SMSN150101LD">Samsung N150 10.1LED N450 1GB 250GB BAT6 BT W7 R</option>
			<option value="SMSSMXC200PB">Samsung SMX-C200PB EDC ZOOM 10X</option>
			<option value="STYLUSSX515W">Epson Stylus SX515W</option>
			<option value="ZENMP48GB300">Creative Zen MP4 8GB Style 300</option>
		</select>
		<input type="submit" id="botonEnviar" name="botonEnviar" />
	</form>



<?php
$producto= "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  $producto = test_input($_POST["producto"]);
 
}
echo $producto;

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// Si se recibió un código de producto y no se produjo ningún error
// mostramos el stock de ese producto en las distintas tiendas
if ($error == null && isset($producto)) {
$sql = <<<SQL
SELECT tienda.nombre, stock.unidades
FROM tienda INNER JOIN stock ON tienda.cod=stock.tienda
WHERE stock.producto='$producto'
SQL;
$resultado = $dwes->query($sql);
if($resultado) {
$row = $resultado->fetch_assoc();
while ($row != null) {
echo "<p>Tienda ${row['nombre']}: ${row['unidades']} unidades.</p>";
$row = $resultado->fetch_assoc();
}
$resultado->close();
}
}
?>
</div>


<div id="pie">
</div>
</body>
</html>
