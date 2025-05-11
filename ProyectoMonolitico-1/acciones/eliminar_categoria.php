<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/Category.php';
include '../controllers/CategoryController.php';

use app\controllers\CategoryController;

$controller = new CategoryController();
$result = $controller->deleteCategory($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Eliminar categoría</title>
</head>
<body>
    <h1>Eliminar categoría</h1>
    <p><?= $result ? "✅ Categoría eliminada." : "❌ No se puede eliminar: está relacionada con gastos." ?></p>
    <a href="../views/categories/list.php">Volver</a>
</body>
</html>

