<?php

namespace app\models\entities;

use app\models\drivers\ConexDB;

class Bill extends Entity
{
    protected $id = null;
    protected $value = 0.0;
    protected $idCategory = null;
    protected $idReport = null;

    public function all()
    {
        $sql = "SELECT * FROM bills";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $bills = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $bill = new Bill();
                $bill->set('id', $row['id']);
                $bill->set('value', $row['value']);
                $bill->set('idCategory', $row['idCategory']);
                $bill->set('idReport', $row['idReport']);
                $bills[] = $bill;
            }
        }

        $conex->close();
        return $bills;
    }

    public function save()
    {
        if ($this->value <= 0) {
            return false;
        }

        $sql = "INSERT INTO bills (value, idCategory, idReport)
                VALUES ({$this->value}, {$this->idCategory}, {$this->idReport})";

        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function update()
    {
        if ($this->value <= 0) {
            return false;
        }

        // Solo se permite modificar el valor y la categoría
        $sql = "UPDATE bills SET 
                    value = {$this->value}, 
                    idCategory = {$this->idCategory}
                WHERE id = {$this->id}";

        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM bills WHERE id = {$this->id}";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }
}
