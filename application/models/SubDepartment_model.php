<?php
class SubDepartment_model extends CI_Model{

        public function getAllSubDepartmentData()
        {
                        $this->db->select('sub_department.*,department.dept_name As dept_name,department.dept_no As dept_id');
                        $this->db->from('sub_department');
                        $this->db->join('department','sub_department.dept_no = department.dept_no');
                        $this->db->where('sub_department.is_deleted',0);
                        $this->db->order_by('sub_department.id','DESC');
                $query = $this->db->get()->result_array();
                        return ($query);
        }
       public function getSubDepartmentDataById($id='')
        {
                        $this->db->select('sub_department.*,department.dept_name As dept_name,department.dept_no As dept_id');
                        $this->db->from('sub_department');
                        $this->db->join('department','sub_department.dept_no = department.dept_no');
                        $this->db->where('sub_department.id',$id);
                $query = $this->db->get()->row_array();
                        return ($query);
        }
      public function getSubDepartmentDataBydeptId($dept_id='')
        {
                        $this->db->select('sub_department.*');
                        $this->db->from('sub_department');
                        $this->db->where('sub_department.dept_no',$dept_id);
                $query = $this->db->get()->result_array();
                        return ($query);
        }

}
?>