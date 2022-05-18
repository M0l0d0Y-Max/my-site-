<?php 
if (isset($_POST['name']) && isset($_POST['text'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $last_name = $_POST['email'];
    $last_name = $_POST['phone'];
    $last_name = $_POST['message'];
    
    // Параметры для подключения
    $db_host = "localhost"; 
    $db_user = "Maxim"; 
    $db_password = ""; 
    $db_base = 'users'; 
    $db_table = "users"; 
    
    try {
        // Подключение к базе данных
        $db = new PDO("mysql:host=$db_host;dbname=$db_base", $db_user, $db_password);
        // Устанавливаем корректную кодировку
        $db->exec("set names utf8");
        // Собираем данные для запроса
        $data = array( 'first_name' => $first_name, 'last_name' => $last_name, 'email' => $email, 'phone' => $phone, 'message' => $message); 
        // Подготавливаем SQL-запрос
        $query = $db->prepare("INSERT INTO $db_table (last_name, first_name, email, phone, message) values (:first_name, :last_name, :email, :phone, :message)");
        // Выполняем запрос с данными
        $query->execute($data);
        // Запишим в переменую, что запрос отрабтал
        $result = true;
    } catch (PDOException $e) {
        // Если есть ошибка соединения или выполнения запроса, выводим её
        print "Ошибка!: " . $e->getMessage() . "<br/>";
    }
    
    if ($result) {
    	echo "Успех. Информация занесена в базу данных";
    }
}
?>