<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::table('users')->insert([
            [
                'name' => 'System Admin',
                'email' => 'admin@super.com',
                'password' => bcrypt('whadmin'),
                'role' => 'SuperAdmin',
            ],
        ]);
        DB::table('lot_numbers')->insert([
            ['name' => 'AR01R01'],
            ['name' => 'AR01R02'],
            ['name' => 'AR01R03'],
            ['name' => 'AR01R04'],
            ['name' => 'AR01R05'],
            ['name' => 'AR01R06'],
            ['name' => 'AR01R07'],
            ['name' => 'AR01R08'],
        ]);
        DB::table('varieties')->insert([
            ['name' => 'Raj SGNR'],
            ['name' => 'MP JABALPUR'],
            ['name' => 'AHW'],
            ['name' => 'FCI- MP'],
            ['name' => 'PD WHEAT'],
            ['name' => 'ROZA- MQ'],
            ['name' => 'UP GONDA'],
            ['name' => 'GUJ LOK1'],
            ['name' => 'GUJ MQ'],
            ['name' => 'KOTA TUKDI'],
            ['name' => 'KOTA MQ'],
            ['name' => 'DHARWAR'],
            ['name' => 'FCI- MP'],
            ['name' => 'MAHARASTRA LOK1'],
            ['name' => 'MAHARASTRA MQ'],
            ['name' => 'SHARBATHI'],
            ['name' => 'TUKDI'],
            ['name' => 'TUKDI -9'],
            ['name' => 'SHRIVELLED'],
            ['name' => 'FCI - MQ'],
            ['name' => 'Empty'],
        ]);
        DB::table('w_h_names')->insert([
            ['name' => 'Silo'],
            ['name' => 'Agri1'],
            ['name' => 'Agri2'],
            ['name' => 'Rohini1'],
            ['name' => 'Rohini2'],
            ['name' => 'Rohini3'],
            ['name' => 'Rohini4'],
            ['name' => 'Rohini5'],
            ['name' => 'Rohini6'],
            ['name' => 'SMSM'],
            ['name' => 'Soundraraja'],
            ['name' => 'MS'],
            ['name' => 'KSL_1'],
            ['name' => 'KSL_2'],
            ['name' => 'KSL_3'],
        ]);

    }
}
