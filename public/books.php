<?php

$books = [
	'book1' =>
		'origin' => [
		'lastName' => 'Aeschylus', 
		'civilization' => 'Ancient Greece'
		],
	 	'title' => 'The Persians',
		'date' => "500 BCE"
	];
	
	'book2' => [
		'lastName' => 'Sophocles',
		'civilization' => 'Ancient Greece'
	],
		'title' => 'Antigone',
		'date' => '450 BCE'
	]
	];

	echo "{$books['book1']['title']} was written by {$books['book1']['lastName']};
	