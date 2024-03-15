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
if (isset($_POST["login"]) && isset($_POST["email"]) && isset($_POST["pass"])) {
    $login_reg = mysqli_real_escape_string($conn, $_POST["login"]);
    $email_reg = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass_reg = mysqli_real_escape_string($conn, $_POST["pass"]);
    $sql_check_login = "SELECT COUNT(*) FROM users WHERE login = '$login_reg'";
    $result_check_login = $conn->query($sql_check_login);

    if ($result_check_login === false) {
        echo "Ошибка запроса: " . $conn->error;
        exit();
    }

    $num_rows_check_login = $result_check_login->fetch_row()[0];

    if ($num_rows_check_login > 0) {
        header("Location: Register2.html");
        exit();
    }

    if (!filter_var($email_reg, FILTER_VALIDATE_EMAIL)) {
        echo "Ошибка! Неверный формат email-адреса.";
        exit();
    }

    
    $hashed_password = password_hash($pass_reg, PASSWORD_DEFAULT);

    
    $is_admin = 0;

    $sql = "INSERT INTO users (login, email, password, is_admin) VALUES ('$login_reg', '$email_reg', '$hashed_password', '$is_admin')";

    if ($conn->query($sql)) {
        echo "Регистрация успешна!";
        header("Location: Index.html");
    } else {
        echo "Ошибка! Не удалось выполнить запрос: " . $conn->error;
    }

    $conn->close();
}
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
            // Пароль верен, пользователь аутентифицирован
            if ($row['is_admin'] == 1) {
                // Этот пользователь - администратор
                echo "Вход успешен! Добро пожаловать, администратор!";
                header("Location: Indexadmpanel.html"); // Изменен путь для администратора
                // Можно выполнить дополнительные действия для администратора
            } else {
                // Обычный пользователь
                echo "Вход успешен!";
                header("Location: Index.html");
                // Можно выполнить дополнительные действия для обычного пользователя
            }
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
