<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/Income.php';
include '../controllers/IncomeController.php';

use app\controllers\IncomeController;

$controller = new IncomeController();

$result = empty($_POST['id'])
    ? $controller->saveIncome($_POST)
    : $controller->updateIncome($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado del ingreso</h1>
    <p><?= $result ? "✅ Ingreso guardado." : "❌ Error al guardar el ingreso." ?></p>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
