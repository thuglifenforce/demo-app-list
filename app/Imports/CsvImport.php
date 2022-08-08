<?php

namespace App\Imports;

use App\Models\Import;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CsvImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function model(Array $import)
    {
        $replace = $import['ressource'];
        $replace2 = explode(" ", $replace);
        
        return Import::updateOrCreate([
            'ressource' => $import['ressource'] = $replace2[1],
            'nom' => $import['nom'],
            'prenom' => $import['prenom'],
            'heure_de_debut' => $import['heure_de_debut'],
            'nombre_de_personnes' => $import['nombre_de_personnes'],
            'code_de_reservation' => $import['code_de_reservation'],

        ]);

    }


}
