<?php

require "pdo.mysql.class.php";

class db_structure extends pdo_mysql
{
    /**
     * Creates a PDO instance
     * @var $PDO_Credentials
     */
    function __construct($PDO_Credentials)
    {
        PARENT::__construct($PDO_Credentials);
    }

    /**
     * list_tables
     * @return object
     */
    public function list_tables(){
        $statement = "SELECT DISTINCT(TABLE_NAME) FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = :TABLE_SCHEMA";

        $this->prepare($statement);
        $this->bindParam(':TABLE_SCHEMA', $this->DBSchema, PDO::PARAM_STR);
        $this->execute();
        return $this->fetch_all_obj();
    }

    /**
     * creates the get table command
     * @var string $table
     * @return array
     */
    public function getCreateTableCommand($table){
        $statement = "SHOW CREATE TABLE ".$table;

        $this->prepareAndExecute($statement);
        return $this->fetch_all_arr();
    }

    /**
     * get columns to table
     * @var string $table
     * @return array
     */
    public function getTableColumns($table){
        $statement = "SHOW COLUMNS FROM ".$table." -- create tables";

        $this->prepareAndExecute($statement);
        return $this->fetch_all_arr();
    }
}