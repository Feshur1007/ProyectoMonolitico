<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/bill.php';
include '../controllers/BillController.php';

use app\controllers\BillController;

$controller = new BillController();

$result = empty($_POST['id'])
    ? $controller->saveBill($_POST)
    : $controller->updateBill($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado del gasto</h1>
    <p><?= $result ? "✅ Gasto registrado." : "❌ Error al guardar el gasto." ?></p>
    <a href="../index.php">Volver al inicio</a>
</body>
</html>
