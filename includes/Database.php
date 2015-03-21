<?php

class Database{
    private $host      = DB_HOST;
    private $user      = DB_USER;
    private $pass      = DB_PASS;
    private $dbname    = DB_NAME;
 
    private $dbh;
    private $error;

    private $stmt;
 
    public function __construct() {
        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        // Set options
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        // Create a new PDO instanace
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }
        // Catch any errors
        catch(PDOException $e){
            $this->error = $e->getMessage();
        }
    }

    public function execute(){
    	return $this->stmt->execute();
	}

    public function query($query){
    	$this->stmt = $this->dbh->prepare($query);
	}

    public function bind($param, $value, $type = null){
    if (is_null($type)) {
        switch (true) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
    }
    	$this->stmt->bindValue($param, $value, $type);
	}

	public function single() {
    	$this->execute();
    	return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}

	public function resultset(){
    	$this->execute();
    	return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	public function lastInsertId(){
    	return $this->dbh->lastInsertId();
	}

	public function rowCount(){
    	return $this->stmt->rowCount();
	}

	public function beginTransaction(){
    	return $this->dbh->beginTransaction();
	}

    /**
     * Gets rows of services for charities
     */
    public function getServicesOffered($charityid) {
        $query = "SELECT services.service FROM services LEFT JOIN organisation_services ON organisation_services.servicesid=services.id WHERE organisation_services.organisationid = :charityid";
        $this->query($query);
        $this->bind(":charityid", $charityid);
        $results = $this->resultset();
//        var_dump($results);
        if($results) {
            return $results;
        } else {
            return false;
        }
    }

}