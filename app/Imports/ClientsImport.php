<?php

namespace App\Imports;
use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;

class ClientsImport implements ToModel {
    public function model(array $row) {
        return new Client([
            'name' => $row[0],
            'quantity' => $row[1],
            'average_amount' => $row[2],
            'max_price' => $row[3],
            'min_price' => $row[4]
        ]);
    }
}