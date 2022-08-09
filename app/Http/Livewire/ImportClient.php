<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Imports\CsvImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

use function Symfony\Component\String\b;

class ImportClient extends Component
{

    public function import(Request $request)
    {
       $request->validate([
        'importFile' => 'required|mimetypes:text/plain',
        ]);


        Excel::import(new CsvImport,$request->file('importFile'));

        return back()->with('success', 'votre fichier a été importé avec succès');
    }

    public function render()
    {
        return view('livewire.import-client' );
    }





}
