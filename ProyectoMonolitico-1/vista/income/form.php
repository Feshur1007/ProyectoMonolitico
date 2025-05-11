<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Ingreso</title>
</head>
<body>
    <h1>Registrar Ingreso Mensual</h1>
    <form action="../../acciones/guardar_ingreso.php" method="post">
        <label>Valor del ingreso:</label>
        <input type="number" name="value" required min="1">
        <br><br>

        <label>ID del Reporte:</label>
        <input type="number" name="idReport" required>
        <br><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="../../index.php">Volver</a>
</body>
</html>
