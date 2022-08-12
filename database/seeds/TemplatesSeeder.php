<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'name' => 'Счёт на оплату',
                'view_path' => 'docstpl.schet-na-oplatu',
            ],
            [
                'name' => 'Универсальный передаточный документ',
                'view_path' => 'docstpl.pd',
            ],
            [
                'name' => 'Счёт-фактура',
                'view_path' => 'docstpl.schf',
            ],
            [
                'name' => 'Товарная накладная',
                'view_path' => null,
            ],
            [
                'name' => 'Доверенность (ТМЦ)',
                'view_path' => 'docstpl.dovtmc',
            ],
            [
                'name' => 'Корректировочный счёт-фактура',
                'view_path' => 'docstpl.corschf',
            ]
        ];

        DB::table('templates')->insert($templates);
    }
}
