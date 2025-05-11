<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/category.php';
include '../controllers/CategoryController.php';

use app\controllers\CategoryController;

$controller = new CategoryController();

$result = empty($_POST['id'])
    ? $controller->saveCategory($_POST)
    : $controller->updateCategory($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado de la categoría</h1>
    <p><?= $result ? "✅ Categoría guardada." : "❌ Error al guardar/modificar (puede estar vinculada a gastos)." ?></p>
    <a href="../views/categories/list.php">Volver a la lista</a>
</body>
</html>
