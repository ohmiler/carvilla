<?php 

    session_start();
    include_once __DIR__ . "/config/database.php";

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        $stmt = $con->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['adminid'] = $user['id'];

            echo json_encode([
                "status" => "success",
                "message" => "login successfully"
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Invalid username or password. Please try again"
            ]);
        }
    }


?>