<?php
include "functions.php";

class Database {
    private static $instance;
    public $connection = false;

    /*
        Constructor method
    */
    private function __construct($host = "localhost",$user = "root",$password = "",$dbName = "StudentShift") {
        $this->connection = new mysqli($host,$user,$password,$dbName);
        if ($this->connection->connect_error) {
            exit('Failed to connect to MySQL - ' . $this->connection->connect_error);
        }
        logger("Successfully connected to " . $dbName . " database.", "INFO");
    }
    
    /*
        Singleton Instantiation method
    */
    public static function getInstance() {
        if (empty(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    /*
        Selects all unique majors from the Major column
    */
    public function getUniqueMajors() {
        logger("Function getUniqueMajors called.", "INFO");
        
        $query = "SELECT DISTINCT Major FROM StudentShiftDB";
        
        //Check for errors
        if (!$this->connection->query($query)) {
            exit("Error message: " . $this->connection->error);
        }

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        $result = $stmt->get_result();
        $column = array();

        while($row = $result->fetch_assoc()) {
            $column[] = $row['Major'];
        }
        sort($column);
        $stmt->close();

        return $column;
    }

    /*
        Gets all rows of a Major with GPA greater than or equal to the input GPA
    */
    public function getMajorRows($major, $gpa) {
        logger("Function getMajorRows called.", "INFO");

        $query = "SELECT Major,Job_Type,Job_Title_Area_of_Study,Salary FROM StudentShiftDB WHERE Major = ? AND GPA >= ?;";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        $stmt->bind_param('sd',$major,$gpa);
        $stmt->execute();

        $result = $stmt->get_result();
        $column = array();

        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        

        $stmt->close();

        if (isset($rows)) {
            sort($rows);
            return $rows;
        } else {
            return 0;
        }
    }
}
/*
$db = Database::getInstance();
$rows = $db->getMajorRows('Computer Science',2.0);

format_r($rows);
*/
?>