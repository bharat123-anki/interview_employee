<?php
class CandidateInfo_model extends CI_Model{

        public function getAllCandidateInfoData()
        {
                        $this->db->select('ci.*,department.dept_name As dept_name,sub_department.sub_department_name As sub_dept_name');
                        $this->db->from('candidate_info ci');
                        $this->db->join('department','ci.dept_no = department.dept_no');
                        $this->db->join('sub_department','ci.sub_department_id = sub_department.id');
                        $this->db->where('ci.is_deleted',0);
                                            $this->db->order_by('ci.id','DESC');
                $query = $this->db->get()->result_array();
                        return ($query);
        }
                public function  getCandidateDataById($id)
        {
                        $this->db->select('ci.*');
                        $this->db->from('candidate_info ci');
                        $this->db->where('ci.id',$id);
                $query = $this->db->get()->row_array();
                        return ($query);
        }


}
?>