<?php

/**
 * SQL Class : Control database layer.
 */
class Sql {

    /**
     *  Database Connection variable
     *  ---------------------------
     * @access Protected
     * @var Resource $conn
     *
     */
    private $conn;
    public $debug;
    /**
     *  Database server (Host)
     *  ---------------------------
     * @access Protected
     * @var string $host
     *
     */
    private $hostname_revtini_db;
    private $database_revtini_db;
    private $username_revtini_db;
    private $password_revtini_db;

    function __construct() {
        $this->hostname_revtini_db = "localhost";
        $this->database_revtini_db = "revtini_dev";
        $this->username_revtini_db = "root";
        $this->password_revtini_db = "";
    }

    function __destruct() {
        unset($this->host);
    }

    private function connect() {
        $this->conn = @mysql_connect($this->host, $this->dbuser, $this->dbpwd)
                or die(mysql_error());
    }

    private function disconnect() {
        mysql_close($this->conn);
    }

    private function selectDb() {
        mysql_select_db($this->db, $this->conn) or die(mysql_error());
    }

    /**
     * Executing all the SQL queries
     * --------------------------------
     * @param string $query
     * @return array
     * 
     */
    function query($query) {
        // Connect to the database server
        $this->connect();
        // We have made the connection
        // Now we should select the database
        $this->selectDb();
        // Its the time to execute the SQL query now
        if ($this->debug)
            echo $query;

        $result = mysql_query($query) or die(mysql_error());
        //  Here, we have get the result from the database
        // its the time to break the connection
        $this->disconnect();


        while ($row =@mysql_fetch_array($result)) {
            $dataSet[] = $row;
        }
        return array(
            'Ack' => 'Success',
            'DataSet' => $dataSet,
            'RecordCount' => count($dataSet),
        // You can add any number of items
        // to this array
        );
    }

    function is_multi($a) {
        foreach ($a as $v) {
            if (is_array($v))
                return true;
        }
        return false;
    }

}

?>
