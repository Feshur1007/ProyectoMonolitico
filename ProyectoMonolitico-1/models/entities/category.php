<?php
namespace app\models\entities;

use app\models\drivers\ConexDB;

class Category extends Entity
{
    protected $id = null;
    protected $name = "";
    protected $percentage = 0.0;

    public function all()
    {
        $sql = "SELECT * FROM categories";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $categories = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $category = new Category();
                $category->set('id', $row['id']);
                $category->set('name', $row['name']);
                $category->set('percentage', $row['percentage']);
                $categories[] = $category;
            }
        }
        $conex->close();
        return $categories;
    }

    public function save()
    {
        if ($this->percentage <= 0 || $this->percentage > 100) {
            return false;
        }
        $sql = "INSERT INTO categories (name, percentage) VALUES ('{$this->name}', {$this->percentage})";
        $conex = new ConexDB();
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function update()
    {
        if ($this->percentage <= 0 || $this->percentage > 100) {
            return false;
        }
        // Verificar si la categoría está relacionada con algún gasto
        $sqlCheck = "SELECT COUNT(*) as count FROM bills WHERE idCategory = {$this->id}";
        $conex = new ConexDB();
        $resultCheck = $conex->execSQL($sqlCheck);
        $row = $resultCheck->fetch_assoc();
        if ($row['count'] > 0) {
            $conex->close();
            return false;
        }
        $sql = "UPDATE categories SET name = '{$this->name}', percentage = {$this->percentage} WHERE id = {$this->id}";
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }

    public function delete()
    {
        // Verificar si la categoría está relacionada con algún gasto
        $sqlCheck = "SELECT COUNT(*) as count FROM bills WHERE idCategory = {$this->id}";
        $conex = new ConexDB();
        $resultCheck = $conex->execSQL($sqlCheck);
        $row = $resultCheck->fetch_assoc();
        if ($row['count'] > 0) {
            $conex->close();
            return false;
        }
        $sql = "DELETE FROM categories WHERE id = {$this->id}";
        $result = $conex->execSQL($sql);
        $conex->close();
        return $result;
    }
}
