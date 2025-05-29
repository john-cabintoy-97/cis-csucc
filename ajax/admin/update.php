<?php

session_start();
require '../../libs/model.php';
$db = new Model();
$conn = $db->connection();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['update_registration'])) {

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
        $student_id = filter_var(trim($_POST['student_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        $course = explode('/', $course);

        if ($password === "abcde12345") {
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
                'patient_id' => $student_id
            ];
            $result = $db->query(
                "UPDATE patient SET
                patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname =  :patient_mname, patient_age = :patient_age, patient_gender = :patient_gender, patient_idno = :patient_idno, patient_college_id = :patient_college_id, patient_course_id = :patient_course_id, patient_type = :patient_type,email = :email WHERE patient_id = :patient_id
                ",
                $param
            );
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
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
                'patient_id' => $student_id
            ];

            $result = $db->query(
                "UPDATE patient SET
                patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname =  :patient_mname, patient_age = :patient_age, patient_gender = :patient_gender, patient_idno = :patient_idno, patient_college_id = :patient_college_id, patient_course_id = :patient_course_id, patient_type = :patient_type,email = :email, password = :password WHERE patient_id = :patient_id
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

    if (isset($_POST['faculty_update_registration'])) {

        $idnum = filter_var(trim($_POST['idnum']), FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $sex = filter_var(trim($_POST['sex']), FILTER_SANITIZE_SPECIAL_CHARS);
        $age = filter_var(trim($_POST['age']), FILTER_SANITIZE_SPECIAL_CHARS);
        $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
        $student_id = filter_var(trim($_POST['student_id']), FILTER_SANITIZE_SPECIAL_CHARS);

      
        if ($password === "abcde12345") {
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
                'patient_id' => $student_id
            ];
            $result = $db->query(
                "UPDATE patient SET
                patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname =  :patient_mname, patient_age = :patient_age, patient_gender = :patient_gender, patient_idno = :patient_idno, patient_college_id = :patient_college_id, patient_type = :patient_type,email = :email WHERE patient_id = :patient_id
                ",
                $param
            );
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
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
                'patient_id' => $student_id
            ];

            $result = $db->query(
                "UPDATE patient SET
                patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname =  :patient_mname, patient_age = :patient_age, patient_gender = :patient_gender, patient_idno = :patient_idno, patient_college_id = :patient_college_id,patient_type = :patient_type,email = :email, password = :password WHERE patient_id = :patient_id
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


    if (isset($_POST['employee_update_registration'])) {

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
        $student_id = filter_var(trim($_POST['student_id']), FILTER_SANITIZE_SPECIAL_CHARS);

      
        if ($password === "abcde12345") {
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
                'patient_id' => $student_id
            ];
            $result = $db->query(
                "UPDATE patient SET
                patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname =  :patient_mname, patient_age = :patient_age, patient_gender = :patient_gender, patient_idno = :patient_idno, patient_office_id = :patient_office_id,patient_position = :patient_position, patient_type = :patient_type,email = :email WHERE patient_id = :patient_id
                ",
                $param
            );
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
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
                'patient_id' => $student_id
            ];
            $result = $db->query(
                "UPDATE patient SET
                patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname =  :patient_mname, patient_age = :patient_age, patient_gender = :patient_gender, patient_idno = :patient_idno, patient_office_id = :patient_office_id,patient_position = :patient_position, patient_type = :patient_type,email = :email WHERE patient_id = :patient_id
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
    if (isset($_POST['updateCollegeSubmit'])) {
        $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);
        $college_id = filter_var(trim($_POST['college_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $param = [
            'college_name' => trim($college),
            'college_id' => trim($college_id)
        ];

        $result = $db->query("UPDATE college SET college_name = :college_name WHERE college_id = :college_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    if (isset($_POST['updateCourseSubmit'])) {
        $course = filter_var(trim($_POST['course']), FILTER_SANITIZE_SPECIAL_CHARS);
        $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);
        $course_id = filter_var(trim($_POST['course_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'course_name' => trim($course),
            'college_id' => trim($college),
            'course_id' => trim($course_id)
        ];

        $result = $db->query("UPDATE course SET course_name = :course_name,college_id = :college_id WHERE course_id = :course_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    if (isset($_POST['updateOfficeSubmit'])) {
        $office = filter_var(trim($_POST['office']), FILTER_SANITIZE_SPECIAL_CHARS);
        $office_id = filter_var(trim($_POST['office_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'office_name' => trim($office),
            'office_id' => trim($office_id),
        ];

        $result = $db->query("UPDATE office SET office_name = :office_name WHERE office_id = :office_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    if (isset($_POST['updateIllnessSubmit'])) {
        $illness = filter_var(trim($_POST['illness']), FILTER_SANITIZE_SPECIAL_CHARS);
        $illness_id = filter_var(trim($_POST['illness_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'illness_name' => trim($illness),
            'illness_id' => trim($illness_id),
        ];

        $result = $db->query("UPDATE illness SET illness_name = :illness_name WHERE illness_id = :illness_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    if (isset($_POST['updateMedicineSubmit'])) {
        $gname = filter_var(trim($_POST['gname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $bname = filter_var(trim($_POST['bname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_SPECIAL_CHARS);
        $dosage = filter_var(trim($_POST['dosage']), FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_var(trim($_POST['type']), FILTER_SANITIZE_SPECIAL_CHARS);
        $md_id = filter_var(trim($_POST['md_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'med_generic' => trim($gname),
            'med_brand' => trim($bname),
            'med_desc' => trim($description),
            'med_dose' => trim($dosage),
            'med_type' => trim($type),
            'md_id' => trim($md_id),
        ];

        $result = $db->query("UPDATE medicine SET med_generic = :med_generic,med_brand = :med_brand,med_desc = :med_desc,med_dose = :med_dose,med_type = :med_type WHERE md_id = :md_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }


    if (isset($_POST['updateEquipementSubmit'])) {
        $article = filter_var(trim($_POST['article']), FILTER_SANITIZE_SPECIAL_CHARS);
        $desc = filter_var(trim($_POST['desc']), FILTER_SANITIZE_SPECIAL_CHARS);
        $pro_num = filter_var(trim($_POST['pro_num']), FILTER_SANITIZE_SPECIAL_CHARS);
        $unit_measure = filter_var(trim($_POST['unit_measure']), FILTER_SANITIZE_SPECIAL_CHARS);
        $unit_val = filter_var(trim($_POST['unit_val']), FILTER_SANITIZE_SPECIAL_CHARS);
        $qty_pro = filter_var(trim($_POST['qty_pro']), FILTER_SANITIZE_SPECIAL_CHARS);
        $equipment_id = filter_var(trim($_POST['equipment_id']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'article' => trim($article),
            'description' => trim($desc),
            'property_num' => trim($pro_num),
            'unit_value' => trim($unit_val),
            'quantity_property' => trim($qty_pro),
            'um_id' => trim($unit_measure),
            'equipment_id' => trim($equipment_id),
        ];


        $result = $db->query("UPDATE equipment SET article = :article,description = :description,property_num = :property_num,unit_value = :unit_value,quantity_property = :quantity_property,um_id = :um_id WHERE equipment_id = :equipment_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }
}
