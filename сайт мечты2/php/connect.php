<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$db_host = "localhost"; 
$db_user = "root"; 
$db_password = ""; 
$db_base = 'users'; 
$db_table = "users"; 

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
    $db->exec("set names utf8");
} catch (PDOException $e) {

    print "Ошибка!: " . $e->getMessage() . "<br/>";
}



$data = array( 'first_name' => $first_name, 'email' => $email,'phone' => $phone, 'message' => $message,); 
$query = $db->prepare("INSERT INTO $db_table (first_name, last_name, email, phone, message) values (:first_name, :last_name, :email, :phone, :message)");
$query->execute($data);

if ($result) {
    echo "Информация занесена в базу данных";
  }
?>