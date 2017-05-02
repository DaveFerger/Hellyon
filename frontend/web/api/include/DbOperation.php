<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2017. 03. 19.
 * Time: 11:40
 */

class DbOperation
{
    //Database connection link
    private $con;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    //Method will create a new student
    public function createUser($firstname,$lastname,$username,$pass,$email){
        //First we will check whether the student is already registered or not
        if (!$this->isUserExists($username)) {
            //Encrypting the password
            $password = md5($pass);
            //Generating an API Key
            $apikey = $this->generateApiKey();
            //Crating an statement
            $stmt = $this->con->prepare("INSERT INTO users(firstname, lastname, username, password, email, api_key) values(?, ?, ?, ?, ?, ?)");
            //Binding the parameters
            $stmt->bind_param("ssssss", $firstname, $lastname, $username, $password, $email, $apikey);
            //Executing the statment
            $result = $stmt->execute();
            //Closing the statment
            $stmt->close();
            //If statment executed successfully
            if ($result) {
                //Returning 0 means student created successfully
                return 0;
            } else {
                //Returning 1 means failed to create student
                return 1;
            }
        } else {
            //returning 2 means user already exist in the database
            return 2;
        }
    }

    //Method for student login
    public function userLogin($username,$pass){
        //Generating password hash
        $password = md5($pass);
        //Creating query
        $stmt = $this->con->prepare("SELECT * FROM users WHERE username=? and password=?");
        //binding the parameters
        $stmt->bind_param("ss",$username,$password);
        //executing the query
        $stmt->execute();
        //Storing result
        $stmt->store_result();
        //Getting the result
        $num_rows = $stmt->num_rows;
        //closing the statment
        $stmt->close();
        //If the result value is greater than 0 means user found in the database with given username and password
        //So returning true
        return $num_rows>0;
    }

        //This method will return student detail
    public function getUser($username){
        $stmt = $this->con->prepare("SELECT * FROM users WHERE username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        //Getting the user result array
        $user = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        //returning the user
        return $user;
    }

    //Checking whether a student already exist
    private function isUserExists($username) {
        $stmt = $this->con->prepare("SELECT id from users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    /*
     * Methods to check a user is valid or not using api key
     * I will not write comments to every method as the same thing is done in each method
     * */
    public function isValidUser($api_key) {
        //Creating an statement
        $stmt = $this->con->prepare("SELECT id from users WHERE api_key = ?");

        //Binding parameters to statement with this
        //the question mark of queries will be replaced with the actual values
        $stmt->bind_param("s", $api_key);

        //Executing the statement
        $stmt->execute();

        //Storing the results
        $stmt->store_result();

        //Getting the rows from the database
        //As API Key is always unique so we will get either a row or no row
        $num_rows = $stmt->num_rows;

        //Closing the statment
        $stmt->close();

        //If the fetched row is greater than 0 returning  true means user is valid
        return $num_rows > 0;
    }


    public function addFlowerPot($name, $key, $description, $flower_id, $user_id){
        if (!$this->isFlowerPotExists($key)) {
            //Crating an statement
            $stmt = $this->con->prepare("INSERT INTO flowerpot(name, key, description, flower_id, user_id) values(?, ?, ?, ?, ?, ?)");
            //Binding the parameters
            $stmt->bind_param("ssssss", $name, $key, $description, $flower_id, $user_id);
            //Executing the statment
            $result = $stmt->execute();
            //Closing the statment
            $stmt->close();
            //If statment executed successfully
            if ($result) {
                //Returning 0 means student created successfully
                return 0;
            } else {
                //Returning 1 means failed to create student
                return 1;
            }
        } else {
            //returning 2 means user already exist in the database
            return 2;
        }
    }

    public function setActive($flower_name, $light, $waterlevel, $tempature, $pressure, $moisture, $humidity, $pot_key)
    {
        //if (!$this->isActiveExists($pot_key)) {
            $stmt = $this->con->prepare("INSERT INTO active2(flower_name, light, waterlevel, thempature, pressure, moisture,humidity,pot_key) values(?, ?, ?, ?, ?, ?,?,?)");
            var_dump($stmt);
            $stmt->bind_param("ssssssss", $flower_name, $light, $waterlevel, $tempature, $pressure, $moisture,$humidity,$pot_key);
            $result = $stmt->execute();
            $stmt->close();
            if ($result) {
                //Returning 0 means student created successfully
                return 0;
            } else {
                //Returning 1 means failed to create student
                return 1;
            }
        /*}
            else {
                //returning 2 means user already exist in the database
                return 2;
            }*/

    }

    public function set2Active($flower_name, $light, $waterlevel, $tempature,$pressure,$moisture,$humidity,$pot_key){
        //if (!$this->isActiveExists($pot_key)) {
            $stmt = $this->con->prepare("UPDATE active2 SET light=?,waterlevel=?, tempature=?,pressure=?, moisture=?,humidity=? WHERE flower_name=? AND pot_key=?");
            $stmt->bind_param("ssssssss", $light, $waterlevel, $tempature,$pressure, $moisture,$humidity,$flower_name,$pot_key);
            $result = $stmt->execute();
            $stmt->close();
            if ($result) {
                //Returning 0 means student created successfully
                return 0;
            } else {
                //Returning 1 means failed to create student
                return 1;
            }
        /*} else {
            //returning 2 means user already exist in the database
            return 2;
        }*/
    }

    public function flowerLogin($flower_name,$pot_key){
        $stmt = $this->con->prepare("SELECT * FROM active2 WHERE flower_name=? and pot_key=?");
        $stmt->bind_param("ss",$flower_name,$pot_key);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows>0;
    }

    public function getActive($flower_name){
        $stmt = $this->con->prepare("SELECT * FROM active2 WHERE flower_name=?");
        $stmt->bind_param("s",$flower_name);
        $stmt->execute();
        //Getting the user result array
        $flower = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        //returning the user
        return $flower;
    }

    public function isActiveExists($pot_key) {
        $stmt = $this->con->prepare("SELECT id from active WHERE pot_key = ?");
        $stmt->bind_param("s", $pot_key);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    public function isFlowerPotExists($key) {
        $stmt = $this->con->prepare("SELECT id from flowerpot WHERE key = ?");
        $stmt->bind_param("s", $key);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    //Method to get assignments
    private function getFlowerPot($id){
        $stmt = $this->con->prepare("SELECT * FFROM flowerpot WHERE users_id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $assignments = $stmt->get_result()->fetch_assoc();
        return $assignments;
    }

    //This method will generate a unique api key
    private function generateApiKey(){
        return md5(uniqid(rand(), true));
    }
}

?>