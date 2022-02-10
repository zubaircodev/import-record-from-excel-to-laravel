<?php

namespace App\Http\Controllers;


use App\Imports\RecordsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function show()
    {
        return view('home');
    }

    public function add()
   {
    $Path = request()->file->store('excelfiles');
    Excel::queueimport(new RecordsImport, storage_path('app/'.$Path));

    
    // Excel::import(new RecordsImport, request()->file('file'));
    return redirect('home');
   }
}
