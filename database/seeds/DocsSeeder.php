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
				'template' => 'docstpl.schet-na-oplatu',
			],
			[
				'name' => 'Универсальный передаточный документ',
				'template' => 'docstpl.pd',
			],
			[
				'name' => 'Счёт-фактура',
				'template' => 'docstpl.schf',
			],
			[
				'name' => 'Товарная накладная',
				'template' => 'none',
			],
			[
				'name' => 'Доверенность (ТМЦ)',
				'template' => 'docstpl.dovtmc',
			],
			[
				'name' => 'Корректировочный счёт-фактура',
				'template' => 'docstpl.corschf',
			]
		];

		DB::table('documents')->insert($docs);
    }
}
