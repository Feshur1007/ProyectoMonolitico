<?php

namespace app\controllers;

use app\models\entities\Income;

class IncomeController
{
    public function getAllIncome()
    {
        $income = new Income();
        return $income->all();
    }

    public function saveIncome($request)
    {
        $income = new Income();
        $income->set('value', $request['value']);
        $income->set('idReport', $request['idReport']);
        return $income->save();
    }

    public function updateIncome($request)
    {
        $income = new Income();
        $income->set('id', $request['id']);
        $income->set('value', $request['value']);
        return $income->update();
    }

    public function deleteIncome($id)
    {
        $income = new Income();
        $income->set('id', $id);
        return $income->delete();
    }
}
