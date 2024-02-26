<?php

require_once('bd.php');

if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
    $login = mysqli_real_escape_string($conn, $_POST["login"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    $sql_check_login = "SELECT COUNT(*) FROM users WHERE login = '$login'";
    $result_check_login = $conn->query($sql_check_login);
    $num_rows_check_login = $result_check_login->fetch_row()[0];

    if ($num_rows_check_login > 0) {
        echo header("Location: Register2.html");
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Ошибка! Неверный формат email-адреса.";
        exit();
    }

   

    // Хеширование пароля
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (login, email, password) VALUES ('$login', '$email', '$hashed_password')";

    if ($conn->query($sql)) {
        header("Location: Index.html");
    } else {
        echo "Ошибка! Не удалось выполнить запрос: " . $conn->error;
    }

    $conn->close();
}

?>
