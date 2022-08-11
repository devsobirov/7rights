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
			"head" => array(["col1","col2","col3","col4","col5"]),
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
		"dom"=>'input',
		"type"=>'checkbox',
		'value'=>'test checkbox',
		"label"=>'Чекбокс',
		"id" => 'checkbox'
	)


);

foreach ($doc as $el){

	switch($doc['dom']){

		case 'checkbox':
		case 'input':	
			'<label for = "'.$el['id'].'">'.$el['text'].'</label> <input type = "'.$el['type'].'" value ="'.$el['value'].'"  id = "'.$el['id'].'">';
		break;

		case 'table':
			echo '<table border = "1">';
			if ($el['value']['head']){
				echo '<thead><tr>';
				foreach($el['value']['head'] as $h){
					echo '<th>'.$h.'</th>';
				}
				echo '</tr></thead>';
			}
			
			if ($table['value']['body']){
				echo '<tbody>';
				foreach($erl['value']['body'] as $body){
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