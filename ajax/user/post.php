<?php

session_start();
require '../../libs/model.php';
require '../../libs/mailer.php';
$db = new Model();
$mailer = new Mailer();
$conn = $db->connection();

if (isset($_POST['feedback'])) {
    $comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_SPECIAL_CHARS);
    $user_id = $_SESSION['cis-patient-id'];

    $stmt = $conn->prepare("SELECT * FROM feedback WHERE patient_id = :patient_id");
    $stmt->execute(['patient_id' => $user_id]);
    $result = $stmt->fetch();
    if (isset($result->timestamp)) {
        $date = Date('mdy', strtotime($result->timestamp));
        $date_now = Date('mdy');
        if ($date_now === $date) {
            echo "already";
        } else {
            $param = [
                'comment' => strtolower(trim($comment)),
                'patient_id' => $user_id,
            ];

            $result = $db->query(
                "INSERT INTO feedback 
                (comment,patient_id) 
                VALUES 
                (:comment,:patient_id) 
                ",
                $param
            );
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        }
    } else {
        $param = [
            'comment' => strtolower(trim($comment)),
            'patient_id' => $user_id,
        ];

        $result = $db->query(
            "INSERT INTO feedback 
            (comment,patient_id) 
            VALUES 
            (:comment,:patient_id) 
            ",
            $param
        );
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }
}

