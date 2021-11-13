<?php

namespace App\Imports;

use App\Models\Series;
use Maatwebsite\Excel\Concerns\ToModel;

class SeriesImport implements ToModel
{
    public function model(array $row)
    {
        $endpoint = env('ALI_OSS_ENDPOINT');
        return new Series([
            'id' => $row[0],
            'name' => $row[1],
            'price' => $row[2],
            'image_url' => "{$endpoint}/{$row[3]}",
            'brand_id' => $row[4]
        ]);
    }
}
