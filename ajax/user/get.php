<?php

session_start();
require '../../libs/model.php';
$db = new Model();
$conn = $db->connection();

if (isset($_POST['get_college'])) {

    $college_id = filter_var(trim($_POST['college_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $stmt = $conn->prepare("SELECT * FROM college WHERE college_id  = :college_id");
    $stmt->execute(['college_id' => $college_id]);
    $data = json_encode($stmt->fetch());
    echo $data;
}
