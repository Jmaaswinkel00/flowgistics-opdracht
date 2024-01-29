<?php

namespace Database\Seeders;

use App\Models\Artikel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;


class BatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $artikelen = Artikel::all();
        $batchCodes = ["21.50.01.01", "21.50.01.02", "21.50.01.03", "21.50.01.04", "21.50.01.05"];
        foreach($artikelen as $artikel)
        {
            foreach($batchCodes as $batchCode)
            {
                DB::table('batches')->insert([
                    'artikel_id' => $artikel->id,
                    'batch_code' => $batchCode,
                    'voorraad'   => rand(1,100000),
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
                ]);
            }
        }
    }
}
