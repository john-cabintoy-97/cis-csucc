<?php

session_start();
require '../../libs/model.php';
$db = new Model();
$conn = $db->connection();

if (isset($_POST['check_pass'])) {
    $id_pass = filter_var(trim($_POST['id_pass']), FILTER_SANITIZE_SPECIAL_CHARS);
    $cpass = filter_var(trim($_POST['cpass']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_id = :patient_id");
    $stmt->execute(['patient_id' => $id_pass]);
    $result = $stmt->fetch();
    if ($result) {
        $pass = $result->password;
        if (password_verify($cpass, $pass)) {
            echo "ok";
        } else {
            echo "no";
        }
    }
 
}

if (isset($_POST['get_medicine'])) {
    $medicine_id = filter_var(trim($_POST['medicine_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $stmt = $conn->prepare("SELECT * FROM medicine WHERE md_id = :md_id");
    $stmt->execute(['md_id' => $medicine_id]);
    $data = json_encode($stmt->fetch());
    echo $data;
}
if (isset($_POST['get_personnel'])) {
    $patient_id = filter_var(trim($_POST['patient_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $stmt = $conn->prepare("SELECT * FROM patient AS pt INNER JOIN personnel AS pl ON pl.patient_id = pt.patient_id WHERE pt.patient_id = :patient_id");
    $stmt->execute(['patient_id' => $patient_id]);
    $data = json_encode($stmt->fetch());
    echo $data;
}

if (isset($_POST['get_inv_medicine'])) {
    $inv_id = filter_var(trim($_POST['inv_id']), FILTER_SANITIZE_SPECIAL_CHARS);
    $stmt = $conn->prepare("SELECT md.med_generic, md.med_brand, md.med_desc, md.med_dose, md.med_type, inv.inv_totalcount, inv.inv_orderlevel, inv.inv_expiration, inv.inv_remaining, inv.inv_issued, inv.inv_batchdate, inv.inv_id, inv.inv_med_id
    FROM medicine AS md
    INNER JOIN m_inventory AS inv ON md.md_id = inv.inv_med_id WHERE inv.inv_id = :inv_id");
    $stmt->execute(['inv_id' => $inv_id]);
    $data = json_encode($stmt->fetch());
    echo $data;
}

if (isset($_POST['get_idnum'])) {
    $idnum = filter_var(trim($_POST['idnum']), FILTER_SANITIZE_SPECIAL_CHARS);
    $idnum = '%' . $idnum;
    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_idno LIKE :patient_idno LIMIT 1");
    $stmt->execute(['patient_idno' => $idnum]);
    $data = json_encode($stmt->fetch());
    echo $data;
}


if (isset($_POST['get_lastname'])) {
    $lastname = filter_var(trim($_POST['lastname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = '%' . $lastname;
    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_lname LIKE :patient_lname LIMIT 1");
    $stmt->execute(['patient_lname' => $lastname]);
    $data = json_encode($stmt->fetch());
    echo $data;
}


if (isset($_POST['totalStudentReport'])) {
    $sql = "SELECT MONTHNAME(timestamp) as month, COUNT(*) as count FROM patient WHERE patient_type = 'student' GROUP BY MONTH(timestamp) ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    echo json_encode($data);
}

if (isset($_POST['totalFacultyReport'])) {
    $sql = "SELECT MONTHNAME(timestamp) as month, COUNT(*) as count FROM patient WHERE patient_type = 'faculty' GROUP BY MONTH(timestamp) ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    echo json_encode($data);
}

if (isset($_POST['totalEmployeeReport'])) {
    $sql = "SELECT MONTHNAME(timestamp) as month, COUNT(*) as count FROM patient WHERE patient_type = 'employee' GROUP BY MONTH(timestamp) ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    echo json_encode($data);
}

if (isset($_POST['dashboardReport'])) {
    $sql = "SELECT MONTHNAME(treat_date) as month, COUNT(*) as count FROM treatment GROUP BY MONTH(treat_date) ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    $data = array();
    foreach ($result as $row) {
        $data[] = $row;
    }
    echo json_encode($data);
}
