<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Origin{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_origin($originName){
            $originName = $this->fm->validation ($originName);

            $originName = mysqli_real_escape_string ($this->db->link, $originName);

            if (empty($originName)){
                $alert = "<span style='color: red'>You have not entered a product origin name</span>";
                return $alert;
            }else{
                $query = "insert into tbl_origin( origin_name) values ( '$originName')";
                $result = $this->db->insert ($query);
                if ($result){
                    $alert = "<span style='color: greenyellow'>Add a successful product origin</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Product origin was not added successfully</span>";
                    return $alert;
                }
            }
        }

        public function show_origin(){
            $query = "select * from tbl_origin order by origin_id desc";
            $result = $this->db->select ($query);
            return $result;
        }

        public function getbrandbyId($originId){
            $query = "select * from tbl_origin where origin_id = '$originId'";
            $result = $this->db->select ($query);
            return $result;
        }

        public function updates_origin($originName, $originId){
            $originName = $this->fm->validation ($originName);
            $originName = mysqli_real_escape_string ($this->db->link, $originName);
            $originId = mysqli_real_escape_string ($this->db->link, $originId);

            if (empty($originName)){
                $alert = "<span style='color: red'>You have not entered a product origin name</span>";
                return $alert;
            }else{
                $query = "update tbl_origin set origin_name = '$originName' where origin_id = '$originId'";
                $result = $this->db->update ($query);
                if ($result){
                    $alert = "<span style='color: greenyellow'>Update a successful product origin</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Product origin was not update successfully</span>";
                    return $alert;
                }
            }
        }

        public function del_origin ($originId){
            $query = "delete from tbl_origin where origin_id = '$originId'";
            $result = $this->db->delete ($query);
            if ($result){
                $alert = "<span style='color: greenyellow'>Delete a successful product origin</span>";
                return $alert;
            }else{
                $alert = "<span style='color: red'>Product origin was not delete successfully</span>";
                return $alert;
            }
        }
    }
?>

