<?php

session_start();
require '../../libs/model.php';
$db = new Model();
$conn = $db->connection();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(isset($_POST['delete_patient'])){
        $patient_id = filter_var(trim($_POST['patient_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($patient_id)) {
            $param = [
                'patient_id' => $patient_id
            ];
            $result = $db->query("DELETE FROM patient WHERE patient_id = :patient_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
        
    }

    if (isset($_POST['delete_college'])) {
        $college = filter_var(trim($_POST['college_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($college)) {
            $param = [
                'college_id' => $college
            ];
            $result = $db->query("DELETE FROM college WHERE college_id = :college_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_course'])) {
        $course = filter_var(trim($_POST['course_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($course)) {
            $param = [
                'course_id' => $course
            ];
            $result = $db->query("DELETE FROM course WHERE course_id = :course_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_office'])) {
        $office = filter_var(trim($_POST['office_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($office)) {
            $param = [
                'office_id' => $office
            ];
            $result = $db->query("DELETE FROM office WHERE office_id = :office_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_illness'])) {
        $illness = filter_var(trim($_POST['illness_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($illness)) {
            $param = [
                'illness_id' => $illness
            ];
            $result = $db->query("DELETE FROM illness WHERE illness_id = :illness_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }


    if (isset($_POST['delete_medicine'])) {
        $medicine_id = filter_var(trim($_POST['medicine_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($medicine_id)) {
            $param = [
                'md_id' => $medicine_id
            ];
            $result = $db->query("DELETE FROM medicine WHERE md_id = :md_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_student'])) {
        $student_id = filter_var(trim($_POST['student_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($student_id)) {
            $param = [
                'patient_id' => $student_id
            ];
            $result = $db->query("DELETE FROM patient WHERE patient_id = :patient_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_faculty'])) {
        $faculty_id = filter_var(trim($_POST['faculty_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($faculty_id)) {
            $param = [
                'patient_id' => $faculty_id
            ];
            $result = $db->query("DELETE FROM patient WHERE patient_id = :patient_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_employee'])) {
        $employee_id = filter_var(trim($_POST['employee_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($employee_id)) {
            $param = [
                'patient_id' => $employee_id
            ];
            $result = $db->query("DELETE FROM patient WHERE patient_id = :patient_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }


    if (isset($_POST['delete_equipment'])) {
        $equipment_id = filter_var(trim($_POST['equipment_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($equipment_id)) {
            $param = [
                'equipment_id' => $equipment_id
            ];
            $result = $db->query("DELETE FROM equipment WHERE equipment_id = :equipment_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }

    if (isset($_POST['delete_inv_medicine'])) {
       
        $medicine_id = filter_var(trim($_POST['medicine_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        if (!empty($medicine_id)) {
            $param = [
                'inv_id' => $medicine_id
            ];
            $result = $db->query("DELETE FROM m_inventory WHERE inv_id = :inv_id", $param);
            if ($result) {
                echo "delete";
            }
        } else {
            echo "err";
        }
    }
}
