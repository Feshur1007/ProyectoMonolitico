<?php

namespace app\controllers;

use app\models\entities\Bill;

class BillController
{
    public function getAllBills()
    {
        $bill = new Bill();
        return $bill->all();
    }

    public function saveBill($request)
    {
        $bill = new Bill();
        $bill->set('value', $request['value']);
        $bill->set('idCategory', $request['idCategory']);
        $bill->set('idReport', $request['idReport']);
        return $bill->save();
    }

    public function updateBill($request)
    {
        $bill = new Bill();
        $bill->set('id', $request['id']);
        $bill->set('value', $request['value']);
        $bill->set('idCategory', $request['idCategory']);
        return $bill->update();
    }

    public function deleteBill($id)
    {
        $bill = new Bill();
        $bill->set('id', $id);
        return $bill->delete();
    }
}
