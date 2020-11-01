<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\StockRevisionDataTable;

class StockRevisionController extends Controller
{

    public function index(StockRevisionDataTable $dataTable)
    {
        return $dataTable->render('backend.revision.index');
    }


}