if (isset($_POST['user_login'])) {
    $id_num = filter_var(trim($_POST['id_num']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_idno = :patient_idno");
    $stmt->bindParam(':patient_idno', $id_num, PDO::PARAM_STR);
    $stmt->execute(['patient_idno' => $id_num]);
    if ($stmt->rowCount() > 0) {
        $result = $stmt->fetch();
        $id = $result->patient_id;
        $idno = $result->patient_idno;
        $fname = $result->patient_fname;
        $lname = $result->patient_lname;
        $hash = $result->password;
        if (password_verify($password, $hash)) {
            $_SESSION['cis-patient-islogin'] = true;
            $_SESSION['cis-patient-id'] = $id;
            $_SESSION['cis-patient-name'] = $fname . ' ' . $lname;
            $_SESSION['cis-patient-no'] = $idno;
            echo 'ok';
        } else {
            echo "incorrect";
        }
    } else {
        echo "not";
    }
}


if (isset($_POST['send_sotp'])) {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
    $code = filter_var(trim($_POST['code']), FILTER_SANITIZE_SPECIAL_CHARS);

    $recipient = $email;
    $subject = "CIS-CSUCC | OTP Code";
    $html = $mailer->emailResetTemplate($code);

    $msgWithNoHtml = '';

    $mailer->sendEmail(
        $recipient,
        $subject,
        $html,
        $msgWithNoHtml
    );
}

// 
if (isset($_POST['student_registration'])) {

    $idnum = filter_var(trim($_POST['idnum']), FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $sex = filter_var(trim($_POST['sex']), FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_var(trim($_POST['age']), FILTER_SANITIZE_SPECIAL_CHARS);
    $course = filter_var(trim($_POST['course']), FILTER_SANITIZE_SPECIAL_CHARS);
    $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_idno = :patient_idno AND  patient_fname = :patient_fname AND patient_lname = :patient_lname AND email = :email");
    $stmt->execute(['patient_idno' => $idnum, 'patient_fname' => $fname, 'patient_lname' => $lname, 'email' => $email]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $course = explode('/', $course);

    if (count($result) <= 0) {
        $param = [
            'patient_fname' => strtolower(trim($fname)),
            'patient_lname' => strtolower(trim($lname)),
            'patient_mname' => strtolower(trim($mname)),
            'patient_age' => strtolower(trim($age)),
            'patient_gender' => strtolower(trim($sex)),
            'patient_idno' => strtolower(trim($idnum)),
            'patient_college_id' => $college,
            'patient_course_id' =>  $course[0],
            'patient_type' => 'student',
            'email' => strtolower(trim($email)),
            'password' => password_hash($password, PASSWORD_BCRYPT),

        ];

        $result = $db->query(
            "INSERT INTO patient 
            (patient_fname,patient_lname,patient_mname,patient_age,patient_gender,patient_idno,patient_college_id,patient_course_id,patient_type,email,password) 
            VALUES 
            (:patient_fname,:patient_lname,:patient_mname,:patient_age,:patient_gender,:patient_idno,:patient_college_id,:patient_course_id,:patient_type,:email,:password)
            ",
            $param
        );
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    } else {
        echo "exist";
    }
}

if (isset($_POST['faculty_registration'])) {
    $idnum = filter_var(trim($_POST['idnum']), FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $sex = filter_var(trim($_POST['sex']), FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_var(trim($_POST['age']), FILTER_SANITIZE_SPECIAL_CHARS);
    $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_idno = :patient_idno AND  patient_fname = :patient_fname AND patient_lname = :patient_lname AND email = :email");
    $stmt->execute(['patient_idno' => $idnum, 'patient_fname' => $fname, 'patient_lname' => $lname, 'email' => $email]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) <= 0) {
        $param = [
            'patient_fname' => strtolower(trim($fname)),
            'patient_lname' => strtolower(trim($lname)),
            'patient_mname' => strtolower(trim($mname)),
            'patient_age' => strtolower(trim($age)),
            'patient_gender' => strtolower(trim($sex)),
            'patient_idno' => strtolower(trim($idnum)),
            'patient_college_id' => $college,
            'patient_type' => 'faculty',
            'email' => strtolower(trim($email)),
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];

        $result = $db->query(
            "INSERT INTO patient 
            (patient_fname,patient_lname,patient_mname,patient_age,patient_gender,patient_idno,patient_college_id,patient_type,email,password) 
            VALUES 
            (:patient_fname,:patient_lname,:patient_mname,:patient_age,:patient_gender,:patient_idno,:patient_college_id,:patient_type,:email,:password)
            ",
            $param
        );
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    } else {
        echo "exist";
    }
}

if (isset($_POST['employee_registration'])) {
    $idnum = filter_var(trim($_POST['idnum']), FILTER_SANITIZE_SPECIAL_CHARS);
    $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
    $sex = filter_var(trim($_POST['sex']), FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_var(trim($_POST['age']), FILTER_SANITIZE_SPECIAL_CHARS);
    $office = filter_var(trim($_POST['office']), FILTER_SANITIZE_SPECIAL_CHARS);
    $position = filter_var(trim($_POST['position']), FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
    $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);

    $stmt = $conn->prepare("SELECT * FROM patient WHERE patient_idno = :patient_idno OR  patient_fname = :patient_fname AND patient_lname = :patient_lname AND email = :email");
    $stmt->execute(['patient_idno' => $idnum, 'patient_fname' => $fname, 'patient_lname' => $lname, 'email' => $email]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) <= 0) {
        $param = [
            'patient_fname' => strtolower(trim($fname)),
            'patient_lname' => strtolower(trim($lname)),
            'patient_mname' => strtolower(trim($mname)),
            'patient_age' => strtolower(trim($age)),
            'patient_gender' => strtolower(trim($sex)),
            'patient_idno' => strtolower(trim($idnum)),
            'patient_office_id' => $office,
            'patient_position' => $position,
            'patient_type' => 'employee',
            'email' => strtolower(trim($email)),
            'password' => password_hash($password, PASSWORD_BCRYPT),
        ];

        $result = $db->query(
            "INSERT INTO patient 
            (patient_fname,patient_lname,patient_mname,patient_age,patient_gender,patient_idno,patient_office_id,patient_position,patient_type,email,password) 
            VALUES 
            (:patient_fname,:patient_lname,:patient_mname,:patient_age,:patient_gender,:patient_idno,:patient_office_id,:patient_position,:patient_type,:email,:password)
            ",
            $param
        );
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    } else {
        echo "exist";
    }
}
