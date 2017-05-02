<?php

/**

 * Connect to Mongo Labs

 **/

class MongoDBConnect 

{

public function __construct($uri)

{

// Connection Validation

$uri = "mongodb://mlabshostblahblah";

try {

//$client = new MongoClient($uri);

echo"Connection Sucessfull to Mongo Labs $database Database".PHP_EOL;

}

catch (MongoConnectionException $e) {

die('Error connecting to MongoDB server');}

catch (MongoConnectionException $e) {

dir('Error: ' . $e->getMessage());

}

}

public function TestCollections()

{

$db=$this->client->selectDB("trackerdb");

$collections = $db->getCollectionNames("login");

var_dump($collections);

}
/**
I am getting this error 

Call to a member function selectDB() on a non-object in mongodbconnect.php line 32

the method in the Mongo api to select the db is selectDB() 

**/ 
public function ValidateUser($username, $password)
 
{

//..code for validation of users

}
 
// Close the connection

public function __destruct()

{

$client->close();

}

}

?>
 
/**

I am getting this error 

Call to a member function selectDB() on a non-object in mongodbconnect.php line 32

the method in the Mongo api to select the db is selectDB() 

**/