<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - Control de gastos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 30px;
            background-color: #f5f5f5;
        }

        h1 {
            color: #333;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin: 15px 0;
        }

        a {
            text-decoration: none;
            color: white;
            background-color: #007BFF;
            padding: 10px 20px;
            border-radius: 5px;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>📊 Control mensual de gastos</h1>

    <ul>
        <li><a href="views/reports/list.php">📆 Ver reportes mensuales</a></li>
        <li><a href="views/reports/form.php">➕ Crear nuevo mes / reporte</a></li>
        <li><a href="views/income/form.php">💰 Registrar ingresos</a></li>
        <li><a href="views/bills/form.php">🧾 Registrar gastos</a></li>
        <li><a href="views/categories/list.php">📂 Categorías de gastos</a></li>
    </ul>
</body>
</html>
