<?php

require_once('log.php');

$logger = new Log();
$logger->logMessage("info", "Today is");
$logger->logMessage("error", "Try again");

?>