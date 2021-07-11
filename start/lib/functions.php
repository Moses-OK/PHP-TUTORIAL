<?php

function get_pets()
{
    //return a function to a variable.==function as a value.
   $config = require 'config.php';
    $pdo = new PDO($config['database_dsn'], $config['database_user'] , $config['datbase_password']);
    //arrow syntax are used to call functions inside an object or class.object oriented function.
    $results = $pdo->query('Select * from pet');//this has to have a varible that point to an arrow function
    $pets = $results->fetchAll();

    return $pets;
}
function save_pets($variable){
    $json = json_encode($variable , JSON_PRETTY_PRINT); 
file_put_contents('data/pets.json',$json);
}