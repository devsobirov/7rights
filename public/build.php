<?php
$doc = array(
	array(
		"dom"=>'input',
		"type" => "text",
		"value"=>"placeholder",
		"label"=> 'Тестовый инпут',
		'id' => 'input'
	),
	
	array(
		"dom" => "table",
		"type" => "table",
		'id' => 'table',
		"value" => array(
			"head" => array("col1","col2","col3","col4","col5"),
			"body" => array(
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5"),
				array("cell1-1","cel1-2","cel1-3","cel1-4","cel1-5")
			)
		),
	),
	array(
		"dom" => "input",
		"type"=>'checkbox',
		'value'=>'test checkbox',
		"label"=>'Чекбокс',
		"id" => 'checkbox'
	),
	array(
		"dom"=>'input',
		"type"=>'text',
		"value"=>'test',
		'label'=>'Тестовый инпат',
		'id'=>'testinput',
	)


);

foreach ($doc as $d){
		//var_dump($d);

	switch($d['dom']){
		case 'input':	
			echo '
			<div>
				<label for = "'.$d["id"].'">'.$d["label"].'</label> <input type = "'.$d["type"].'" value ="'.$d["value"].'"  id = "'.$d["id"].'">
			</div>
			';
		break;

		case 'table':
			echo '<table border = "1">';
			if ($d['value']['head']){
				echo '<thead><tr>';
				foreach($d['value']['head'] as $h){
					echo '<th>'.$h.'</th>';
				}
				echo '</tr></thead>';
			}
			
			if ($d['value']['body']){
				echo '<tbody>';
				foreach($d['value']['body'] as $body){
					echo '<tr>';
						foreach ($body as $b) {
							echo '<td>'.$b.'</td>';
						}
					echo '</tr>';
				}
				echo '</tbody>';
			}
				

			echo '</table>';
		break;

	}



}