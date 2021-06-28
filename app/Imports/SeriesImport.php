<?php

namespace App\Imports;

use App\Models\Series;
use Maatwebsite\Excel\Concerns\ToModel;

class SeriesImport implements ToModel
{
    public function model(array $row)
    {
        return new Series([
            'id' => $row[0],
            'name' => $row[1],
            'price' => $row[2],
            'image' => $row[3],
            'brand_id' => $row[4]
        ]);
    }
}
