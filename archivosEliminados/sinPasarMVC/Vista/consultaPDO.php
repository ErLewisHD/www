<!DOCTYPE html>
<html>
<head>
<title>Busca un cliente en la base de datos</title>
<meta charset=utf-8 />
</head>

<body>

<FORM ACTION="../Modelo/consultaPDO" METHOD="post">
Nombre y apellidos del cliente: <br>
<input type="text" size="40" NAME="nombre" required />
<input type="submit" value="Buscar" /> <input type="reset" value="Cancelar" />
</FORM>

</body>
</html>