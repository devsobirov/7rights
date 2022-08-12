<?php

use Illuminate\Database\Seeder;

class DocsSeeder extends Seeder
{
    
    public function run()
    {
        $docs = [
			[
				'name' => 'Счёт на оплату',
				'document' => 'xz',
				'form_template' => 'docstpl.schet-na-oplatu',
				'description' => 'xz'
			],
			[
				'name' => 'Универсальный передаточный документ',
				'document' => 'xz',
				'form_template' => 'docstpl.pd',
				'description' => 'xz'
			],
			[
				'name' => 'Счёт-фактура',
				'document' => 'xz',
				'form_template' => 'docstpl.schf',
				'description' => 'xz'
			],
			[
				'name' => 'Товарная накладная',
				'document' => 'xz',
				'form_template' => 'none',
				'description' => 'xz'
			],
			[
				'name' => 'Доверенность (ТМЦ)',
				'document' => 'xz',
				'form_template' => 'docstpl.dovtmc',
				'description' => 'xz'
			],
			[
				'name' => 'Корректировочный счёт-фактура',
				'document' => 'xz',
				'form_template' => 'docstpl.corschf',
				'description' => 'xz'
			]
		];
		
		DB::table('docs')->insert($docs);
    }
}
