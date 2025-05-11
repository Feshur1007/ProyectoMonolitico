<?php
namespace app\models\entities;

use app\models\drivers\ConexDB;

class Report extends Entity
{
    protected $id = null;
    protected $month = "";
    protected $year = 0;

    public function all()
    {
        $sql = "SELECT * FROM reports";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $reports = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $report = new Report();
                $report->set('id', $row['id']);
                $report->set('month', $row['month']);
                $report->set('year', $row['year']);
                $reports[] = $report;
            }
        }
        $conex->close();
        return $reports;
    }

    public function save()
    {
        // Verificar si ya existe un reporte para el mismo mes y año
        $sqlCheck = "SELECT COUNT(*) as count FROM reports WHERE month = '{$this->month}' AND year = {$this->year}";
        $conex = new ConexDB();
        $resultCheck = $conex->execSQL($sqlCheck);
        $row = $resultCheck->fetch_assoc();
        if ($row['count'] > 0) {
            $conex->close();
            return false;
        }
        $sql = "INSERT INTO reports (month, year) VALUES ('{$this->month}', {$this->year})";
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function update()
    {
        // No se permite modificar el mes ni el año
        return false;
    }

    public function delete()
    {
        $sql = "DELETE FROM reports WHERE id = {$this->id}";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }    
    
    public function getDetailedReport()
    {
        $conex = new \app\models\drivers\ConexDB();
    
        // 1. Obtener ingreso asociado al reporte
        $sqlIngreso = "SELECT value FROM income WHERE idReport = {$this->id}";
        $resultIngreso = $conex->execSQL($sqlIngreso);
        $ingreso = 0;
    
        if ($resultIngreso && $resultIngreso->num_rows > 0) {
            $rowIngreso = $resultIngreso->fetch_assoc();
            $ingreso = $rowIngreso['value'];
        }
    
        // 2. Obtener gastos asociados al reporte, con sus categorías
        $sqlGastos = "
            SELECT b.value AS gasto, c.name AS categoria, c.percentage AS maxPorcentaje
            FROM bills b
            JOIN categories c ON b.idCategory = c.id
            WHERE b.idReport = {$this->id}";
    
        $resultGastos = $conex->execSQL($sqlGastos);
        $gastos = [];
        $totalGastos = 0;
    
        if ($resultGastos && $resultGastos->num_rows > 0) {
            while ($row = $resultGastos->fetch_assoc()) {
                $valor = $row['gasto'];
                $limite = $row['maxPorcentaje'];
                $porcentajeGasto = ($ingreso > 0) ? ($valor / $ingreso) * 100 : 0;
                $exceso = $porcentajeGasto > $limite;
    
                $gastos[] = [
                    'categoria' => $row['categoria'],
                    'valor' => $valor,
                    'porcentaje_usado' => round($porcentajeGasto, 2),
                    'limite' => $limite,
                    'exceso' => $exceso
                ];
    
                $totalGastos += $valor;
            }
        }
    
        // 3. Calcular ahorro
        $ahorro = $ingreso - $totalGastos;
        $porcentajeAhorro = ($ingreso > 0) ? ($ahorro / $ingreso) * 100 : 0;
        $cumpleAhorro = $porcentajeAhorro >= 10;
    
        $conex->close();
    
        // 4. Retornar el informe
        return [
            'ingreso' => $ingreso,
            'total_gastos' => $totalGastos,
            'ahorro' => $ahorro,
            'porcentaje_ahorro' => round($porcentajeAhorro, 2),
            'cumple_ahorro' => $cumpleAhorro,
            'gastos' => $gastos
        ];
    }
    
}
