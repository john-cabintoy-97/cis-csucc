
<?php
//SYSTEM CONFIGURATION 
define('PAGE_TITLE', 'CIS-CSUCC');
define('TITLE', 'Clinic Information System');
define('NAVBAR_TITLE', 'Clinic Information System');
class CISConfig
{
    // database credentials
    private $db_host = 'localhost';
    private $db_user = 'root';
    private $db_pass = '';
    private $db_name = 'cis-csucc';

    private $tbl = 'patient';

    // default administrator
    private $fname = "administrator";
    private $lname = "administrator";
    private $mname = "administrator";
    private $gender = "male";

    private $admin = 'admin';

    private $username = "administrator";
    private $password = 'admin123';

    function __construct()
    {
    }

    public function adminData()
    {
        $data = array(
            'fname' => $this->fname,
            'lname' => $this->lname,
            'mname' => $this->mname,
            'gender' => $this->gender,
            'admin' => $this->admin,
            'username' => $this->username,
            'password' => $this->password,
        );

        return $data;
    }

    public function databaseData()
    {
        $data = array(
            'db_host' => $this->db_host,
            'db_user' => $this->db_user,
            'db_pass' => $this->db_pass,
            'db_name' => $this->db_name,
        );

        return $data;
    }

    public function tableData()
    {
        return $this->tbl;
    }
}
?>