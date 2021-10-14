<?php

namespace Database\Seeders;

use App\Models\Arduino;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Arduinoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Arduino::truncate();

        $arduino =  [
            [
              'estatus' => '0',
              'abrir' => 'a',
              'cerrar' => 'z',
            ],
            [
              'estatus' => '0',
              'abrir' => 's',
              'cerrar' => 'x',
            ],
            [
                'estatus' => '0',
                'abrir' => 'd',
                'cerrar' => 'c',
            ],
            [
                'estatus' => '0',
                'abrir' => 'f',
                'cerrar' => 'v',
            ],
            [
                'estatus' => '0',
                'abrir' => 'g',
                'cerrar' => 'b',
            ],
            [
                'estatus' => '0',
                'abrir' => 'h',
                'cerrar' => 'n',
            ],
            [
                'estatus' => '0',
                'abrir' => 'j',
                'cerrar' => 'm',
            ],
            [
                'estatus' => '0',
                'abrir' => 'k',
                'cerrar' => 'l',
            ]
          ];

          Arduino::insert($arduino);


      


    }
}
