<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocsSeeder extends Seeder
{

    public function run()
    {
        $docs = [
			[
				'name' => 'Счёт на оплату',
				'form_template' => 'docstpl.schet-na-oplatu',
			],
			[
				'name' => 'Универсальный передаточный документ',
				'form_template' => 'docstpl.pd',
			],
			[
				'name' => 'Счёт-фактура',
				'form_template' => 'docstpl.schf',
			],
			[
				'name' => 'Товарная накладная',
				'form_template' => 'none',
			],
			[
				'name' => 'Доверенность (ТМЦ)',
				'form_template' => 'docstpl.dovtmc',
			],
			[
				'name' => 'Корректировочный счёт-фактура',
				'form_template' => 'docstpl.corschf',
			]
		];

		DB::table('documents')->insert($docs);
    }
}
