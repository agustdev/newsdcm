<?php

namespace App\Imports;

use App\Models\Pasajeros;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PasajerosImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function  __construct($movid)
    {
        $this->movid = $movid;
    }
    public function startRow(): int
    {
        return 2;
    }
    public function model(array $row)
    {

        return new Pasajeros([
            'nombre' => $row[0],
            'nacionalidad' => $row[1],
            'documento' => $row[2],
            'userid' => auth()->user()->id,
            'mov_id' => $this->movid,
        ]);
    }
    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'delimiter' => ',',
        ];
    }
}
