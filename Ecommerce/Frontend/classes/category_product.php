<?php
    $filepath = realpath (dirname (__FILE__));
    include_once ($filepath.'/../libs/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>
<?php
    class Category{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function insert_category($catName){
            $catName = $this->fm->validation ($catName);

            $catName = mysqli_real_escape_string ($this->db->link, $catName);

            if (empty($catName)){
                $alert = "<span style='color: red'>You have not entered a product category name</span>";
                return $alert;
            }else{
                $query = "insert into tbl_category( category_name ) values ( '$catName')";
                $result = $this->db->insert ($query);
                if ($result){
                    $alert = "<span style='color: greenyellow'>Add a successful product catalog</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Product catalog was not added successfully</span>";
                    return $alert;
                }
            }
        }

        public function show_category(){
            $query = "select * from tbl_category order by category_id desc";
            $result = $this->db->select ($query);
            return $result;
        }

        public function getcatsbyId($catId){
            $query = "select * from tbl_category where category_id = '$catId'";
            $result = $this->db->select ($query);
            return $result;
        }

        public function updates_category($catName, $catId){
            $catName = $this->fm->validation ($catName);
            $catName = mysqli_real_escape_string ($this->db->link, $catName);
            $catId = mysqli_real_escape_string ($this->db->link, $catId);

            if (empty($catName)){
                $alert = "<span style='color: red'>You have not entered a product category name</span>";
                return $alert;
            }else{
                $query = "update tbl_category set category_name = '$catName' where category_id = '$catId'";
                $result = $this->db->update ($query);
                if ($result){
                    $alert = "<span style='color: greenyellow'>Update a successful product catalog</span>";
                    return $alert;
                }else{
                    $alert = "<span style='color: red'>Product catalog was not updated successfully</span>";
                    return $alert;
                }
            }
        }

        public function del_category ($catId){
            $query = "delete from tbl_category where category_id = '$catId'";
            $result = $this->db->delete ($query);
            if ($result){
                $alert = "<span style='color: greenyellow'>Delete a successful product catalog</span>";
                return $alert;
            }else{
                $alert = "<span style='color: red'>Product catalog was not delete successfully</span>";
                return $alert;
            }
        }

//        public function get_name_cat($catId){
//            $query = "select * from tbl_category where catId = '$catId' LIMIT 1";
//            $result = $this->db->select ($query);
//            return $result;
//        }
    }
?>
