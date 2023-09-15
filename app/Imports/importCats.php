<?php

namespace App\Imports;

use App\Models\Cats;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class importCats implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Cats([
            "id" => $row['id'],
            "title" => $row['title'],
            "section" => $row['section'],
            "type" => $row['type']
        ]);
    }
}