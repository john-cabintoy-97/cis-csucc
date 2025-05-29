<?php
session_start();

require '../libs/model.php';
$db = new Model();
$conn = $db->connection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['user_login'])) {
        $username = filter_var(trim($_POST['id_num']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_idno = :patient_idno OR username = :username");
        $stmt->execute(['patient_idno' => $username, 'username' => $username]);

        if ($stmt->rowCount() > 0) {
            $result = $stmt->fetch();

            $id = $result->patient_id;
            $idno = $result->patient_idno;
            $fname = $result->patient_fname;
            $lname = $result->patient_lname;
            $fetch_username = $result->username;
            $hash = $result->password;

            if (password_verify($password, $hash)) {
                $stmt = $conn->prepare("SELECT * FROM personnel WHERE patient_id = :patient_id");
                $stmt->execute(['patient_id' => $id]);
                $results = $stmt->fetch();


                if ($result->patient_type === 'admin' || $result->patient_type === 'staff') {
                    if (isset($results->activation)) {

                        $_SESSION['cis-admin-permission'] = json_encode($results);
                        $_SESSION['cis-admin-islogin'] = true;
                        $_SESSION['cis-admin-id'] = $id;

                        $_SESSION['cis-admin-username'] = $fetch_username;
                    } else {
                        echo 'no';
                    }
                } else {
                    $_SESSION['cis-patient-islogin'] = true;
                    $_SESSION['cis-patient-id'] = $id;
                    $_SESSION['cis-patient-name'] = $fname . ' ' . $lname;
                    $_SESSION['cis-patient-no'] = $idno;
                }
                echo 'ok';
            } else {
                echo "incorrect";
            }
        } else {
            echo "not";
        }
    }
}
