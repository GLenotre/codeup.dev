<?php
class Log

{ 
	public $filename;

public function logMessage($logLevel, $message)
	{
	// Creates variables for the formatted times 
	date_default_timezone_set("America/Chicago");
    $date = date("Y-m-d");
    $this->filename = "log-{$date}.log";  // reuses the definition of $filename globally

    if ($logLevel == 'info') {
    	return $this->logInfo($message);
    } elseif ($logLevel == 'error') {
    	return $this->logError($message);
    } else {
    	return "[UNK], '{$logLevel}' is unknown.";
    }
	}

// The logInfo and logError functions create different messages to be printed out by the logMessages functions. 
public function logInfo($message)
	{
    return $this->writeFile ("[INFO], $message.");
	}

public function logError($message)
	{
    return $this->writeFile ("[ERROR], $message.");
	}

// This function creates or opens the file
// The fwrite line adds the message, $formatedDateTimeEntry to the new or opened file.
public function writeFile($message) 
{
	$handle = fopen($this->filename, 'a');
	fwrite($handle, PHP_EOL . $message);
	fclose($handle);	
}

}

$logger = new Log();
$logger->logMessage("info", "Today is");
$logger->logMessage("error", "Try again");
?>