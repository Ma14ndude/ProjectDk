<?php

require_once('bd.php');

// Обработка данных формы для входа
if (isset($_POST["Login"]) && isset($_POST["pass"])) {
    $login = mysqli_real_escape_string($conn, $_POST["Login"]);
    $pass = mysqli_real_escape_string($conn, $_POST["pass"]);

    // Поиск пользователя в базе данных по логину
    $sql_check_login = "SELECT * FROM users WHERE login = '$login'";
    $result_check_login = $conn->query($sql_check_login);

    if ($result_check_login->num_rows > 0) {
        // Пользователь существует, проверим пароль
        $row = $result_check_login->fetch_assoc();
        if ($pass == $row['password']) {
            // Пароль верен, пользователь аутентифицирован
            echo "Вход успешен!";
            header("Location: Index.html");
            // Можно выполнить дополнительные действия после входа
        } else {
            echo  header("Location: Login1.html");
        }
    } else {
        echo  header("Location: Login1.html");
    }

    // Закрытие соединения
    $conn->close();
}

?>
