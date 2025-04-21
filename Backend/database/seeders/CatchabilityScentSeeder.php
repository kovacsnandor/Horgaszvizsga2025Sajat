<?php

namespace Database\Seeders;

use App\Models\CatchabilityScent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatchabilityScentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('csv\foghatosag.csv');

        // Adatok beolvasása a CSV fájlból
        $data = [];
        if (($handle = fopen($filePath, "r")) !== FALSE) {
            fgetcsv($handle, 1000, ";");
            while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                $data[] = [
                    'id' => $row[0],
                    'Foghatosag' => $row[1],
                ];
            }
            fclose($handle);
        }
        // print_r($data);
        // die;

        if (CatchabilityScent::count() === 0) {
            CatchabilityScent::factory()->createMany($data);
        }
    }
}
