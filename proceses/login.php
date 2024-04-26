<?php
session_start();

$dsn = "mysql:host=localhost;dbname=sean";
$username = "root";
$password = "";
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM user WHERE username = :user";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user' => $user]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if ($password === $user['password']) {
                $_SESSION['user_id'] = $user['user'];
                $_SESSION['email'] = $user['user'];
             
                header("Location: ../admin/index.php");
                exit();
            } else {
                header("Location: login.php?error=Invalid user or password");
                exit();
            }
        } else {
            header("Location: login.php?error=User not found");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage(); 
        exit();
    }
}
$pdo = null;
?>
