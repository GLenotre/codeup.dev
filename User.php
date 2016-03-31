<?php

// __DIR__ is a *magic constant* with the directory path containing this file.
// This allows us to correctly require_once Model.php, no matter where this file is being required from.
require_once __DIR__ . '/Model.php';   // DIR stands for the entire path of the current file user, sites...

class User extends Model
{
    protected static $table = 'users';
    /** Insert a new entry into the database */
    protected function insert()
    {
        self::dbConnect();

        // @TODO: Use prepared statements to ensure data security
        $stmt = self::$dbc->prepare("INSERT INTO users (first_name, last_name, email_address) 
            VALUES (:first_name, :last_name, :email_address)");
        
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':email_address', $this->email_address, PDO::PARAM_STR);
        
        // @TODO: After the insert, add the id back to the attributes array
        //        so the object properly represents a DB record
        $stmt->execute();

    }

    /** Update existing entry in the database */
    protected function update()
    {
        self::dbConnect();

        // @TODO: Use prepared statements to ensure data security
        $stmt = self::$dbc->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, email_address = :email_address WHERE id = :id");

        // @TODO: You will need to iterate through all the attributes to build the prepared query
        $stmt->bindValue(':first_name', $this->first_name, PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $this->last_name, PDO::PARAM_STR);
        $stmt->bindValue(':email_address', $this->email_address, PDO::PARAM_STR);
        $stmt->bindValue(':id', $this->id, PDO::PARAM_STR);

        $stmt->execute();
    }

    /**
     * Find a single record in the DB based on its id
     *
     * @param int $id id of the user entry in the database
     *
     * @return User An instance of the User class with attributes array set to values from the database
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();

        // @TODO: Create select statement using prepared statements
        $query = "SELECT * FROM users WHERE id= :id";
        $stmt = self::$dbc->prepare($query);
         $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        
        // @TODO: Store the result in a variable named $result
         $stmt->execute();

         $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if (!empty($result)) {
            $instance = new static($result);  // new Static = new User
        }
        return $instance;
    }

    /**
     * Find all records in a table
     *
     * @return User[] Array of instances of the User class with attributes set to values from database
     */
    public static function all()
    {
        self::dbConnect();
        $stmt = self::$dbc->query("SELECT * from static::$table");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // @TODO: Learning from the find method, return all the matching records
    }

}
