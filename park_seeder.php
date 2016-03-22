<?php

require_once 'db_connect.php';
require_once 'parks_migration.php';

$truncate_parks = "TRUNCATE parks";
$dbc->exec($truncate_parks);

$parks = [
	['name' => 'Acadia', 'description' => 'Covering most of Mount Desert Island and other coastal islands, Acadia features the tallest mountain on the Atlantic coast of the United States, granite peaks, ocean shoreline, woodlands, and lakes. There are freshwater, estuary, forest, and intertidal habitats.', 'area_in_acres' => '47389', 'date_established' => 'February 26, 1919', 'location'=> 'Maine'],
	['name' => 'American Samoa', 'description' => 'The southernmost national park is on three Samoan islands and protects coral reefs, rainforests, volcanic mountains, and white beaches. The area is also home to flying foxes, brown boobies, sea turtles, and 900 species of fish.', 'area_in_acres' => '9000', 'date_established' => 'October 31, 1988', 'location'=> 'American Samoa'],
	['name' => 'Arches', 'description' => 'This site features more than 2,000 natural sandstone arches, including the famous Delicate Arch. In a desert climate, millions of years of erosion have led to these structures, and the arid ground has life-sustaining soil crust and potholes, which serve as natural water-collecting basins. Other geologic formations are stone columns, spires, fins, and towers.', 'area_in_acres' => '1284767', 'date_established' => 'April 12, 1929', 'location'=> 'Utah'],
	['name' => 'Badlands', 'description' => "The Badlands are a collection of buttes, pinnacles, spires, and grass prairies. It has the world''s richest fossil beds from the Oligocene epoch, and the wildlife includes bison, bighorn sheep, black-footed ferrets, and swift foxes.", 'area_in_acres' => '242755', 'date_established' => 'November 10, 1978', 'location'=> 'South Dakota'],
	['name' => 'Big Bend', 'description' => 'Named for the prominent bend in the Rio Grande along the US–Mexico border, this park encompasses a large and remote part of the Chihuahuan Desert. Its main attraction is backcountry recreation in the arid Chisos Mountains and in canyons along the river. A wide variety of Cretaceous and Tertiary fossils as well as cultural artifacts of Native Americans also exist within its borders.', 'area_in_acres' => '801163', 'date_established' => 'June 12, 1944', 'location' => 'Texas'],
	['name' => 'Biscayne', 'description' => "Located in Biscayne Bay, this park at the north end of the Florida Keys has four interrelated marine ecosystems: mangrove forest, the Bay, the Keys, and coral reefs. Threatened animals include the West Indian manatee, American crocodile, various sea turtles, and peregrine falcon.", 'area_in_acres' => '172924', 'date_established' => 'June 28, 1980', 'location'=> 'Florida'],
	['name' => 'Black Canyon of the Gunnison', 'description' => "The park protects a quarter of the Gunnison River, which slices sheer canyon walls from dark Precambrian-era rock. The canyon features incredibly steep descents, and is a popular site for river rafting and rock climbing. The deep, narrow canyon, made of gneiss and schist, is often in shadow and therefore appears black.", 'area_in_acres' => '32950', 'date_established' => 'October 21, 1999', 'location'=> 'Colorado'],
	['name' => 'Bryce Canyon', 'description' => 'Bryce Canyon is a giant geological amphitheater on the Paunsaugunt Plateau. The unique area has hundreds of tall sandstone hoodoos formed by erosion. The region was originally settled by Native Americans and later by Mormon pioneers.', 'area_in_acres' => '35835', 'date_established' => 'February 25, 1928', 'location'=> 'Utah'],
	['name' => 'Canyonlands', 'description' => "This landscape was eroded into a maze of canyons, buttes, and mesas by the combined efforts of the Colorado River, Green River, and their tributaries, which divide the park into three districts. There are rock pinnacles and other naturally sculpted rock formations, as well as artifacts from Ancient Pueblo peoples.", 'area_in_acres' => '337597', 'date_established' => 'September 12, 1964', 'location'=> 'Utah'],
	['name' => 'Capitol Reef', 'description' => "The park''s Waterpocket Fold is a 100-mile (160 km) monocline that exhibits the earth''s diverse geologic layers. Other natural features are monoliths, sandstone domes, and cliffs shaped like the United States Capitol.", 'area_in_acres' => '241904', 'date_established' => 'December 18, 1971', 'location'=> 'Utah'],
	['name' => 'Carlsbad Caverns', 'description' => "Carlsbad Caverns has 117 caves, the longest of which is over 120 miles (190 km) long. The Big Room is almost 4,000 feet (1,200 m) long, and the caves are home to over 400,000 Mexican free-tailed bats and sixteen other species. Above ground are the Chihuahuan Desert and Rattlesnake Springs.", 'area_in_acres' => '46766', 'date_established' => 'May 14, 1930', 'location'=> 'New Mexico'],
	['name' => 'Channel Islands', 'description' => "Five of the eight Channel Islands are protected, and half of the park''s area is underwater. The islands have a unique Mediterranean ecosystem originally settled by the Chumash people. They are home to over 2,000 species of land plants and animals, and 145 are unique to them, including the island fox. Professional ferry services offer transportation to the islands from the mainland.", 'area_in_acres' => '249561', 'date_established' => 'March 5, 1980', 'location'=> 'California'],
];


$stmt = $dbc->prepare("INSERT INTO parks (name, description, area_in_acres, date_established, location)
	VALUES (:name, :description, :area_in_acres, :date_established, :location)");

foreach($parks as $park) {
	$stmt->bindValue(':name', $park['name'], PDO::PARAM_STR);
	$stmt->bindValue(':description', $park['description'], PDO::PARAM_STR);
	$stmt->bindValue(':area_in_acres', $park['area_in_acres'], PDO::PARAM_STR);
	$stmt->bindValue(':date_established', $park['date_established'], PDO::PARAM_STR);
	$stmt->bindValue(':location', $park['location'], PDO::PARAM_STR);

	$stmt->execute();
}

