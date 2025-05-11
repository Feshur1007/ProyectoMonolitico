<?php

namespace app\controllers;

use app\models\entities\Category;

class CategoryController
{
    public function getAllCategories()
    {
        $category = new Category();
        return $category->all();
    }

    public function saveCategory($request)
    {
        $category = new Category();
        $category->set('name', $request['name']);
        $category->set('percentage', $request['percentage']);
        return $category->save();
    }

    public function updateCategory($request)
    {
        $category = new Category();
        $category->set('id', $request['id']);
        $category->set('name', $request['name']);
        $category->set('percentage', $request['percentage']);
        return $category->update();
    }

    public function deleteCategory($id)
    {
        $category = new Category();
        $category->set('id', $id);
        return $category->delete();
    }
}
