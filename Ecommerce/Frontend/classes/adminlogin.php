<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/session.php');
    Session::checkLogin ();
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Adminlogin{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function login_admin($adminEmail, $adminPass){
            $adminEmail = $this->fm->validation ($adminEmail);
            $adminPass = $this->fm->validation ($adminPass);

            $adminEmail = mysqli_real_escape_string ($this->db->link, $adminEmail);
            $adminPass = mysqli_real_escape_string ($this->db->link, $adminPass);

            if (empty($adminEmail) || empty($adminPass)){
                $alert = "You are not enter a password and login name";
                return $alert;
            }else{
                $query = "SELECT * FROM tbl_admin where email = '$adminEmail' AND password = '$adminPass'";
                $result = $this->db->select ($query);

                if ($result != false){
                    $value = $result->fetch_assoc();
                    Session::set ('adminlogin', true);

                    Session::set ('admin_id', $value['admin_id']);
                    Session::set ('email', $value['email']);
                    Session::set ('admin_name', $value['admin_name']);
                    header("Location:index.php");
                }else{
                    $alert = "<span style='color: red; padding-top: 10px'>Entry name or bad password</span>";
                    return $alert;
                }
            }
        }
    }
?>
