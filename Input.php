<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */

    public static function has($key)
    {
        if (isset($_REQUEST[$key])) {
            return true;
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {

        if (self::has($key)) {
            return $_REQUEST[$key];
        } 

        return $default;

    }

    public static function escape($key)
    {
        return  htmlspecialchars(strip_tags($key));
    }

    public static function getString($key) 
    {
        $value = self::get($key);
        
        if($value == null || is_resource($value) || is_numeric($value))
        {
            throw new Exception("{$key} is not a string.");
        } 
            return (float) $value;
        // $this->firstName = trim($firstName);
    }


    public static function getNumber ($key)

    {
        $value = self::get($key);
        if(!is_numeric($value) || $value == null)
        {
            throw new Exception("{$key} is not a number.");
        } 
            return $value;
    }

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
