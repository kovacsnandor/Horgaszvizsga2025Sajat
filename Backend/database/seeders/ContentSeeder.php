<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('csv\horgaszvizsga.csv');

        // Adatok beolvasása a CSV fájlból
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            fgetcsv($handle, 1000, ";");
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                if (count($row) == 8) {
                    $data[] = [
                        'id' => $row[0],
                        'FejezetCim' => $row[1] === 'null' ? null : $row[1],
                        'KepFile' => $row[2] === 'null' ? null : $row[2],
                        'TilalmiIdoszak' => $row[3] === 'null' ? null : $row[3],
                        'MeretKorlat' => $row[4] === 'null' ? null : $row[4],
                        'DarabKorlatos' => $row[5] === 'null' ? null : $row[5],
                        'Foghatosag' => $row[6] === 'null' ? null : $row[6],
                        'SzovegHtml' => $row[7] === 'null' ? null : $row[7],
                    ];
                }
            }
            fclose($handle);
        }
        // print_r($data);
        // die;
        
        if (Content::count() === 0) {
            Content::factory()->createMany($data);
        }
    }
}
