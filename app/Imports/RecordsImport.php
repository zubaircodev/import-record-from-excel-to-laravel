<?php

namespace App\Imports;

use App\Models\Record;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;
class RecordsImport implements ToModel , WithHeadingRow ,WithChunkReading,  ShouldQueue
// class RecordsImport implements ToModel 
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Record([
            // 'name' => (isset($row[0]) ? $row[0] : ''),
            // 'email' => (isset($row[0]) ? $row[0] : ''),
            // 'cnic' => (isset($row[0]) ? $row[0] : ''),
            // 'city' => (isset($row[0]) ? $row[0] : ''),

            // 'name'     => $row[0], 
            // 'email'    => $row[1], 
            // 'cnic'    => $row[2], 
            // 'city'    => $row[3]

            'name'     => $row['name'],
            'email'    => $row['email'], 
            'cnic'    => $row['cnic'], 
            'city'    => $row['city']

           
        ]);

    }
    public function chunkSize(): int
    {
        return 1000;
    }
}
