<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'dbtugasakhir';

$connection= null;

try {

    $connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // echo "Connection success"."<br>";
    

} catch(PDOException $error) {

    echo "Connection failed " . $error->getMessage();
}
?>
