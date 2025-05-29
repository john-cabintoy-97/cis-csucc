<?php
require __DIR__ . '/../config/system.php';

class Model extends CISConfig
{
  private $conn;
  private $user_tbl;
  private $admin;
  private $database;

  public function __construct()
  {
    $config = new CISConfig();
    // set database credentials 
    $this->database = $config->databaseData();
    // set admin credentials
    $this->admin = $config->adminData();
    // set user table name
    $this->user_tbl = $config->tableData();

    try {
      $datasource = "mysql:host=" . $this->database['db_host'] . ";dbname=" . $this->database['db_name'];
      $this->conn = new PDO($datasource, $this->database['db_user'], $this->database['db_pass']);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    } catch (DOException $exception) {
      exit('Failed to connect to database!');
    }
  }
  public function connection()
  {
    return $this->conn;
  }

  public function query($sql, $param)
  {
    $stmt = $this->conn->prepare($sql);
    return $stmt->execute($param);
  }

  public function close()
  {
    return $this->conn = null;
  }

  public function loadAdmin()
  {
  
      $stmt = $this->conn->prepare("SELECT * FROM patient WHERE patient_type = :patient_type");
      $stmt->execute(['patient_type' => 'admin']);
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      if(count($result) <= 0){
        $param = [
          'patient_lname' => trim($this->admin['fname']),
          'patient_fname' => trim($this->admin['lname']),
          'patient_mname' => trim($this->admin['mname']),
          'patient_gender' => trim($this->admin['gender']),
          'patient_type' => trim($this->admin['admin']),
          'username' => trim($this->admin['username']),
          'password' => password_hash($this->admin['password'], PASSWORD_BCRYPT),
        ];
        $result = $this->query("INSERT INTO patient (`patient_lname`, `patient_fname`, `patient_mname`, `patient_gender`,`patient_type`,`username`, `password`) VALUES (:patient_lname, :patient_fname, :patient_mname, :patient_gender,:patient_type, :username, :password)", $param);

        if ($result) {
          $stmt = $this->conn->prepare("SELECT * FROM patient WHERE patient_type = :patient_type");
          $stmt->execute(['patient_type' => 'admin']);
          $result = $stmt->fetch(PDO::FETCH_ASSOC);

          $param = [
            'patient_id' => $result['patient_id'],
            'per_admin' => true,
            'per_consultation' => true,
            'per_reports' => true,
            'rep_consultation' => true,
            'rep_individual' => true,
            'rep_medicine' => true,
            'rep_registered' => true,
            'rep_health' => true,
            'per_inventory' => true,
            'inv_medicine' => true,
            'inv_equipment' => true,
            'inv_stocks' => true,
            'per_management' => true,
            'mn_students' => true,
            'mn_faculty' => true,
            'mn_employee' => true,
            'activation' => true,
            'mn_personnel' => true,
            'per_setup' => true,
            'st_college' => true,
            'st_course' => true,
            'st_office' => true,
            'st_illness' => true,
            'st_nurse' => true
          ];
          $result = $this->query(
            "INSERT INTO `personnel`
            (patient_id, per_admin,per_consultation,per_reports,rep_consultation,rep_individual,rep_medicine,rep_registered,rep_health,per_inventory,inv_medicine,inv_equipment,inv_stocks,per_management,mn_students,mn_faculty,mn_employee,activation,mn_personnel,per_setup,st_college,st_course,st_office,st_illness,st_nurse) 
            VALUES 
            (:patient_id, :per_admin,:per_consultation,:per_reports,:rep_consultation,:rep_individual,:rep_medicine,:rep_registered,:rep_health,:per_inventory,:inv_medicine,:inv_equipment,:inv_stocks,:per_management,:mn_students,:mn_faculty,:mn_employee,:activation,:mn_personnel,:per_setup,:st_college,:st_course,:st_office,:st_illness,:st_nurse)",
            $param
          );
        } else {
          echo "Error creating user.";
          return false;
        }
      }
     
  }
  
}
