<?php

// source db to read
class pdo_credentials_dev
{
    protected $DBdsn = "mysql:host=localhost;dbname=xxxxxx";
    protected $DBname = "";
    protected $DBschema = "";
    protected $DBusername = "";
    protected $DBpassword = "";

    public function getDBDsn(){
        return $this->DBdsn;
    }

    public function getDBname(){
        return $this->DBname;
    }

    public function getDBschema(){
        return $this->DBschema;
    }

    public function getDBusername(){
        return $this->DBusername;
    }

    public function getDBpassword(){
        return $this->DBpassword;
    }
}

// target db with older structure
class pdo_credentials_prod
{
    protected $DBdsn = "mysql:host=localhost;dbname=xxxxxx";
    protected $DBname = "";
    protected $DBschema = "";
    protected $DBusername = "";
    protected $DBpassword = "";

    public function getDBDsn(){
        return $this->DBdsn;
    }

    public function getDBname(){
        return $this->DBname;
    }

    public function getDBschema(){
        return $this->DBschema;
    }

    public function getDBusername(){
        return $this->DBusername;
    }

    public function getDBpassword(){
        return $this->DBpassword;
    }
}

?>