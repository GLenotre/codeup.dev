<?php

require_once 'db_connect.php';

$parks = [
	['name' => 'Acadia', 'description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.', 'area_in_acres' => '47389', 'date_established' => 'February 26, 1919', 'location'=> 'Maine'],
	['name' => 'American Samoa', 'description' => 'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish.', 'area_in_acres', 'area_in_acres' => '9000', 'date_established' => 'October 31, 1988', 'location'=> 'American Samoa'],
	['name' => 'Arches', 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.', 'area_in_acres' => '1284767', 'date_established' => 'April 12, 1929', 'location'=> 'Utah'],
	['name' => 'Badlands', 'description' => "The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world''s richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.", 'area_in_acres' => '242755', 'date_established' => 'November 10, 1978', 'location'=> 'South Dakota'],
	['name' => 'Big Bend', 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders.', 'area_in_acres' => '801163', 'date_established' => 'June 12, 1944', 'location'=> 'Texas'],
	['name' => 'Biscayne', 'description' => "Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian manatee, American crocodile, various sea turtles, and peregrine falcon.", 'area_in_acres' => '172924', 'date_established' => 'June 28, 1980', 'location'=> 'Florida']
	// ['name' => 'Biscayne', 'description' => "", 'area_in_acres' => '', 'date_established' => '', 'location'=> ''],
	// ['name' => 'Biscayne', 'description' => "", 'area_in_acres' => '', 'date_established' => '', 'location'=> ''],
	// ['name' => 'Biscayne', 'description' => "", 'area_in_acres' => '', 'date_established' => '', 'location'=> '']
];

$dbc->exec('truncate parks');

// Create INSERT query
foreach($parks as $park) {
	$query = "INSERT INTO parks (name, description, area_in_acres, date_established, location)
		VALUES ('{$park['name']}', '{$park['description']}', '{$park['area_in_acres']}', '{$park['date_established']}', '{$park['location']}')";
		$dbc->exec($query);
}

