<?php
include '../models/drivers/conexDB.php';
include '../models/entities/entity.php';
include '../models/entities/report.php';
include '../controllers/ReportController.php';

use app\controllers\ReportController;

$controller = new ReportController();
$reporte = $controller->getDetailedReport($_GET['id']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte mensual</title>
</head>
<body>
    <h1>Reporte mensual</h1>

    <h3>Ingreso del mes: $<?= number_format($reporte['ingreso'], 0, ',', '.') ?></h3>

    <h2>Gastos:</h2>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Valor</th>
                <th>% usado</th>
                <th>Límite permitido</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reporte['gastos'] as $g): ?>
                <tr>
                    <td><?= $g['categoria'] ?></td>
                    <td>$<?= number_format($g['valor'], 0, ',', '.') ?></td>
                    <td><?= $g['porcentaje_usado'] ?>%</td>
                    <td><?= $g['limite'] ?>%</td>
                    <td>
                        <?= $g['exceso'] ? '<span style="color:red;">Exceso</span>' : 'Dentro del límite' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Ahorro</h2>
    <p>Total ahorrado: <strong>$<?= number_format($reporte['ahorro'], 0, ',', '.') ?></strong></p>
    <p>Porcentaje de ahorro: <?= $reporte['porcentaje_ahorro'] ?>%</p>
    <?php if (!$reporte['cumple_ahorro']): ?>
        <p style="color:red;">⚠️ No cumpliste con el ahorro mínimo del 10%</p>
    <?php else: ?>
        <p style="color:green;">✅ Ahorro satisfactorio</p>
    <?php endif; ?>

    <a href="list.php">Volver</a>
</body>
</html>
