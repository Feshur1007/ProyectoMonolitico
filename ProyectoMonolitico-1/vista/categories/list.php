<?php
include '../../models/drivers/conexDB.php';
include '../../models/entities/entity.php';
include '../../models/entities/Category.php';
include '../../controllers/CategoryController.php';

use app\controllers\CategoryController;

$controller = new CategoryController();
$categorias = $controller->getAllCategories();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías</title>
</head>
<body>
    <h1>Categorías de Gasto</h1>
    <a href="form.php">➕ Nueva categoría</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Porcentaje</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $cat): ?>
                <tr>
                    <td><?= $cat->get('name') ?></td>
                    <td><?= $cat->get('percentage') ?>%</td>
                    <td>
                        <a href="form.php?id=<?= $cat->get('id') ?>">Editar</a> |
                        <a href="../../acciones/eliminar_categoria.php?id=<?= $cat->get('id') ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="../../index.php">Volver</a>
</body>
</html>
