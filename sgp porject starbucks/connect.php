<?php
$firstname = $_POST['first name'];
$lastname = $_POST['last name'];

$email = $_POST['email'];
$password = $_POST['password'];


// Database connection
$conn = new mysqli('localhost','root','','mytest');
if($conn->connect_error){
    echo "$conn->connect_error";
    die("Connection Failed : ". $conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into registration(first name, last name,email, password) values(?, ?, ?, ?)");
    $stmt->bind_param("ssss", $firstname, $lastname,$email, $password);
    $execval = $stmt->execute();
    echo $execval;
    echo "Registration successfully...";
    $stmt->close();
    $conn->close();
}
?>