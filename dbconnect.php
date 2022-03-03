<?php
$host= "localhost";
$username = "root";
$password = "";
try{
    $conn = new PDO("mysql:host=$host;dbname=ajaxform",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    echo "Failed Connection: ". $e->getMessage();
}
$response = array();
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$gender = $_POST['gender'];
$DoB = $_POST['DoB'];
$national_id = $_POST['national_id'];
$relationship = $_POST['relationship'];
$phone = $_POST['phone'];
$image = $_POST['image'];

if (isset($firstname)){
    $query = "INSERT INTO users (firstname,lastname,sex,DOB,national_ID,relationship_status,phone_number,ima) VALUES ('$firstname', '$lastname', '$gender','$DoB','$national_id','$relationship','$phone','$image')";
if($conn->query($query)){
    $response =[ $firstname,$lastname,$gender,$DoB,$national_id,$relationship,$phone];
}}

echo json_encode($response)
?>