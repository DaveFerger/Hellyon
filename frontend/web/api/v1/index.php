<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 2017. 03. 19.
 * Time: 11:43
 */
//including the required files
require_once '../include/DbOperation.php';
require '.././libs/Slim/Slim.php';


\Slim\Slim::registerAutoloader();

//Creating a slim instance
$app = new \Slim\Slim();

//this method will create a student
//the first parameter is the URL address that will be added at last to the root url
//The method is post
$app->post('/createUser', function () use ($app) {

    //Verifying the required parameters
    verifyRequiredParams(array('firstname', 'lastname', 'username', 'password', 'email'));

    //Creating a response array
    $response = array();

    //reading post parameters
    $firstname = $app->request->post('firstname');
    $lastname = $app->request->post('lastname');
    $username = $app->request->post('username');
    $password = $app->request->post('password');
    $email = $app->request->post('email');

    //Creating a DbOperation object
    $db = new DbOperation();

    //Calling the method createStudent to add student to the database
    $res = $db->createUser($firstname,$lastname,$username,$password,$email);

    //If the result returned is 0 means success
    if ($res == 0) {
        //Making the response error false
        $response["error"] = false;
        //Adding a success message
        $response["message"] = "You are successfully registered";
        //Displaying response
        echoResponse(201, $response);

        //If the result returned is 1 means failure
    } else if ($res == 1) {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred while registereing";
        echoResponse(200, $response);

        //If the result returned is 2 means user already exist
    } else if ($res == 2) {
        $response["error"] = true;
        $response["message"] = "Sorry, this email already existed";
        echoResponse(200, $response);
    }
});

//Login request
$app->post('/userLogin',function() use ($app){
    //verifying required parameters
    verifyRequiredParams(array('username','password'));

    //getting post values
    $username = $app->request->post('username');
    $password = $app->request->post('password');

    //Creating DbOperation object
    $db = new DbOperation();

    //Creating a response array
    $response = array();

    //If username password is correct
    if($db->userLogin($username,$password)){

        //Getting user detail
        $user = $db->getUser($username);

        //Generating response
        $response['error'] = false;
        $response['id'] = $user['id'];
        $response['firstname'] = $user['firstname'];
        $response['lastname'] = $user['lastname'];
        $response['username'] = $user['username'];
        $response['apikey'] = $user['api_key'];

    }else{
        //Generating response
        $response['error'] = true;
        $response['message'] = "Invalid username or password";
    }

    //Displaying the response
    echoResponse(200,$response);
});

$app->post('/addFlowerPot', function () use ($app) {
    verifyRequiredParams(array('name', 'key', 'description', 'flower_id', 'user_id'));
    $name = $app->request->post('name');
    $key = $app->request->post('key');
    $description = $app->request->post('description');
    $flower_id = $app->request->post('flower_id');
    $user_id = $app->request->post('user_id');

    $db = new DbOperation();
    $response = array();

    $res = $db->addFlowerPot($name, $key, $description, $flower_id, $user_id);
    if ($res == 0) {
        $response["error"] = false;
        $response["message"] = "You are successfully registered";
        echoResponse(201, $response);
    } else if ($res == 1) {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred while registereing";
        echoResponse(200, $response);
    } else if ($res == 2) {
        $response["error"] = true;
        $response["message"] = "Sorry, this faculty already existed";
        echoResponse(200, $response);
    }
});

$app->post('/setActive', function () use ($app) {
    verifyRequiredParams(array('flower_name', 'light', 'waterlevel', 'tempature', 'pressure', 'moisture', 'humidity', 'pot_key'));
    $response = array();
    $flower_name = $app->request->post('flower_name');
    $light = $app->request->post('light');
    $waterlevel = $app->request->post('waterlevel');
    $tempature = $app->request->post('tempature');
    $pressure = $app->request->post('pressure');
    $moisture = $app->request->post('moisture');
    $humidity = $app->request->post('humidity');
    $pot_key = $app->request->post('pot_key');
    $db = new DbOperation();

    //Calling the method createStudent to add student to the database
    $res = $db->setActive($flower_name,$light,$waterlevel,$tempature,$pressure,$moisture,$humidity,$pot_key);

    //If the result returned is 0 means success
    if ($res == 0) {
        //Making the response error false
        $response["error"] = false;
        //Adding a success message
        $response["message"] = "Success";
        //Displaying response
        echoResponse(201, $response);

        //If the result returned is 1 means failure
    } else if ($res == 1) {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred";
        echoResponse(200, $response);

        //If the result returned is 2 means user already exist
    } else if ($res == 2) {
        $response["error"] = true;
        $response["message"] = "Sorry";
        echoResponse(200, $response);
    }
});

