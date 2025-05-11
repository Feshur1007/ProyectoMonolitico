<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Gasto</title>
</head>
<body>
    <h1>Registrar Gasto</h1>
    <form action="../../acciones/guardar_gasto.php" method="post">
        <?php if (!empty($_GET['id'])): ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif; ?>

        <label>Valor del gasto:</label>
        <input type="number" name="value" required min="1">
        <br><br>

        <label>ID Categoría:</label>
        <input type="number" name="idCategory" required>
        <br><br>

        <label>ID Reporte:</label>
        <input type="number" name="idReport" required>
        <br><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="../../index.php">Volver</a>
</body>
</html>
