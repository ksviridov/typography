<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel;
use Illuminate\Http\Request;
use App\Imports\ClientsImport;

class ClientController extends Controller
{
    public function index() {
        Excel::import(new ClientsImport, 'dataset.csv');
        return ['message' => 'Success'];
    }
}
