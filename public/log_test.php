<?php

require_once('log.php');

$logger = new Log();   // $logger is an object (instance) of the class log
$logger->logMessage("info", "Today is"); // the object $logger is calling a  method, which is defined in the class Log
$logger->logMessage("error", "Try again");

?>