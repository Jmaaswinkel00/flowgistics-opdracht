<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ArtikelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artikelCodes = ["BRA-FR", "ALT-FR", "FLI-FR", "FAV-FR", "SOS-FR", "FLA-FR", "FUR-FR", "HAD-FR", "FLN-FR"];

        foreach($artikelCodes as $artikelCode)
        {
            $artikelCount = rand(1, 5);
            for ($i=0; $i < $artikelCount; $i++) {
                DB::table('artikel')->insert([
                    'artikel_code' => $artikelCode . "-" . $i,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
