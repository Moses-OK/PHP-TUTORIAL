<?php
function get_connection(){
    $config = require 'config.php';
    return new PDO($config['database_dsn'], $config['database_user'] , $config['datbase_password']);
    //arrow syntax are used to call functions inside an object or class.object oriented function.
}

function get_pets($limit = null)
{
  
    //return a function to a variable.==function as a value.
$pdo = get_connection();
   $query = 'SELECT * FROM pet';
    if($limit){
        $query = $query.' LIMIT '.$limit; //spaces in the sql code is important
    }
    $results = $pdo->query($query);//this has to have a varible that point to an arrow function
   //adding a limit argument at the end of the sql statement limits the amount of results you want fetched from the database
    $pets = $results->fetchAll();//returns multiple rows from the db

    return $pets;
}
function save_pets($variable){
    $json = json_encode($variable , JSON_PRETTY_PRINT); 
file_put_contents('data/pets.json',$json);
}
function show_pets($show){
    $pdo = get_connection();
    $query = 'SELECT * FROM pet';
    if($show){
        $query = $query.' WHERE '.$show; //spaces in the sql code is important
    }
    $results = $pdo->query($query);//this has to have a varible that point to an arrow function
   //adding a limit argument at the end of the sql statement limits the amount of results you want fetched from the database
    $pets = $results->fetch();

    return $pets;
}