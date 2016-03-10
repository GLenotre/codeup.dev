<?php

class Log

{ 
	public $filename;  // property, variable visible only inside the class Log,
	// can be used in any method with the keyword $this->
	public $handle;

    public function __construct($prefix = 'log')  // 'log' will the default parameter
{
    $date = date("Y-m-d");
    $this->filename=$prefix . $date . '.log';
    $this->handle = fopen($this->filename, 'a')
}

public function logMessage($logLevel, $message)  // method
	{
	// Creates variables for the formatted times 
	date_default_timezone_set("America/Chicago");
    $date = date("Y-m-d");
    $this->filename = "log-{$date}.log";  // reuses the definition of $filename globally

    if ($logLevel == 'info') {
    	return $this->logInfo($message);
    } else ($logLevel == 'error') {
    	return $this->logError($message);
    } 

    $this->handle 
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
// The fwrite line adds the message, 
public function writeFile($message) 
{
	$handle = fopen($this->filename, 'a');
	fwrite($handle, PHP_EOL . $message);
}

public function __destruct()
    {
     fclose($handle);
    }

}


?>