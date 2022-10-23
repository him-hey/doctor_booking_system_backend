<?php

namespace Database\Seeders;

use App\Models\Clinic;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClinicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $clinices = [
            ['name'=>'Vibol sok', 'address'=>'Khan meanchey, Phnom Penh', 'costOfAppointmentPerHour'=>1],
            ['name'=>'Visal sok', 'address'=>'Khan meanchey, Phnom Penh', 'costOfAppointmentPerHour'=>1],
            ['name'=>'Moral', 'address'=>'Khan meanchey, Phnom Penh', 'costOfAppointmentPerHour'=>1],
        ];
        Clinic::insert($clinices);
        DB::table('clinices')->insert($clinices);
    }
}
