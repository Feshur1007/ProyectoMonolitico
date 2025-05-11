<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Reporte</title>
</head>
<body>
    <h1>Crear nuevo mes de control</h1>
    <form action="../../acciones/guardar_reporte.php" method="post">
        <label for="month">Mes:</label>
        <select name="month" required>
            <option value="">Seleccione</option>
            <?php
            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                      'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            foreach ($meses as $mes) {
                echo "<option value='$mes'>$mes</option>";
            }
            ?>
        </select>
        <br><br>

        <label for="year">Año:</label>
        <input type="number" name="year" required min="2000" max="2100">
        <br><br>

        <button type="submit">Crear</button>
    </form>
    <a href="../../index.php">Volver</a>
</body>
</html>
