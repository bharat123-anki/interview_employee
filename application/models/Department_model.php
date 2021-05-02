<?php
class Department_model extends CI_Model{

        public function getAllDepartmentData()
        {
                        $this->db->select('*');
                        $this->db->from('department');
                $query = $this->db->get()->result_array();
                        return ($query);
        }

}
?>