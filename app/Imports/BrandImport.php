<?php

namespace App\Imports;

use App\Models\Brand;
use Maatwebsite\Excel\Concerns\ToModel;

class BrandImport implements ToModel
{
    public function model(array $row)
    {
        return new Brand([
            'id' => $row[0],
            'name' => $row[1],
            'letter' => $row[2],
            'logo' => $row[3]
        ]);
    }
}
