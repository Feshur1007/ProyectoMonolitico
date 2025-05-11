<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Categoría</title>
</head>
<body>
    <h1>Registrar Categoría de Gasto</h1>
    <form action="../../acciones/guardar_categoria.php" method="post">
        <?php if (!empty($_GET['id'])): ?>
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
        <?php endif; ?>

        <label>Nombre:</label>
        <input type="text" name="name" required>
        <br><br>

        <label>Porcentaje máximo (%):</label>
        <input type="number" name="percentage" required min="1" max="100" step="0.1">
        <br><br>

        <button type="submit">Guardar</button>
    </form>
    <a href="list.php">Volver</a>
</body>
</html>
