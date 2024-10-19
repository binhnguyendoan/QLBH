<?php
include $_SERVER['DOCUMENT_ROOT'] . '../../QLBH/app/Models/Session.php';
Session::checkLogin();
include $_SERVER['DOCUMENT_ROOT'] . '../../QLBH/app/Models/Database.php';
include $_SERVER['DOCUMENT_ROOT'] . '../../QLBH/app/Models/Format.php';

?>
<?php
class adminlogin
{
    private $DB;
    private $fm;
    public function __construct()
    {
        $this->DB = new Database();
        $this->fm = new Format();
    }
    public function login_admin($adminUser, $adminPass)
    {
        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->DB->link, $adminUser);
        $adminPass = mysqli_real_escape_string($this->DB->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {
            $alert = "User and Pass must be not empty";
            return $alert;
        } else {
            $query = "SELECT * FROM admin WHERE User='$adminUser' AND Pass='$adminPass' LIMIT 1";
            $result = $this->DB->select($query);
            if ($result != false) {
                $value = $result->fetch_assoc();
                Session::set('login', true);
                Session::set("id", $value["id"]);
                Session::set("Name", $value["Name"]);
                Session::set("User", $value["User"]);
                header("Location: index.php");
            } else {
                $alert = "User and Pass not match";
                return $alert;
            }
        }
    }
}