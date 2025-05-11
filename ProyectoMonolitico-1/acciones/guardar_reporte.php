<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/Report.php';
include '../controllers/ReportController.php';

use app\controllers\ReportController;

$controller = new ReportController();
$result = $controller->saveReport($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado del registro del reporte</h1>
    <p>
        <?= $result ? "✅ Reporte creado correctamente." : "❌ No se pudo crear el reporte (puede existir uno igual)." ?>
    </p>
    <a href="../views/reports/list.php">Volver a la lista</a>
</body>
</html>