$app->post('/set2Active', function () use ($app) {
    verifyRequiredParams(array('flower_name','light', 'waterlevel', 'tempature','pressure','moisture','humidity','pot_key'));
    $response = array();
    $flower_name = $app->request->post('flower_name');
    $light = $app->request->post('light');
    $waterlevel = $app->request->post('waterlevel');
    $tempature = $app->request->post('tempature');
    $pressure = $app->request->post('pressure');
    $moisture = $app->request->post('moisture');
    $humidity = $app->request->post('humidity');
    $pot_key = $app->request->post('pot_key');
    $db = new DbOperation();

    //Calling the method createStudent to add student to the database
    $res = $db->set2Active($flower_name,$light,$waterlevel, $tempature,$pressure, $moisture,$humidity,$pot_key);

    //If the result returned is 0 means success
    if ($res == 0) {
        //Making the response error false
        $response["error"] = false;
        //Adding a success message
        $response["message"] = "Success";
        //Displaying response
        echoResponse(201, $response);

        //If the result returned is 1 means failure
    } else if ($res == 1) {
        $response["error"] = true;
        $response["message"] = "Oops! An error occurred";
        echoResponse(200, $response);

        //If the result returned is 2 means user already exist
    } else if ($res == 2) {
        $response["error"] = true;
        $response["message"] = "Sorry";
        echoResponse(200, $response);
    }
});

$app->post('/getActive',function() use ($app){
    //verifying required parameters
    verifyRequiredParams(array('flower_name','pot_key'));

    //getting post values
    $flower_name = $app->request->post('flower_name');
    $pot_key = $app->request->post('pot_key');

    //Creating DbOperation object
    $db = new DbOperation();

    //Creating a response array
    $response = array();

    //If username password is correct
    if($db->flowerLogin($flower_name,$pot_key)){

        //Getting user detail
        $flower = $db->getActive($flower_name);

        //Generating response
        $response['error'] = false;
        $response['id'] = $flower['id'];
        $response['flower_name'] = $flower['flower_name'];
        $response['light'] = $flower['light'];
        $response['waterlevel'] = $flower['waterlevel'];
        $response['tempature'] = $flower['tempature'];
        $response['pressure'] = $flower['pressure'];
        $response['moisture'] = $flower['moisture'];
        $response['humidity'] = $flower['humidity'];
        $response['pot_key'] = $flower['pot_key'];

    }else{
        //Generating response
        $response['error'] = true;
        $response['message'] = "Invalid username or password";
    }

    //Displaying the response
    echoResponse(200,$response);
});

//Method to display response
function echoResponse($status_code, $response)
{
    //Getting app instance
    $app = \Slim\Slim::getInstance();

    //Setting Http response code
    $app->status($status_code);

    //setting response content type to json
    $app->contentType('application/json');

    //displaying the response in json format
    echo json_encode($response);
}

function verifyRequiredParams($required_fields)
{
    //Assuming there is no error
    $error = false;

    //Error fields are blank
    $error_fields = "";

    //Getting the request parameters
    $request_params = $_REQUEST;

    //Handling PUT request params
    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        //Getting the app instance
        $app = \Slim\Slim::getInstance();

        //Getting put parameters in request params variable
        parse_str($app->request()->getBody(), $request_params);
    }

    //Looping through all the parameters
    foreach ($required_fields as $field) {

        //if any requred parameter is missing
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            //error is true
            $error = true;

            //Concatnating the missing parameters in error fields
            $error_fields .= $field . ', ';
        }
    }

    //if there is a parameter missing then error is true
    if ($error) {
        //Creating response array
        $response = array();

        //Getting app instance
        $app = \Slim\Slim::getInstance();

        //Adding values to response array
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';

        //Displaying response with error code 400
        echoResponse(400, $response);

        //Stopping the app
        $app->stop();
    }
}

//Method to authenticate a student
function authenticateStudent(\Slim\Route $route)
{
    //Getting request headers
    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();

    //Verifying the headers
    if (isset($headers['Authorization'])) {

        //Creating a DatabaseOperation boject
        $db = new DbOperation();

        //Getting api key from header
        $api_key = $headers['Authorization'];

        //Validating apikey from database
        if (!$db->isValidUser($api_key)) {
            $response["error"] = true;
            $response["message"] = "Access Denied. Invalid Api key";
            echoResponse(401, $response);
            $app->stop();
        }
    } else {
        // api key is missing in header
        $response["error"] = true;
        $response["message"] = "Api key is misssing";
        echoResponse(400, $response);
        $app->stop();
    }
}
$app->run();
?>