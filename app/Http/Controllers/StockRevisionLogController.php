<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\StockRevisionLogDataTable;

class StockRevisionLogController extends Controller
{

    public function index(StockRevisionLogDataTable $dataTable)
    {
        return $dataTable->render('backend.revisionlog.index');
    }


}
