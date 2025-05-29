<?php

session_start();
require '../../libs/model.php';
$db = new Model();
$conn = $db->connection();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


   
    if (isset($_POST['personnel_update'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
        $repassword = filter_var(trim($_POST['repassword']), FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_SPECIAL_CHARS);
        $id_pass = filter_var(trim($_POST['id_pass']), FILTER_SANITIZE_SPECIAL_CHARS);

        if ($password !== "") {
            if ($password == $repassword) {
                $param = [
                    'username' => strtolower(trim($username)),
                    'patient_fname' => strtolower(trim($fname)),
                    'patient_lname' => strtolower(trim($lname)),
                    'patient_mname' => strtolower(trim($mname)),
                    'patient_gender' => strtolower(trim($gender)),
                    'password' => password_hash($password, PASSWORD_BCRYPT),
                    'patient_id' => strtolower(trim($id_pass)),
                ];

                $result = $db->query(
                    "UPDATE patient SET username = :username, patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname = :patient_mname,patient_gender = :patient_gender,password = :password WHERE patient_id = :patient_id ",
                    $param
                );
                echo "ok";
            } else {
                echo "not_match";
            }
        } else {
            $param = [
                'username' => strtolower(trim($username)),
                'patient_fname' => strtolower(trim($fname)),
                'patient_lname' => strtolower(trim($lname)),
                'patient_mname' => strtolower(trim($mname)),
                'patient_gender' => strtolower(trim($gender)),
                'patient_id' => strtolower(trim($id_pass)),
            ];

            $result = $db->query(
                "UPDATE patient SET username = :username, patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname = :patient_mname,patient_gender = :patient_gender WHERE patient_id = :patient_id ",
                $param
            );

            echo "ok";
        }
    }


    if (isset($_POST['update_personnel_action'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_SPECIAL_CHARS);
        $usertype = filter_var(trim($_POST['usertype']), FILTER_SANITIZE_SPECIAL_CHARS);

        $activate = isset($_POST['activate']) ?  true : false;
        $consultation = isset($_POST['consultation']) ? true : false;
        $reports = isset($_POST['reports']) ? true : false;
        $rp_consultation = isset($_POST['rp_consultation']) ? true : false;
        $rp_individual = isset($_POST['rp_individual']) ?  true : false;
        $rp_medicine = isset($_POST['rp_medicine']) ? true : false;
        $rp_registered = isset($_POST['rp_registered']) ? true : false;
        $rp_health =  isset($_POST['rp_health'])  ? true : false;
        $inventory =  isset($_POST['inventory'])  ? true : false;
        $inv_medicine =  isset($_POST['inv_medicine'])  ? true : false;
        $inv_equipment =  isset($_POST['inv_equipment'])  ? true : false;
        $inv_stocks =  isset($_POST['inv_stocks'])  ? true : false;
        $management =  isset($_POST['management'])  ? true : false;
        $mn_students =  isset($_POST['mn_students'])  ? true : false;
        $mn_faculty = isset($_POST['mn_faculty'])  ? true : false;
        $mn_employee = isset($_POST['mn_employee'])  ? true : false;
        $mn_personnel = isset($_POST['mn_personnel'])  ? true : false;
        $setup = isset($_POST['setup'])  ? true : false;
        $st_college = isset($_POST['st_college'])  ?  true : false;
        $st_course = isset($_POST['st_course'])  ? true : false;
        $st_office = isset($_POST['st_office'])  ? true : false;
        $st_illness = isset($_POST['st_illness'])  ?  true : false;
        $st_nurse = isset($_POST['st_nurse'])  ? true : false;

        $param = [
            'patient_fname' => strtolower(trim($fname)),
            'patient_lname' => strtolower(trim($lname)),
            'patient_mname' => strtolower(trim($mname)),
            'patient_gender' => strtolower(trim($gender)),
            'patient_type' => $usertype,
            'username' => strtolower(trim($username)),

        ];

        $result = $db->query(
            "UPDATE patient SET patient_fname = :patient_fname,patient_lname = :patient_lname,patient_mname = :patient_mname,patient_gender = :patient_gender,patient_type = :patient_type WHERE username = :username ",
            $param
        );

        $stmt = $conn->prepare("SELECT * FROM patient WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        $param = [
            'per_admin' => true,
            'per_consultation' => $consultation,
            'per_reports' => $reports,
            'rep_consultation' => $rp_consultation,
            'rep_individual' => $rp_individual,
            'rep_medicine' => $rp_medicine,
            'rep_registered' => $rp_registered,
            'rep_health' => $rp_health,
            'per_inventory' => $inventory,
            'inv_medicine' => $inv_medicine,
            'inv_equipment' => $inv_equipment,
            'inv_stocks' =>  $inv_stocks,
            'per_management' => $management,
            'mn_students' => $mn_students,
            'mn_faculty' =>  $mn_faculty,
            'mn_employee' => $mn_employee,
            'activation' => $activate,
            'mn_personnel' =>  $mn_personnel,
            'per_setup' =>  $setup,
            'st_college' => $st_college,
            'st_course' =>  $st_course,
            'st_office' =>  $st_office,
            'st_illness' => $st_illness,
            'st_nurse' => $st_nurse,
            'patient_id' => $results['patient_id'],
        ];
        $result = $db->query(
            "UPDATE `personnel` SET
            per_admin = :per_admin, per_consultation = :per_consultation, per_reports = :per_reports, rep_consultation = :rep_consultation,
            rep_individual = :rep_individual,rep_medicine = :rep_medicine,rep_registered = :rep_registered,rep_health = :rep_health,
            per_inventory = :per_inventory, inv_medicine = :inv_medicine, inv_equipment = :inv_equipment, inv_stocks = :inv_stocks,
            per_management = :per_management,mn_students = :mn_students, mn_faculty = :mn_faculty,mn_employee = :mn_employee,activation = :activation,
            mn_personnel = :mn_personnel,per_setup = :per_setup,st_college = :st_college,st_course = :st_course,st_office = :st_office,st_illness = :st_illness,
            st_nurse = :st_nurse WHERE  patient_id = :patient_id",
            $param
        );

        echo "update";
    }

    if (isset($_POST['save_personnel_action'])) {
        $username = filter_var(trim($_POST['username']), FILTER_SANITIZE_SPECIAL_CHARS);
        $password = filter_var(trim($_POST['password']), FILTER_SANITIZE_SPECIAL_CHARS);
        $lname = filter_var(trim($_POST['lname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $fname = filter_var(trim($_POST['fname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $mname = filter_var(trim($_POST['mname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $gender = filter_var(trim($_POST['gender']), FILTER_SANITIZE_SPECIAL_CHARS);
        $usertype = filter_var(trim($_POST['usertype']), FILTER_SANITIZE_SPECIAL_CHARS);

        $activate = isset($_POST['activate']) ?  true : false;
        $consultation = isset($_POST['consultation']) ? true : false;
        $reports = isset($_POST['reports']) ? true : false;
        $rp_consultation = isset($_POST['rp_consultation']) ? true : false;
        $rp_individual = isset($_POST['rp_individual']) ?  true : false;
        $rp_medicine = isset($_POST['rp_medicine']) ? true : false;
        $rp_registered = isset($_POST['rp_registered']) ? true : false;
        $rp_health =  isset($_POST['rp_health'])  ? true : false;
        $inventory =  isset($_POST['inventory'])  ? true : false;
        $inv_medicine =  isset($_POST['inv_medicine'])  ? true : false;
        $inv_equipment =  isset($_POST['inv_equipment'])  ? true : false;
        $inv_stocks =  isset($_POST['inv_stocks'])  ? true : false;
        $management =  isset($_POST['management'])  ? true : false;
        $mn_students =  isset($_POST['mn_students'])  ? true : false;
        $mn_faculty = isset($_POST['mn_faculty'])  ? true : false;
        $mn_employee = isset($_POST['mn_employee'])  ? true : false;
        $mn_personnel = isset($_POST['mn_personnel'])  ? true : false;
        $setup = isset($_POST['setup'])  ? true : false;
        $st_college = isset($_POST['st_college'])  ?  true : false;
        $st_course = isset($_POST['st_course'])  ? true : false;
        $st_office = isset($_POST['st_office'])  ? true : false;
        $st_illness = isset($_POST['st_illness'])  ?  true : false;
        $st_nurse = isset($_POST['st_nurse'])  ? true : false;

        $stmt = $conn->prepare("SELECT * FROM patient WHERE username = :username AND  patient_fname = :patient_fname AND patient_lname = :patient_lname ");
        $stmt->execute(['username' => $username, 'patient_fname' => $fname, 'patient_lname' => $lname]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'patient_fname' => strtolower(trim($fname)),
                'patient_lname' => strtolower(trim($lname)),
                'patient_mname' => strtolower(trim($mname)),
                'patient_gender' => strtolower(trim($gender)),
                'username' => strtolower(trim($username)),
                'patient_type' => $usertype,
                'password' => password_hash($password, PASSWORD_BCRYPT),

            ];

            $result = $db->query(
                "INSERT INTO patient 
            (patient_fname,patient_lname,patient_mname,patient_gender,username,patient_type,password) 
            VALUES 
            (:patient_fname,:patient_lname,:patient_mname,:patient_gender,:username,:patient_type,:password)
            ",
                $param
            );


            if ($result) {
                $stmt = $conn->prepare("SELECT * FROM patient WHERE username = :username");
                $stmt->execute(['username' => $username]);
                $results = $stmt->fetch(PDO::FETCH_ASSOC);

                $param = [
                    'patient_id' => $results['patient_id'],
                    'per_admin' => true,
                    'per_consultation' => $consultation,
                    'per_reports' => $reports,
                    'rep_consultation' => $rp_consultation,
                    'rep_individual' => $rp_individual,
                    'rep_medicine' => $rp_medicine,
                    'rep_registered' => $rp_registered,
                    'rep_health' => $rp_health,
                    'per_inventory' => $inventory,
                    'inv_medicine' => $inv_medicine,
                    'inv_equipment' => $inv_equipment,
                    'inv_stocks' =>  $inv_stocks,
                    'per_management' => $management,
                    'mn_students' => $mn_students,
                    'mn_faculty' =>  $mn_faculty,
                    'mn_employee' => $mn_employee,
                    'activation' => $activate,
                    'mn_personnel' =>  $mn_personnel,
                    'per_setup' =>  $setup,
                    'st_college' => $st_college,
                    'st_course' =>  $st_course,
                    'st_office' =>  $st_office,
                    'st_illness' => $st_illness,
                    'st_nurse' => $st_nurse
                ];
                $result = $db->query(
                    "INSERT INTO `personnel`
                    (patient_id, per_admin,per_consultation,per_reports,rep_consultation,rep_individual,rep_medicine,rep_registered,rep_health,per_inventory,inv_medicine,inv_equipment,inv_stocks,per_management,mn_students,mn_faculty,mn_employee,activation,mn_personnel,per_setup,st_college,st_course,st_office,st_illness,st_nurse) 
                    VALUES 
                    (:patient_id, :per_admin,:per_consultation,:per_reports,:rep_consultation,:rep_individual,:rep_medicine,:rep_registered,:rep_health,:per_inventory,:inv_medicine,:inv_equipment,:inv_stocks,:per_management,:mn_students,:mn_faculty,:mn_employee,:activation,:mn_personnel,:per_setup,:st_college,:st_course,:st_office,:st_illness,:st_nurse)",
                    $param
                );

                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['createCollegeSubmit'])) {
        $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM college WHERE college_name = :college_name");
        $stmt->execute(['college_name' => $college]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'college_name' => trim($college),
            ];

            $result = $db->query("INSERT INTO college (college_name) VALUES (:college_name)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['createCourseSubmit'])) {
        $course = filter_var(trim($_POST['course']), FILTER_SANITIZE_SPECIAL_CHARS);
        $college = filter_var(trim($_POST['college']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM course WHERE course_name = :course_name");
        $stmt->execute(['course_name' => $course]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'course_name' => trim($course),
                'college_id' => trim($college)
            ];

            $result = $db->query("INSERT INTO course (course_name,college_id) VALUES (:course_name,:college_id)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['createOfficeSubmit'])) {
        $office = filter_var(trim($_POST['office']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM office WHERE office_name = :office_name");
        $stmt->execute(['office_name' => $office]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'office_name' => trim($office),
            ];

            $result = $db->query("INSERT INTO office (office_name) VALUES (:office_name)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['createIllnessSubmit'])) {
        $illness = filter_var(trim($_POST['illness']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM illness WHERE illness_name = :illness_name");
        $stmt->execute(['illness_name' => $illness]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'illness_name' => trim($illness),
            ];

            $result = $db->query("INSERT INTO illness (illness_name) VALUES (:illness_name)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['createMedicineSubmit'])) {
        $gname = filter_var(trim($_POST['gname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $bname = filter_var(trim($_POST['bname']), FILTER_SANITIZE_SPECIAL_CHARS);
        $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_SPECIAL_CHARS);
        $dosage = filter_var(trim($_POST['dosage']), FILTER_SANITIZE_SPECIAL_CHARS);
        $type = filter_var(trim($_POST['type']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM medicine WHERE med_generic = :med_generic &&  med_brand = :med_brand");
        $stmt->execute(['med_generic' => $gname, 'med_brand' => $bname]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {
            $param = [
                'med_generic' => trim($gname),
                'med_brand' => trim($bname),
                'med_desc' => trim($description),
                'med_dose' => trim($dosage),
                'med_type' => trim($type)

            ];

            $result = $db->query("INSERT INTO medicine (med_generic,med_brand,med_desc,med_dose,med_type) VALUES (:med_generic,:med_brand,:med_desc,:med_dose,:med_type)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['saveStocksSubmit'])) {
        $med_id = filter_var(trim($_POST['search_medicine']), FILTER_SANITIZE_SPECIAL_CHARS);
        $bdate = filter_var(trim($_POST['bdate']), FILTER_SANITIZE_SPECIAL_CHARS);
        $edate = filter_var(trim($_POST['edate']), FILTER_SANITIZE_SPECIAL_CHARS);
        $tcount = filter_var(trim($_POST['tcount']), FILTER_SANITIZE_SPECIAL_CHARS);
        $tissued = filter_var(trim($_POST['tissued']), FILTER_SANITIZE_SPECIAL_CHARS);
        $tavailable = filter_var(trim($_POST['tavailable']), FILTER_SANITIZE_SPECIAL_CHARS);
        $olevel = filter_var(trim($_POST['olevel']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'inv_med_id' => trim($med_id),
            'inv_totalcount' => trim($tcount),
            'inv_orderlevel' => trim($olevel),
            'inv_expiration' => trim($edate),
            'inv_remaining' => trim($tavailable),
            'inv_issued' => trim($tissued),
            'inv_batchdate' => trim($bdate)
        ];

        $stmt = $conn->prepare("SELECT * FROM m_inventory WHERE inv_med_id = :inv_med_id");
        $stmt->execute(['inv_med_id' => $med_id]);


        if ($stmt->rowCount() >= 0) {
            $result = $db->query("UPDATE m_inventory SET inv_totalcount = :inv_totalcount, inv_orderlevel = :inv_orderlevel, inv_expiration = :inv_expiration, inv_remaining = :inv_remaining, inv_issued = :inv_issued, inv_batchdate = :inv_batchdate WHERE inv_med_id = :inv_med_id", $param);
        } else {
            $result = $db->query("INSERT INTO m_inventory (inv_med_id,inv_totalcount,inv_orderlevel,inv_expiration,inv_remaining,inv_issued,inv_batchdate) VALUES (:inv_med_id,:inv_totalcount,:inv_orderlevel,:inv_expiration,:inv_remaining,:inv_issued,:inv_batchdate)", $param);
        }

        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }


    if (isset($_POST['updateStocksSubmit'])) {

        $inv_id = filter_var(trim($_POST['inv_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $med_id = filter_var(trim($_POST['med_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $bdate = filter_var(trim($_POST['bdate']), FILTER_SANITIZE_SPECIAL_CHARS);
        $edate = filter_var(trim($_POST['edate']), FILTER_SANITIZE_SPECIAL_CHARS);
        $tcount = filter_var(trim($_POST['tcount']), FILTER_SANITIZE_SPECIAL_CHARS);
        $tissued = filter_var(trim($_POST['tissued']), FILTER_SANITIZE_SPECIAL_CHARS);
        $tavailable = filter_var(trim($_POST['tavailable']), FILTER_SANITIZE_SPECIAL_CHARS);
        $olevel = filter_var(trim($_POST['olevel']), FILTER_SANITIZE_SPECIAL_CHARS);

        $param = [
            'inv_med_id' => trim($med_id),
            'inv_totalcount' => trim($tcount),
            'inv_orderlevel' => trim($olevel),
            'inv_expiration' => trim($edate),
            'inv_remaining' => trim($tavailable),
            'inv_issued' => trim($tissued),
            'inv_batchdate' => trim($bdate),
            'inv_id' => trim($inv_id)
        ];


        $result = $db->query("UPDATE m_inventory SET inv_med_id = :inv_med_id,inv_totalcount = :inv_totalcount,inv_orderlevel = :inv_orderlevel,inv_expiration = :inv_expiration,inv_remaining = :inv_remaining,inv_issued = :inv_issued,inv_batchdate = :inv_batchdate WHERE inv_id = :inv_id", $param);
        if ($result) {
            echo "ok";
        } else {
            echo "error";
        }
    }

    if (isset($_POST['createEquipmentSubmit'])) {
        $article = filter_var(trim($_POST['article']), FILTER_SANITIZE_SPECIAL_CHARS);
        $desc = filter_var(trim($_POST['desc']), FILTER_SANITIZE_SPECIAL_CHARS);
        $pro_num = filter_var(trim($_POST['pro_num']), FILTER_SANITIZE_SPECIAL_CHARS);
        $unit_measure = filter_var(trim($_POST['unit_measure']), FILTER_SANITIZE_SPECIAL_CHARS);
        $unit_val = filter_var(trim($_POST['unit_val']), FILTER_SANITIZE_SPECIAL_CHARS);
        $qty_pro = filter_var(trim($_POST['qty_pro']), FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare("SELECT * FROM equipment WHERE article = :article && description = :description");
        $stmt->execute(['article' => $article, 'description' => $desc]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) <= 0) {

            $param = [
                'article' => trim($article),
                'description' => trim($desc),
                'property_num' => trim($pro_num),
                'unit_value' => trim($unit_val),
                'quantity_property' => trim($qty_pro),
                'um_id' => trim($unit_measure)
            ];

            //  print_r($param);
            $result = $db->query("INSERT INTO equipment (article,description,property_num,unit_value,quantity_property,um_id) VALUES (:article,:description,:property_num,:unit_value,:quantity_property,:um_id)", $param);
            if ($result) {
                echo "ok";
            } else {
                echo "error";
            }
        } else {
            echo "exist";
        }
    }

    if (isset($_POST['saveConsult'])) {

        $cdate = filter_var(trim($_POST['cdate']), FILTER_SANITIZE_SPECIAL_CHARS);
        $csemester = filter_var(trim($_POST['csemester']), FILTER_SANITIZE_SPECIAL_CHARS);
        $cschool_year = filter_var(trim($_POST['cschool_year']), FILTER_SANITIZE_SPECIAL_CHARS);
        $ctime = filter_var(trim($_POST['ctime']), FILTER_SANITIZE_SPECIAL_CHARS);
        $ctemp = filter_var(trim($_POST['ctemp']), FILTER_SANITIZE_SPECIAL_CHARS);
        $cpulse = filter_var(trim($_POST['cpulse']), FILTER_SANITIZE_SPECIAL_CHARS);
        $crr = filter_var(trim($_POST['crr']), FILTER_SANITIZE_SPECIAL_CHARS);
        $cbp1 = filter_var(trim($_POST['cbp1']), FILTER_SANITIZE_SPECIAL_CHARS);
        $cbp2 = filter_var(trim($_POST['cbp2']), FILTER_SANITIZE_SPECIAL_CHARS);
        $ccomplaint = filter_var(trim($_POST['ccomplaint']), FILTER_SANITIZE_SPECIAL_CHARS);
        $ctaken = filter_var(trim($_POST['ctaken']), FILTER_SANITIZE_SPECIAL_CHARS);
        $cremark = filter_var(trim($_POST['cremark']), FILTER_SANITIZE_SPECIAL_CHARS);
        $cconsultans = filter_var(trim($_POST['cconsultans']), FILTER_SANITIZE_SPECIAL_CHARS);
        $medicine = filter_var(trim($_POST['medicine']), FILTER_SANITIZE_SPECIAL_CHARS);
        $patient_id = filter_var(trim($_POST['patient_id']), FILTER_SANITIZE_SPECIAL_CHARS);
        $medicineHelperJSON = $_POST['medicine_helper'];
        $month = date("m", strtotime($cdate));
        $year = date("Y", strtotime($cdate));

        $medicineHelperArray = json_decode($medicineHelperJSON, true);
        $status = false;
        if (!empty($medicineHelperArray)) {
            foreach ($medicineHelperArray as $medicineHelperEntry) {
                $medicineHelperEntry = trim($medicineHelperEntry);
                list($medicineQty, $medicineID) = explode('/', $medicineHelperEntry);

                $stmt = $conn->prepare("SELECT * FROM m_inventory WHERE inv_id = :inv_id");
                $stmt->execute(['inv_id' => $medicineID]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                $new_qty = ((int)$result['inv_totalcount'] - (int)$medicineQty);
                $new_issue =  ((int)$result['inv_issued'] + (int)$medicineQty);
                $param = [
                    'inv_id' => trim($medicineID),
                    'inv_remaining' => trim($new_qty),
                    'inv_issued' => trim($new_issue),
                ];

                $results = $db->query("UPDATE m_inventory SET inv_remaining = :inv_remaining, inv_issued = :inv_issued WHERE inv_id = :inv_id", $param);
                if ($results) {
                    $status = true;
                }
            }

            if ($status == true) {
                $param = [
                    'treat_illness_id' => trim($ccomplaint),
                    'treat_date' => trim($cdate),
                    'treat_time' => trim($ctime),
                    'treat_sy' => trim($cschool_year),
                    'treat_semester' => trim($csemester),
                    'treat_personnel_id' => trim($_SESSION['cis-admin-id']),
                    'treat_med' => trim($medicine),
                    'treat_month' => trim($month),
                    'treat_year' => trim($year),
                    'treat_action' => trim($ctaken),
                    'treat_remarks' => trim($cremark),
                    'treat_patient_id' => trim($patient_id),
                    'treat_temp' => trim($ctemp),
                    'treat_pulse' => trim($cpulse),
                    'treat_rr' => trim($crr),
                    'treat_mm' => trim($cbp1),
                    'treat_hg' => trim($cbp2),
                    'personnel_custom' => trim($cconsultans)
                ];
                $result = $db->query("INSERT INTO treatment 
                (treat_illness_id,treat_date,treat_time,treat_sy,treat_semester,treat_personnel_id,treat_med,treat_month,treat_year,treat_action,treat_remarks,treat_patient_id,treat_temp,treat_pulse,treat_rr,treat_mm,treat_hg,personnel_custom) 
                VALUES 
                (:treat_illness_id,:treat_date,:treat_time,:treat_sy,:treat_semester,:treat_personnel_id,:treat_med,:treat_month,:treat_year,:treat_action,:treat_remarks,:treat_patient_id,:treat_temp,:treat_pulse,:treat_rr,:treat_mm,:treat_hg,:personnel_custom)", $param);
                if ($result) {
                    echo "ok";
                }
            } else {
                echo "error";
            }
        } else {
            $param = [
                'treat_illness_id' => trim($ccomplaint),
                'treat_date' => trim($cdate),
                'treat_time' => trim($ctime),
                'treat_sy' => trim($cschool_year),
                'treat_semester' => trim($csemester),
                'treat_personnel_id' => trim($_SESSION['cis-admin-id']),
                'treat_med' => trim($medicine),
                'treat_month' => trim($month),
                'treat_year' => trim($year),
                'treat_action' => trim($ctaken),
                'treat_remarks' => trim($cremark),
                'treat_patient_id' => trim($patient_id),
                'treat_temp' => trim($ctemp),
                'treat_pulse' => trim($cpulse),
                'treat_rr' => trim($crr),
                'treat_mm' => trim($cbp1),
                'treat_hg' => trim($cbp2),
                'personnel_custom' => trim($cconsultans)
            ];
            $result = $db->query("INSERT INTO treatment 
            (treat_illness_id,treat_date,treat_time,treat_sy,treat_semester,treat_personnel_id,treat_med,treat_month,treat_year,treat_action,treat_remarks,treat_patient_id,treat_temp,treat_pulse,treat_rr,treat_mm,treat_hg,personnel_custom) 
            VALUES 
            (:treat_illness_id,:treat_date,:treat_time,:treat_sy,:treat_semester,:treat_personnel_id,:treat_med,:treat_month,:treat_year,:treat_action,:treat_remarks,:treat_patient_id,:treat_temp,:treat_pulse,:treat_rr,:treat_mm,:treat_hg,:personnel_custom)", $param);
            if ($result) {
                echo "ok";
            }
        }
    }

    if (isset($_POST['createNurseSubmit'])) {
        $nurse_name = filter_var(trim($_POST['nurse_name']), FILTER_SANITIZE_SPECIAL_CHARS);
        $param = [
            'nurse_name' => trim($nurse_name),
        ];
        $results = $db->query("UPDATE school_nurse SET nurse_name = :nurse_name", $param);
        if ($results) {
            echo 'ok';
        } else {
            echo "no";
        }
    }
}
