<?php
namespace app\models\entities;

use app\models\drivers\ConexDB;

class Income extends Entity
{
    protected $id = null;
    protected $value = 0.0;
    protected $idReport = null;

    public function all()
    {
        $sql = "SELECT * FROM income";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $incomes = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $income = new Income();
                $income->set('id', $row['id']);
                $income->set('value', $row['value']);
                $income->set('idReport', $row['idReport']);
                $incomes[] = $income;
            }
        }
        $conex->close();
        return $incomes;
    }

    public function save()
    {
        if ($this->value <= 0) {
            return false;
        }
        // Verificar si ya existe un ingreso para el mismo reporte
        $sqlCheck = "SELECT COUNT(*) as count FROM income WHERE idReport = {$this->idReport}";
        $conex = new ConexDB();
        $resultCheck = $conex->execSQL($sqlCheck);
        $row = $resultCheck->fetch_assoc();
        if ($row['count'] > 0) {
            $conex->close();
            return false;
        }
        $sql = "INSERT INTO income (value, idReport) VALUES ({$this->value}, {$this->idReport})";
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function update()
    {
        if ($this->value <= 0) {
            return false;
        }
        $sql = "UPDATE income SET value = {$this->value} WHERE id = {$this->id}";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM income WHERE id = {$this->id}";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }
}
