<?php
session_start();

require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['per_login'])) {
        $username = filter_var(trim($_POST['per_username']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['per_password']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM personnel WHERE per_username = :per_username");
        $stmt->bindParam(':per_username', $username, PDO::PARAM_STR);
        $stmt->execute(['per_username' => $username]);
        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();
            $id = $result->per_id;
            $hash = $result->per_password;
            if (password_verify($password, $hash)) {
                $_SESSION['cis-admin-islogin'] = true;
                $_SESSION['cis-admin-id'] = $id;
                echo 'ok';
            } else {
                echo "incorrect";
            }
        } else {
            echo "not";
        }
    }
}

