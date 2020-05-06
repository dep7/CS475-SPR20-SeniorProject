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
            if (strpos($row['Major'],'/') !== false) {
                $strArr = explode($row['Major'],'/');
                foreach($strArr as $val)
                    if ($val != '/')
                        $column[$val] = 0;
            } else {
                $column[$row['Major']] = 0;
            }
        }
        $column = array_keys($column);
        sort($column);
        $stmt->close();

        return $column;
    }

    /*
        Gets all rows of a Major with GPA greater than or equal to the input GPA
    */
    public function getMajorRows($major, $gpa) {
        logger("Function getMajorRows called.", "INFO");

        $query = "SELECT * FROM StudentShiftDB WHERE Major LIKE '%" . $major . "%' AND GPA >= " . $gpa .";";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        
        if (!$this->connection->query($query)) {
            logger($query, "INFO");
            exit("Error message: " . $this->connection->error);
        }
        //$stmt->bind_param('sd',$major,$gpa);
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
            return [];
        }
    }

    /*
        Deletes a row from StudentShiftDB by StudentID
    */
    public function deleteRowByStudentID($id) {
        logger("Function deleteRowByStudentID called.", "INFO");

        $query = "DELETE FROM StudentShiftDB WHERE StudentID = ?";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        $stmt -> bind_param('i', $id);

        $stmt->execute();
        $stmt->close();
    }

    /*
        Locates the student by StudentID
    */
    public function findStudentByID($id) {
        logger("Function findUser called.", "INFO");

        $query = "SELECT * FROM StudentShiftDB WHERE StudentID = ?;";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);

        $stmt -> bind_param('s', $id);

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
            return [];
        }
    }

    /*
        Adds a row to StudentShiftDB
    */
    public function addStudent($gradDate,$employDate,$school,$company,$title,$jobType,$major,$minor,$gpa,$salary) {
        logger("Function addStudent called.", "INFO");

        $ids = $this->getAllStudentIDs();
        $newID = 0;
        foreach ($ids as $val)
            if ($val['StudentID'] >= $newID)
                $newID = $val['StudentID'] + 1;

        $query = "INSERT INTO StudentShiftDB VALUES (" . $newID . ",'" . $gradDate . "','" . $employDate . "',?,?,?,'" . $jobType . "',?,?," . $gpa ."," . $salary . ");";
        
        //Prepare Statement
        $stmt = $this->connection->prepare($query);

        /*
        if (!$this->connection->query($query)) {
            logger($query, "INFO");
            echo $query;
            format_r($this->connection->error_list);
            exit("Error message: " . $this->connection->error);
        }
        */

        $stmt->bind_param('sssss', $school,$company,$title,$major,$minor);

        $stmt->execute();
        $stmt->close();

        return $newID;
    }

    /*
        Gets all StudentID's
    */
    public function getAllStudentIDs() {
        logger("Function getAllStudentIDs called.", "INFO");

        $query = "SELECT StudentID FROM StudentShiftDB;";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        
        if (!$this->connection->query($query)) {
            exit("Error message: " . $this->connection->error);
        }
        
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
            return [];
        }
    }


    /*
        Gets all rows with GPA greater than or equal to the input GPA
    */
    public function getAllRows($gpa) {
        logger("Function getMajorRows called.", "INFO");

        $query = "SELECT * FROM StudentShiftDB WHERE GPA >= " . $gpa .";";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        
        if (!$this->connection->query($query)) {
            exit("Error message: " . $this->connection->error);
        }
        //$stmt->bind_param('sd',$major,$gpa);
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
            return [];
        }
    }

    public function addUser($username, $password, $userType=1) {
        logger("Function addUser called.", "INFO");

        $query = "INSERT INTO users (username,usertype,userpass) VALUES (?,?,?);";

        // Hash passowrd
        $hash = password_hash($password, PASSWORD_DEFAULT);
        logger(("Hash:" . $hash), "INFO");

        //Prepare Statement
        $stmt = $this->connection->prepare($query);
        $stmt -> bind_param('sis', $username,$userType,$hash);

        $stmt->execute();
        $stmt->close();
    }

    public function findUser($username) {
        logger("Function findUser called.", "INFO");

        $query = "SELECT * FROM users WHERE username = ?;";

        //Prepare Statement
        $stmt = $this->connection->prepare($query);

        $stmt -> bind_param('s', $username);

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
            return [];
        }
    }
}
/*
$db = Database::getInstance();
$rows = $db->getMajorRows('Computer Science',2.0);

format_r($rows);
*/
?>