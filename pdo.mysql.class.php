<?php

require_once "credentials.php";

class pdo_mysql
{
    /** @var PDOStatement */
    var $preparedstatement;

    /**
     * The singleton instance
     */
    private $PDOInstance;

    /**
     * The db schema
     */
    public $DBSchema;

    /**
     * Creates a PDO instance representing a connection to a database and makes the instance available as a singleton
     * @var $PDO_Credentials
     * @return PDO
     */
    function __construct($PDO_Credentials){
        if (!$this->PDOInstance) {
            try {
                $this->DBSchema = $PDO_Credentials->getDBSchema();
                $this->PDOInstance = new PDO($PDO_Credentials->getDBDsn(), $PDO_Credentials->getDBusername(), $PDO_Credentials->getDBpassword());
                $this->PDOInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("PDO CONNECTION ERROR: " . $e->getMessage() . "<br/>");
            }
        }
        return $this->PDOInstance;
    }

    /**
     * Prepares a statement for execution and returns a statement object
     *
     * @param string $statement A valid SQL statement for the target database server
     * @param array $driver_options Array of one or more key=>value pairs to set attribute values for the PDOStatement obj
     * returned
     * @return bool
     */
    public function prepare($statement, $driver_options = false)
    {
        if (!$driver_options) $driver_options = array();
        return $this->preparedstatement = $this->PDOInstance->prepare($statement, $driver_options);
    }

    /**
     * Execute an SQL statement and return the number of affected rows
     *
     * @return int
     */
    public function execute()
    {
        return $this->preparedstatement->execute();
    }

    /**
     * Prepare and execute an SQL statement and return the number of affected rows
     */
    function prepareAndExecute($sql)
    {
        $this->prepare($sql);
        $this->execute();
    }

    /**
     * Bind parameters to the statement
     *
     * @param string $bind
     * @param mixed $var
     * @param int $data_type
     */
    public function bindParam($bind, $var, $data_type)
    {
        $this->preparedstatement->bindParam($bind, $var, $data_type);
    }

    /**
     * Execute query and return all rows in assoc array
     *
     * @return object
     */
    public function fetch_all_obj()
    {
        // return declared as array in pdo, but modified by fetch_style
        return $this->preparedstatement->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Execute query and return one row in assoc array
     *
     * @return array
     */
    public function fetch_all_arr()
    {
        return $this->preparedstatement->fetchAll();
    }
}

?>
