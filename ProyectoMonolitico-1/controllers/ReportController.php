<?php

namespace app\controllers;

use app\models\entities\Report;

class ReportController
{
    public function getAllReports()
    {
        $report = new Report();
        return $report->all();
    }

    public function saveReport($request)
    {
        $report = new Report();
        $report->set('month', $request['month']);
        $report->set('year', $request['year']);
        return $report->save();
    }

    public function deleteReport($id)
    {
        $report = new Report();
        $report->set('id', $id);
        return $report->delete();
    }

    public function getDetailedReport($id)
    {
        $report = new Report();
        $report->set('id', $id);
        return $report->getDetailedReport();
    }
}
