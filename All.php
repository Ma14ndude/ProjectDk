<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Регистрация пользователя
if (isset($_POST["login_reg"]) && isset($_POST["email_reg"]) && isset($_POST["pass_reg"])) {
    // ... (ваш код регистрации здесь)
}

// Вход пользователя
if (isset($_POST["Login"]) && isset($_POST["pass"])) {
    $login = mysqli_real_escape_string($conn, $_POST["Login"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    // Поиск пользователя в базе данных по логину
    $sql_check_login = "SELECT * FROM users WHERE login = '$login'";
    $result_check_login = $conn->query($sql_check_login);

    if ($result_check_login->num_rows > 0) {
        // Пользователь существует, проверим пароль
        $row = $result_check_login->fetch_assoc();
        if (password_verify($pass, $row['password'])) {
            if ($row['is_admin'] == 1) {
                // Этот пользователь - администратор
                header("Location: Indexadmpanel.html");
                // Ваши дополнительные действия для администратора (если нужны)
                exit(); // Важно завершить выполнение скрипта после перенаправления
            } else {
                // Обычный пользователь
                echo "Вход успешен!";
                // Ваши дополнительные действия для обычного пользователя
            }
            header("Location: Index.html");
        } else {
            header("Location: Login1.html");
        }
    } else {
        header("Location: Login1.html");
    }

    // Закрытие соединения
    $conn->close();
}

?>
