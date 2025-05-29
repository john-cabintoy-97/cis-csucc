<?php


class UserModel extends Model
{
    private $con;

    function __construct()
    {
        require_once "./libs/model.php";
        $db = new Model();
        $this->con = $db->connection();
    }

    public function getAllCollege()
    {
        $stmt = $this->con->prepare("SELECT * FROM college ORDER BY college_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllCourse()
    {
        $stmt = $this->con->prepare("SELECT * FROM course ORDER BY course_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllOffice()
    {
        $stmt = $this->con->prepare("SELECT * FROM office ORDER BY office_id ASC");
        $stmt->execute();
        return $stmt->fetchAll();
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
