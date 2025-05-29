<?php


class AdminModel extends Model
{
    private $con;

    function __construct()
    {
        require_once "./libs/model.php";
        $db = new Model();
        $this->con = $db->connection();
    }

    public function getOrderLevelMedicine()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS medicine_count FROM m_inventory WHERE inv_remaining < inv_orderlevel");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getZeroMedicine()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS zero_count FROM m_inventory WHERE inv_remaining = 0");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getSoonExpiredMedicine()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS expired_count FROM m_inventory WHERE inv_expiration > CURDATE() AND inv_expiration <= DATE_ADD(CURDATE(), INTERVAL 3 MONTH)");
        $stmt->execute();
        return $stmt->fetch();
    }


    public function getAvailableMedicine()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS available_count FROM m_inventory WHERE inv_expiration > CURDATE()");
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function getExpiredMedicine()
    {
        $stmt = $this->con->prepare("SELECT COUNT(*) AS expired_count
        FROM m_inventory
        WHERE inv_expiration <= CURDATE()");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllCollege()
    {
        $stmt = $this->con->prepare("SELECT * FROM college ORDER BY college_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllFeedBack()
    {
        $stmt = $this->con->prepare("SELECT * FROM feedback ORDER BY feedback_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function getByIdCollege($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM college WHERE college_id = :college_id");
        $stmt->execute(['college_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllCourse()
    {
        $stmt = $this->con->prepare("SELECT * FROM course ORDER BY course_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEditCourse($id)
    {
        $stmt = $this->con->prepare("SELECT cs.course_name, cl.college_id FROM course AS cs LEFT JOIN college AS cl ON cl.college_id = cs.college_id WHERE cs.course_id = :course_id");
        $stmt->execute(['course_id' => $id]);
        return $stmt->fetch();
    }

    public function getByIdCourse($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM course WHERE course_id = :course_id");
        $stmt->execute(['course_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllOffice()
    {
        $stmt = $this->con->prepare("SELECT * FROM office ORDER BY office_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdOffice($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM office WHERE office_id = :office_id");
        $stmt->execute(['office_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllIllness()
    {
        $stmt = $this->con->prepare("SELECT * FROM illness ORDER BY illness_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdIllness($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM illness WHERE illness_id = :illness_id");
        $stmt->execute(['illness_id' => $id]);
        return $stmt->fetch();
    }

    public function getNurse()
    {
        $stmt = $this->con->prepare("SELECT * FROM school_nurse");
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getAllMedicine()
    {
        $stmt = $this->con->prepare("SELECT * FROM medicine ORDER BY md_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdMedicine($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM medicine WHERE md_id = :md_id");
        $stmt->execute(['md_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllMedicineInventory()
    {
        $stmt = $this->con->prepare("SELECT md.med_generic, md.med_brand, inv.inv_totalcount, inv.inv_orderlevel, inv.inv_expiration, inv.inv_remaining, inv.inv_issued, inv.inv_batchdate, inv.inv_id, inv.inv_med_id
        FROM medicine AS md
        INNER JOIN m_inventory AS inv ON md.md_id = inv.inv_med_id;
         ");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllUnitMeasure()
    {
        $stmt = $this->con->prepare("SELECT * FROM unit_measure ORDER BY um_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdUnitMeasure($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM unit_measure WHERE um_id = :um_id");
        $stmt->execute(['um_id' => $id]);
        return $stmt->fetch();
    }

  


    public function getAllEquipment()
    {
        $stmt = $this->con->prepare("SELECT * FROM equipment ORDER BY equipment_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }


   
    public function getByIdEquipment($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM equipment WHERE equipment_id = :equipment_id");
        $stmt->execute(['equipment_id' => $id]);
        return $stmt->fetch();
    }

    public function getByIdPersonnel($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM personnel WHERE patient_id   = :patient_id  ");
        $stmt->execute(['patient_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllType()
    {
        $stmt = $this->con->prepare("SELECT * FROM type ORDER BY type_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdType($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM type WHERE type_id  = :type_id ");
        $stmt->execute(['type_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllPatient()
    {
        $stmt = $this->con->prepare("SELECT * FROM patient ORDER BY patient_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdPatient($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM patient WHERE patient_id  = :patient_id ");
        $stmt->execute(['patient_id' => $id]);
        return $stmt->fetch();
    }

    public function getAllTreatment()
    {
        $stmt = $this->con->prepare("SELECT * FROM treatment ORDER BY treat_id  ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByIdTreatment($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM treatment WHERE treat_patient_id	 = :treat_patient_id");
        $stmt->execute(['treat_patient_id' => $id]);
        return $stmt->fetch();
    }


 



    public function urlEncode($url)
    {
        return urlencode(base64_encode($url));
    }
    public function urlDecode($url)
    {
        return base64_decode(urldecode($url));
    }
}
